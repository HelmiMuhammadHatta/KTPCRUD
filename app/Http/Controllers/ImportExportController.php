<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class ImportExportController extends Controller
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

	public function exportPDF()
	{
		$this->logUserActivity("Export PDF");
		$ktpData = DB::table('data_ktp')->where('deleted',0)->get();
		$data = [
			'ktpData'=>$ktpData
		];
 
		$pdf = PDF::loadview('ie/ktpdf',$data)->setPaper('a3', 'landscape');
		return $pdf->download('data-ktp');
	}

	public function exportCSV()
	{
		$this->logUserActivity("Export CSV");
		$ktpData = DB::table('data_ktp')->where('deleted',0)->get();

		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"export.csv\"");

		echo "nik,nama,tempat_tanggal_lahir,jenis_kelamin,golongan_darah,alamat,agama,status_kawin,pekerjaan,kewarganegaraan\r\n";
 
		foreach ($ktpData as $key => $kd) {
			
			echo implode(",", [
				'"\''.sprintf("%016d",$kd->id).'\'"', 
				'"'.$kd->nama.'"', 
				'"'.($kd->tempat_lahir.' / '.$kd->tanggal_lahir).'"', 
				'"'.$kd->jenis_kelamin.'"', 
				'"'.$kd->golongan_darah.'"', 
				'"'.$kd->alamat.'"', 
				'"'.$kd->agama.'"', 
				'"'.$kd->status_kawin.'"', 
				'"'.$kd->pekerjaan.'"', 
				'"'.$kd->kewarganegaraan.'"']);
  			echo "\r\n";
		}
		exit;
	}

	public function importCSV(Request $req)
	{
		$this->logUserActivity("Import CSV");
		$path = $req->file('csvimport')->getRealPath();
		$data = array_map('str_getcsv', file($path));

		foreach ($data as $k => $d) {
			if ($k != 0) {
				$date = date_create_from_format('j/m/Y', $d[2]);
				$bdate = $date->format('Y-m-d');
				DB::table('data_ktp')->insert([
					'nama'				=> $d[0],
					'tempat_lahir'		=> $d[1],
					'tanggal_lahir'		=> $bdate,
					'jenis_kelamin'		=> $d[3],
					'golongan_darah'	=> $d[4],
					'alamat'			=> $d[5],
					'agama'				=> $d[6],
					'status_kawin'		=> $d[7],
					'pekerjaan'			=> $d[8],
					'kewarganegaraan'	=> $d[9]
				]);
			}
		}

		return redirect('/');
	}
}
