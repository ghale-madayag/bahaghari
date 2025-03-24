$(document).ready(function(){
    var print = decrypt('lot');
    var path = window.location.pathname;
    var page = path.split("/").pop();
	
  $.ajax({
		type: "POST",
		url: "data/manifest-handler.php",
		data: "print="+print,
		cache: false,
    beforeSend: function(){
       loadManifestData(print);
     },
		success: function(data){
     
			     var json = $.parseJSON(data);
           var tab = $(".table").empty();

            tab.append('<thead>'+
                    '<tr>'+
                      '<th width="100">Invoice #</th>'+
                      '<th width="180">Sender</th>'+
                      '<th width="150">Tel #</th>'+
                      '<th width="220">Receiver</th>'+
                      '<th width="150">Contact #</th>'+
                      '<th width="480">Address</th>'+
                      '<th width="80">Box</th>'+
                      '<th width="100">Area</th>'+
                      '<th width="100">Remarks</th>'+
                      '<th width="150">Delivery Date</th>'+
                      '<th width="150">Received By</th>'+
                    '</tr>'+
                '</thead>')
           	$(json).each(function(i,val){
                tab.append('<tr>'+
                  '<td>'+val.invoice+'</td>'+
                  '<td>'+val.cliName+'</td>'+
                  '<td>'+val.tel+'</td>'+
                  '<td>'+val.recName+'</td>'+
                  '<td>'+val.contact+'</td>'+
                  '<td>'+val.address+'</td>'+
                  '<td>'+val.box+'</td>'+
                  '<td>'+val.area+'</td>'+
                  '<td></td>'+
                  '<td></td>'+
                  '<td></td>'+
              '</tr>')

                
           	})

            var css = '@page { size: landscape; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

            style.type = 'text/css';
            style.media = 'print';

            if (style.styleSheet){
              style.styleSheet.cssText = css;
            } else {
              style.appendChild(document.createTextNode(css));
            }

            head.appendChild(style);
           
            if (page=="manifest-print.php") {
                  window.print();
            }
            
		}

    })

})

function loadManifestData(id){

    $.ajax({
        type: "POST",
        url: "data/manifest-handler.php",
        data: "manifestData="+id,
        cache: false,
        success: function(data){
          var json = $.parseJSON(data);
          $(json).each(function(i,val){
              $('#manDate').html(val.date);
              $('#lotNo').html(val.lot);
              $('#today').html(val.today);
          });
        }

    });
}
