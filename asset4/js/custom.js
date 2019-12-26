function getDataKriteria(valueDropown){
 	$.ajax({
	    url: "config/request_data.php",
	    dataType: "json",
	    data: {
	    	"jenis": valueDropown,
	    	"type": "data_kriteria"
	    },
	    type: "post",
        success: function(response) {
            $('#dataTable').DataTable().destroy();
	    	alert(response);
	    	$('#dataTable tbody').remove();
	    	// $('#dataTable tbody').html('');
	    	// for (var i = 0; i <= response.length; i++) {
		    // 	$('#dataTable tbody').append('<tr><td>'+nsms+'</td> <td>a</td> <td>a</td> <td>a</td> <td>a</td> <td>a</td></tr>');
	    	// }
	    },
	    error: function(xhr, status, err) {
	    	alert(xhr.responseText);
	    }
	});
	// $('#dataTable').dataTable( {
	//     paging: false,
	//     searching: false
	// } );
	// $("#dataTable").DataTable();
	// $('#dataTable').DataTable().destroy();

	alert(valueDropown);
	// $('#dataTable tbody').remove();
	// var oTable = $('#dataTable').DataTable({
	// 	// "bDestroy": true,
	// 	// "destory": true,
	// 	"bRetrieve": true,
    //     "processing": true,
    //     "serverSide": true,
    //     "searching": true,
    //     "ajax": {
    //        "url": "config/request_data.php",
    //        "type": 'POST',
    //        "data": {
    //        		"jenis": valueDropown,
    //        		"type": "data_kriteria"
    //         },
    //         "success": function(response) {
    //                 	alert(response);
    //                 	$('#dataTable tbody').remove();
    //             //     	// $('#dataTable tbody').html('');
    //             //     	// for (var i = 0; i <= response.length; i++) {
    //             // 	    // 	$('#dataTable tbody').append('<tr><td>'+nsms+'</td> <td>a</td> <td>a</td> <td>a</td> <td>a</td> <td>a</td></tr>');
    //             //     	// }
    //         },
    //         "error": function(xhr, status, err) {
    //             $('#dataTable tbody').remove();
    //             alert(xhr.responseText);
    //         }
    //    },
    //     "columns": [
    //         {data: "no", name: "no"},
    //         {data: "nsms", name: "nsms"},
    //         {data: "bobot", name: "bobot"},
    //         {data: "jenis", name: "jenis"},
    //         {data: "nsms", name: "nsms"},
    //         {data: "nsms", name: "nsms"}
    //     ],
    //     "order":[[0,'desc']]
    // });
}