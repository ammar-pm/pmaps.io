@include('common.langswitcher')

<li>
    <a href="/favorites">
        <div class="navbar-icon">
            <i class="icon fa fa-heart"></i>
        </div>
    </a>
</li>

<li>
    <a href="/trash">
        <div class="navbar-icon">
            <i class="icon fa fa-trash-o"></i>
        </div>
    </a>
</li>

@if(Auth::user()->currentTeam()->plan == 'admin')

<li class="dropdown">
        <a class="dropdown-toggle navbar-icon" data-toggle="dropdown" href="#"><i class="icon fa fa-gear"></i></a>
        <ul class="dropdown-menu">
            <li><a href="/users">{{ __('common.users') }}</a></li>
            <li><a href="/groups">{{ __('common.teams') }}</a></li>
            <li><a href="/app/settings">{{ __('common.settings') }}</a></li>
        </ul>
</li>

@endif