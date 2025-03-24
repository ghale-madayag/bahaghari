$(document).ready(function(){
    $("form#form-upLot").on("submit", function(e) {
        var formData = new FormData($(this)[0]);

        $.ajax({
            type: "POST",
			url: "data/shipper-handler.php",
			cache: false,
			data: formData,
			async: false,
			processData: false,
			contentType:false,
			success: function(data) {
                if(data==1){
                    toastErr("Error!", "Old Lot No. not found.");
                }else{
                    $("#modShip").modal('hide');
                    $("#form-upLot")[0].reset();
                    refresh("ship-all");
                    toastSuccess("Successfully Updated", "Lot No. was successfully updated");
                }
            }
        })
        e.preventDefault();
    });
    $("form#form-ship-add").on("submit", function(e) {
        var formData = new FormData($(this)[0]);

		$.ajax({
			type: "POST",
			url: "data/shipper-handler.php",
			cache: false,
			data: formData,
			async: false,
			processData: false,
			contentType:false,
			success: function(data) {
                
                if (data==2) {
                    toastErr("Duplicate Entry", "Invoice # is already exist!");
                }else if(data==1){
                    $("input[type=text],input[type=email], textarea").val("");
                    $('#cliFullname').select2('destroy');
                    $('#agenNum').select2('destroy');
                    $('#cliFullname').val("");
                    $("#consigName").val('');
                    $("#agenNum").val('');
                    $("#area").val('-1');
                    $("#payType").val('-1');
                    $('#paid').iCheck('uncheck');
                    toastSuccess("Successfully Registered", "You added new shipment <a href='shipment.php'> View All</a>");
                    getClient();
                    getAgent();
                    $("#shipper").empty();
                    $("#recipient").empty();
                
                }else{
                    toastErr("Error!", "There was a problem on saving!");
                }
            }
		})
        e.preventDefault();
    })

    $("form#form-ship-edit").on("submit", function(e) {
        var formData = new FormData($(this)[0]);
  
		$.ajax({
			type: "POST",
			url: "data/shipper-handler.php",
			cache: false,
			data: formData,
			async: false,
			processData: false,
			contentType:false,
			success: function(data) {
              
                if(data==1){
                    var inv = $("#invNum").val();
                    toastSuccess("Successfully Updated", "The shipment information was successfully updated <a href='shipment.php'> View All</a>");
                    $("#shipEdit").val(inv);
                }else{
                    toastErr("Error!", "There was a problem on saving!");
                }
            }
		})
        e.preventDefault();
    })

    $("#edit").on('click', function(){
        var len = $("input[name='selectShip']:checked").length;

        if(len==0){
            alert('Please select shipment');
        }else if(len>1){
            alert('Please select only one shipment');
        }else{
            $.each($("input[name='selectShip']:checked"), function(){
                var formData = $(this).val(); 
                var encryptedAES = CryptoJS.AES.encrypt(formData, "My Secret Passphrase");
                window.location.replace('shipment-edit.php?ship='+encryptedAES);
            });
        }
    })

    $("#del").on('click', function(){
        var len = $("input[name='selectShip']:checked").length;

        if(len==0){
            alert('Please select shipment');
        }else{
           var del = confirm("Are you sure you want to delete the shipment?");

           if(del==true){
                $.each($("input[name='selectShip']:checked"), function(){
                    var formData = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "data/shipper-handler.php",
                        data: "del=true&shipID="+formData,
                        cache: false,
                        success: function(data){
     
                            toastSuccess("Successfully Deleted", "Selected shipment has been deleted");
                            refresh("ship-all");
                            $(".far").removeClass("fa-check-square").addClass('fa-square');
                        }
                    })
                });
           }
        }
    })
    

   
    $('#export').click(function(){ $('.buttons-excel').click(); });
})

