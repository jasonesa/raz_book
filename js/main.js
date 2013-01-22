$(function(){
	$( "#datepicker, #datepickerTwo, .datePicker").datepicker();

	$('.confirm').colorbox({inline:true}, function(){});

	$(".add").click(function(ev){
		ev.preventDefault();

  		$('#available option:selected').each(function(){
	    	
  			var bookId = $(this).val();
			var bookName = $(this).text();

			$('#assigned').append('<option class="new" value=\"'+bookId+'\" ><a href=\"#\">'+bookName+'</a></option>');

	    	$(this).remove();
		});
	});

	$(".remove").click(function(ev){
		ev.preventDefault();

  		$('#assigned option:selected').each(function(){
	    	
  			var bookId = $(this).val();
			var bookName = $(this).text();

			$('#available').append('<option class="removed" value=\"'+bookId+'\" ><a href=\"#\">'+bookName+'</a></option>');

	    	$(this).remove();
		});
	});


	$('.createEdit form').submit(function() {
		$('#assigned option').each(function(){
	    	
    		if($(this).hasClass('new')){
    			$(this).attr('selected','selected');
    		}

		});
	});



});