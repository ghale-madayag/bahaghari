$(document).ready(function() {
    $('#clientModal').on('hidden.bs.modal', function() {
        $('#client-his').DataTable().destroy();
    });
})

function loadClientHis(){
    var table = $('#client-all').DataTable( {
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
            "emptyTable":     "No client available"
        },
        "ajax": {
            "url": "data/client-his-handler.php",
            "dataSrc": ""
        },
         "columns": [
			{ "data": "client_id" },
			{ "data": "fullname" },
			{ "data": "client_add1" },
			{ "data": "client_tel" },
			{ "data": "client_mobile" }
		],
      'order': [1, 'asc']
    } );

    /*------------- custom toolbar ------------*/

     $("div.toolbar").css('float','left');

    $("#client-all tbody").on('click', 'tr td:not(:first-child)', function() {
        var data = table.row(this).data();
        
        $("#clientModal").modal('show');
        $("#cliContent").html('<dl><dt>Client ID: <span class="text-info">'+data.client_id+'</span></dt><dd>'+data.fullname+'</dd></dl>');
        
        loadClientInfo(data.client_id);
    })
}

function loadClientInfo(id){
    var table = $('#client-his').DataTable( {
        "dom": '<"toolbar">Bfrtip',
        "lengthChange": false,
		"ordering": false,
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "paging": false,
        "bInfo" : false,
        "buttons": [
            {
                extend: 'excel',
                messageTop: 'The information in this table is copyright to Bahaghari.'
            },
        ],
        "language": {
            "emptyTable":     "No history available"
        },
        "ajax": {
            "url": "data/client-his-handler.php",
            "type": "POST",
            "data": {
                "id":id
            },
            "dataSrc": ""
        },
         "columns": [
            { "data": "invoice" },
			{ "data": "lot" },
			{ "data": "date" },
			{ "data": "recName" },
			{ "data": "box" },
			{ "data": "area" },
			{ "data": "ageName" },
			{ "data": "indate" }
        ]
    } );

    $(document).on('shown.bs.modal', '#clientModal', function () {
        table.columns.adjust();
    });
}