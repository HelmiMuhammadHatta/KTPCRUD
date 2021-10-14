@extends('layouts.app')

@section('content')
<div class="container" style="max-width:100vw">
	<div class="row justify-content-center">
		<div class="col-md-11">
			<div class="card">
				<div class="card-header">New KTP</div>

				<div class="card-body">
					<form method="POST" action="{{ url('/c') }}"  enctype="multipart/form-data">
                        @csrf
						<div class="col-md-6">
							<div class="form-group row">
								<label for="nama" class="col-md-4 col-form-label text-md-right">NAMA</label>
								<div class="col-md-8">
									<input id="nama" type="text" class="form-control" name="nama" placeholder="NAMA" required autofocus>
								</div>
							</div>

							<div class="form-group row">
								<label for="tempatLahir" class="col-md-4 col-form-label text-md-right">TEMPAT / TANGGAL LAHIR</label>
								<div class="col-md-8">
									<input id="tempatLahir" type="text" class="form-control" name="tempatLahir" placeholder="TEMPAT" required autofocus>
									<input id="tanggalLahir" type="text" class="form-control datepicker" name="tanggalLahir" placeholder="TANGGAL" required autofocus>
								</div>
							</div>

							<div class="form-group row">
								<label for="jenisKelamin" class="col-md-4 col-form-label text-md-right">JENIS KELAMIN</label>
								<div class="col-md-8">
									<select id="jenisKelamin" type="text" class="form-control" name="jenisKelamin" placeholder="JENIS KELAMIN" required autofocus>
										<option></option>
										<option>LAKI-LAKI</option>
										<option>PEREMPUAN</option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label for="golDarah" class="col-md-4 col-form-label text-md-right">GOLONGAN DARAH</label>
								<div class="col-md-8">
									<select id="golDarah" type="text" class="form-control" name="golDarah" placeholder="GOLONGAN DARAH" required autofocus>
										<option></option>
										<option>A</option>
										<option>B</option>
										<option>AB</option>
										<option>O</option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label for="alamat" class="col-md-4 col-form-label text-md-right">ALAMAT</label>
								<div class="col-md-8">
									<input id="alamat" type="text" class="form-control" name="alamat" placeholder="ALAMAT" required autofocus>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="agama" class="col-md-4 col-form-label text-md-right">AGAMA</label>
								<div class="col-md-8">
									<input id="agama" type="text" class="form-control" name="agama" placeholder="AGAMA" required autofocus>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="kawin" class="col-md-4 col-form-label text-md-right">STATUS KAWIN</label>
								<div class="col-md-8">
									<input id="kawin" type="text" class="form-control" name="kawin" placeholder="STATUS KAWIN" required autofocus>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="pekerjaan" class="col-md-4 col-form-label text-md-right">PEKERJAAN</label>
								<div class="col-md-8">
									<input id="pekerjaan" type="text" class="form-control" name="pekerjaan" placeholder="PEKERJAAN" required autofocus>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="wn" class="col-md-4 col-form-label text-md-right">KEWARGANEGARAAN</label>
								<div class="col-md-8">
									<input id="wn" type="text" class="form-control" name="wn" placeholder="KEWARGANEGARAAN" required autofocus>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="pf" class="col-md-4 col-form-label text-md-right">FOTO</label>
								<div class="col-md-8">
									<input id="pf" type="file" class="form-control" name="pf" placeholder="FOTO" accept="image/*" autofocus>
								</div>
							</div>
							<button type="submit" class="btn btn-lg btn-primary float-right">SUBMIT</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
