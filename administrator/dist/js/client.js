$(document).ready(function(){
    $("form#form-client-add").on('submit', function(e) {
		var formData = new FormData($(this)[0]);

		$.ajax({
			type: "POST",
			url: "data/client-handler.php",
			cache: false,
			data: formData,
			async: false,
			processData: false,
			contentType:false,
			success: function(data) {
                console.log(data)
                if (data==2) {
                    toastErr("Duplicate Entry", "Client is already exist!");
                }else if(data==1){
                    toastErr("Duplicate Entry", "Telephone number is already exist");
                }else{
                    $("input[type=text],input[type=email], textarea").val("");
                    $("#assAge").val('-1');
                    
                    toastSuccess("Successfully Registered", "You added new client <a href='client.php'> View All</a>");
                }
            }
		})
		e.preventDefault();
    });

    $("form#form-client-edit").on('submit', function(e) {
		var formData = new FormData($(this)[0]);

		$.ajax({
			type: "POST",
			url: "data/client-handler.php",
			cache: false,
			data: formData,
			async: false,
			processData: false,
			contentType:false,
			success: function(data) {
              
                if (data==2) {
                    toastErr("Duplicate Entry", "Client is already exist!");
                }else if(data==1){
                    toastErr("Duplicate Entry", "Telephone number is already exist");
                }else{
                    toastSuccess("Successfully Updated", "The client information was successfuly updated <a href='client.php'> View All</a>");
                }
            }
		})
		e.preventDefault();
    });


    $("#edit").on('click', function(){
        var len = $("input[name='selectCli']:checked").length;

        if(len==0){
            alert('Please select client');
        }else if(len>1){
            alert('Please select only one client');
        }else{
            $.each($("input[name='selectCli']:checked"), function(){
                var recID = $(this).data('rec');
                var formData = $(this).val(); 
                var encryptedAES = CryptoJS.AES.encrypt(formData, "My Secret Passphrase");
                var encryptedRec = CryptoJS.AES.encrypt(recID, "My Secret Passphrase");
                window.location.replace('client-edit.php?client='+encryptedAES+'&recipient='+encryptedRec);
            });
        }
    })

    //delete selected client
    $("#del").on('click', function(){
        var len = $("input[name='selectCli']:checked").length;

        if(len==0){
            alert('Please select client');
        }else{
           var del = confirm("Are you sure you want to delete the client?");

           if(del==true){
                $.each($("input[name='selectCli']:checked"), function(){
                    var formData = $(this).val();
                    var recID = $(this).data('rec');
                    $.ajax({
                        type: "POST",
                        url: "data/client-handler.php",
                        data: "del=true&cliID="+formData+"&recDelID="+recID,
                        cache: false,
                        success: function(data){
                            
                            toastSuccess("Successfully Deleted", "Selected client has been deleted");
                            refresh("client-all");
                            $(".far").removeClass("fa-check-square").addClass('fa-square');
                        }
                    })
                });
           }
        }
    })
    $('#export').click(function(){ $('.buttons-excel').click(); });
});

function getClientInfo(){
    var plaintext = decrypt('client');
    var recipient = decrypt('recipient');
    $.ajax({
        type: "POST",
        url:"data/client-handler.php",
        data: "clientID="+plaintext+"&recID="+recipient,
        cache: false,
        success: function(data) {
           var json = $.parseJSON(data);
           $(json).each(function(i,val){
                $("#cliID").val(val.client_id);
                $("#cliLname").val(val.client_lname);
                $("#cliFname").val(val.client_fname);
                $("#cliMname").val(val.client_mname);
                $("#cliAdd1").val(val.client_add1);
                $("#cliZip").val(val.client_zipcode);
                $("#cliEma").val(val.client_email);
                $("#cliBdate").val(val.client_bdate);
                $("#cliTelNo").val(val.client_tel);
                $("#cliMobNo").val(val.client_mobile);
                $("#assAge").val(val.client_ass);

                $("#recID").val(val.recipient_id);
                $("#recLname").val(val.recipient_lname);
                $("#recFname").val(val.recipient_fname);
                $("#recMname").val(val.recipient_mname);
                $("#recAdd1").val(val.recipient_add1);
                $("#recZip").val(val.recipient_zipcode);
                $("#recEma").val(val.recipient_email);
                $("#recBdate").val(val.recipient_bdate);
                $("#recTelNo").val(val.recipient_tel);
                $("#recMobNo").val(val.recipient_mobile);
           })
        }
    })
}

function getAllClient() {

    var table = $('#client-all').DataTable( {
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
            "emptyTable":     "No client available"
        },
        "ajax": {
            "url": "data/client-handler.php",
            "dataSrc": ""
        },
         "columns": [
            { "data": "client_chk" },
			{ "data": "client_id" },
			{ "data": "fullname" },
			{ "data": "client_add1" },
			{ "data": "client_tel" },
			{ "data": "client_mobile" },
			{ "data": "client_ass" },
			{ "data": "recipient_id" },
			{ "data": "rec_fullname" },
			{ "data": "recipient_add1" },
			{ "data": "recipient_tel" },
			{ "data": "recipient_mobile" }
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
             return '<input type="checkbox" name="selectCli" id="selectCli" value="'+data+'" data-rec="'+full.recipient_id+'">';
        }
        },
        {
        "targets": [ 1,3,4,5,6,7,8,9,10,11 ],
        "visible": true,
        "searchable": false
        },
    ],
      'order': [1, 'asc']
    } );

    
    $('input[type = search]').on( 'keyup', function () {
        table.column(2).search('^'+this.value, true, false).draw();
     } ); 

    /*------------- custom toolbar ------------*/
     $("div.toolbar").html('<div class="mailbox-controls">'+
         '<button type="button" class="btn btn-default btn-sm checkbox-toggle" title="Select All"><i class="far fa-square"></i> Select All</button> '+
         '<div class="btn-group">'+
            '<button type="button" class="btn btn-default btn-sm" id="del" title="Delete"><i class="fa fa-trash"></i> Delete</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="edit" title="Edit"><i class="fa fa-edit"></i> Edit</button>'+
			'<button type="button" class="btn btn-default btn-sm" title="Add" onclick="window.location.href=\'client-add.php\'"><i class="fas fa-user-plus"></i> New Client</button>'+
			'<button type="button" class="btn btn-default btn-sm" title="Add" onclick="window.location.href=\'recipient-add.php\'"><i class="fas fa-truck"></i> New Recipient</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="export" title="Export"><i class="fas fa-file-download"></i> Export to Excel</button>'+
            '</div>'+
        '</div>');

     $("div.toolbar").css('float','left');
     $(".buttons-excel").css("display","none");

    $("#client-all tbody").on('click', 'tr td:not(:first-child)', function() {
        var data = table.row(this).data();
        var encryptedRec = CryptoJS.AES.encrypt(data.recipient_id, "My Secret Passphrase");
        var encryptedAES = CryptoJS.AES.encrypt(data.client_id, "My Secret Passphrase");
        window.location.replace('client-edit.php?client='+encryptedAES+'&recipient='+encryptedRec);
   })

   
}