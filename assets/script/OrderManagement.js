$(document).ready(function(){


      $('#example').DataTable({
        "ajax": {
            "dataType": 'json',
            "contentType": "application/json; charset=utf-8",
            "type": "POST",
            "url": "getDetailOrder",
        },
        "data": [
            { "data": "Id" },
            { "data": "Product" },
            { "data": "Model" },
            { "data": "Qty" },
        ]
    });


    });

