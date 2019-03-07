<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\CatPackage;

class ServiceController extends Controller
{
    public function index(){
    	$services = Service::all();
    	return view('admin.service.index', compact('services'));
    }
    public function getAdd(){
    	$cats = CatPackage::all();
    	return view('admin.service.add', compact('cats'));
    }
    public function postAdd(Request $request){
    	$request->validate([
            'title' => 'required|unique:service',
    		'name' => 'required|unique:service',
    		'description' => 'required',
    		'detail' => 'required',
    		'picture' => 'required',
    		'img' => 'required',
    		'cat_id' => 'required',
    	]);
    	$service = new Service([
            'name' => $request->name,
    		'title' => $request->title,
    		'description' => $request->description,
    		'detail' => $request->detail,
    	]);
        if($request->file('picture') != null){
            $path1 = $request->file('picture');
            $picture =  $path1->store('/', ['disk' => 'upload']);
            $service->picture = $picture;
        }
    	if($request->file('img') != null){
    		$path2 = $request->file('img');
			$img =  $path2->store('/', ['disk' => 'upload']);
            $service->img = $img;
        }
        $service->catpackage_id = $request->cat_id;
    	$service->save();
    	return redirect(route('admin.service.index'))->with('msg', 'Thêm thành công');
    }
    public function getEdit($id){
    	$cats = CatPackage::all();
    	$service = Service::find($id);
    	return view('admin.service.edit', compact('service', 'cats'));
    }
    public function postEdit(Request $request,$id){
    	$request->validate([
            'name' => 'required|unique:service,name,'.$id,
    		'title' => 'required|unique:service,title,'.$id,
    		'description' => 'required',
    		'detail' => 'required',
    	]);
        if($request->file('picture') != null){
            $path1 = $request->file('picture');
            $picture =  $path1->store('/', ['disk' => 'upload']);
            $service->picture = $picture;
        }
    	if($request->file('img') != null){
    		$path2 = $request->file('img');
			$img =  $path2->store('/', ['disk' => 'upload']);
            $service->img = $img;
        }
    	$service = Service::find($id);
        $service->name = $request->name;
    	$service->title = $request->title;
    	$service->description = $request->description;
    	$service->detail = $request->detail;

    	$service->update();
    	return redirect(route('admin.service.index'))->with('msg', 'Sửa thành công');
    }
    public function delete($id){
    	$service = Service::find($id);
    	$service->delete();
    	return redirect(route('admin.service.index'))->with('msg', 'Xoá thành công');
    }
}
