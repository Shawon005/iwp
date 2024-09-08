<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    public function Index(Request $request)
    {
      $blog=DB::table('vv_blogs')->get();
      return view('blog.all-blog',
      ['blog'=>$blog]);

    }
    public function Store(Request $request)
    {
//dd(request()->all());
        $request->validate([
            
          
            'user_id'=>'required', 
            'blog_name'=>'required|unique:vv_blogs,blog_name',
            'blog_description'=>'required',
            'blog_image'=>'required',
          
           
        ]);
     
  
        $files=request()->blog_image;
        //dd($files);
        if($files==NULL)
       {
      
         $F_file=Null;
       }
       else{
           
           foreach($files as $file){
               
               $file_all[]= $this->uploadImage($file);
               
              }
              //dd($file_all);
              $F_file=implode(',',$file_all);  
       }
    //    dd($F_file);
        try{
            //dd(request()->all());
            DB::table('vv_blogs')->insert([
            //  dd(request()->all()),
                'user_id'=>request()->user_id,
                'blog_name'=>request()->blog_name,
                'blog_description'=>request()->blog_description,
                'blog_image'=>$F_file,
                'isenquiry'=>(request()->isenquiry)==null?0:request()->isenquiry,
                'seo_description'=>request()->blog_description,
                'seo_title'=>request()->blog_name,
                'blog_slug'=>Str::of(request()->blog_name)->slug('-'),
                'blog_cdt'=>now(),

            ]);
            return redirect()->route('blog_table')->with('message' , 'Store was successful!');
          // $request->session()->flash('message' , 'Task was successful!');
            //return redirect()->route('event_table')->with('message' , 'Store was successful!');
          //  return redirect()->back();
 
        }
         catch (\Throwable $th) {
            dd("data not");
            //return redirect()->back()->withInput()->withErrors($e->getMessage());
            //dd($e->getMessage());
        }    

    }
    public function Edit( $id)
    {
        //dd($id);
     //   $blog = Blog::find($blog_id);
        $users=DB::table('vv_users')->get();
        $blog = DB::table('vv_blogs')->where('blog_id',$id)->first();
        return view('blog.admin-edit-blogs',
        ['blog'=>$blog,'users'=>$users]);
     
    }
    public function Update(Request $request,$id)
    {
        $F_file=Null;
        $files=request()->blog_image;

        if($files==NULL)
       {
        $forFile=DB::table('vv_blogs')->where('blog_id',$id)->first();
         $F_file=$forFile->blog_image;
       }
       else{
           
           foreach($files as $file){
               
               $file_all[]= $this->uploadImage($file);
               
              }
             
              $F_file=implode(',',$file_all);  
       }
       $val=unique('vv_blogs','blog_name',request()->blog_name,'blog_id',$id);
       if($val!=0){
       $request->validate([ 
           'blog_name'=>'required',
       ]);
      }
        try{
           
            //dd(request()->all());
          DB::table('vv_blogs')->where('blog_id',$id)->update([
           'user_id'=>request()->user_id,
           'blog_name'=>request()->blog_name,
           'blog_description'=>request()->blog_description,
           'blog_image'=>$F_file,
           'isenquiry'=>(request()->isenquiry)==null?0:request()->isenquiry,
           'seo_description'=>request()->blog_description,
           'seo_title'=>request()->blog_name,
           'blog_slug'=>Str::of(request()->blog_name)->slug('-'),
        ]);
       

            
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('blog_table')->with('message' , 'Update was successful!');
            //return redirect()->back();
 
        }
         catch (\Throwable $th) {
            dd("data not");
            //return redirect()->back()->withInput()->withErrors($e->getMessage());
            //dd($e->getMessage());
        }    

    }
    public function Delete($id)
    {
      DB::table('vv_blogs')->where('blog_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function Blog()
    {
      $user=DB::table('vv_users')->get();
        return view('blog.admin-add-new-blogs',
        ['user'=>$user]);
     
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
}
