
@extends('main.master')
@section('content')
    <section class="abou-pg commun-pg-main">
        <div class="about-ban comunity-ban">
            <h1>All Photo Products</h1>
            <p>Top Products for the Photography Industry</p>
            <input type="text" id="tail-se" placeholder="Search product categories here..">
        </div>
    </section>

    <!-- START -->
    <section>
        <div class="str all-cate-pg">
            <div class="container">
                <div class="row">
                    <div class="sh-all-scat">
                      @foreach($categories as $category)
                      <ul id="tail-re">
                         <li>
                            <div class="sh-all-scat-box">
                                  <div class="lhs">
                                    <img src="{{asset('/storage/file/'.$category->category_image)}}"alt="">
                                  </div>
                             <div class="rhs">
                                <h4>
                                    <a href="{{route('product/cat',['id'=>$category->category_id])}}">{{$category->category_name}} </a><span>{{sprintf("%02d",CountCol('vv_products','category_id',$category->category_id,'category_id'))}}</span>
                                </h4>
                                 <ol>
                                    @php $sub_cat=sub('vv_sub_categories','category_id',$category->category_id)@endphp
                                    @foreach($sub_categories as $sub)
                                        @if($sub->category_id == $category->category_id)
                                            <li>
                                              <a href="{{route('product/cat',['id'=>$category->category_id,'sub'=>$sub->sub_category_id])}}">{{$sub->sub_category_name}} <span>{{sprintf("%02d",CountCol('vv_products','sub_category_id',$sub->sub_category_id,'sub_category_id'))}}</span></a>
                                            </li>
                                        @endif
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