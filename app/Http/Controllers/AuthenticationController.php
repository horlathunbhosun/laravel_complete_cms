<?php

namespace App\Http\Controllers;

use App\User;
use App\Enums\Status;
use App\Enums\UserType;
use Illuminate\Http\Request;
use App\Mail\SendVerificationMail;
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    //



    public function signup(){
        return view('frontend.auth.signup');
    }

    public function signinForm(){
        return view('frontend.auth.login');
    }


    public function forgetPassword()
    {
        return view('frontend.auth.forget');

    }

    public function verifyAccount()
    {
        # code...

        return view('frontend.auth.verify');
    }

    public function register(Request $request)
    {
        $messages = [
            'email.required' => 'We need to know your email!',
            'email.unique' => 'Email already exist',
            'password.min' =>  'The password must be at least 6 characters.',
        ];
        $validate  = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'gender' => 'required',
            'password' => 'required|min:6',
        ],$messages);
        if($validate->fails()){

            $notification = array(
                'alert-type' => 'error',
                'message' => $validate->messages()->first(),
            );
            return back()->with($notification);
        }


        $new_user = New User();
        $new_user->name =  $this->generateRandomUsername();
        $new_user->email = $request->email;
        $new_user->gender = $request->gender;
        $new_user->verification_code = rand(1000,9999);
        $new_user->password = bcrypt($request->password);
        $new_user->save();

        $new_user->attachRole(4);



        $data_mail = json_encode($new_user);

        Mail::to($new_user->email)->send(new SendVerificationMail($data_mail));
        $notification = array(
            'alert-type' => 'success',
            'message' => 'Account Created Successfully check your email to verify',
        );
        return redirect(route('user.verify.form'))->with($notification);



    }

    public function verify(Request $request){
        $user = User::where('verification_code',$request->verification)->first();
        if(!$user){
            $notification = array(
                'alert-type' => 'error',
                'message' => 'Verification Code Invalid',
            );
            return back()->with($notification);
        }
        $user->verification_code = NULl;
        $user->verified = true;
        $user->save();

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Account verified successfully, you can now login ',
        );
        return redirect(route('user.signin'))->with($notification);


    }


    public function loginUser(Request $request){
        $messages = [
            'email.required' =>  'Email is required!',
        ];
        $validate  = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
        ],$messages);
        if($validate->fails()){
            $notification = array(
                'message' => $validate->messages()->first(),
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $check_input = $request->all();

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $remember_me = $request->has('remember') ? true : false;

        $user = auth()->attempt([$fieldType=>$check_input['email'], 'password'=>$check_input['password']],$remember_me);
        if(!$user){
            $notification = array(
                'message' =>'Incorrect email or password',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }


        if(Auth::user()->verified ==  "1"){
            if (Auth::user()->user_type == 'users') {
                $notification = array(
                    'message' =>'Welcome! login successful',
                    'alert-type' => 'success'
                );
                return  redirect('/')->with($notification);
            }
        }else{
            $notification = array(
                'message' =>'Your account is not verified',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }
    }

    public function logout($id = 0)
    {
        Auth::logout();
        if ($id) {
            return response()->json(['message'=>'Only active users can login!'],400);
        }
        return response()->json(['message'=>'Logout Successfully!'],400);

    }



    public function generateRandomUsername(){
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            return substr(str_shuffle($chars),0,8);
    }
}
