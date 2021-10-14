$(document).ready(function () {
	$('.btnDeleteKtp').click(function (e) {
		var cdu = confirm('DELETE KTP '+$(this).attr('knm'))
		if (cdu) {
			deletektpAjx($(this))
		}else{
			alert('delete canceled')
		}
	});
		
	$('#CSVImport').change(function(){
		$('#formImportCSV').submit();
	});
});

function deletektpAjx(elm){
	var id = elm.attr('kid');
	var nm = elm.attr('knm');

	$.ajax({
		type: "post",
		url: murl+"/d",
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data: {
			id:id,
			nm:nm
		},
		success: function (response) {
			if (response=='berhasil') {
				elm.parent('td').parent('tr').remove();
			}else{
				alert('FAILED')
			}
		}
	});
}