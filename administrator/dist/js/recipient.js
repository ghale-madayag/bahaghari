$(document).ready(function() {
    $("form#form-recipient-add").on('submit', function(e) {
		var formData = new FormData($(this)[0]);
		$.ajax({
			type: "POST",
			url: "data/recipient-handler.php",
			cache: false,
			data: formData,
			async: false,
			processData: false,
			contentType:false,
			success: function(data) {
				
				if (data==1) {
					$("input[type=text],input[type=email], textarea").val("");                    
                    toastSuccess("Successfully Added", "You added new recipient <a href='client.php'> View All</a>");
                }
            }
		})
		e.preventDefault();
    });

})