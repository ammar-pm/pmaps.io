@extends('spark::layouts.app')

@section('content')

<div class="row">

  <div class="col-md-12">

    <div class="panel panel-default panel-body">

                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>{{ __('common.name') }}</th>
                      <th>{{ __('common.email') }}</th>
                      <th>{{ __('common.phone') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                         @foreach($records as $record)
                            
                            <tr>
                                <td><a href="/users/{{ $record->id }}/edit"><i class="fa fa-edit"></i> {{ $record->name }}</a></td>
                                <td>{{ $record->email }}</td>
                                <td>{{ $record->phone }}</td>
                            </tr>
                            
                          @endforeach
                  </tbody>
                </table>

        </div><!--Panel-->

        {{ $records->links() }}

    </div><!--Col-->

</div><!--Row-->

@endsection