<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\Weight_Log;
use App\Models\Weight_Target;
use App\Http\Requests\AuthRequest;


class AuthController extends Controller
{
    //
    public function index()
        {
            $weight_logs = Weight_Log::all();
            return view('index',compact('weight_logs'));
        }

    public function register(Request $request)
        {
            if ($request->has('register')) {
                return redirect('/weight/logs');
            }
            return view('register2');
        }

    public function goal()
        {
            return view('goal');
        }


}
