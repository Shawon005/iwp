@extends('ui.old-ui.master.master')
@section('content')
<div class="ud-main">
   <div class="ud-main-inn ud-no-rhs">
    <div class="ud-cen">
        <div class="log-bor">&nbsp;</div>
        <span class="udb-inst">All Applicants Profile</span>
                <div class="ud-cen-s2">
            <h2></h2>
            <!--            <a href="#" class="db-tit-btn">--><!--</a>-->
            <p>Job : {{Nam('vv_jobs','job_id',$id,'job_title')}}</p>
            <table class="responsive-table bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Applicant Name</th>
                    <th>Mobile</th>
                    <th>Email Id</th>
                    <th>Applied Date</th>
                    <th>Delete</th>
                    <th>Preview</th>
                </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                @foreach($jobs as $user)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{Nam('vv_job_profile','job_profile_id',$user->job_profile_id,'profile_name')}}</td>
                        <td>{{Nam('vv_users','user_id',Nam('vv_job_profile','job_profile_id',$user->job_profile_id,'user_id'),'mobile_number')}}</td>
                        <td>{{Nam('vv_users','user_id',Nam('vv_job_profile','job_profile_id',$user->job_profile_id,'user_id'),'email_id')}}</td>
                        <td>{{$user->job_applied_cdt}}</td>
                        <td><a href="{{route('all-applied-delete',['id'=>$user->job_applied_id])}}" class="db-list-edit"><span class="material-icons">delete</span></a></td>
                        <td><a href="{{route('user-job-profile',['id'=>$user->job_user_id])}}" target="_blank" class="db-list-edit"
                               title="View user profile page"><span
                                    class="material-icons">visibility</span></a></td>
                    </tr>
                    @endforeach
                                    </tbody>
            </table>
        </div>
    </div>
    </div>
   
@endsection