@extends('spark::layouts.app')

@section('content')

<div class="row">

  <div class="col-md-12">

    <div class="panel panel-default panel-body">

                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>{{ __('common.name') }}</th>
                      <th>{{ __('common.status') }}</th>
                      <th>{{ __('common.created') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                         @foreach($records as $record)
                            
                            <tr>
                                <td><a href="/groups/{{ $record->id }}/edit"><i class="fa fa-edit"></i> {{ $record->name }}</a></td>
                                <td>
                                  @if($record->status)
                                    <span class="label label-success text-uppercase">{{ __('common.active') }}</span>
                                  @else
                                    <span class="label label-danger text-uppercase">{{ __('common.inactive') }}</span>
                                  @endif
                                </td>
                                <td>{{ $record->created_at }}</td>
                            </tr>
                            
                          @endforeach
                  </tbody>
                </table>

        </div><!--Panel-->

        {{ $records->links() }}

    </div><!--Col-->

</div><!--Row-->

@endsection