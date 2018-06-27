<table class="table table-striped">
<thead>
  <tr>
    <th><!-- <input type="checkbox" id="selectTable"> --></th>
    <th>{{ __('common.title') }}</th>
    <th>{{ __('common.type') }}</th>
    <th>{{ __('common.trashedby') }}</th>
    <th>{{ __('common.trasheddate') }}</th>
    <th>{{ __('common.restore') }}</th>
    <th>{{ __('common.delete') }}</th>
  </tr>
</thead>
<tbody>
  @foreach($records as $record)
    <tr>
    	<td><input type="checkbox" name="ids[{{$record->type}}][]" value="{{$record->id}}" ></td>
    	<td>{{ $record->title }}</td>
    	<td>{{ $record->type }}</td>
    	<td>{{ $record->trash_by }}</td>
    	<td>{{ $record->trash_date }}</td>
    	<td><a href="/restore/{{$record->type}}/{{$record->id}}" class="btn btn-primary btn-icon"><i class="fa fa-refresh"></i></a></td>
    	<td><a href="/delete/{{$record->type}}/{{$record->id}}" class="btn btn-danger btn-icon"><i class="fa fa-warning"></i></a></td>
    </tr>
  @endforeach
</tbody>
</table>