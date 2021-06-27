<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Mail\RegistrationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function register(RegisterRequest $request){
        $request->validated();
        $verification_code = Str::random(20);
        $user = array(
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_code' => $verification_code,
            'status' => 'Un-verified'
        );
        User::create($user);
        $details = [
            'title' => 'Mail from Meas',
            'body' => 'Thank you for taking time and register your account with Meas. Please click <a href="'.url('/api/verify/'.$verification_code).'" _taget="blank">here</a> to verify your account.'
        ];
        Mail::to($request->email)->send(new RegistrationEmail($details));
        return response('User created',200);
    }

    public function verification($verification_code){
        $user = User::where('verification_code',$verification_code)->get()->first();
        if($user){
            if($user->status == 'Verified'){
                abort(403, 'Your account is already verified');
            }else{
                $user->status = 'Verified';
                $user->update();
                return response('Your account has been verified',200);
            }
        }else{
            abort(403, "Invalid address");
        }
    }

    public function login(LoginRequest $request){
        $request->validated();
        $user = User::where('email',$request->email)->get()->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken('jwt_login');
                $data = ['email' => $request->email, 'token' => $token->plainTextToken];
                return response($data, 200);
            }else{
                return response('Email or password not matched',400);
            }
        }else{
            return response('Email or password not matched',400);
        }
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response('You are logged out',200);
    }
}