function getAllShip() {
	//iCheck for checkbox and radio inputs
	  /*------ datatables all products---------*/
    var table = $('#ship-all').DataTable( {
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
            "url": "data/shipper-handler.php",
            "dataSrc": ""
        },
         "columns": [
            { "data": "invoice" },
            { "data": "invoice" },
			{ "data": "lot" },
			{ "data": "date" },
			{ "data": "cliName" },
			{ "data": "recName" },
			{ "data": "box" },
			{ "data": "area" },
			{ "data": "ageName" },
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
    
             return '<input type="checkbox" name="selectShip" id="selectShip" value="'+data+'" data-rec="'+full.invoice+'">';
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
         '<button type="button" class="btn btn-default btn-sm checkbox-toggle" title="Select All"><i class="far fa-square"></i> Select All</button> '+
         '<div class="btn-group">'+
            '<button type="button" class="btn btn-default btn-sm" id="del" title="Delete"><i class="fa fa-trash"></i> Delete</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="edit" title="Edit"><i class="fa fa-edit"></i> Edit</button>'+
			'<button type="button" class="btn btn-default btn-sm" title="Add" onclick="window.location.href=\'shipment-add.php\'"><i class="fas fa-truck"></i> New Shipment</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="export" title="Export"><i class="fas fa-file-download"></i> Export to Excel</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="upLot" data-toggle="modal" data-target="#modShip" title="Update Lot No."><i class="fas fa-pen"></i> Update Lot No.</button>'+
            '</div>'+
        '</div>');

     $("div.toolbar").css('float','left');
     $(".buttons-excel").css("display","none");
    $("#ship-all tbody").on('click', 'tr td:not(:first-child)', function() {
        var data = table.row(this).data();
        var encryptedAES = CryptoJS.AES.encrypt(data.invoice, "My Secret Passphrase");
        window.location.replace('shipment-edit.php?ship='+encryptedAES);
   })

   
}


function getShipInfo(){
    var plaintext = decrypt('ship');
    $.ajax({
        type: "POST",
        url:"data/shipper-handler.php",
        data: "shipID="+plaintext+"&edit=true",
        cache: false,
        success: function(data) {

           var json = $.parseJSON(data);
           $(json).each(function(i,val){
                $("#invNum").val(val.ship_invonum);
                $("#invNumHid").val(val.ship_invonum);
                $("#lotNum").val(val.ship_lot);
                $("#shipDate").val(val.ship_date);
                $("#agenNum").val(val.agent_code);
                $('#cliFullname').append('<option value='+val.client_id+'>'+val.cliName+'</option>');
                $('#cliFullname').select2('val', val.client_id, true);
                $('#agenNum').append('<option value='+val.agent_code+'>'+val.ageName+'</option>');
                $('#agenNum').select2('val', val.agent_code, true);
                $("#consigName").val(val.recipient_id);
                $("#numBox").val(val.ship_box);
                $("#area").val(val.ship_area);
                $("#shipCost").val(val.ship_cost);
                $("#payType").val(val.ship_paytype);
                $("#payDate").val(val.ship_paydate);
                $("#bank").val(val.ship_bank);
                $("#cashAmo").val(val.ship_cash);
                $("#chkAmo").val(val.ship_check);
                $("#recBy").val(val.ship_receiver);
                $("#podDate").val(val.ship_pod);
                $("#regQty").val(val.ship_rqty);
                $("#regCos").val(val.ship_rcost);
                $("#jumQty").val(val.ship_jqty);
                $("#jumCost").val(val.ship_jcost);
                $("#irreQty").val(val.ship_iqty);
                $("#irreCost").val(val.ship_icost);
                $("#remarks").val(val.ship_remarks);
                $("#etaRem").val(val.etarem);
                $("#sittp").val(val.ship_ins);
                $("#shipEdit").val(val.ship_invonum);
                $("#indate").val(val.rem_indate);
            
                if(val.ship_paid=="on"){
                    $('input[name=paid]').iCheck('check');
                }
           })
        }
    })
}