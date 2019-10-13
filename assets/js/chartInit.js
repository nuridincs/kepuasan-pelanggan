/**
 * 
 */
$(document).ready(function(){
	
	$.ajax({
		url: Globals.site_url + "ajax/grafik_kuisioner",
		method: "post",
		dataType: 'json',
		success: function(response){
			var ctx = $("#respondenChart").get(0).getContext("2d");
			var myNewChart = new Chart(ctx);
			
			var myBarChart = new Chart(ctx).Bar(response);
			
		}
	});
	
});