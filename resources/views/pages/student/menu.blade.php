{{--Marksheet--}}
<li class="nav-item">
    <a href="{{ route('marks.year_select', Qs::hash(Auth::user()->id)) }}" class="nav-link {{ in_array(Route::currentRouteName(), ['marks.show', 'marks.year_selector', 'pins.enter']) ? 'active' : '' }}"><i class="icon-book"></i> Marksheet</a>
</li>
<li class="nav-item">
    <a href="{{ route('attendence.show', Qs::hash(Auth::user()->id)) }}" class="nav-link {{ in_array(Route::currentRouteName(), ['attendence.show']) ? 'active' : '' }}"><i class="icon-fence"></i> Attendence</a>
</li>

<li class="nav-item">
    <a href="{{ route('fee.show', Qs::hash(Auth::user()->id)) }}" class="nav-link {{ in_array(Route::currentRouteName(), ['fee.show']) ? 'active' : '' }}"><i class="icon-office"></i>Payment</a>
</li>
<li class="nav-item">
    <a href="{{ route('book.show', Qs::hash(Auth::user()->id)) }}" class="nav-link {{ in_array(Route::currentRouteName(), ['book.show']) ? 'active' : '' }}"><i class="icon-books"></i>Books</a>
</li>
<li class="nav-item">
    <a href="{{ route('std.notice', Qs::hash(Auth::user()->id)) }}" class="nav-link {{ in_array(Route::currentRouteName(), ['std.notice']) ? 'active' : '' }}"><i class="icon-books"></i>Notice</a>
</li>
