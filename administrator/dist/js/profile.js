$(document).ready(function(){
	$("form#form-edit").on('submit', function(e){
		var pword = $("#pword").val();
		var cpword = $("#cpword").val();
		var msg = $("#msg").empty();
		var formData = new FormData($(this)[0]);
		if(pword!="" && cpword!=""){
			if(pword==cpword){
				$.ajax({
                    type: "POST",
                    url: "data/profile-handler.php",
                    cache: false,
                    data: formData,
                    async: false,
                    processData: false,
                    contentType:false,
                    success: function(data) {
                        if (data==1) { 
                            loadProfiles();  
                            toastSuccess("Successful", "Information has been successully updated");
                        }
                    }
                })
			}else{
				msg.html("*Password not match");
			}
		}else if(pword!="" && cpword==""){
			msg.html("*Please confirm password");

		}else if(pword=="" && cpword!=""){
			msg.html("*Please fill password");
		}else{
		      $.ajax({
		        type: "POST",
		        url: "data/profile-handler.php",
		        cache: false,
		        data: formData,
		        async: false,
		        processData: false,
		        contentType:false,
		        success: function(data) {
                    if (data==1) {  
                        loadProfiles();  
                        toastSuccess("Successful", "Information has been successully updated");
                    }
		        }
		    })
		}
       
		e.preventDefault();
	})
})

function get_profile(){
  $.ajax({
      type: "POST",
      url: "data/profile-handler.php",
      data: "get_profile=true",
      cache: false,
      success: function(data){
      	console.log(data)
        var json = $.parseJSON(data);
        $(json).each(function(i, val) {
            $("#email").val(val.email);
            $("#fname").val(val.fname);
            $("#mname").val(val.mname);
            $("#lname").val(val.lname);
        })

      }
    })
} 