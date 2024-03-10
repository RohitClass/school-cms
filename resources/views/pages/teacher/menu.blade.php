<li class="nav-item">
    <a href="{{ route('notice', Qs::hash(Auth::user()->id)) }}" class="nav-link {{ in_array(Route::currentRouteName(), ['notice']) ? 'active' : '' }}"><i class="icon-books"></i>Notice Board</a>
</li>
