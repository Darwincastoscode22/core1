

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('css/price_rangs.css') }}">
<link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">
<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">




@extends('layouts/layoutMaster')




</style>
@section('content')


<style type="text/css">

  body{
    background-color:white;
  }
</style>



<!-- Preloader Start -->

<!-- Preloader Start -->
<header>
  <!-- Header Start -->
  <div class="header-area header-transparrent">
   <div class="headder-top header-sticky">
    <div class="container">
      <div class="row align-items-center">
        <div class=" col-md-2">
          <!-- Logo -->
          <div class="logo">
            <a href="{{url('/')}}"><img src="assets/img/logo/logo.png" alt=""></a>
          </div>  
        </div>
        <div class=" col-md-9">
          <div class="menu-wrapper">
            <!-- Main-menu -->
            <div class="main-menu">
              <nav class="d-none d-lg-block">
                <ul id="navigation">
                  <li><a href="{{url('/')}}">Home</a></li>
                  <li><a href="#findjob">Find a Jobs </a></li>
                  <li><a href="about.html">About</a></li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
              </nav>
            </div>          
            <!-- Header-btn -->
            <div class="header-btn d-none f-right d-lg-block">
             
             <?php   if (Auth::user()) {?>
              <a href="{{url('applicant-profile')}}" class="btn btn-primary">Profile Account</a>
              <a href="{{ route('logout') }}" class="btn btn-primary"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

              <form method="POST" id="logout-form" action="{{ route('logout') }}">
                @csrf
              </form>

            <?php } else {?>
              <a href="{{url('signup')}}" class="btn btn-primary">Register</a>
              <a href="#" class="btn btn-primary" id="login">Login</a>
              
            <?php  }?>
          </div>
        </div>
      </div>
      <!-- Mobile Menu -->
      <div class="col-12">
        <div class="mobile_menu d-block d-lg-none"></div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Header End -->
</header>


<main>

  <!-- slider Area Start-->
  
  <!-- slider Area End-->
  <div class="container-xxl flex-grow-1 container-p-y">

    <div id="content">

      <?php foreach($profiles as $prof){ ?>

        <section>
          <div class="container py-5">
            <div class="row">
              <div class="col-lg-4">
                <div class="card mb-4">
                  <div class="card-body text-center">
                    <img src="{{ asset('assets/img/'.$prof->image) }}" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;height:150px;">
                    <h5 class="my-3"></h5>
                    <p class="text-muted mb-1"></p>
                    <p class="text-muted mb-4"></p>
                    <div class="d-flex justify-content-center mb-2">
                      <button type="button" id="open_profile" class="btn btn-primary" style="width:100%;">UPDATE PROFILE</button>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                      <button type="button" data-mdb-button-init data-mdb-ripple-init  class="btn btn-primary" style="width:100%;" id="edit_profile">UPDATE INFO</button>
                    </div>


                    <?php $r=$prof->resume;
                    if(empty($r)){?>

                      <div class="d-flex justify-content-center mb-2">
                       
                        <button type="button" data-mdb-button-init data-mdb-ripple-init  class="btn btn-primary" style="width:100%;" id="open_resume">UPLOAD RESUME</button>
                      </div>

                    <?php }else{?>
                      <div class="d-flex justify-content-center mb-2">
                        <button type="button" data-mdb-button-init data-mdb-ripple-init  class="btn btn-primary" style="width:100%;" id="open_resume">UPDATE RESUME</button>
                      </div>
                    <?php }


                    ?>
                    


                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Full Name:</p>
                      </div>
                      <div class="col-sm-9">

                        <p class="text-muted mb-0">


                         <?php echo  $prof->firstname ?>   <?php echo  $prof->middlename ?>   <?php echo  $prof->lastname ?>

                       </p>
                     </div>
                   </div>
                   <hr>
                   <div class="row ">
                    <div class="col-sm-3">
                      <p class="mb-0">Gender:</p>
                    </div>
                    <div class="col-sm-9">
                     <p class="text-muted mb-0">{{$prof->gender}}</p>
                   </div>
                 </div>
                 <hr>

                 <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Age:</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{$prof->age}}</p>
                  </div>
                </div>
                <hr>


                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Civil Status:</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{$prof->civil_status}}</p>
                  </div>
                </div>
                <hr>


                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Address:</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{$prof->address}}</p>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Contact:</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{$prof->contact}}</p>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email:</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{$prof->email}}</p>
                  </div>
                </div>
                <hr>

                


                
              </div>
            </div>




          </div>
        </div>
      </div>
    </section>

    <div class="modal" tabindex="-1" role="dialog" id="login_modal">
      <div class="modal-dialog" role="document">
       <form method="POST"   action="{{route('jobportal.storeImage')}}" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" style="text-align:center;">UPLOAD PROFILE PICTURE</h5>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Upload Profile</label>
              <input  type="file" class="form-control" name="image">
            </div>

            <input  type="text" class="form-control" name="applicant_id" value="{{$prof->applicant_id}}"style="display:none;">

            <div class="modal-footer">
              <button type="submit" name="submit" class="btn btn-primary">SAVE</button>
              <button type="button" class="btn btn-danger" id="modal_close">Close</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>





  <div class="modal" tabindex="-1" role="dialog" id="resume_modal">
    <div class="modal-dialog" role="document">
     <form method="POST"   action="{{route('resume.storefile')}}" enctype="multipart/form-data">
      @csrf
      @method('POST')

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" style="text-align:center;">UPLOAD RESUME</h5>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Upload Profile</label>
            <input  type="file" class="form-control" name="resume">
          </div>

          <input  type="text" class="form-control" name="applicant_id" value="{{$prof->applicant_id}}"style="display:none;">

          <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-primary">SAVE</button>
            <button type="button" class="btn btn-danger" id="modal_close">Close</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>













