$(document).ready(function(){
    
    $('#myModal').modal({
        backdrop: 'static',
        keyboard: false,
        show: false
    });

    $("form#form-records-add").on('submit', function(e) {
        var formData = new FormData($(this)[0]);

        $.ajax({
			type: "POST",
			url: "data/records-handler.php",
			cache: false,
			data: formData,
			async: false,
			processData: false,
			contentType:false,
			success: function(data) {
                
                if(data==1){
                        toastSuccess("Successfully Updated", "The shipment ETA / Remarks has been updated");
                        $("input[type=text],input[type=email], textarea").val("");
                        $('#myModal').modal('hide');
                        refresh("records-all");
                }else{
                    toastErr("Error!", "There was a problem on saving!");
                }
            }
		})
        e.preventDefault();
    })

    $("form#form-records-edit").on('submit', function(e) {
        var formData = new FormData($(this)[0]);
        $.ajax({
			type: "POST",
			url: "data/records-handler.php",
			cache: false,
			data: formData,
			async: false,
			processData: false,
			contentType:false,
			success: function(data) {
                if(data==1){
                        toastSuccess("Successfully Updated", "The shipment ETA / Remarks has been updated");
                        $('#myModalEdit').modal('hide');
                        refresh("records-all");
                }else{
                    toastErr("Error!", "There was a problem on updating!");
                }
            }
		})
        e.preventDefault();
    })

    $("#edit").on('click', function(){
        var len = $("input[name='selectRecords']:checked").length;

        if(len==0){
            alert('Please select record');
        }else if(len>1){
            alert('Please select only one record');
        }else{
            $.each($("input[name='selectRecords']:checked"), function(){
                var formData = $(this).val(); 
                
                $.ajax({
                    type:"POST",
                    url: "data/records-handler.php",
                    data: "edit="+formData,
                    cache: false,
                    success: function(data) {
                       
                        var json = $.parseJSON(data);
                        $(json).each(function(i,val){
                            $("#myModalEdit").modal('show');
                            $("#statusEdit").val(val.status);
                            $("#etaDateEdit").val(val.etadate);
                            $("#etaRemEdit").val(val.etarem);
                            $("#estDateEdit").val(val.estdate);
                            $("#estRemEdit").val(val.estrem);
                            $('#lotNumEdit').append('<option value='+val.lot+'>'+val.lot+'</option>');
                            $('#lotNumEdit').select2('val', val.lot, true);
                            $("#rem_id").val(val.shipid);
                        })
                    }
                })
            });
        }
    })
   
    $('#export').click(function(){ $('.buttons-excel').click(); });
});


function getAllRecords() {
	//iCheck for checkbox and radio inputs
	  /*------ datatables all products---------*/
    var table = $('#records-all').DataTable( {
        "dom": '<"toolbar">Bfrtip',
        "lengthChange": false,
		"ordering": false,
		"scrollX": true,
        "buttons": [
            {
                extend: 'excel',
                messageTop: 'The information in this table is copyright to Bahaghari.'
            },
        ],
        "language": {
            "emptyTable":     "No shipment available"
        },
        "ajax": {
            "url": "data/records-handler.php",
            "dataSrc": ""
        },
         "columns": [
            { "data": "shipid" },
            { "data": "lot" },
            { "data": "invoice" },
            { "data": "etadate" },
            { "data": "etarem" },
            { "data": "estdate" },
            { "data": "estrem" },
            { "data": "status" },
            { "data": "indate" }
         ],
		'drawCallback': function(){
			$('input[type="checkbox"]').iCheck({
			   checkboxClass: 'icheckbox_flat-blue'
			});
		 },
         'columnDefs': [{
            'targets': 0,
            'searchable':false,
            'orderable':false,
            'className': 'dt-body-center',
            'render': function (data, type, full, meta){
         
                return '<input type="checkbox" name="selectRecords" id="selectRecords" value="'+data+'" data-rec="'+full.shipid+'">';
            }
            },
            {
            "targets": [ 1 ],
            "visible": true,
            "searchable": true
            },
        ],
      'order': [1, 'asc']
    } );

    /*------------- custom toolbar ------------*/
     $("div.toolbar").html('<div class="mailbox-controls">'+
         '<div class="btn-group">'+
            '<button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#myModal" title="Update"><i class="fa fa-plus"></i> Update ETA / Remarks</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="edit" title="Edit ETA / Remarks"><i class="fas fa-edit"></i> Edit ETA / Remarks</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="export" title="Export"><i class="fas fa-file-download"></i> Export to Excel</button>'+
            '</div>'+
        '</div>');

     $("div.toolbar").css('float','left');
     $(".buttons-excel").css("display","none");
   
}

function getLot() {

	$('#lotNum').select2({
		width: 'resolve',
		placeholder: "Search Lot #...",
        dropdownParent: $("#myModal"),
		ajax: {
			url: 'data/records-search.php',
			dataType: 'json',
        	quietMillis: 100,
			processResults: function (data) {
				return {
					results: $.map(data, function(obj) {
						return { id: obj.invNum, text: obj.lotNo };
					})
				};

			}
		  }
	  });
}

function getLotEdit() {

	$('#lotNumEdit').select2({
		width: 'resolve',
		placeholder: "Search Lot #...",
        dropdownParent: $("#myModalEdit"),
		ajax: {
			url: 'data/records-search.php',
			dataType: 'json',
        	quietMillis: 100,
			processResults: function (data) {
				return {
					results: $.map(data, function(obj) {
						return { id: obj.invNum, text: obj.lotNo };
					})
				};

			}
		  }
	  });
}
