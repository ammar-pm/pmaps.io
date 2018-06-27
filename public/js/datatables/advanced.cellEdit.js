
// $(document).ready(function () {
//     // table = $('#mapDataTable').DataTable({"bSort": false,"aaSorting": [],"aoColumnDefs": [
//     //       { 'bSortable': false, 'aTargets': [ 1 ] }
//     //    ]});
//     table.MakeCellsEditable({
//         "onUpdate": myCallbackFunction,
//         "inputCss":'my-input-class',
        
//         "allowNulls": {
//             "columns": [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
//             "errorClass": 'error'
//         },
//         "confirmationButton": { // could also be true
//             "confirmCss": 'my-confirm-class',
//             "cancelCss": 'my-cancel-class'
//         }
//     });

// });

// function myCallbackFunction (updatedCell, updatedRow, oldValue) {

//     //console.log("The new value for the cell is: " + updatedCell.data());
//     //console.log("The old value for that cell was: " + oldValue);
//     //console.log("The values for each cell in that row are: " + updatedRow.data());
//     console.log(updatedRow.data(), updatedCell);
//     $.ajax({
//         type: "POST",
//         url: "/table/edit",
//         data: {
//             "row" : JSON.stringify(updatedRow.data()), 
//             headerfields : headers,
//             "data_id" : data_id
//         },
//         dataType: "json",
//         success: function(data) {

//             console.log(data);

//             if(data.status){
//                 $('#status_'+updatedRow.index()).removeClass("bg-danger").addClass("bg-success");

//             }
//             else{
//                 $('#status_'+updatedRow.index()).removeClass("bg-success").addClass("bg-danger");
//             }

//             $.each(data, function(i, item) {
//                 console.log(i,updatedRow.index());
//                     $('#'+i+'_'+updatedRow.index()).removeClass("bg-danger"); 
//             });

//             if(data.failed){
//                 $.each(data.failed, function(i, item) {
//                     //console.log(i, item);
//                     $('#'+i+'_'+updatedRow.index()).addClass("bg-danger");
//                 });
//             }

//         }
//     });


// }

// function destroyTable() {
//     if ($.fn.DataTable.isDataTable('#mapDataTable')) {
//         table.destroy();
//         table.MakeCellsEditable("destroy");
//     }
// }