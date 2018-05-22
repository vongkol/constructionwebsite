<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        if(!Right::check('Page', 'l'))
        {
            return view('permissions.no');
        }
        $data['pages'] = DB::table('pages')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->paginate(18);
        return view('pages.index', $data);
    }
    // load create form
    public function create()
    {
        if(!Right::check('Page', 'i'))
        {
            return view('permissions.no');
        }
        return view('pages.create');
    }
    // save new page
    public function save(Request $r)
    {
        if(!Right::check('Page', 'i'))
        {
            return view('permissions.no');
        }
        $data = array(
            'title' => $r->title,
            'description' => $r->description
        );
        $sms = "The new page has been created successfully.";
        $sms1 = "Fail to create the new page, please check again!";
        $i = DB::table('pages')->insertGetId($data);
        
        if($i)
        {
            $url = 'page/view/'.$i;
            if($r->featured_image) {

                $file = $r->file('featured_image');
                $file_name = $file->getClientOriginalName();
                $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
                $file_name = 'page' .$i . $ss;
                
                // upload 250
                $destinationPath = 'uploads/pages/';
                $file->move($destinationPath, $file_name);
           
                DB::table('pages')->where('id', $i)->update(['featured_image'=>$file_name, 'url'=> $url]);
            }
            $r->session()->flash('sms', 'New page has been created successfully!');
            return redirect('/page/create');
        }
        else{
            $r->session()->flash('sms1', 'Fail to create new post. Please check your input again!');
            return redirect('/page/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        if(!Right::check('Page', 'd'))
        {
            return view('permissions.no');
        }
        DB::table('pages')->where('id', $id)->update(['active'=>0]);
        return redirect('/page');
    }

    public function edit($id)
    {
        if(!Right::check('Page', 'u'))
        {
            return view('permissions.no');
        }
        $data['page'] = DB::table('pages')
            ->where('id',$id)->first();
        return view('pages.edit', $data);
    }

    public function update(Request $r)
    {
        if(!Right::check('Page', 'u'))
        {
            return view('permissions.no');
        }
        $data = array(
            'title' => $r->title,
            'description' => $r->description
        );
        if($r->featured_image) {
           
            $file = $r->file('featured_image');
            $file_name = $file->getClientOriginalName();
            $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
            $file_name = 'page' .$r->id . $ss;
            // upload 250
            $destinationPath = 'uploads/pages/';
            $file->move($destinationPath, $file_name);
            $data['featured_image'] =  $file_name;
        }
        $i = DB::table('pages')->where('id', $r->id)->update($data);
        if ($i)
        {
            $sms = "All changes have been saved successfully.";
            $r->session()->flash('sms', $sms);
            return redirect('/page/edit/'.$r->id);
        }
        else
        {   
            $sms1 = "Fail to to save changes, please check again!";
            $r->session()->flash('sms1', $sms1);
            return redirect('/page/edit/'.$r->id);
        }
    }
    // view detail
    public function view($id) 
    {
        $data['page'] = DB::table('pages')
            ->where('id',$id)->first();
        return view('pages.view', $data);
    }
}

