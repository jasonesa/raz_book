$(function() {
	$( "#datepicker, #datepickerTwo, .datePicker").datepicker();

	$('.confirm').colorbox({
        href:$(this).attr('href'), 
        rel: $(this).attr('rel'),
        scrolling:false
    }, function(){
        
    });
});