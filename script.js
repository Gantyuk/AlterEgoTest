
var sendForm = function(e) {
	e.preventDefault();
	var t = $(this);
	var data = t.serialize();
	$.ajax({
		url : t.attr('action'),
		type : 'POST',
		data : data,
		dataType : 'html',
		success : function(response) {
			var mass = JSON.parse(response);
			console.log(mass.response[0]);

		}
	});
}

$(document).ready(function() {
	$('#apiform').bind('submit', sendForm);
});