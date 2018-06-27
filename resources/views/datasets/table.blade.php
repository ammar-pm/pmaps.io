@extends('spark::layouts.app')
@section('content')

<div class="container-fluid">

  <ul class="nav nav-pills">
    <li class="nav-item active"><a href="#table" class="nav-link" data-toggle="tab"><i class="fa fa-table fa-lg"></i> Table</a></li>
    <li class="nav-item"><a href="#output" class="nav-link" data-toggle="tab"><i class="fa fa-code fa-lg"></i> Output</a></li>
  </ul>

  <div class="tab-content p-a-sm m-t-sm">

    <div class="tab-pane active" id="table">
      <a href="#" id="addRow" class="btn btn-primary m-b-sm"><i class="fa fa-plus"></i> Add Row</a>
      <div class="panel panel-default">
        <div class="panel-heading no-bg">
          {{ $title }}
        </div>
        <div class="panel-body">
          @if(!empty($headers))
            <table id="mapDataTable" width="100%" class="table">
              <thead>
                <tr>
                  <th>key</th>
                  @foreach($headers as $title)
                    <th>{{ucfirst(str_replace("_"," ",$title))}}</th>
                  @endforeach
                  <th><i class="fa fa-trash"></i></th>
                </tr>
              </thead>
              <tbody>
                  @foreach($rows as $keys => $values) 
                    @if(!empty(array_filter($values)))
                      <tr>
                        <td>{{$keys}}</td>
                        @foreach( $values as $key => $value)
                          {{--@if($value)--}}
                            <td>{{$value}}</td>
                          {{--@endif--}}
                        @endforeach
                        <td><a class="deleteit" href="{{$keys}}-{{$data->id}}"><i class="fa fa-trash fa-lg"></i></a></td>
                      </tr>
                     @endif 
                  @endforeach
              </tbody>
            </table>
          @endif
        </div>
      </div>
    </div>

    <div class="tab-pane" id="output">
      <textarea class="form-control" style="min-height:600px">{{ html_entity_decode($file_data) }}</textarea>
    </div>

  </div>
  
</div>
@endsection


@push('plugins')

<script>



  var headers = <?php echo isset($headers) ? json_encode( $headers ) : json_encode([]);?>;
  var data_id = <?php echo isset($data->id) ? json_encode( $data->id ) : json_encode([]);?>;
  var counter = {{isset($total) ? $total : 0}};
$(document).ready(function () {

  var table = $('#mapDataTable').DataTable({
    "aaSorting": [ 0, "desc" ],
  });

      var rowcolumns = [];
      var rowcolumn = headers.length + 1;
      var c  = 0;

      while (c <= headers.length) {
        rowcolumns.push(c);
        c++;
      }



      table.MakeCellsEditable({
        "onUpdate": myCallbackFunction,
        "inputCss":'my-input-class',

        "columns": rowcolumns,           
        
        "allowNulls": {
            "columns": [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
            "errorClass": 'error'
        },

        "confirmationButton": { // could also be true
            "confirmCss": 'my-confirm-class',
            "cancelCss": 'my-cancel-class'
        }

    });
 
    $('#addRow').on( 'click', function () {

        counter++;

        var trash = '<a class="deleteit" href="'+counter+'-'+{{$data->id}}+'"><i class=" fa fa-trash fa-lg"></i></a>';

        var i  = 0;
        var td = [];
        while (i <= headers.length) {
            if(i == 0){
              td.push(counter);
            } else {
              td.push("empty");
            }
          
          i++;
        }

        td.push(trash);

        table.row.add( td ).draw( false );
 
    } );

    $('body').on('click','.deleteit', function (e) {

      e.preventDefault();

      var $this = $(this);

      var linkvalue = $(this).attr('href');
      $.ajax({
        type: "GET",
        url: "/table/rec/delete/"+linkvalue,
        success: function(data) {
          if (data == "true") {
            table
            .row( $this.parent().parent('tr') )
            .remove()
            .draw();
          }
        }
      });

    });
function myCallbackFunction (updatedCell, updatedRow, oldValue) {

    //console.log("The new value for the cell is: " + updatedCell.data());
    //console.log("The old value for that cell was: " + oldValue);
    //console.log("The values for each cell in that row are: " + updatedRow.data());
    console.log(updatedRow.data());
    $.ajax({
        type: "POST",
        url: "/table/edit",
        data: {
            "row" : JSON.stringify(updatedRow.data()), 
            headerfields : headers,
            "data_id" : data_id
        },
        dataType: "json",
        success: function(data) {

            console.log(data);

            if(data.status){
                $('#status_'+updatedRow.index()).removeClass("bg-danger").addClass("bg-success");

            }
            else{
                $('#status_'+updatedRow.index()).removeClass("bg-success").addClass("bg-danger");
            }

            $.each(data, function(i, item) {
                console.log(i,updatedRow.index());
                    $('#'+i+'_'+updatedRow.index()).removeClass("bg-danger"); 
            });

            if(data.failed){
                $.each(data.failed, function(i, item) {
                    //console.log(i, item);
                    $('#'+i+'_'+updatedRow.index()).addClass("bg-danger");
                });
            }

        }
    });


}

function destroyTable() {
    if ($.fn.DataTable.isDataTable('#mapDataTable')) {
        table.destroy();
        table.MakeCellsEditable("destroy");
    }
}


});
</script>

<script src="/js/datatables/dataTables.cellEdit.js"></script>
<script src="/js/datatables/advanced.cellEdit.js"></script>

<style>
  table > tbody > tr > td:first-child, table > thead > tr > th:first-child{display:none}
</style>
@endpush