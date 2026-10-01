<?php
namespace App\Http\Controllers;
use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ContentController extends Controller {
 private function model($type){return $type==='gallery'?Gallery::class:News::class;}
 private function adminType(Request $request){return str_contains($request->path(),'gallery')?'gallery':'news';}
 public function publicList($type){$class=$this->model($type);return response()->json(['items'=>$class::latest()->get()]);}
 public function adminList(Request $request){$class=$this->model($this->adminType($request));return response()->json(['items'=>$class::latest()->get()]);}
 public function store(Request $request){
  $type=$this->adminType($request);
  $rules=['title'=>'required|string|max:255','image'=>'nullable|image|max:5120'];
  $rules[$type==='gallery'?'description':'body']=$type==='gallery'?'nullable|string':'required|string';
  $data=$request->validate($rules);$path=$request->file('image')?Storage::disk('public')->url($request->file('image')->store('mahakrenov/'.$type,'public')):null;
  $class=$this->model($type);$field=$type==='gallery'?'description':'body';
  $item=$class::create(['title'=>$data['title'],$field=>$data[$field]??null,'image_path'=>$path,'user_id'=>$request->user()->id]);
  return response()->json(['item'=>$item],201);
 }
 public function destroy(Request $request,$id){$class=$this->model($this->adminType($request));$item=$class::findOrFail($id);$item->delete();return response()->json(['message'=>'Konten dihapus']);}
}
