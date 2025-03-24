$(document).ready(function(){
    $('#export').click(function(){ $('.buttons-excel').click(); });
})

function getAllMan() {
    var plaintext = decrypt('ship');
	//iCheck for checkbox and radio inputs
	  /*------ datatables all products---------*/
    var table = $('#man-all').DataTable( {
        "dom": '<"toolbar">Bfrtip',
        "lengthChange": false,
    		"ordering": false,
    		"scrollX": true,
        "buttons": [
            {
                extend: 'excel',
                messageTop: 'Lot #: '+plaintext,
            },
        ],
        "language": {
            "emptyTable":     "No shipment available"
        },
        "ajax": {
            "url": "data/sales-export-handler.php",
            "type": "POST",
            "dataSrc": "",
            "data" : 
                {"view": plaintext,
            }
        },
         "columns": [
            { "data": "code" },
      		{ "data": "date" },
            { "data": "invoice" },
            { "data": "rqty" },
            { "data": "jqty" },
            { "data": "iqty" },
            { "data": "total" },
            { "data": "totalAmount" },

		],
		'drawCallback': function(){
			$('input[type="checkbox"]').iCheck({
			   checkboxClass: 'icheckbox_flat-blue'
			});
		 },
      'order': [1, 'asc']
    } );

    /*------------- custom toolbar ------------*/
     $("#form-man-all div.toolbar").html('<div class="mailbox-controls">'+
         '<div class="btn-group">'+
            '<button type="button" class="btn btn-default btn-sm" id="export" title="export"><i class="fas fa-file-download"></i> Export</button>'+
            '</div>'+
        '</div>');

     $("#form-man-all div.toolbar").css('float','left');
     $(".buttons-excel").css("display","none");
}
