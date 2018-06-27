@foreach($record->teams as $team)

<div class="col-md-3">
	<div class="panel panel-default panel-body">
		  
		  <h4>
		  	<img src="{{ $team->photo_url }}" class="img-circle" width="32">
		  	<a href="/groups/{{ $team->id }}/edit">{{ $team->name }}</a>
		  </h4>

	      @if($team->status)
	        <span class="label label-success text-uppercase">Active</span>
	      @else
	        <span class="label label-danger text-uppercase">Inactive</span>
	      @endif

	      <span class="label label-primary">{{ count($team->users) }} {{ __('common.users') }}</span>


	      <p class="text-muted m-t">{{ $team->created_at }}</p>

	</div>
</div>

@endforeach