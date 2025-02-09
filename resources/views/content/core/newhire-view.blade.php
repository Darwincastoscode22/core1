
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
         <th>Employee Name</th>
         <th>Postion</th>
         <th>Contact#</th>
         <th>Email</th>
         <th>Salary</th>
         <th>Resume</th>
        <th>Job Nature</th>
        <th>Date Hire</th>
        <th>Status</th>
          <th>Action</th>
       </tr>
          </thead>
   <tbody>
   

     
   

    </tbody>


        </table>
      </div>
    </div>
  </div>





@endsection


