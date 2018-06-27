@if(Request::get('filter'))
  {{ $records->appends(['filter' => Request::get('filter')])->links() }}
@else
  {{ $records->links() }}
@endif