$(document).ready(function(){
	var print = decrypt('lot');
	var path = window.location.pathname;
	var page = path.split("/").pop();
  
  	
	
	  $.ajax({
			type: "POST",
			url: "data/sales-handler.php",
			data: "print="+print,
			cache: false,
			beforeSend: function(){
				loadManifestData(print);
			},
			success: function(data){
			
			var json = $.parseJSON(data);
	           var tab = $("#table").empty();

	            tab.append('<thead>'+
	                    '<tr>'+
	                      '<th width="100">Agent Code</th>'+
	                      '<th width="280">Trans Date</th>'+
	                      '<th width="250">Invoice</th>'+
	                      '<th width="100">Regular</th>'+
	                      '<th width="100">Jumbo</th>'+
	                      '<th width="100">Irregular</th>'+
	                      '<th width="120">Total</th>'+
	                      '<th width="120">Total Sales</th>'+
	                    '</tr>'+
	                '</thead>')
	           	$(json).each(function(i,val){
	                tab.append('<tr>'+
	                  '<td>'+val.code+'</td>'+
	                  '<td>'+val.date+'</td>'+
	                  '<td>'+val.invoice+'</td>'+
	                  '<td>'+val.rqty+'</td>'+
	                  '<td>'+val.jqty+'</td>'+
	                  '<td>'+val.iqty+'</td>'+
	                  '<td>'+val.total+'</td>'+
	                  '<td>'+val.totalAmount+'</td>'+
	              '</tr>')

	           	})

	            var css = '@page { size: portrait; }',
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

	            if (page=="sales-report.php") {
	                window.print();
	            }
	           
			}

	    })
})

function loadManifestData(id){

    $.ajax({
        type: "POST",
        url: "data/sales-handler.php",
        data: "salesData="+id,
        cache: false,
        success: function(data){
        	console.log(data)
          var json = $.parseJSON(data);
          $(json).each(function(i,val){
              $('#manDate').html(val.date);
              $('#lotNo').html(val.lot);
              $('#today').html(val.today);
              $('#area').html(val.area);
              $('#reg').html(val.rqty);
              $('#jum').html(val.jqty);
              $('#irr').html(val.iqty);
              $('#totalAm').html(val.cost);
          });
        }

    });
}