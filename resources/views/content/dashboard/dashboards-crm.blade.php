
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src=
"https://d3js.org/d3.v4.min.js"></script>
<script src=
"https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.js"></script>
<link rel="stylesheet"
      href=
"https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.css" />
<link rel=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
      type="text/css" />
 
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
</script>
 
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js">
</script>


@extends('layouts/layoutMaster')

@section('title', 'DASHBOARD')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/apex-charts/apex-charts.scss',
  'resources/assets/vendor/libs/swiper/swiper.scss',
  'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.scss'
])
@endsection

@section('page-style')
<!-- Page -->
@vite(['resources/assets/vendor/scss/pages/cards-advance.scss'])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/apex-charts/apexcharts.js',
  'resources/assets/vendor/libs/swiper/swiper.js',
  'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js',
  ])
@endsection

@section('page-script')
@vite([
  'resources/assets/js/dashboards-analytics.js'
])
@endsection

@section('content')


 <?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="coredb"; // Database name 
$tbl_name="information"; // Table name 
$conn = mysqli_connect("$host","$username","$password")or die("cannot connect"); 
mysqli_select_db($conn,"$db_name")or die("cannot select DB");
?>

     <div class="container-xxl flex-grow-1 container-p-y ">


       <div class="card-body">
         <div class="container" style="margin-top:3%;">

           <div class="row">


  <!-- Total Profit -->
  <div class="col-xl-3 col-md-4 col-6 mb-4">
    <div class="card bg-primary">
      <div class="card-body">
        <div class="badge p-2 bg-label-danger mb-2 rounded"><i class="fas fa-user-tie ti-md"></i></div>
        <h5 class="card-title mb-1 pt-2 text-white">Total Employee</h5>
        <p class="mb-2 mt-1 text-white">
          <?php
$applicants="select count(*) as total from core2_contract where status='Hired' ";
$applicantquerys=mysqli_query($conn,$applicants);
$applicantrows=mysqli_fetch_assoc($applicantquerys);
echo $applicantrows['total'];
?>
  </p>
        <div class="pt-1">
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-body bg-success">
        <div class="badge p-2 bg-label-danger mb-2 rounded"><i class="fas fa-user-tie ti-md"></i></div>
        <h5 class="card-title mb-1 pt-2 text-white">Total Applicant</h5>
        <p class="mb-2 mt-1 text-white"><?php
$applicant="select count(*) as total from core1_applicant_apply where status='Pending' ";
$applicantquery=mysqli_query($conn,$applicant);
$applicantrow=mysqli_fetch_assoc($applicantquery);
echo $applicantrow['total'];
?></p>
        <div class="pt-1">
        </div>
      </div>
    </div>
  </div>


    <div class="col-xl-3 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-body  bg-danger">
        <div class="badge p-2 bg-label-danger mb-2 rounded"><i class="fas fa-user-tie ti-md"></i></div>
        <h5 class="card-title mb-1 pt-2 text-white">JOB POSTING</h5>
        <p class="mb-2 mt-1 text-white"><?php
$jobposted="select count(*) as total from core1_recruitment where status='Posted' ";
$postedquery=mysqli_query($conn,$jobposted);
$postedrow=mysqli_fetch_assoc($postedquery);
echo $postedrow['total'];
?></p>
        <div class="pt-1">
        </div>
      </div>
    </div>
  </div>


    <div class="col-xl-3 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-body  bg-warning">
        <div class="badge p-2 bg-label-danger mb-2 rounded"><i class="fas fa-user-tie ti-md"></i></div>
        <h5 class="card-title mb-1 pt-2 text-white">NEW  HIRE</h5>
        <p class="mb-2 mt-1 text-white"><?php
$hire="select count(*) as total from core1_applicant_apply where status='Qualified' ";
$hirequery=mysqli_query($conn,$hire);
$hirerow=mysqli_fetch_assoc($hirequery);
echo $hirerow['total'];
?></p>
        <div class="pt-1">
        </div>
      </div>
    </div>
  </div>




  






</div>

</div>
</div>




<div class="row">
  <div class="col-md-6">
  </div>
   <div class="col-md-6">
  </div>
</div>








</div>

<script>
        let chart = bb.generate({
            data: {
                columns: [
                    ["Total Male", 100],
                    ["Total Female",90]
               ],
                type: "donut",
                onclick: function (d, i) {
                    console.log("onclick", d, i);
                },
                onover: function (d, i) {
                    console.log("onover", d, i);
                },
                onout: function (d, i) {
                    console.log("onout", d, i);
                },
            },
            donut: {
                title: "70",
            },
            bindto: "#donut-chart",
        });
    </script>


@endsection






