<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        if(!Right::check('Video', 'l'))
        {
            return view('permissions.no');
        }

        $data['video_trainings'] = DB::table('video_trainings')
            ->where('active',1)
            ->orderBy('id', 'desc')
            ->paginate(18);
        return view('videos.index', $data);
    }
    // load create form
    public function create()
    {
        if(!Right::check('Video', 'i'))
        {
            return view('permissions.no');
        }
        return view('videos.create');
    }
    // save new social
    public function save(Request $r)
    {
        if(!Right::check('Video', 'i'))
        {
            return view('permissions.no');
        }
        $data = array(
            'url' => $r->url,
            'title' => $r->title,
        );
        $i = DB::table('video_trainings')->insertGetId($data);
        if($r->hasFile('image')) {
            $file = $r->file('image');
            $file_name = $file->getClientOriginalName();
            $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
            $file_name = 'video' .$i . $ss;
            $destinationPath = 'uploads/videos/'; // usually in public folder
         
            $new_img = Image::make($file->getRealPath())->resize(180, null, function ($con) {
                $con->aspectRatio();
            });
            $new_img->save($destinationPath . $file_name, 80);

            $file->move($destinationPath, $file_name);
            $data['poster_image'] = $file_name;
            $i = DB::table('video_trainings')->where('id', $i)->update($data);
        }
        if ($i) {
            $r->session()->flash("sms", "New video has been created successfully!");
            return redirect("/video/create");
        } else {
            $r->session()->flash("sms1", "Fail to create new video!");
            return redirect("/video/create")->withInput();
        }   
    }
    // delete
    public function delete($id)
    {
        if(!Right::check('Video', 'd'))
        {
            return view('permissions.no');
        }

        DB::table('video_trainings')->where('id', $id)->update(['active'=>0]);
        return redirect('/video');
    }

    public function edit($id)
    {
        if(!Right::check('Video', 'u'))
        {
            return view('permissions.no');
        }
        $data['video_training'] = DB::table('video_trainings')
            ->where('id',$id)->first();
        return view('videos.edit', $data);
    }
    
    public function update(Request $r)
    {
        if(!Right::check('Video', 'u'))
        {
            return view('permissions.no');
        }
    	$data = array(
            'url' => $r->url,
            'title' => $r->title,
        );
        if ($r->image) {
            $file = $r->file('image');
            $file_name = $file->getClientOriginalName();
            $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
            $file_name = 'video' .$r->id . $ss;
            $destinationPath = 'uploads/videos/'; // usually in public folder
         
            $new_img = Image::make($file->getRealPath())->resize(180, null, function ($con) {
                $con->aspectRatio();
            });
            $new_img->save($destinationPath . $file_name, 80);

            $file->move($destinationPath, $file_name);
            $data['poster_image'] = $file_name;
        }
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('video_trainings')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/video/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/video/edit/'.$r->id);
        }
    }
}
