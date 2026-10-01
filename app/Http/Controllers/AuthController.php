<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
class AuthController extends Controller {
 public function me(Request $request){return response()->json(['user'=>$request->user()]);}
 public function register(Request $request){
  $data=$request->validate(['name'=>'required|string|max:255','email'=>'required|email|unique:users,email','password'=>'required|string|min:8|confirmed']);
  $user=User::create([...$data,'password'=>Hash::make($data['password']),'role'=>'user']);
  Auth::login($user);$request->session()->regenerate();
  return response()->json(['user'=>$user],201);
 }
 public function login(Request $request){
  $data=$request->validate(['email'=>'required|email','password'=>'required|string']);
  if(!Auth::attempt($data)) throw ValidationException::withMessages(['email'=>['Email atau password salah.']]);
  $request->session()->regenerate();
  return response()->json(['user'=>$request->user()]);
 }
 public function logout(Request $request){Auth::logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect('/');}
}
