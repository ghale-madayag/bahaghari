$(document).ready(function(){
    $("form#form-track").on('submit', function(e) {
        var track = $("#trackNo").val();
        var statDiv = $("#statDiv").empty();
        var trackData = $("#trackData").empty();
        
        if(track==""){
            alert("Please enter the invoice number.");
        }else{
            $("#trackModal").modal('show');
            $.ajax({
                type: "POST",
                url: "data/track-handler.php",
                data: "trackNo="+track,
                cache: false,
                beforeSend: function() {
                    $("#loader").html('<center><img src="assets/img/loader.gif" width="200"></center>');
                },
                success: function(data) {
                   
                   $("#loader").empty();
                   if(data==0){
                        trackData.html('<div class="py-3 text-center">'+
                        '<i class="ni ni-bell-55 ni-3x"></i>'+
                        '<h4 class="heading mt-4">You should read this!</h4>'+
                        '<p>We could not detect information for your invoice number.</p>'+
                    '</div>');
                   }else{
                        var json = $.parseJSON(data);
                        $(json).each(function(i,val){
                            var status = val.status;
                            
                            if(status=="Pending"){
                                statDiv.html('<div class="row">'+
                                            '<div class="col-lg-11">'+
                                                '<ul class="progressbar">'+
                                                    '<li class="active">Pending</li>'+
                                                    '<li>Departed</li>'+
                                                    '<li>Arrived MLA</li>'+
                                                    '<li>Delivered</li>'+
                                                '</ul>'+
                                            '</div>'+
                                        '</div>');
                            }else if(status=="Processing"){
                                statDiv.html('<div class="row">'+
                                            '<div class="col-lg-11">'+
                                                '<ul class="progressbar">'+
                                                    '<li class="active">Pending</li>'+
                                                    '<li class="active">Departed</li>'+
                                                    '<li>Arrived MLA</li>'+
                                                    '<li>Delivered</li>'+
                                                '</ul>'+
                                            '</div>'+
                                        '</div>');
                            }else if(status=="Shipped"){
                                statDiv.html('<div class="row">'+
                                            '<div class="col-lg-11">'+
                                                '<ul class="progressbar">'+
                                                    '<li class="active">Pending</li>'+
                                                    '<li class="active">Departed</li>'+
                                                    '<li class="active">Arrived MLA</li>'+
                                                    '<li>Delivered</li>'+
                                                '</ul>'+
                                            '</div>'+
                                        '</div>');
                            }else{
                                statDiv.html('<div class="row">'+
                                            '<div class="col-lg-11">'+
                                                '<ul class="progressbar">'+
                                                    '<li class="active">Pending</li>'+
                                                    '<li class="active">Departed</li>'+
                                                    '<li class="active">Arrived MLA</li>'+
                                                    '<li class="active">Delivered</li>'+
                                                '</ul>'+
                                            '</div>'+
                                        '</div>');
                            }
                            
                            trackData.append('<div class="row py-1 align-items-center">'+
                                        '<div class="col-sm-3">'+
                                            '<p><strong>'+val.etadate+'</strong></p>'+
                                        '</div>'+
                                        '<div class="col-sm-9">'+
                                            '<p>'+val.etarem+'</p>'+
                                        '</div>'+
                                    '</div>');
                            
                            trackData.append('<div class="row py-1 align-items-center">'+
                                '<div class="col-sm-3">'+
                                    '<p><strong>'+val.estdate+'</strong></p>'+
                                '</div>'+
                                '<div class="col-sm-9">'+
                                    '<p>'+val.estrem+'</p>'+
                                '</div>'+
                            '</div>');
                            
                        })
                   }
                }
            })
        }

        e.preventDefault();
    })

    $("form#form-inquiry").on('submit', function(e) {
        var formData = new FormData($(this)[0]);

        $.ajax({
            type: "POST",
            url: "data/inquiry-handler.php",
            data: formData,
            cache: false,
            async: false,
			processData: false,
            contentType:false,
            success: function(data) {
               
                $("#inqModal").modal('show');
                var inq = $("#inqData").empty();
                if(data==1){
                    $("input[type=text],input[type=email], textarea").val("");
                    inq.html('<div class="py-3 text-center">'+
                        '<i class="ni ni-like-2 ni-3x"></i>'+
                        '<h4 class="heading mt-4">Thank you for contacting us!</h4>'+
                        '<p>One of our representatives will be in contact with you shortly regarding your inquiry. If you ever have any questions that require immediate assistance, please call us at <br/> <strong>0933-826-1981</strong> or <strong>0977-156-1182</strong>.</p>'+
                    '</div>');
                }else{
                    $("input[type=text],input[type=email], textarea").val("");
                    inq.html('<div class="py-3 text-center">'+
                        '<i class="ni ni-bell-55 ni-3x"></i>'+
                        '<h4 class="heading mt-4">Error!</h4>'+
                        '<p>Unable to send email. Please try again.</p>'+
                    '</div>');
                }
            }
        })
        e.preventDefault();
    });
})