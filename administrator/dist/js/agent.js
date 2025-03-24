$(document).ready(function(){
    $("form#form-ag-add").on('submit', function(e) {
        var formData = new FormData($(this)[0]);
        
        $.ajax({
			type: "POST",
			url: "data/agent-handler.php",
			cache: false,
			data: formData,
			async: false,
			processData: false,
			contentType:false,
			success: function(data) {
                if (data==2) {
                    toastErr("Duplicate Entry", "Agent is already exist!");
                }else if(data==1){
                    toastErr("Duplicate Entry", "Telephone number is already exist");
                }else{
                    $("input[type=text],input[type=email], textarea").val("");
                    
                    toastSuccess("Successfully Registered", "You added new agent <a href='agent.php'> View All</a>");
                }
            }
		})
        e.preventDefault();
    })

    $("form#form-ag-edit").on('submit', function(e) {
        var formData = new FormData($(this)[0]);

        $.ajax({
			type: "POST",
			url: "data/agent-handler.php",
			cache: false,
			data: formData,
			async: false,
			processData: false,
			contentType:false,
			success: function(data) {
                console.log(data);
                if (data==1) {  
                    toastErr("Duplicate Entry", "Agent is already exist!");
                }else{
                    toastSuccess("Successfully Updated", "The agent information was successfully updated <a href='agent.php'> View All</a>");
                }
            }
		})
        e.preventDefault();
    })

    $("#edit").on('click', function(){
        var len = $("input[name='selectCli']:checked").length;

        if(len==0){
            alert('Please select agent');
        }else if(len>1){
            alert('Please select only one agent');
        }else{
            $.each($("input[name='selectCli']:checked"), function(){
                var formData = $(this).val(); 
                var encryptedAES = CryptoJS.AES.encrypt(formData, "My Secret Passphrase");
                window.location.replace('agent-edit.php?agent='+encryptedAES);
            });
        }
    })

    $("#del").on('click', function(){
        var len = $("input[name='selectCli']:checked").length;

        if(len==0){
            alert('Please select agent');
        }else{
           var del = confirm("Are you sure you want to delete the client?");

           if(del==true){
                $.each($("input[name='selectCli']:checked"), function(){
                    var formData = $(this).val();
                    var recID = $(this).data('rec');
                    $.ajax({
                        type: "POST",
                        url: "data/agent-handler.php",
                        data: "del=true&ageDelID="+formData,
                        cache: false,
                        success: function(data){
                            console.log(data)
                            toastSuccess("Successfully Deleted", "Selected agent has been deleted");
                            refresh("agent-all");
                            $(".far").removeClass("fa-check-square").addClass('fa-square');
                        }
                    })
                });
           }
        }
    })

    $('#export').click(function(){ $('.buttons-excel').click(); });
})

function getAllAgent() {
	//iCheck for checkbox and radio inputs
	  /*------ datatables all products---------*/
    var table = $('#agent-all').DataTable( {
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
            "emptyTable":     "No agent available"
        },
        "ajax": {
            "url": "data/agent-handler.php",
            "dataSrc": ""
        },
         "columns": [
            { "data": "agenCode" },
            { "data": "agent_code" },
			{ "data": "agent_name" },
			{ "data": "agent_add" }
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
             return '<input type="checkbox" name="selectCli" id="selectCli" value="'+full.agent_code+'">';
        }
        },
        {
        "targets": [ 1 ],
        "visible": true,
        "searchable": false
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
			'<button type="button" class="btn btn-default btn-sm" title="Add" onclick="window.location.href=\'agent-add.php\'"><i class="fas fa-user-plus"></i> New Agent</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="export" title="Export"><i class="fas fa-file-download"></i> Export to Excel</button>'+
            '</div>'+
        '</div>');

     $("div.toolbar").css('float','left');
     $(".buttons-excel").css("display","none");

    $("#agent-all tbody").on('click', 'tr td:not(:first-child)', function() {
        var data = table.row(this).data();
        var encryptedAES = CryptoJS.AES.encrypt(data.pat_num, "My Secret Passphrase");
        window.location.replace('agent-edit.php?agent='+encryptedAES);
   })

   
}

function getAgentInfo(){
    var plaintext = decrypt('agent');
    $.ajax({
        type: "POST",
        url:"data/agent-handler.php",
        data: "agentID="+plaintext,
        cache: false,
        success: function(data) {
            console.log(data)
           var json = $.parseJSON(data);
           $(json).each(function(i,val){
                $("#agCodeHid").val(val.agent_code);
                $("#agCode").val(val.agent_code);
                $("#agName").val(val.agent_name);
                $("#agAdd").val(val.agent_add);
                $("#agZip").val(val.agent_zip);
                $("#agEma").val(val.agent_email);
                $("#agBdate").val(val.agent_bdate);
                $("#agTelNo").val(val.agent_telephone);
                $("#agMobNo").val(val.agent_mob);
           })
        }
    })
}