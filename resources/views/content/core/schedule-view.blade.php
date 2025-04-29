<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@extends('layouts/layoutMaster')
@section('title', 'Performance')
@section('vendor-style')
@vite([
'resources/assets/vendor/libs/jkanban/jkanban.scss',
'resources/assets/vendor/libs/select2/select2.scss',
'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
'resources/assets/vendor/libs/quill/typography.scss',
'resources/assets/vendor/libs/quill/katex.scss',
'resources/assets/vendor/libs/quill/editor.scss'
])
@endsection

@section('page-style')
@vite('resources/assets/vendor/scss/pages/app-kanban.scss')
@endsection

@section('vendor-script')
@vite([
'resources/assets/vendor/libs/moment/moment.js',
'resources/assets/vendor/libs/flatpickr/flatpickr.js',
'resources/assets/vendor/libs/select2/select2.js',
'resources/assets/vendor/libs/jkanban/jkanban.js',
'resources/assets/vendor/libs/quill/katex.js',
'resources/assets/vendor/libs/quill/quill.js'
])
@endsection
@section('page-script')
@vite('resources/assets/js/app-kanban.js')
@endsection
@section('content')

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">APPLICANT SCHEDULE EXAM</h4>
                <button class="btn btn-flat bg-primary btn-sm   mb-3" style="font-size:15px;color:white" id="openmodal"><i class="fas fa-plus-square" id="openmodal"></i>INSERT RECORD</button>     
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search "  autocomplete="off" style="position:relative;top:-5px;">
                  <div class="input-group">
                    <input type="text"  id="myInput" onkeyup="myFunction()" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" style="height:30px" >
                    <div class="input-group-append">
                      <button class="btn  btn-primary" type="button" style="height:30px;font-size:15px;color:white">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-datatable table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>APPLICANT ID</th>
                    <th>APPLICANT Name</th>
                    <th>SCHEDULE FOR EXAM</th>
                </tr>
            </thead>
            <tbody id="performanceTableBody">
                 @foreach($schedule as  $inter)
                 <tr>
                       <td>{{$inter->applicant_code}}</td> 
                  <td>{{$inter->firstname}} {{$inter->lastname}}</td> 
                  <td>{{$inter->exam_date}}</td>                       
                 </tr>
               
                 @endforeach 
            </tbody>
        </table>
    </div>
</div>
</div>

<!-- Modal for insert  record  exam applicant -->
<div class="modal" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>APPLICANT SCHEDULE EXAM </h5>
            </div>
            <div class="modal-body">
                <?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="coredb"; // Database name 
$tbl_name="information"; // Table name 
$conn = mysqli_connect("$host","$username","$password")or die("cannot connect"); 
mysqli_select_db($conn,"$db_name")or die("cannot select DB");
?>
<div class="col-md-12" style="margin-bottom:5%;">
    <div class="form-group">
      <p>EMPLOYEE ID</p>
      <input type="text" name="" placeholder="EMPLOYEE ID  OR EMPLOYEE NAME" class="form-control">
  </div>

  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>APPLICANT ID</th>
          <th>APPLICANT NAME</th>
          <th>JOBROLE</th>
          <th>ACTION</th>
      </tr>
  </thead>
  <?php 
  $selet ="SELECT *,core1_applicant_apply.status as  applystatus FROM `core1_applicant_apply`  inner  JOIN core1_applicant on  core1_applicant.applicant_code=core1_applicant_apply.applicant_id INNER JOIN core1_recruitment on core1_recruitment.recruitment_id=core1_applicant_apply.recruitment_id where core1_applicant_apply.status='Pending'";
  $query=mysqli_query($conn,$selet);
  ?> 
  <tbody>
    <?php while($row=mysqli_fetch_assoc($query)){?>
        <tr>
            <td><?php echo  $row['applicant_code']?></td>
            <td><?php echo  $row['firstname']?> <?php echo  $row['lastname']?></td>
            <td><?php echo $row['jobrole']?></td>
            <td><button class="btn btn-primary btn-sm  btn-flat" id="add">ADD</button></td>
        </tr>
    <?php }?>
</tbody>
</table>
<form method="POST" action="{{url('scheduleview')}}">
 @csrf
 @method('POST')
 <div class="row" style="margin-top:5%;">
    <div class=" col-md-6"><label>APPLICANT ID</label>
        <input type="text" class="form-control" id="empid"  name="empid">

    </div>

    <div class=" col-md-6"><label>APPLICANT NAME</label>
        <input type="text" class="form-control" id="fname" disabled>
    </div>
</div>

<div class="form-group">
    <label>SCHEDULE FOR EXAM</label>
    <input type="date" name="interview" class="form-control">
</div>



<div class="modal-footer">
    <button type="button" class="btn btn-secondary" id="modalclose">Close</button>
    <button type="submit" class="btn btn-primary" >Save</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>






@endsection


<script>
    $(document).on('click', '#modalclose', function () {
      $('#reviewModal').hide();
  });
    $(document).on('click', '#openmodal', function () {
      $('#reviewModal').show();
  });



    $(document).on('click', '#updatedataclose', function () {
      $('#updatemodal').hide();
  });
    $(document).on('click', '#add', function () {
       $('form')[0].reset();
       var tr = $(this).closest("tr").find('td');
       $('#empid').val(tr.eq(0).text());
       $('#fname').val(tr.eq(1).text());
       $('#fname').val(tr.eq(1).text());
   });
</script>



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