$(document).ready(function(){
    $('#logModal').modal({
        backdrop: 'static',
        keyboard: false,
        show: false
    });
    $("form#form-login").on('submit', function(e) {
        var formData = new FormData($(this)[0]);

        $.ajax({
            type: "POST",
            url: "data/login-handler.php",
            data: formData,
            cache: false,
            async: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if(data==1){
                	toastErr("Error:","Invalid email or password");
              	}else{
              		window.location.assign('index.php');
              	}
            }
        })

        e.preventDefault();
    })
});

function getUrl(e) {
    var para = getUrlParameter(e);

    $.ajax({
        type: "POST",
        url: "data/login-handler.php",
        data: "para="+para,
        cache: false,
        success: function(data) {
            if(data==1){
                $("#logModal").modal('show');
            }
        }
    })
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};