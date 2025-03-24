$(document).ready(function () {

	var path = window.location.pathname;
	var page = path.split("/").pop();

	if (page == "client.php" || page == "client-add.php" || page == "client-edit.php") {
		$("#top-maintenance").addClass('menu-open');
		$("#maintenance").addClass('active');
		$("#client").addClass('active');
	} else if (page == "agent.php" || page == "agent-add.php" || page == "agent-edit.php") {
		$("#agent").addClass('active');
		$("#top-maintenance").addClass('menu-open');
		$("#maintenance").addClass('active');
	} else if (page == "shipment.php" || page == "agent-add.php" || page == "agent-edit.php") {
		$("#transaction").addClass('active');
		$("#top-transaction").addClass('menu-open');
		$("#shipment").addClass('active');
	} else if (page == "user.php") {
		$("#top-maintenance").addClass('menu-open');
		$("#maintenance").addClass('active');
		$("#user").addClass('active');
	} else if (page == "records.php") {
		$("#records").addClass('active');
	} else if (page == "sales.php") {
		$("#top-report").addClass('menu-open');
		$("#sale").addClass('active');
	} else if (page == "manifest.php") {
		$("#top-report").addClass('menu-open');
		$("#manif").addClass('active');
	} else {
		$("#dashboard").addClass('active');
	}
})
function icheckboxShip() {
	$('input[type="checkbox"], input[type="radio"]').iCheck({
		checkboxClass: 'icheckbox_flat-green',
		radioClass: 'iradio_flat-green'
	});

}

function getClient() {

	$('#cliFullname').select2({
		width: 'resolve',
		width: 'resolve',
		placeholder: "Select Agent..",
		allowHtml: true,
		allowClear: false,
		tags: true,
		ajax: {
			url: 'data/client-search.php',
			dataType: 'json',
			quietMillis: 100,
			processResults: function (data) {
				return {
					results: $.map(data, function (obj) {
						return { id: obj.client_id, text: obj.fullname };
					})
				};

			}
		}
	});
}

function getInv() {

	$('#shipNo').select2({
		closeOnSelect: false,
		placeholder: "Select Invoice..",
		allowHtml: true,
		allowClear: false,
		tags: true,
		ajax: {
			url: 'data/invoice-search.php',
			dataType: 'json',
			quietMillis: 100,
			processResults: function (data) {
				return {
					results: $.map(data, function (obj) {
						return { id: obj.id, text: obj.invoice };
					})
				};

			}
		}
	}).on('select2:selecting', e => $(e.currentTarget).data('scrolltop', $('.select2-results__options').scrollTop()))
		.on('select2:select', e => $('.select2-results__options').scrollTop($(e.currentTarget).data('scrolltop')));
}

function getInvEdit() {

	$('#shipNoEdit').select2({
		closeOnSelect: false,
		placeholder: "Select Invoice..",
		allowHtml: true,
		allowClear: false,
		tags: true,
		ajax: {
			url: 'data/invoice-search.php',
			dataType: 'json',
			quietMillis: 100,
			processResults: function (data) {
				return {
					results: $.map(data, function (obj) {
						return { id: obj.id, text: obj.invoice };
					})
				};

			}
		}
	}).on('select2:selecting', e => $(e.currentTarget).data('scrolltop', $('.select2-results__options').scrollTop()))
		.on('select2:select', e => $('.select2-results__options').scrollTop($(e.currentTarget).data('scrolltop')));
}

function getAgent() {

	$('#agenNum').select2({
		width: 'resolve',
		placeholder: "Select Agent..",
		allowHtml: true,
		allowClear: false,
		tags: true,
		ajax: {
			url: 'data/agent-search.php',
			dataType: 'json',
			quietMillis: 100,
			processResults: function (data) {
				return {
					results: $.map(data, function (obj) {
						return { id: obj.agent_code, text: obj.agent_code };
					})
				};

			}
		}
	});
}


// function getConsig(param) {
// 	var consig = $("#consigName").empty();
// 	var shipper = $("#shipper").empty();
// 	$.ajax({
// 		type: "POST",
// 		url: "data/shipper-handler.php",
// 		data: "shipperID=" + param,
// 		cache: false,
// 		success: function (data) {
// 			console.log(data);
// 			var json = $.parseJSON(data);
			
