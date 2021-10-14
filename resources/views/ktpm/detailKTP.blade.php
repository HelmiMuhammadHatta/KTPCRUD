@extends('layouts.app')

@section('content')
<div class="container" style="max-width:100vw">
	<div class="row justify-content-center">
		<div class="col-md-11">
			<div class="card">
				<div class="card-header">Detail KTP</div>

				<div class="card-body">
					<?php foreach ($ktpData as $key => $kd) { ?>
					<div class="col-md-6">
						<div class="form-group row">
							<label for="nama" class="col-md-4 col-form-label text-md-right">NAMA</label>
							<div class="col-md-8">
								<label class="col-form-label"> <?= $kd->nama ?> </label>
							</div>
						</div>

						<div class="form-group row">
							<label for="tempatLahir" class="col-md-4 col-form-label text-md-right">TEMPAT / TANGGAL LAHIR</label>
							<div class="col-md-8">
								<label class="col-form-label"> <?= $kd->tempat_lahir ?>/<?= date_create_from_format('Y-m-d', $kd->tanggal_lahir)->format('j-m-Y') ?> </label>
							</div>
						</div>

						<div class="form-group row">
							<label for="jenisKelamin" class="col-md-4 col-form-label text-md-right">JENIS KELAMIN</label>
							<div class="col-md-8">
								<label class="col-form-label"> <?= $kd->jenis_kelamin ?> </label>
							</div>
						</div>

						<div class="form-group row">
							<label for="golDarah" class="col-md-4 col-form-label text-md-right">GOLONGAN DARAH</label>
							<div class="col-md-8">
								<label class="col-form-label"> <?= $kd->golongan_darah ?> </label>
							</div>
						</div>

						<div class="form-group row">
							<label for="alamat" class="col-md-4 col-form-label text-md-right">ALAMAT</label>
							<div class="col-md-8">
								<label class="col-form-label"> <?= $kd->alamat ?> </label>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="agama" class="col-md-4 col-form-label text-md-right">AGAMA</label>
							<div class="col-md-8">
								<label class="col-form-label"> <?= $kd->agama ?> </label>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="kawin" class="col-md-4 col-form-label text-md-right">STATUS KAWIN</label>
							<div class="col-md-8">
								<label class="col-form-label"> <?= $kd->status_kawin ?> </label>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="pekerjaan" class="col-md-4 col-form-label text-md-right">PEKERJAAN</label>
							<div class="col-md-8">
								<label class="col-form-label"> <?= $kd->pekerjaan ?> </label>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="wn" class="col-md-4 col-form-label text-md-right">KEWARGANEGARAAN</label>
							<div class="col-md-8">
								<label class="col-form-label"> <?= $kd->kewarganegaraan ?> </label>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="pf" class="col-md-4 col-form-label text-md-right">FOTO</label>
							<div class="col-md-8">
								<img class="float-left" width="256px" src="<?= asset(Storage::url($kd->foto)) ?>" alt="">
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
