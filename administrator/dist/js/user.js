$(document).ready(function(){
    $("#add").on('click', function() {
        $("#userAdd").modal('show');
    });

    $("form#form-user-add").on('submit', function(e) {
        var formData = new FormData($(this)[0]);

        $.ajax({
            type: "POST",
            url: "data/user-handler.php",
            data: formData,
            cache: false,
            processData: false,
            async: false,
            contentType: false,
            success: function (data) {
                console.log(data)
               if(data==1){
                    $("input[type=text],input[type=email]").val("");
                    $("#userAdd").modal('hide');
                    $("#lvl").val('');
                    refresh("user-all");
                    toastSuccess("Mail has been sent!", "The user credentials has been sent");
               }else{
                    toastErr("Error", "There was a problem on adding");
               }
            }
        })
       
        e.preventDefault();
    })

    $("form#form-user-edit").on('submit', function(e) {
        var formData = new FormData($(this)[0]);

        $.ajax({
            type: "POST",
            url: "data/user-handler.php",
            data: formData,
            cache: false,
            processData: false,
            async: false,
            contentType: false,
            success: function (data) {
                if(data==1){
                    $("#userEdit").modal('hide');
                    refresh("user-all");
                    toastSuccess("Successfully Updated", "The user has been updated");
                }else{
                    toastErr("Error", "There was a problem on updating");
                }
            }
        })
       
        e.preventDefault();
    })

    $("#edit").on('click', function(){
        var len = $("input[name='selectCli']:checked").length;

        if(len==0){
            alert('Please select user');
        }else if(len>1){
            alert('Please select only one user');
        }else{
           
            $.each($("input[name='selectCli']:checked"), function(){
                var formData = $(this).val(); 
                $("#userEdit").modal('show');
                
                $.ajax({
                    type: "POST",
                    url: "data/user-handler.php",
                    data: "userID="+formData,
                    cache: false,
                    success: function(data) {
                        var json = $.parseJSON(data);
                        $(json).each(function(i, val){
                            $("#user_id").val(val.user_id);
                            $("#emailEdit").val(val.user_email);
                            $("#fnameEdit").val(val.user_fname);
                            $("#mnameEdit").val(val.user_mname);
                            $("#lnameEdit").val(val.user_lname);
                            $("#lvlEdit").val(val.user_lvl);
                        })
                    }
                });

            });
        }
    });

    $("#del").on('click', function(){
        var len = $("input[name='selectCli']:checked").length;

        if(len==0){
            alert('Please select user');
        }else{
           var del = confirm("Are you sure you want to delete the user?");

           if(del==true){
                $.each($("input[name='selectCli']:checked"), function(){
                    var formData = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "data/user-handler.php",
                        data: "delID="+formData,
                        cache: false,
                        success: function(data){
                            console.log(data)
                            toastSuccess("Successfully Deleted", "Selected user has been deleted");
                            refresh("user-all");
                            $(".far").removeClass("fa-check-square").addClass('fa-square');
                        }
                    })
                });
           }
        }
    })

    $('#export').click(function(){ $('.buttons-excel').click(); });
});
function getAllUser() {

	  /*------ datatables all products---------*/
    var table = $('#user-all').DataTable( {
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
            "emptyTable":     "No available user"
        },
        "ajax": {
            "url": "data/user-handler.php",
            "dataSrc": ""
        },
         "columns": [
            { "data": "user_id" },
            { "data": "user_email" },
            { "data": "fullname" },
            { "data": "user_lvl" },
            { "data": "user_indate" },
            { "data": "user_status" }
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
             return '<input type="checkbox" name="selectCli" id="selectCli" value="'+full.user_id+'">';
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
			'<button type="button" class="btn btn-default btn-sm" title="Add" id="add"><i class="fas fa-user-plus"></i> New User</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="export" title="Export"><i class="fas fa-file-download"></i> Export to Excel</button>'+
            '</div>'+
        '</div>');

     $("div.toolbar").css('float','left');
     $(".buttons-excel").css("display","none");
   
}