<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SEOController extends Controller
{

    public function Edit(Request $request,$id)
    {
        $category=DB::table('vv_categories')->where('category_id',$id)->first();
        return view('seo.seo-listing-edit',
        ['category'=>$category]);
    }
    public function Update(Request $request, $id)
    {
        //dd($request->all());
        DB::table('vv_categories')->where('category_id',$id)->update([
            "category_description" =>  (request()->category_description==null)?'':request()->category_description,
            "category_seo_title" => (request()->category_seo_title==null)?'':request()->category_seo_title,
            "category_seo_keywords" =>  (request()->category_seo_keywords==null)?'':request()->category_seo_keywords,
            "category_seo_description" =>  (request()->category_seo_description==null)?'':request()->category_seo_description,
            "category_faq_1_ques" =>  (request()->category_faq_1_ques==null)?'':request()->category_faq_1_ques,
            "category_faq_1_ans" =>  (request()->category_faq_1_ans==null)?'':request()->category_faq_1_ans,
            "category_faq_2_ques" =>  (request()->category_faq_2_ques==null)?'':request()->category_faq_2_ques,
            "category_faq_2_ans" =>  (request()->category_faq_2_ans==null)?'':request()->category_faq_2_ans,
            "category_faq_3_ques" =>  (request()->category_faq_3_ques==null)?'':request()->category_faq_3_ques,
            "category_faq_3_ans" =>  (request()->category_faq_3_ans==null)?'':request()->category_faq_3_ans,
            "category_faq_4_ques" =>  (request()->category_faq_4_ques==null)?'':request()->category_faq_4_ques,
            "category_faq_4_ans" =>  (request()->category_faq_4_ans==null)?'':request()->category_faq_4_ans,
            "category_faq_5_ques" => (request()->category_faq_5_ques==null)?'':request()->category_faq_5_ques,
            "category_faq_5_ans" =>  (request()->category_faq_5_ans==null)?'':request()->category_faq_5_ans,
            "category_faq_6_ques" =>  (request()->category_faq_6_ques==null)?'':request()->category_faq_6_ques,
            "category_faq_6_ans" =>  (request()->category_faq_6_ans==null)?'':request()->category_faq_6_ans,
            "category_faq_7_ques" =>  (request()->category_faq_7_ques==null)?'':request()->category_faq_7_ques,
            "category_faq_7_ans" =>  (request()->category_faq_7_ans==null)?'':request()->category_faq_7_ans,
            "category_faq_8_ques" =>  (request()->category_faq_8_ques==null)?'':request()->category_faq_8_ques,
            "category_faq_8_ans" =>  (request()->category_faq_8_ans==null)?'':request()->category_faq_8_ans,
            "category_google_schema" =>  (request()->category_google_schema==null)?'':request()->category_google_schema,
        ]);
        return redirect()->route('seo_option')->with('message' , 'Store was successful!');
    }
}
