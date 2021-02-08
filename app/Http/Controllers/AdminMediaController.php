<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMediaController extends Controller
{

    public function index(){
        $photos = Photo::all();
        return view('admin.media.index' , compact('photos'));
    }


    public function create(){
        return view('admin.media.create');
    }


    public function store(Request $request){

        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('images' , $name);

        Photo::create(['file'=>$name]);

    }


    public function destroy($id){

        $photo = Photo::findOrFail($id);

        unlink(public_path() . $photo->file);

        $photo->delete();

        Session::flash('delete_img' , 'The photo has been deleted');

        return redirect()->back();

    }

    public function deleteMedia(Request $request){


//        if(isset($request->single_delete)){
//
//            $this->destroy($request->photo);
//
//            return redirect()->back();
//
//        }

//        if(isset($request->delete_all) && !empty($request->checkBoxeArray)){
//
//
//
//        }


        $photos = Photo::findOrFail($request->checkBoxArray);

        foreach($photos as $photo){

            $photo->delete();

        }

        Session::flash('delete_img' , 'The photos has been deleted');

        return redirect()->back();

    }


}
