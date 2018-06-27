@foreach($record->users as $user)

<div class="col-md-3">
	<div class="panel panel-default panel-body">

		<h4>
			<img src="{{ $user->photo_url }}" class="img-circle" width="32">
			<a href="/users/{{ $user->id }}/edit">{{ $user->name }}</a>
		</h4>

		<p><span class="label label-primary text-uppercase">{{ $user->pivot->role }}</span></p>

		<ul class="list-group">

			@if(isset($user->email))
			<li class="list-group-item">{{ $user->email }}</li>
			@endif

			@if(isset($user->phone))
			<li class="list-group-item">{{ $user->phone }}</li>
			@endif

			@if(isset($user->usage))
			<li class="list-group-item">{{ $user->usage }}</li>
			@endif

			<li class="list-group-item">{{ $user->created_at }}</li>

		</ul>

	</div>	
</div>

@endforeach