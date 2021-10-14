$(document).ready(function () {
	$('.btnMonitorUser').click(function (e) {
		logmonitorAjx($(this))
	});
	$('.access_type').click(function (e) {
		adminaccessAjx($(this))
	});
	$('.btnDeleteUser').click(function (e) {
		var cdu = confirm('DELETE USER '+$(this).attr('unm'))
		if (cdu) {
			deleteuserAjx($(this))
		}else{
			alert('delete canceled')
		}
	});
		
});

function logmonitorAjx(elm){
	var id = elm.attr('uid');
	var nm = elm.attr('unm');
	$('#mdlNmPlc').html(nm);
	$('#userActivityTableBody').html('')

	$.ajax({
		type: "post",
		url: murl+"/user/logMonitor",
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data: {
			id:id,
			nm:nm
		},
		success: function (response) {
			$('#userActivityTableBody').html(response);
		}
	});
}

function adminaccessAjx(elm){
	var id = elm.attr('uid');
	var nm = elm.attr('unm');
	var vl = 0
	if (elm.is(':checked')) {vl = 1}

	$('.actpchgStat_'+id).show();
	$('.actpchgStat_'+id).html('LOADING....');

	$.ajax({
		type: "post",
		url: murl+"/user/adminAccess",
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data: {
			id:id,
			vl:vl,
			nm:nm
		},
		success: function (response) {
			if (response=='berhasil') {
				$('.actpchgStat_'+id).html('DONE');
				$('.actpchgStat_'+id).fadeOut();
			}else{
				$('.actpchgStat_'+id).html('FAILED');
			}
		}
	});
}

function deleteuserAjx(elm){
	var id = elm.attr('uid');
	var nm = elm.attr('unm');

	$.ajax({
		type: "post",
		url: murl+"/user/delete",
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data: {
			id:id,
			nm:nm
		},
		success: function (response) {
			if (response=='berhasil') {
				elm.parent('td').parent('tr').remove()
			}else{
				alert('FAILED')
			}
		}
	});
}