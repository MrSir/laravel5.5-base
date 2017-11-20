<ul class="nav">
    @foreach($site->pages()->orderBy('order', 'asc')->get() as $page)
        <li class="nav-item">
            <a class="nav-link active" href="http://local.laravel55.com/api/page/render?&url={{$page->computeUrl()}}">{{$page->name}}</a>
        </li>
    @endforeach
</ul>