<div class="modal" tabindex="-1" role="dialog" id="profile_modal">
  <div class="modal-dialog" role="document">
   <form method="POST"   action="{{route('jobportal.storeImage')}}" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" style="text-align:center;">UPDATE ACCOUNT DETAIL</h5>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>First Name</label>
          <input  type="text" class="form-control" name="first" value="  <?php echo  $prof->firstname ?>" required>
        </div>

        <div class="form-group">
          <label>Middle Name</label>
          <input  type="text" class="form-control" name="middle" value="  <?php echo  $prof->middlename?> ">
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input  type="text" class="form-control" name="last" value="  <?php echo  $prof->lastname?> ">
        </div>
        <div class="form-group">
          <label>Age</label>
          <input  type="text" class="form-control" name="age" value="<?php echo  $prof->age ?> ">
        </div>
        <div class="form-group">
          <label>Gender</label>
          <select class="form-control" name="gender" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;">
            <option>FEMALE</option>
            <option>MALE</option>

          </select>
        </div>
        <div class="form-group">
          <label>Address</label>
          <input  type="text" class="form-control" name="address" value="  <?php echo  $prof->address?> ">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input  type="email" class="form-control" name="email" value="  <?php echo  $prof->email ?> ">
        </div>
        <div class="form-group">
          <label>Contact</label>
          <input  type="number" class="form-control" name="contact" value="  <?php echo  $prof->contact ?> ">
        </div>
        <div class="form-group">
          <label>Civil Status</label>
          <select class="form-control" name="civil_status" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;">
            <option>MARRIED</option>
            <option>SINGLE</option>
          </select>
        </div>
        <input  type="text" class="form-control" name="applicant_id" value="{{$prof->applicant_id}}"style="display:none;">

        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-primary">SAVE</button>
          <button type="button" class="btn btn-danger" id="applicant_close">Close</button>
        </div>
      </div>
    </div>
  </form>
</div>
</div>




<?php }?>

</div>


</div>



</main>
<footer>
  <!-- Footer Start-->
  <div class="footer-area footer-bg footer-padding">
    <div class="container">
      <div class="row d-flex justify-content-between">
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
         <div class="single-footer-caption mb-50">
           <div class="single-footer-caption mb-30">
             <div class="footer-tittle">
               <h4>About Us</h4>
               <div class="footer-pera">
                 <p>Welcome to COMPANY, your one-stop destination for finding the best job opportunities. Whether you're an employer looking for talented candidates or a job seeker searching for your dream job, we've got you covered. Explore a wide range of job listings in various industries and take the next step in your career with us</p>
               </div>
             </div>
           </div>

         </div>
       </div>
       <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
        <div class="single-footer-caption mb-50">
          <div class="footer-tittle">
            <h4>Contact Info</h4>
            <ul>
              <li>
                <p>Address :Your address goes
                here, your demo address.</p>
              </li>
              <li><a href="#">Phone : +8880 44338899</a></li>
              <li><a href="#">Email : info@colorlib.com</a></li>
            </ul>
          </div>

        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
        <div class="single-footer-caption mb-50">
          <div class="footer-tittle">
            <h4>Important Link</h4>
            <ul>
              <li><a href="#"> View Project</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Testimonial</a></li>
              <li><a href="#">Proparties</a></li>
              <li><a href="#">Support</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
        <div class="single-footer-caption mb-50">
          <div class="footer-tittle">
            <h4>Newsletter</h4>
            <div class="footer-pera footer-pera2">
             <p>Heaven fruitful doesn't over lesser in days. Appear creeping.</p>
           </div>
           <!-- Form -->
           
         </div>
       </div>
     </div>
   </div>
   <!--  -->
   


 </div>
</div>

</footer>


















<!-- All JS Custom Plugins Link Here -->
<script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- jQuery, Popper, Bootstrap -->
<script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- jQuery Mobile Menu -->
<script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
<!-- jQuery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/animated.headline.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
<!-- Scrollup, nice-select, sticky -->
<script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/jquery.sticky.js') }}"></script>
<!-- contact js -->
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/mail-script.js') }}"></script>
<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<!-- jQuery Plugins, main jQuery -->
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
@endsection




<script >
  $(document).on('click', '#open_profile', function () {
    $('#login_modal').modal('show');
  });
  $(document).on('click', '#modal_close', function () {
    $('#login_modal').modal('hide');
  });
</script>



<script >
  $(document).on('click', '#open_resume', function () {
    $('#resume_modal').modal('show');
  });
  $(document).on('click', '#modal_close_resume', function () {
    $('#resume_modal').modal('hide');
  });
</script>



<script >
  $(document).on('click', '#edit_profile', function () {
    $('#profile_modal').modal('show');
  });
  $(document).on('click', '#applicant_close', function () {
    $('#profile_modal').modal('hide');
  });
</script>






