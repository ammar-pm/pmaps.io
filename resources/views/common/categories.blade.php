<p class="text-muted text-uppercase">{{ __('common.categories') }}</p>

<div class="panel panel-default panel-body">

  <ul class="list-group">
    @foreach($categories as $category)
    <li class="list-group-item">
    	<a href="/categories/{{ $category->id }}">
    	
    	@if(isset($category->icon))
    	<img src="/storage/icons/{{ $category->icon }}" width="32"> 
    	@endif

    	{{ $category->title }}
    	</a>
    </li>
    @endforeach
  </ul>

</div>