@if(Request::get('filter'))
<a class="btn btn-primary" href="/{{ Request::segment(1) }}"><i class="fa fa-arrow-left"></i> {{ __('common.all') }}</a>
@else
<button class="btn btn-success" onclick="teamFilter()">{{ __('common.my_team') }}</button>
<button class="btn btn-success" onclick="communityFilter()">{{ __('common.community') }}</button>
@endif


@push('plugins')

<script>

function teamFilter() {
if (location.href.indexOf("?") === -1) {
    window.location = location.href += "?filter=myteam";
}
else {
    window.location = location.href += "&filter=myteam";
}
};

function communityFilter() {
if (location.href.indexOf("?") === -1) {
    window.location = location.href += "?filter=community";
}
else {
    window.location = location.href += "&filter=community";
}
};

</script>

@endpush