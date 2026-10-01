<?php
namespace App\Http\Controllers;
use App\Models\User;
class AdminUserController extends Controller {
 public function index(){return response()->json(['users'=>User::select('id','name','email','role','created_at')->latest()->get()]);}
}
