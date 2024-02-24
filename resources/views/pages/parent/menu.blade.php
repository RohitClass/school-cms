{{--My Children--}}
{{-- <li class="nav-item">
    <a href="{{ route('my_children') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['my_children']) ? 'active' : '' }}"><i class="icon-users4"></i> My Children</a>
</li> --}}
<li class="nav-item">
    <a href="{{ route('books') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['books']) ? 'active' : '' }}"><i class="icon-users4"></i>Books</a>
</li>
<li class="nav-item">
    <a href="{{ route('records') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['records']) ? 'active' : '' }}"><i class="icon-users4"></i>Records</a>
</li>
