<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KtpApiController extends Controller
{
	public function r()
	{
		$ktpData = DB::table('data_ktp')->where('deleted',0)->get();

		return $ktpData;
	}

	public function c(Request $req)
	{
		$date = date_create_from_format('j-m-Y', $req->tanggalLahir);
		$bdate = $date->format('Y-m-d');

		$lastId = DB::table('data_ktp')->insertGetId([
			'nama'				=> $req->nama,
			'tempat_lahir'		=> $req->tempatLahir,
			'tanggal_lahir'		=> $bdate,
			'jenis_kelamin'		=> $req->jenisKelamin,
			'golongan_darah'	=> $req->golDarah,
			'alamat'			=> $req->alamat,
			'agama'				=> $req->agama,
			'status_kawin'		=> $req->kawin,
			'pekerjaan'			=> $req->pekerjaan,
			'kewarganegaraan'	=> $req->wn
		]);

		if ($req->file('pf')) {
			$path = $req->file('pf')->storeAs('public/pasfoto', $lastId.'.jpg');
	
			DB::table('data_ktp')->where('id', $lastId)->update([
				'foto' => 'pasfoto/'.$lastId.'.jpg'
			]);
		}
		return "berhasil";
	}

	public function u(Request $req)
	{
		$date = date_create_from_format('j-m-Y', $req->tanggalLahir);
		$bdate = $date->format('Y-m-d');

		DB::table('data_ktp')->where('id', $req->id)->update([
			'nama'				=> $req->nama,
			'tempat_lahir'		=> $req->tempatLahir,
			'tanggal_lahir'		=> $bdate,
			'jenis_kelamin'		=> $req->jenisKelamin,
			'golongan_darah'	=> $req->golDarah,
			'alamat'			=> $req->alamat,
			'agama'				=> $req->agama,
			'status_kawin'		=> $req->kawin,
			'pekerjaan'			=> $req->pekerjaan,
			'kewarganegaraan'	=> $req->wn
		]);

		if ($req->file('pf')) {
			$path = $req->file('pf')->storeAs('public/pasfoto', $req->id.'.jpg');
	
			DB::table('data_ktp')->where('id', $req->id)->update([
				'foto' => 'pasfoto/'.$req->id.'.jpg'
			]);
		}
		return "berhasil";
	}
	
	public function d(Request $req)
	{
		DB::table('data_ktp')->where('id', $req->id)->update([
			'deleted' => '1'
		]);
		return "berhasil";
	}
}

