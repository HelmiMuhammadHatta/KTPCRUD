@extends('layouts.app')

@section('content')
<div class="container" style="max-width:100vw">
	<div class="row justify-content-center">
		<div class="col-md-11">
			<div class="card">
				<div class="card-header">USER</div>

				<div class="card-body">
					<table class="datatable">
						<thead>
							<tr>
								<th>NO</th>
								<th>NAMA</th>
								<th>E-MAIL</th>
								<th>ADMIN ACCESS</th>
								<th>ACCESS</th>
							</tr>
						</thead>
						<tbody>
							<?php $num=0; foreach ($userData as $key => $ud) { $num++?>
							<tr class="rowUserWithId_<?= $ud->id ?>">
								<td><?= $num ?></td>
								<td><?= $ud->name ?></td>
								<td><?= $ud->email ?></td>
								<td>
									<?php if ($ud->access_type == 1) { ?>
										<input uid="<?= $ud->id ?>" unm="<?= $ud->name ?>" type="checkbox" name="access_type" class="access_type" checked>
									<?php }else{ ?>
										<input uid="<?= $ud->id ?>" unm="<?= $ud->name ?>" type="checkbox" name="access_type" class="access_type">
									<?php } ?>
									<span class="actpchgStat_<?= $ud->id ?>"></span>
								</td>
								<td>
									<button uid="<?= $ud->id ?>" unm="<?= $ud->name ?>" class="btn btn-sm btn-secondary btnMonitorUser" title="MONITOR USER" data-toggle="modal" data-target="#userlog">&#9783;</button>
									<button uid="<?= $ud->id ?>" unm="<?= $ud->name ?>" class="btn btn-sm btn-danger btnDeleteUser" title="DELETE USER">&#9949;</button>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="userlog" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title float-right" id="mdlNmPlc">Modal Header</h4>
				<button type="button" class="close float-right" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<table class="datatableNull">
					<thead>
						<tr>
							<th>NO</th>
							<th>ACTIVITY</th>
							<th>TIMESTAMP</th>
						</tr>
					</thead>
					<tbody id="userActivityTableBody"></tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<script src="{{ asset('js/user.js') }}" defer></script>
@endsection
