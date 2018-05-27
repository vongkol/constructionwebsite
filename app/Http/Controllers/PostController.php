<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        $data['posts'] = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->where('posts.active', 1)
            ->orderBy('posts.id', 'desc')
            ->select('posts.*', 'categories.name')
            ->paginate(18);
        return view('posts.index', $data);
    }
    // load create form
    public function create()
    {
        return view('posts.create');
    }
    // save new page
    public function save(Request $r)
    {
        $data = array(
            'title' => $r->title,
            'short_description' => $r->short_description,
            'description' => $r->description,
            'category_id' => $r->category
        );
        $i = DB::table('posts')->insertGetId($data);
        if($i)
        {
            if($r->feature_image) {

                $file = $r->file('feature_image');
                $file_name = $file->getClientOriginalName();
                $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
                $file_name = 'post' .$i . $ss;
                
                // upload 250
                $destinationPath = 'uploads/posts/250x250/';
                $new_img = Image::make($file->getRealPath())->resize(350, 250);
                $new_img->save($destinationPath . $file_name, 80);
                DB::table('posts')->where('id', $i)->update(['featured_image'=>$file_name]);
            }
            $r->session()->flash('sms', 'New post has been created successfully!');
            return redirect('/post/create');
        }
        else{
            $r->session()->flash('sms1', 'Fail to create new post. Please check your input again!');
            return redirect('/post/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('posts')->where('id', $id)->update(['active'=>0]);
        return redirect('/post');
    }

    public function edit($id)
    {

        $data['post'] = DB::table('posts')
            ->where('id',$id)->first();
        return view('posts.edit', $data);
    }

    public function update(Request $r)
    {
        $data = array(
            'title' => $r->title,
            'short_description' => $r->short_description,
            'description' => $r->description,
            'category_id' => $r->category
        );
        if($r->feature_image) {
           
            $file = $r->file('feature_image');
            $file_name = $file->getClientOriginalName();
            $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
            $file_name = 'post' .$r->id . $ss;
            // upload 250
            $destinationPath = 'uploads/posts/250x250/';
            $new_img = Image::make($file->getRealPath())->resize(350, 250);
            $new_img->save($destinationPath . $file_name, 80);
            $data['featured_image'] =  $file_name;
        }
        $i = DB::table('posts')->where('id', $r->id)->update($data);
        if ($i)
        {
            $sms = "All changes have been saved successfully.";
            $r->session()->flash('sms', $sms);
            return redirect('/post/edit/'.$r->id);
        }
        else
        {   
            $sms1 = "Fail to to save changes, please check again!";
            $r->session()->flash('sms1', $sms1);
            return redirect('/post/edit/'.$r->id);
        }
    }
    // view detail
    public function view($id) 
    {
        $data['post'] = DB::table('posts')
            ->where('id',$id)->first();
        return view('posts.detail', $data);
    }
}

