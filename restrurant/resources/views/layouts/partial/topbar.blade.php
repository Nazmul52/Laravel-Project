<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">{{Auth::user()->name}}</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">



              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout').submit();" href="{{route('logout')}}">Logout</a>
                  <a class="dropdown-item" href="#">Settings</a>

                  <div class="dropdown-divider"></div>
               {{--    <a  onclick="event.preventDefault(); document.getElementById('logut').submit();" href="{{route('logout')}}">Log out</a> --}}
                  <form id="logout" action="{{route('logout')}}" method="post" style="display: none;" accept-charset="utf-8">
                    @csrf

                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>