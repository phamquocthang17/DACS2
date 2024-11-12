<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Lavarel\Socialite\SocialiteServiceProvider;
use App\Social; //sử dụng model Social
use Socialite; //sử dụng Socialite
use App\Login; //sử dụng model Login

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login',[
            'title' => 'Login'
        ]);
    }


    
    public function store(Request $request){
        
        $this->validate($request,[
            'email' => 'required|email:filter',
            'password' => 'required'
        ]); 
        if (Auth::attempt([
            'email'=> $request-> input('email'),
            'password' => $request-> input('password')
        ], $request->input('remember')  )) { 
            
            return redirect()->route('admin');
        }
        Session:: flash('error','Email hoặc Password không đúng');
        return redirect()->back();
    }
    // public function login_facebook(){
    //     return Socialite::driver('facebook')->redirect();
    // }
    // public function callback_facebook(){
    //     $provider = Socialite::driver('facebook')->user();
    //     $account = Social::where('provider','facebook&')->where('provider_user_id',$provider->getId())->first();
    //     if($account){
    //     //login in vao trang quan tri
    //     $account_name = Login::where('id',$account->user)->first();
    //     //Session::put('name',$account_name->admin_name);
    //     Session::put('id',$account_name->admin_id);
    //     return redirect('/admin/main')->with('message','Đăng nhập Admin thành công');
    //     }else{
        
    //     $hieu = new Social([
    //     'provider_user_id' => $provider->getId(),
    //     'provider' =>'facebook'
    //     ]);
        
    //     $orang = Login::where('email',$provider->getEmail())->first();
        
    //     if(!$orang){
    //     $orang = Login::create([
    //         'name' => $provider->getName(),
    //         'email' => $provider->getEmail(),
    //         'password' => '',
    //     ]);
    //     }
    //     $hieu->login()->associate($orang);
    //     $hieu->save();
        
    //     $account_name = Login::where('id',$account->user)->first();
        
    //     //Session::put('name',$account_name->admin_name);
    //     Session::put('id',$account_name->admin_id);
    //     return redirect('admin/main')->with('message','Đăng nhập thành công');
    //     }
    //     }
}