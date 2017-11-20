<?php
/**
 * Created by PhpStorm.
 * User: MrSir
 * Date: 11/20/2017
 * Time: 1:56 PM
 */

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait Caching
{
    /**
     * This function checks the cache for a cached result
     *
     * @param string $key
     * @param array  $params
     *
     * @return $this
     */
    public function checkCache(string $key, array $params)
    {
        if (Cache::has($key)) {
            $cachedResults = Cache::get($key);

            foreach ($cachedResults as $cachedResult) {
                $differentParams = collect($cachedResult['params'])->diff(collect($params));

                if ($differentParams->count() == 0) {
                    return $cachedResult['result'];
                }
            }
        }
    }

    /**
     * This function adds the params and result to the cache
     *
     * @param string $key
     * @param array  $params
     * @param        $results
     */
    public function addToCache(string $key, array $params, $results)
    {
        $cachedResults = [];

        if (Cache::has($key)) {
            $cachedResults = Cache::get($key);
        }

        $cachedResults[] = [
            'params' => $params,
            'result' => $results,
        ];

        Cache::put(
            $key,
            $cachedResults,
            15
        );
    }
}
