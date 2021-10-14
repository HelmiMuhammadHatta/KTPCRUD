@extends('layouts.app')

@section('content')
<div class="container" style="max-width:100vw">
	<div class="row justify-content-center">
		<div class="col-md-11">
			<div class="card">
				<div class="card-header">Edit KTP</div>

				<div class="card-body">
					<form method="POST" action="{{ url('/u') }}"  enctype="multipart/form-data">
                        @csrf
						<?php foreach ($ktpData as $key => $kd) { ?>
						<input type="text" name="id" value="<?= $kd->id ?>" hidden>
						<div class="col-md-6">
							<div class="form-group row">
								<label for="nama" class="col-md-4 col-form-label text-md-right">NAMA</label>
								<div class="col-md-8">
									<input id="nama" type="text" class="form-control" name="nama" placeholder="NAMA" value="<?= $kd->nama ?>" required autofocus>
								</div>
							</div>

							<div class="form-group row">
								<label for="tempatLahir" class="col-md-4 col-form-label text-md-right">TEMPAT / TANGGAL LAHIR</label>
								<div class="col-md-8">
									<input id="tempatLahir" type="text" class="form-control" name="tempatLahir" placeholder="TEMPAT" value="<?= $kd->tempat_lahir ?>" required autofocus>
									<input id="tanggalLahir" type="text" class="form-control datepicker" name="tanggalLahir" placeholder="TANGGAL" value="<?= date_create_from_format('Y-m-d', $kd->tanggal_lahir)->format('j-m-Y') ?>" required autofocus>
								</div>
							</div>

							<div class="form-group row">
								<label for="jenisKelamin" class="col-md-4 col-form-label text-md-right">JENIS KELAMIN</label>
								<div class="col-md-8">
									<?php $n='';$l='';$p='';
									if ($kd->jenis_kelamin=='LAKI-LAKI') {
										$l='selected';
									}elseif ($kd->jenis_kelamin=='PEREMPUAN') {
										$p='selected';
									}else {
										$n='selected';
									} ?>
									<select id="jenisKelamin" type="text" class="form-control" name="jenisKelamin" placeholder="JENIS KELAMIN" required autofocus>
										<option <?= $n ?>></option>
										<option <?= $l ?>>LAKI-LAKI</option>
										<option <?= $p ?>>PEREMPUAN</option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label for="golDarah" class="col-md-4 col-form-label text-md-right">GOLONGAN DARAH</label>
								<div class="col-md-8">
									<?php $n='';$a='';$b='';$ab='';$o='';
									if ($kd->golongan_darah=='A') {
										$a='selected';
									}elseif ($kd->golongan_darah=='B') {
										$b='selected';
									}elseif ($kd->golongan_darah=='AB') {
										$ab='selected';
									}elseif ($kd->golongan_darah=='O') {
										$o='selected';
									}else {
										$n='selected';
									} ?>
									<select id="golDarah" type="text" class="form-control" name="golDarah" placeholder="GOLONGAN DARAH" value="<?= $kd->golongan_darah ?>" required autofocus>
										<option <?= $n ?>></option>
										<option <?= $a ?>>A</option>
										<option <?= $b ?>>B</option>
										<option <?= $ab ?>>AB</option>
										<option <?= $o ?>>O</option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label for="alamat" class="col-md-4 col-form-label text-md-right">ALAMAT</label>
								<div class="col-md-8">
									<input id="alamat" type="text" class="form-control" name="alamat" placeholder="ALAMAT" value="<?= $kd->alamat ?>" required autofocus>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="agama" class="col-md-4 col-form-label text-md-right">AGAMA</label>
								<div class="col-md-8">
									<input id="agama" type="text" class="form-control" name="agama" placeholder="AGAMA" value="<?= $kd->agama ?>" required autofocus>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="kawin" class="col-md-4 col-form-label text-md-right">STATUS KAWIN</label>
								<div class="col-md-8">
									<input id="kawin" type="text" class="form-control" name="kawin" placeholder="STATUS KAWIN" value="<?= $kd->status_kawin ?>" required autofocus>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="pekerjaan" class="col-md-4 col-form-label text-md-right">PEKERJAAN</label>
								<div class="col-md-8">
									<input id="pekerjaan" type="text" class="form-control" name="pekerjaan" placeholder="PEKERJAAN" value="<?= $kd->pekerjaan ?>" required autofocus>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="wn" class="col-md-4 col-form-label text-md-right">KEWARGANEGARAAN</label>
								<div class="col-md-8">
									<input id="wn" type="text" class="form-control" name="wn" placeholder="KEWARGANEGARAAN" value="<?= $kd->kewarganegaraan ?>" required autofocus>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="pf" class="col-md-4 col-form-label text-md-right">FOTO</label>
								<div class="col-md-8">
									<input id="pf" type="file" class="form-control" name="pf" placeholder="FOTO" accept="image/*" autofocus>
									<img class="float-left" width="256px" src="<?= asset(Storage::url($kd->foto)) ?>" alt="">
								</div>
							</div>
							<button type="submit" class="btn btn-lg btn-primary float-right">SUBMIT</button>
						</div>
						<?php } ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
