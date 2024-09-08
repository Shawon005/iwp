@extends('main.master')
@section('content')
    <!-- END -->

    <!-- START -->
    <section class="">
        <div class="abou-pg commun-pg-main">
            <div class="about-ban comunity-ban">
                <h1>Photo Parivar</h1>
                <p>Build your Photo Parivar community and expand your business to next step.</p>
                <input type="text" id="tail-se" placeholder="Search user profiles..">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="comity-all-user">
                    <ul id="tail-re" class="community-wrapper">
                        @foreach($community as $user)
                        <li class="community-item">  
                            <div class="pro-fol-gr">
                                <div class="pro-ful-img">
                                    <img
                                        src="{{asset('/storage/file/'.$user->profile_image)}}" alt="">
                                    <h4>
                                        <b>{{$user->first_name}}</b>{{CountCol('vv_page_views','user_business_id',$user->user_id,'user_business_id')}}</h4>
                                    <a href="{{route('profile',['id'=>$user->user_id])}}"
                                       class="comm-viw-pro-btn" target="_blank"></a>
                                </div>
                                <div class="count-li">
                                    <span><b>0</b> Listings</span>
                                    <span><b>0</b> Events</span>
                                    <span><b>0</b> Blogs</span>
                                    <span><b>0</b> Products</span>
                                </div>
                                <div class="pro-pg-msg">
                                    <span id="chat-box-div1" class="comm-msg-act-btn"><i
                                            class="material-icons">message</i> Message</span>
                                            @if(session('user_id')=='ture')
                                            <a id="" href="{{route('ui_login')}}">Follow</a>
                                            @else
                                            <a id="follow{{$user->user_id}}" onclick="follow({{$user->user_id}})">Follow</a>
                                            @endif
                                </div>
                            </div>
                        </li>
                        <!--- CHAT CONVERSATION BOX START --->
                        <div class="msg-op msg-op-conve" id="msg-op-conve1">
                            <span class="comm-msg-pop-clo" id="comm-msg-pop-clo1"><i class="material-icons">close</i></span>

                            <div class="inn">
                                <form name="new_chat_form" id="new_chat_form1" method="post">
                                    <div class="s1">
                                        <img src="{{asset('')}}frontend/images/user/7461166x66.jpg" alt="">
                                        <h4>Hi                                            , </h4>
                                        <input type="hidden" id="chat_from_user" name="chat_from_user"
                                               value="">
                                        <input type="hidden" name="chat_to_user" value="488">
                                        <select disabled="disabled" class="chosen-select"
                                                data-id="" id="chat_to_user234"
                                                name="chat_to_user234">
                                            <option value="">Choose a User</option>
                                            <option                                                     value="494">Abhimanyu</option>
                                            <option                                                     value="492">Kasi Ratnam</option>
                                            <option                                                     value="489">OM PRAKASH</option>
                                        </select>
                                    </div>
                                    <div class="s2 chat-box-messages">
                                                                                    <span>Start A New Chat!!! Now</span>
                                                                                </div>
                                    <div class="s3">
                                        <textarea name="chat_message" id="chat_message"
                                                  placeholder="Type a message here.."
                                                  required=""></textarea>
                                        <button id="chat_send1" name="chat_send"
                                                type="submit">Send <i class="material-icons">send</i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                        <!--- END --->
                      
                        <!--- END --->
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--END-->
    
@endsection
@section('js')
<script>
    function follow(id){
       
        $.ajax({
             url:"/follower/"+id,
             type:"GET",
             success:function(data){
                
                var value=data.check;
                var ff="follow"+id;
                if(value=='follow')
                {
                    
                    document.getElementById(ff).innerHTML="Follow";
                }
                else{
                    document.getElementById(ff).innerHTML="Unfollow";
                }
             }
        });
    }
</script>
@endsection