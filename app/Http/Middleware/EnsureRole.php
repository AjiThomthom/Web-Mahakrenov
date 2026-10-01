<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class EnsureRole {
 public function handle(Request $request, Closure $next, string $role){
  if(!$request->user()) return response()->json(['message'=>'Silakan login terlebih dahulu.'],401);
  if($request->user()->role!==$role) return response()->json(['message'=>'Akses ditolak.'],403);
  return $next($request);
 }
}
