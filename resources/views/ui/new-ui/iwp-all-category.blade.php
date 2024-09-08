
@extends('main.master')
@section('content')
    <section class="abou-pg commun-pg-main">
        <div class="about-ban comunity-ban">
            <h1>Photo Directory</h1>
            <p>Connect with the right all india photo Industry Infirmation</p>
            <input type="text" id="tail-se" placeholder="Search traders category wise here..">
        </div>
    </section>

    <!-- START -->
    <section>
        <div class="str all-cate-pg">
            <div class="container">
                <div class="row">
                    <div class="sh-all-scat">
                      @foreach($service as $category)
                      <ul id="tail-re">
                         <li>
                            <div class="sh-all-scat-box">
                                  <div class="lhs">
                                    <img src="{{asset('/storage/file/'.$category->category_image)}}"alt="">
                                  </div>
                             <div class="rhs">
                                <h4>
                                    <a href="{{route('all-listings',['id'=>$category->category_id])}}">{{$category->category_name}} </a><span>{{sprintf("%02d",CountCol('vv_listings','category_id',$category->category_id,'category_id'))}}</span>
                                </h4>
                                 <ol>
                                    @php $sub_cat=sub('vv_sub_categories','category_id',$category->category_id)@endphp
                                      @foreach($sub_cat as $sub)
                                       <li>
                                         <a href="{{route('all_listing',['id'=>$category->category_id,'sub'=>$sub->sub_category_id])}}">{{$sub->sub_category_name}} <span>{{sprintf("%02d",CountCol('vv_listings','sub_category_id',$sub->sub_category_id,'sub_category_id'))}}</span></a>
                                       </li>
                                       @endforeach
                                       
                                 </ol>
                             </div>
                             </div>
                                </li>
                        </ul>
                        @endforeach  
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
@endsection
    <!-- START -->