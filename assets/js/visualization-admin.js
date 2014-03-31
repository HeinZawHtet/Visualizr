$(function() {
    var vslData = null;
    if (Visualizr.Id) {
        var getAllData = $.ajax({
          url: Visualizr.siteUrl + "visualizr/chart/"+Visualizr.Id,
          dataType:"json",
          async: false
        }).responseText;

        var vslData = $.parseJSON(getAllData);
    };
    
	$("#dataTable").handsontable({
        data: vslData,
	    contextMenu: true,
        minRows: 10,
        minCols: 18,
        colHeaders: true,
  	});

  	var handsontable = $("#dataTable").data('handsontable');
    
    $('button[type=submit]').click(function () {
    	event.preventDefault();
        
        var options = {};

        options['isStacked'] = $('select[name=isStacked]').val();
        options['is3D'] = $('select[name=is3D]').val();
        options['hAxis'] = $('input[name=hAxis]').val();
        options['vAxis'] = $('input[name=vAxis]').val();
        
      	$.ajax({
        	url: Visualizr.requestUrl,
        	data: {
        		"title" : $('input[name=title]').val(), 
        		"category_id" : $('select[name=category_id]').val(), 
        		"type" : $('input[name=type]').val() ,
                "tags" : $('input[name=tags]').val(),
        		"options" : options,
        		"data": handsontable.getData()
        	},
        	dataType: 'json',
        	type: 'POST',
            statusCode: {
                400: function(test) {
                    $.each($.parseJSON(test.responseText), function(i, value) {
                         $.each(value, function(i, value){
                            $('.vsl-error ul').append('<li>' + value + '</li>');
                         });
                    });
                }
            },
        	beforeSend: function(res) {
	            $('.vsl-footer .small-wrap').html('<div class="spinner"></div>');
        	},
        	complete: function (res) {
	            // window.location.replace(Visualizr.completeUrl);
        	}
      	});
    });
});