
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background-color: orange;">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo mr-2" href="index.html"><img src="/img/logo.png" class="mr-2" alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="/img/bawaslu2.png" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown" style="color: white">
                Selamat Datang, {{ auth()->user()->nama }}
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item">
                      <form method="POST" action="/logout/user">
                          @csrf
                          <button class="btn btn-default btn-sm"> <i class="ti-power-off text-primary"></i> Log Out</button>
                      </form>
                  </a>
              </div>
          </li>
      </ul>
  </div>
</nav>



{{-- <nav class="navbar navbar-expand-lg ">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <x-dropdown-link :href="route('logout')"
                      onclick="event.preventDefault();
                                  this.closest('form').submit();">
                  {{ __('Log Out') }}
              </x-dropdown-link>
          </form>
            
           </form> 
          </ul>
        </div>
    
    </div>
  </nav>
{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
            
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-box-arrow-right">Keluar</a>
                  </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Selamat Datang, {{ auth()->user()->nama }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">My Dasboard</a>
                        <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i>Keluar</a>
                    </div>
                  </li>
                
                
            </ul>
        </div>
    </div>

</nav> --}}

{{-- <div class="primary_header_2_wrapper mt-4">

    <div class="container bizberg-flex-container">
        <center>
            <div class="primary_header_2">
                <img src="/img/logo.png" alt="bawaslu" width="200">
        </center>

    </div>
</div> --}}
 
