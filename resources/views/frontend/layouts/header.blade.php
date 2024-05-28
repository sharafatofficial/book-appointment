<header class="navigation fixed-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-white">
      <a class="navbar-brand order-1" href="{{url('/home')}}">
        <img class="img-fluid" width="100px" src="{{ asset('frontend/images/logo.png')}}"
          alt="Reader | Hugo Personal Blog Template">
      </a>
      <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
        
        <ul class="navbar-nav mx-auto">

          <li class="nav-item">
            <a class="nav-link" href="{{url('/home')}}">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">Appointment<i class="ti-angle-down ml-1"></i>
            </a>
            <div class="dropdown-menu">
              
              <a class="dropdown-item" href="{{url('appoint_payment')}}">Panding Payment</a>
              
              <a class="dropdown-item" href="{{url('panding_appointment')}}">Panding Appointment</a>

              <a class="dropdown-item" href="{{url('history')}}">History</a>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Privacy Policy</a>
          </li>
 

        </ul>
      </div>

      <div class="order-2 order-lg-3 d-flex align-items-center">


       
          <div class="nav-item">
              <a class="btn btn-primary" href="{{url('logout')}}">Logout</a>
            </div>
      
        <!-- search -->
        <!-- <form class="search-bar">
          <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
        </form>
        
        <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse" data-target="#navigation">
          <i class="ti-menu"></i>
        </button> -->
      </div>

    </nav>
  </div>
</header>