<?php

namespace App\Http\Controllers;
use App\Models\vv_news;
use App\Models\vv_news_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function Index(Request $request)
    {
      $news=vv_news::all();
      $category=DB::table('vv_news_categories')->get();
      return view('news.post.all-news',
      ['news'=>$news,'category'=>$category]);

    }
    public function Store(Request $request)
    {
        $request->validate([
            'news_title'=>'required|unique:vv_news,news_title',
            'category_id'=>'required',
            'news_image'=>'required',
            'news_description' =>'required'
        ]);

    //    dd($F_file);
        $files=request()->news_image;
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
        // dd(request()->all());
        DB::table('vv_news')->insert([
                 'news_title'=>request()->news_title,
                 'category_id'=>request()->category_id,
                 'news_image'=>$F_file,
                 'news_description'=>request()->news_description,
                 'seo_title'=>((request()->seo_title ==null)?request()->news_title:request()->seo_title),
                 'seo_description'=>((request()->seo_description==null)?request()->news_description:request()->seo_description),
                 'seo_keywords'=>(request()->seo_keywords)==null?'0':request()->seo_keywords,
                 'news_status'=>'Active',
                 'news_slug'=>Str::of(request()->news_title)->slug('-'),
                 'news_cdt'=>now()
                
            ]);
            //dd("save");
          return redirect()->route('news_table')->with('message' , 'Store was successful!');
           
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
    public function Edit( $id)
    {
        //dd($id);
     //   $category = category::find($category_id);
        $news = DB::table('vv_news')->where('news_id',$id)->first();
        $category=vv_news_category::get();
        return view('news.post.admin-news-edit',
        ['news'=>$news,'category'=>$category]);
     
    }
    public function Update(Request $request,$id)
    {
        $val=unique('vv_news','news_title',request()->news_title,'news_id',$id);
        if($val!=0){
        $request->validate([ 
            'news_title'=>'required|unique:vv_news,news_title',
            'category_id'=>'required',
            'news_description' =>'required',
        ]);
        }
     
    //  dd($F_file);
        $files=request()->news_image;
    //dd($files);
     
            if($files==NULL)
        {
            $file=DB::table('vv_news')->where('news_id',$id)->first();
            $F_file=$file->news_image;
        }
        else{
          
       foreach($files as $file){
           
           $file_all[]= $this->uploadImage($file);
           
          }
          //dd($file_all);
          $F_file=implode(',',$file_all);
        }  
        try{

           // dd(request()->all());
            DB::table('vv_news')->where('news_id',$id)->update([
                 'news_title'=>request()->news_title,
                 'category_id'=>request()->category_id,
                 'news_image'=>$F_file,
                 'news_description'=>request()->news_description,
                 'seo_title'=>((request()->seo_title ==null)?request()->news_title:request()->seo_title),
                 'seo_description'=>((request()->seo_description==null)?request()->news_description:request()->seo_description),
                 'seo_keywords'=>(request()->seo_keywords)==null?'0':request()->seo_keywords,
                 'news_slug'=>Str::of(request()->news_title)->slug('-'),
                 'news_cdt'=>now()
            ]);
            
            return redirect()->route('news_table')->with('message' , 'Update was successful!');
          
        }
         catch (\Throwable $th) {
            
           return redirect()->back()->withInput()->withErrors(getMessage());
        }    

    }

    public function Delete($id)
    {
      DB::table('vv_news')->where('news_id',$id)->delete();
      return redirect()->route('news_table')->with('message' , 'Delete was successful!');
    }

    public function News()
    {

        $category=vv_news_category::get();
        return view('news.post.admin-news-add-new',
        ['category'=>$category]
    );
     
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
}
