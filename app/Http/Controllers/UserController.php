<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
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
		$user = Auth::user();
		if ($user->access_type == 0) {
			return view('restrictedaccess');exit;
		}

		$userData = DB::table('users')->get();
		$data = [
			'userData'=>$userData
		];
		return view('user/index', $data);
	}

	public function getUserLog(Request $req)
	{
		$user = Auth::user();
		if ($user->access_type == 0) {
			return view('restrictedaccess');exit;
		}

		$html='';
		$userMonitor = DB::table('user_monitor')->limit(5)->where('user_id',$req->id)->orderBy('time', 'desc')->get();
		$nm=0;
		
		foreach ($userMonitor as $key => $um) {
			$do=$um->do;
			$tm=$um->time;
			$nm++;
			$html.="<tr>
				<td>".$nm."</td>
				<td>".$do."</td>
				<td>".$tm."</td>
			</tr>";
		}

		$this->logUserActivity("View user ".$req->nm." activity");
		echo $html;
	}
	
	public function adminaccess(Request $req)
	{
		$user = Auth::user();
		if ($user->access_type == 0) {
			return view('restrictedaccess');exit;
		}
		
		DB::table('users')->where('id',$req->id)->update([
			'access_type' => $req->vl
		]);

		$this->logUserActivity("Change access type of user ".$req->nm);
		echo 'berhasil';
	}
 
	public function deleteUser(Request $req)
	{
		$user = Auth::user();
		if ($user->access_type == 0) {
			return view('restrictedaccess');exit;
		}

		DB::table('users')->where('id',$req->id)->delete();

		$this->logUserActivity("Delete user ".$req->nm);
		echo 'berhasil';
	}
}

