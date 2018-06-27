   <p>{{ __('common.relatedposts') }}</p>
    
    <div class="row">


      @foreach($posts as $post)  
      <div class="col-sm-3">
        <div class="panel panel-default panel-body">
            <h4><a href="/posts/{{ $post->id }}/edit">{{ $post->title }}</a></h4>

            <p>{!! str_limit($post->description, 100) !!}</p>

            @include('posts.tags')

        </div>
      </div>


        @if($loop->iteration % 4 == 0)
        </div><div class="row">
        @endif  

      @endforeach

    </div>