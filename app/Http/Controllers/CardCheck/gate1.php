<?php

namespace App\Http\Controllers\CardCheck;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;
use App\Models\User;
use Illuminate\Http\Client\RequestException;

class gate1 extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     // $this->middleware('role:admin|user');
    // }

    public function card_gate1_check(Request $req)
    {
      
        $mt = -1;
        if($mt == 1){
            return response()->json([
                'error' => 5,
                'msg' => 'Checker is undergoing maintenance. Your last CC '.$req->data,
            ]);
        }
        $cek = Auth::user()->balance - 2;
        if($cek < 0){
            return response()->json([
                'error' => 5,
                'msg' => 'PLEASE TOP UP CREDITS',
            ]);
        }else{
            while (true) {
                try {
                    $response = Http::timeout(60)->get('https://api.indocheck.vip/card/gate-1/check?card='.$req->data.'&user='.Auth::user()->username);
                    // return $response->json();
                    if($response->ok()){
                        // return $response->json('status');
                        if($response->json('status') == 0){
                            // $user = User::find(Auth::user()->id);
                            // $user->balance = Auth::user()->balance - 2;
                            // $user->save();
                            return response()->json([
                                'error' => 0,
                                'msg' => '<font color=blue><b>LIVE</b></font> - '.$req->data.'  '.$response->json('bin'),
                                // 'bal' => $user->balance
                            ]);
                        }else if($response->json('status') == 1){
                            // $user = User::find(Auth::user()->id);
                            // $user->balance = Auth::user()->balance - 1;
                            // $user->save();
                            return response()->json([
                                'error' => 1,
                                'msg' => '<font color=red><b>DECLINED</b></font> - '.$req->data. ' | Info : '.$response->json('code'),
                                // 'bin' => $response->json('bin'),
                                // 'bal' => $user->balance
                            ]);
                            // return 'DIE';
                        }else{
                            return response()->json([
                                'error' => -1,
                                'msg' => '<font color=red><b>UNCHECK</b></font> - '.$req->data,
                            ]);
                        }
                    }
                }catch(RequestException $e){
                    if ($e->getCode() == 28) { // cURL error 28: Operation timed out
                        $elapsedTime = time() - $startTime;
                        if ($elapsedTime > $maxRuntime) {
                            return response()->json([
                                'error' => 5,
                                'msg' => 'Request failed after maximum runtime.',
                            ]);
                        }
                        // Wait before retrying
                        sleep($delay);
                    }
                }
            }
            
        }
    }
    
}
