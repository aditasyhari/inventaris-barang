<nav class="navbar-custom">

    <ul class="navbar-right d-flex list-inline float-right mb-0">

        <?php
            $profile = \App\Models\Profile::where('user_id', Auth::user()->id)->first();
        ?>
        <li class="dropdown notification-list my-auto">
            <h6 class="text-white">
                @if($profile->nama == null || $profile->nama == '')
                {{ Auth::user()->email }}
                @else
                {{ $profile->nama }}
                @endif
            </h6>
        </li>
        <li class="dropdown notification-list">
            <div class="dropdown notification-list nav-pro-img">
                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                    @if($profile->foto == null || $profile->foto == '')
                    <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="user" class="rounded-circle">
                    @else
                    <img src="{{ asset('image/profile/'.$profile->foto) }}" alt="user" class="rounded-circle">
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item text-wrap">
                        <span class="text-muted text-capitalize">{{ Auth::user()->role }}</span>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/profile') }}"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>
                    <a class="dropdown-item text-danger" href="#" onclick="document.getElementById('logout-form').submit()"><i class="mdi mdi-power text-danger"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>                                                                    
            </div>
        </li>

    </ul>

    <ul class="list-inline menu-left mb-0">
        <li class="float-left">
            <button class="button-menu-mobile open-left waves-effect waves-light">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>                        
    </ul>

</nav>