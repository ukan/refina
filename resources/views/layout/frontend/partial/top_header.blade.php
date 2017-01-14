
    <header id="header" data-plugin-options='{"stickyEnabled": false, "stickyEnableOnBoxed": false, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "0", "stickyChangeLogo": true}'>
      <div class="header-body">
        <div class="header-container container">
          <div class="header-row">
            <div class="header-column">
              <div class="header-logo">
                <a href="{{ url('/') }}">
                  <img alt="Porto" data-sticky-width="82" data-sticky-height="40" data-sticky-top="33" class="img-responsive" src="{{ asset('assets/general/images/identity/logo.png') }}">
                  <!-- <h1>Scoido</h1> -->
                </a>
              </div>
            </div>
            <div class="header-column">

              <div class="header-row">
                <div class="header-nav">
                  <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                    <i class="fa fa-bars"></i>
                  </button>
                  <ul class="header-social-icons social-icons hidden-xs">
                    @if(getOptionValue('facebook_url') != '')
                    <li class="social-icons-facebook"><a href="{{ getOptionValue('facebook_url') }}" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    @endif
                    @if(getOptionValue('twitter_url') != '')
                    <li class="social-icons-twitter"><a href="{{ getOptionValue('twitter_url') }}" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    @endif
                    @if(getOptionValue('linkedin_url') != '')
                    <li class="social-icons-linkedin"><a href="{{ getOptionValue('linkedin_url') }}" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    @endif
                  </ul>
                  <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                    <nav>
                      <ul class="nav nav-pills" id="mainNav">
                      @foreach($menus as $menuHome)
                        @if($menuHome->display_name == 'HOME' || $menuHome->display_name == 'Home' || $menuHome->display_name == 'home')
                        <li >
                        @else
                        <li>
                        @endif
                          <a target="{{$menuHome->new_tab}}" href="http://{!! $menuHome->href !!}">
                            {!! $menuHome->display_name !!}
                          </a>
                        </li>
                      @endforeach
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>