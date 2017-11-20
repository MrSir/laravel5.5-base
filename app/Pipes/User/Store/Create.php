<?php

namespace App\Pipes\User\Store;

use App\Exceptions\User\Store\Create as ExceptionCreate;
use App\Models\Token;
use App\Models\User;
use App\Passables\User\Store;
use App\Pipes\Store\Create as StoreCreate;
use Carbon\Carbon;
use Closure;
use Throwable;

/**
 * Class Create
 * @package App\Pipes\User\Store
 */
class Create extends StoreCreate
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionCreate::class);
        $this->setModel(User::class);
    }

    /**
     * @param Store   $passable
     * @param Closure $next
     *
     * @return mixed
     * @throws ExceptionCreate
     */
    public function handle(Store &$passable, Closure $next)
    {
        try {
            $this->storeModel($passable);

            // set the registered at date
            $user = $passable->getModel();
            $user->registered_at = Carbon::now();
            $user->save();

            // add the token
            $tokenValue = uniqid('token_', true);
            $service = 'app-token';

            $request = $passable->getRequest();

            if ($request->has('token')) {
                $tokenValue = $request->get('token');
            }

            if ($request->has('service')) {
                $service = $request->get('service');
            }

            $token = Token::make(
                [
                    'token' => $tokenValue,
                    'type' => $service,
                ]
            );

            if ($request->has('expiresIn')) {
                $token->expires_at = Carbon::now()
                    ->addSeconds($request->get('expiresIn'));
            }

            $user->tokens()
                ->save($token);
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}