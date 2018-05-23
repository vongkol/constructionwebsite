<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()==null)
            {
                return redirect("/login");
            }
            return $next($request);
        });
    }
    // index
    public function index()
    {
        // if(!Right::check('Advertisement', 'l'))
        // {
        //     return view('permissions.no');
        // }

        $data['video_trainings'] = DB::table('video_trainings')
            ->where('active',1)
            ->orderBy('id', 'desc')
            ->paginate(18);
        return view('videos.index', $data);
    }
    // load create form
    public function create()
    {
        // if(!Right::check('Advertisement', 'i'))
        // {
        //     return view('permissions.no');
        // }
        return view('videos.create');
    }
    // save new social
    public function save(Request $r)
    {
        $data = array(
            'url' => $r->url,
            'title' => $r->title,
        );
        $sms = "The new video has been created successfully.";
        $sms1 = "Fail to create the new video, please check again!";
        $i = DB::table('video_trainings')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/video/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/video/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        // if(!Right::check('Advertisement', 'd'))
        // {
        //     return view('permissions.no');
        // }

        DB::table('video_trainings')->where('id', $id)->update(['active'=>0]);
        return redirect('/video');
    }

    public function edit($id)
    {
        // if(!Right::check('Advertisement', 'u'))
        // {
        //     return view('permissions.no');
        // }
        $data['video_training'] = DB::table('video_trainings')
            ->where('id',$id)->first();
        return view('videos.edit', $data);
    }
    
    public function update(Request $r)
    {
    	$data = array(
            'url' => $r->url,
            'title' => $r->title,
        );
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