// 			$(json).each(function (i, val) {
// 				consig.append("<option value='" + val.recipient_id + "' data-fullname='" + val.rec_fullname + "' data-add='" + val.recipient_add1 + "' data-contact='" + val.recipient_con + "'>" +
// 					val.rec_fullname + "</option>");
// 				//shipper information
// 				shipper.html('<div class="card-header">' +
// 					'<h3 class="card-title">Shipper Infomation</h3>' +
// 					'</div>' +
// 					'<div class="card-body">' +
// 					'<dl>' +
// 					'<dt>Name:</dt>' +
// 					'<dd>' + val.fullname + '</dd>' +
// 					'<dt>Address:</dt>' +
// 					'<dd>' + val.client_add1 + '</dd>' +
// 					'<dt>Contact #:</dt>' +
// 					'<dd>' + val.client_con + '</dd>' +
// 					'</dl>' +
// 					'</div>')
// 			})

// 		}
// 	})

// }

function getConsig(param) {
    var consig = $("#consigName").empty();
    var shipper = $("#shipper").empty();

    $.ajax({
        type: "POST",
        url: "data/shipper-handler.php",
        data: { shipperID: param }, // Use object instead of string
        cache: false,
        dataType: "json", // Ensures response is treated as JSON
        success: function (json) {
            console.log("Received JSON:", json); // Debugging

            if (!Array.isArray(json)) {
                console.error("Expected an array but got:", json);
                return;
            }

            json.forEach(function (val) {
                consig.append(`<option value="${val.recipient_id}" 
                    data-fullname="${val.rec_fullname}" 
                    data-add="${val.recipient_add1}" 
                    data-contact="${val.recipient_con}">
                    ${val.rec_fullname}
                </option>`);

                shipper.html(`
                    <div class="card-header">
                        <h3 class="card-title">Shipper Information</h3>
                    </div>
                    <div class="card-body">
                        <dl>
                            <dt>Name:</dt>
                            <dd>${val.fullname}</dd>
                            <dt>Address:</dt>
                            <dd>${val.client_add1}</dd>
                            <dt>Contact #:</dt>
                            <dd>${val.client_con}</dd>
                        </dl>
                    </div>
                `);
            });
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", status, error);
            console.log("Response Text:", xhr.responseText);
        }
    });
}


function loadProfile(id) {
	var prof = $("#profile").empty();
	$.ajax({
		type: 'POST',
		url: 'data/prof-handler.php',
		data: "user_id=" + id,
		cache: false,
		success: function (data) {
			var json = $.parseJSON(data);
			$(json).each(function (i, val) {
				prof.html('<a href="#" class="d-block">' + val.fullname + '</a>');
			});
		}
	})
}


function loadProfiles() {
	var prof = $("#profile").empty();
	$.ajax({
		type: 'POST',
		url: 'data/profile-handler.php',
		data: "load=true",
		cache: false,
		success: function (data) {
			var json = $.parseJSON(data);
			$(json).each(function (i, val) {
				prof.html('<a href="#" class="d-block">' + val.fullname + '</a>');
			});
		}
	})
}


function decrypt(e) {
	var para = getUrlParameter(e);
	var plaintext;
	var decryptedBytes = CryptoJS.AES.decrypt(para, "My Secret Passphrase");
	plaintext = decryptedBytes.toString(CryptoJS.enc.Utf8);
	return plaintext;
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

function refresh(tbl) {
	$('#' + tbl).DataTable().ajax.reload(null, false);
	$('#' + tbl).on('draw.dt', function () {
	})
}

function cntSales() {
	$.ajax({
		type: "POST",
		url: "data/infobox-handler.php",
		data: "cntSales=true",
		cache: false,
		success: function(data) {
			
			$("#sales-info").html(data.toLocaleString());
			count("sales-info");
		}
		
	})
}

function cntShip() {
	$.ajax({
		type: "POST",
		url: "data/infobox-handler.php",
		data: "cntShip=true",
		cache: false,
		success: function(data) {
			
			$("#ship-info").html(data.toLocaleString());
			count("ship-info");
		}
		
	})
}

function cntCli() {
	$.ajax({
		type: "POST",
		url: "data/infobox-handler.php",
		data: "cntCli=true",
		cache: false,
		success: function(data) {
			
			$("#cli-info").html(data.toLocaleString());
			count("cli-info");
		}
		
	})
}

function cntRec() {
	$.ajax({
		type: "POST",
		url: "data/infobox-handler.php",
		data: "cntRec=true",
		cache: false,
		success: function(data) {
			
			$("#rec-info").html(data.toLocaleString());
			count("rec-info");
		}
		
	})
}

function count(param){
	$('#'+param).each(function () {
		$(this).prop('Counter',0).animate({
			Counter: $(this).text()
		}, {
			duration: 4000,
			easing: 'swing',
			step: function (now) {
				$(this).text(Math.ceil(now));
			}
		});
	});
  }




