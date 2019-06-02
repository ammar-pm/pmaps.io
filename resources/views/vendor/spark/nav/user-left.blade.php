<li><input type="text" class="form-control m-t-md" placeholder="{{ __('common.search') }}" id="search-input"></li>

<li><a href="/dashboard">{{ __('common.dashboard') }}</a></li>
<li><a href="/posts">{{ __('common.posts') }}</a></li>
<li><a href="/maps">{{ __('common.maps') }}</a></li>
<li><a href="/datasets">{{ __('common.datasets') }}</a></li>

@if( Auth::check() && Auth::user()->currentTeam()->plan == 'admin')

<li><a href="/tilesets">{{ __('common.tilesets') }}</a></li>
<li><a href="/categories">{{ __('common.categories') }}</a></li>

@endif