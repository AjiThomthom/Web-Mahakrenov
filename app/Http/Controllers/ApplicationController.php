<?php
namespace App\Http\Controllers;
use App\Models\Application;
use Illuminate\Http\Request;
class ApplicationController extends Controller {
 public function mine(Request $request){return response()->json(['application'=>$request->user()->application]);}
 public function store(Request $request){
  $data=$request->validate(['phone'=>'required|string|max:30','division'=>'required|string|max:120','motivation'=>'required|string|max:5000']);
  if($request->user()->application)return response()->json(['message'=>'Kamu sudah mengirim pendaftaran.'],422);
  $app=Application::create([...$data,'user_id'=>$request->user()->id,'status'=>'pending']);
  return response()->json(['application'=>$app],201);
 }
 public function index(){return response()->json(['items'=>Application::with('user')->latest()->get()]);}
 public function update(Request $request,Application $application){
  $data=$request->validate(['status'=>'required|in:pending,diproses,diterima,ditolak','note'=>'nullable|string|max:2000']);
  $application->update($data);return response()->json(['application'=>$application->load('user')]);
 }
 public function reports(){
  $apps=Application::query();
  return response()->json(['report'=>[
   'Total Pendaftar'=>(clone $apps)->count(),
   'Pending'=>(clone $apps)->where('status','pending')->count(),
   'Diproses'=>(clone $apps)->where('status','diproses')->count(),
   'Diterima'=>(clone $apps)->where('status','diterima')->count(),
   'Ditolak'=>(clone $apps)->where('status','ditolak')->count(),
  ]]);
 }
}
