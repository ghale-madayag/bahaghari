$(document).ready(function(){
  var rows_selected = [];
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
                window.location.replace('manifest-export.php?lot='+encryptedAES);
            });
        }
    })
  
	$("#manCheck").on('click', function(){
		var clicks = $(this).data('clicks');
	      if (clicks) {
	        //Uncheck all checkboxes
	        $(".man-all input[type='checkbox']").iCheck("uncheck");
	        $(".far", this).removeClass("fa-check-square").addClass('fa-square');
	      } else {
	        //Check all checkboxes
	        $(".man-all input[type='checkbox']").iCheck("check");
	        $(".far", this).removeClass("fa-square").addClass('fa-check-square');
	      }
	      $(this).data("clicks", !clicks);
    });
    
    $("#generate").on('click', function(){
       var lotNo = $("#newlotNo").val();

       if(lotNo==""){
           alert("Please enter lot number");
       }else{
            loadLotNo(lotNo);
       }
    })

    $("#generateUpdate").on('click', function(){
        var lotNo = $("#AddlotNo").val();
        console.log(lotNo)
 
        if(lotNo==""){
            alert("Please enter lot number");
        }else{
            loadLotNoUpdate(lotNo);
        }
     })

	$("form#form-mod-all").on('submit', function(e){
      var formData = new FormData($(this)[0]);      

      $.ajax({
         type: "POST",
         url: "data/manifest-handler.php",
         cache: false,
         data: formData,
         async: false,
         processData: false,
         contentType:false,
         success: function(data) {
                   if(data==0){
                        $("#modMan").modal('hide');
                        refresh("man-all");
                        toastSuccess("Successfully Added", "The manifest was successfully added");
                        $('#shipNo').select2('destroy');
                   }else{
                       toastErr("Error!", "Duplicate lot number");
                   }
            }
       })   

		e.preventDefault();
})

    $("form#form-mod-all-edit").on('submit', function(e){
      var formData = new FormData($(this)[0]);      

      $.ajax({
         type: "POST",
         url: "data/manifest-handler.php",
         cache: false,
         data: formData,
         async: false,
         processData: false,
         contentType:false,
         success: function(data) {
             if(data==0){
                  $("#modManEdit").modal('hide');
                  refresh("man-all");
                  toastSuccess("Successfully Added", "The manifest was successfully update");
                  $('#shipNoEdit').select2('destroy');
             }else{
                 toastErr("Error!", "Duplicate lot number");
             }
            }
       })   

    e.preventDefault();
})
     

      
	$('#modMan').on('hidden.bs.modal', function() {
        $("#form-mod-all")[0].reset();
        $('#shipNo').html('');
        getInv();
  });

  $('#modManEdit').on('hidden.bs.modal', function() {
        $("#form-mod-all-edit")[0].reset();
        $('#shipNoEdit').html('');
  });

  $('#modManEdit').on('show.bs.modal', function() {
        getInvEdit();
  });


  $("#edit").on('click', function(){
        var len = $("input[name='selectMan']:checked").length;

        if(len==0){
            alert('Please select manifest');
        }else if(len>1){
            alert('Please select only one manifest');
        }else{
            $.each($("input[name='selectMan']:checked"), function(){
                var formData = $(this).val(); 
                loadManifest(formData);
            });
        }
    })

  $("#del").on('click', function(){
        var len = $("input[name='selectMan']:checked").length;

        if(len==0){
            alert('Please select manifest');
        }else{
           var del = confirm("Are you sure you want to delete the manifest?");

           if(del==true){
                $.each($("input[name='selectMan']:checked"), function(){
                    var formData = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "data/manifest-handler.php",
                        data: "del=true&lot="+formData,
                        cache: false,
                        success: function(data){
                            toastSuccess("Successfully Deleted", "Selected manifest has been deleted");
                            refresh("man-all");
                        }
                    })
                });
           }
        }
    })


   $("#print").on('click', function() {

        var len = $("input[name='selectMan']:checked").length;

        if(len==0){
            alert('Please select manifest');
        }else if(len>1){
            alert('Please select only one manifest');
        }else{
            $.each($("input[name='selectMan']:checked"), function(){
                var formData = $(this).val(); 
                var encryptedAES = CryptoJS.AES.encrypt(formData, "My Secret Passphrase");
                window.open('manifest-print.php?lot='+encryptedAES, '_blank');
            });
        }

    })


	
});


function loadManifest(id){

    $.ajax({
        type: "POST",
        url: "data/manifest-handler.php",
        data: "formData="+id,
        cache: false,
        success: function(data){
          var json = $.parseJSON(data);
          $(json).each(function(i,val){
              $('#shipNoEdit').append('<option selected="selected" value='+val.id+'>'+val.invoice+'</option>').trigger('change');
          });

          
          $("#modManEdit").modal('show');
          $("#lotNoEdit").val(id);
          $("#lotNoHide").val(id);
        }

    });
}

function loadLotNo(id){

    $.ajax({
        type: "POST",
        url: "data/manifest-handler.php",
        data: "generate="+id,
        cache: false,
        success: function(data){
            if(data!=0){
                var json = $.parseJSON(data);
                $(json).each(function(i,val){
                    $('#shipNo').append('<option selected="selected" value='+val.id+'>'+val.invoice+'</option>').trigger('change');;
                });
            }else{
                toastErr("Error!", "Invalid lot number");
            }
        }

    });
}

function loadLotNoUpdate(id){

    $.ajax({
        type: "POST",
        url: "data/manifest-handler.php",
        data: "generate="+id,
        cache: false,
        success: function(data){
            if(data!=0){
                var json = $.parseJSON(data);
                $(json).each(function(i,val){
                    $('#shipNoEdit').append('<option selected="selected" value='+val.id+'>'+val.invoice+'</option>').trigger('change');;
                });
            }else{
                toastErr("Error!", "Invalid lot number");
            }
        }

    });
}


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
            "emptyTable":     "No manifest available"
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
         '<button type="button" class="btn btn-default btn-sm checkbox-toggle" id="manCheck" title="Select All"><i class="far fa-square"></i> Select All</button> '+
         '<div class="btn-group">'+
            '<button type="button" class="btn btn-default btn-sm" id="del" title="Delete"><i class="fa fa-trash"></i> Delete</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="edit" title="Edit"><i class="fa fa-edit"></i> Edit</button>'+
			'<button type="button" class="btn btn-default btn-sm" title="Add" data-toggle="modal" data-target="#modMan"><i class="fas fa-file-medical"></i> Create Manifest</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="view" title="View"><i class="fa fa-eye"></i> View</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="print" title="Print"><i class="fa fa-print"></i> Print</button>'+
            '</div>'+
        '</div>');

     $("#form-man-all div.toolbar").css('float','left');
   
}
