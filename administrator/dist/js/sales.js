$(document).ready(function(){
	$("#print").on('click', function() {

        var len = $("input[name='selectMan']:checked").length;

        if(len==0){
            alert('Please select report');
        }else if(len>1){
            alert('Please select only one report');
        }else{
            $.each($("input[name='selectMan']:checked"), function(){
                var formData = $(this).val(); 
                var encryptedAES = CryptoJS.AES.encrypt(formData, "My Secret Passphrase");
                window.open('sales-report.php?lot='+encryptedAES, '_blank');
            });
        }

    })

    $("#view").on('click', function(){
        var len = $("input[name='selectMan']:checked").length;

        if(len==0){
            alert('Please select report');
        }else if(len>1){
            alert('Please select only one report');
        }else{
            $.each($("input[name='selectMan']:checked"), function(){
                var formData = $(this).val(); 
                var encryptedAES = CryptoJS.AES.encrypt(formData, "My Secret Passphrase");
                window.location.replace('sales-export.php?ship='+encryptedAES);
            });
        }
    })
})

function getAllMan() {
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
                messageTop: 'The information in this table is copyright to Bahaghari.'
            },
        ],
        "language": {
            "emptyTable":     "No shipment available"
        },
        "ajax": {
            "url": "data/manifest-handler.php",
            "dataSrc": ""
        },
         "columns": [
            { "data": "id" },
            { "data": "id" },
      			{ "data": "date" },
            { "data": "total" },
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
    
             return '<input type="checkbox" name="selectMan" id="selectShip" value="'+data+'" data-rec="'+full.id+'">';
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
     $("#form-man-all div.toolbar").html('<div class="mailbox-controls">'+
         '<div class="btn-group">'+
            '<button type="button" class="btn btn-default btn-sm" id="print" title="Print"><i class="fa fa-print"></i> Print</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="view" title="View"><i class="fa fa-eye"></i> View</button>'+
            '</div>'+
        '</div>');

     $("#form-man-all div.toolbar").css('float','left');
   
}
