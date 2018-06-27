<?php $count = 0 ?>

@foreach($record->tagslist as $tag)

<?php if($count == 3) break; ?>

  @if(!empty($tag))
  <span class="label label-primary"><a href="/tags?tag={{ $tag }}">{{ $tag }}</a></span>&nbsp;
  @endif

<?php $count++; ?>

@endforeach