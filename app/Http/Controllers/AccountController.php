<?php

namespace App\Http\Controllers;
use Hash;
use Auth;
use Illuminate\Support\Facades\Input;
use App\User;
	
class AccountController extends Controller {
	
//	获取登录页面
	public function getLogin(){
		if(Auth::check()){
			return redirect()->to('/select');
		}
		return view('main.login');
	}
	
//	提交登录
	public function postLogin(){
		$phone = Input::get('phone');
		$password = Input::get('password');
		$remember_me = Input::get('remember_me')?true:false;
		if(Auth::attempt(array('phone'=>$phone,'password'=>$password),$remember_me)){
			return redirect()->to('/select');
		}
		return redirect('/login')->with('msg','账号或密码错误');
	}
	
	public function logout(){
		Auth::logout();
		return redirect()->to('/login');
	}
	
//	获取注册页面
	public function getSignup(){
		return view('main.register');
	}
	
//	提交注册
	public function postSignup(){
		$user = new User;
		$user->id = rand(pow(10,(9)), pow(10,10)-1);
		$user->phone = Input::get('phone');
		$user->password = Hash::make(Input::get('password'));
		$user->name = Input::get('name');
		$user->save();
		if(Auth::attempt(array('phone'=>Input::get('phone'),'password'=>Input::get('password')))){
			return redirect()->to('/select');
		}
	}
	
//	获取选择页面
	public function getSelect(){
		
//		获取登录用户信息
		$name = Auth::user()->name;
		return view('main.select',['name'=>$name]);
	}
}