<p class="text-muted text-uppercase">{{ __('common.authors') }}</p>

<div class="panel panel-default panel-body m-0">

  <ul class="list-group">
    @foreach($authors as $author)
    <li class="list-group-item">
    	<a href="{{ $author->url }}">
    	
    	<img src="{{ $author->photo_url }}" width="32"> 

    	{{ $author->name }}

    	</a>
    </li>
    @endforeach
  </ul>

</div>

<a href="/authors">{{ __('common.see_all_authors') }}</a>