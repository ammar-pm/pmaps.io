<p class="small text-uppercase">{{ __('common.tags') }}</p>
<div class="panel panel-default">
  <div class="panel-body">
      <ul class="tags list-unstyled">
        @foreach($tags as $tag => $count)
          <li><a href="/tags?tag={{$tag}}" class="label label-primary">#{{ $tag }}</a> <span class="small">{{ $count }}</span></li>
        @endforeach
      </ul>
      @if($more)  
        <a href="javascript:void(0)" onclick="tags()"><i class="fa fa-caret-square-o-down"></i> {{ __('common.more') }}</a>
      @endif
  </div>
  <form id="tagsform" action="" method="POST">
    <input type="hidden" name="rec" value="{{$rec or 5}}">
  </form>
</div>