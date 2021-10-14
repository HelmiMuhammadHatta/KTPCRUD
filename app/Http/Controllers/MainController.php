<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
	//==============================================================================LOG USER ACTIVITY TO DB==============================================================================
	public function logUserActivity($act)
	{
		$user = Auth::user();
		$tmstm = \Carbon\Carbon::now()->toDateTimeString();
		DB::table('user_monitor')->insert([
			'user_id' => $user->id,
			'do' => $act,
			'time' => $tmstm
		]);
	}
	//==============================================================================LOG USER ACTIVITY TO DB==============================================================================

	public function index()
	{
		$ktpData = DB::table('data_ktp')->where('deleted',0)->paginate(10);
		$data = [
			'ktpData'=>$ktpData
		];

		return view('ktpm/index', $data);
	}

	public function newKTP()
	{
		$user = Auth::user();

		if ($user->access_type == 0) {
			return view('restrictedaccess');exit;
		}

		return view('ktpm/newKTP');
	}

	public function editKTP($id)
	{
		$user = Auth::user();

		if ($user->access_type == 0) {
			return view('restrictedaccess');exit;
		}

		$ktpData = DB::table('data_ktp')->where('id',$id)->get();
		$data = [
			'ktpData'=>$ktpData
		];

		return view('ktpm/editKTP', $data);
	}

	public function detailKTP($id)
	{
		$user = Auth::user();

		$ktpData = DB::table('data_ktp')->where('id',$id)->get();
		$data = [
			'ktpData'=>$ktpData
		];

		return view('ktpm/detailKTP', $data);
	}

	public function c(Request $req)
	{
		$user = Auth::user();

		if ($user->access_type == 0) {
			return view('restrictedaccess');exit;
		}

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
		
		$this->logUserActivity("New KTP ".$req->nama);
		return redirect('/');
	}

	public function u(Request $req)
	{
		$user = Auth::user();

		if ($user->access_type == 0) {
			return view('restrictedaccess');exit;
		}

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
		
		
		$this->logUserActivity("EDIT KTP ".$req->nama);
		return redirect('/');
	}
	
	public function d(Request $req)
	{
		$user = Auth::user();

		if ($user->access_type == 0) {
			return view('restrictedaccess');exit;
		}

		DB::table('data_ktp')->where('id', $req->id)->update([
			'deleted' => '1'
		]);

		$this->logUserActivity("DELETE KTP ".$req->nm);
		echo "berhasil";
	}
}

