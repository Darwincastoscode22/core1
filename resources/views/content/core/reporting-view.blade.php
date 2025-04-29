
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



@extends('layouts/layoutMaster')
@section('title', 'APPLICANT MANAGEMENT')
@section('vendor-style')
@vite('resources/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.scss')
@endsection

@section('page-style')
@vite('resources/assets/vendor/scss/pages/app-chat.scss')
@endsection

@section('vendor-script')
@vite('resources/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js')
@endsection
@section('page-script')
@vite('resources/assets/js/app-chat.js')
@endsection
@section('content')
<div class="">
  <div class="card">

    <div style="display:flex;margin-bottom:3%;">
      <form class=" mt-3 ml-3 mw-100 navbar-search"  style="margin-left:7px" autocomplete="off">
        <div class="input-group">
          <input type="text"  id="myInput" onkeyup="myFunction()" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" >
          <div class="input-group-append">
            <button class="btn btn-primary" type="button" style="height:40px;">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>

    <div class="card-datatable table-responsive">
      <table class="datatables-projects table border-top">
        <thead>
          <tr>
           <th>Applicant Name</th>
           <th>Postion</th>
           <th>Contact Number</th>
           <th>Email</th>
           <th>Date Apply</th>
           <th>Salary</th>
           <th>Resume</th>
           <th>Job Nature</th>
           <th>Status</th>
         </tr>
       </thead>
       <tbody>
        @foreach($applicant as $row)
        <tr class="contents">
         <td>{{$row->firstname}} {{ $row->lastname}}</td>
         <td class="titles">{{ $row->jobrole}}</td>
         <td>{{$row->contact}}</td>
         <td>{{$row->email}}</td>
         <td>{{$row->created_at}}</td>
         <td>{{$row->salary}}</td>
         <td><button class="btn  btn-sm btn-flat btn-primary"><a href="http://127.0.0.1:8000/assets/img/<?php echo $row->resume;?>" style="color:white;">Download</a></button></td>
         <td>{{ $row->job_nature}}</td>
         <td>     <?php if($row->applystatus=='Pending'){?>
                                   <span class="badge bg-danger">{{$row->applystatus}}</span>
                               <?php }else if($row->applystatus=='Approved'){?>
                                  <span class="badge bg-primary">{{$row->applystatus}}</span>
                              <?php }else if($row->applystatus=='Reject'){?>
                                  <span class="badge bg-danger">{{$row->applystatus}}</span>
                              <?php }else if($row->applystatus=='Failed'){?>
                                  <span class="badge bg-danger">{{$row->applystatus}}</span>
                              <?php }else{?>
                               <span class="badge bg-success">{{$row->applystatus}}</span>
        
<?php }?>

       </tr>
       @endforeach
     </tbody>
   </table>
 </div>
</div>
</div>
@endsection



<script type="text/javascript">


 $(document).ready(function(){
  $('#myInput').keyup(function(){
// Search text
    var text = $(this).val();
// Hide all content class element
    $('.contents').hide();

// Search 
    $('.contents .titles:contains("'+text+'")').closest('.contents').show();
  });

});




</script>

