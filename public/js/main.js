$(document).ready(function () {
	$('.datepicker').datetimepicker({
		timepicker:false,
		format:'d-m-Y'
	})
	$('.datatable').DataTable();
	$('.datatableNull').DataTable({
		info:false,
		paging:false,
		ordering:false,
		searching:false,
	});
});