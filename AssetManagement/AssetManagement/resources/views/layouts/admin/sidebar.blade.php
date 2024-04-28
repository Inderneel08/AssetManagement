<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0  fixed-start  " id="sidenav-main" style="background-color:#0c96cb;">
  {{-- border-radius-xl my-3 ms-3 --}}
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0 bg-white text-danger" href="{{ route('home') }}" target="_self">
      {{-- @if(Auth::user()->unit_id =='0') --}}
      <img src="{{asset('images/YIL LOGO.png')}}" style="min-height:50px;" class="navbar-brand-img h-100 bg-white" alt="main_logo">
      <span class="ms-1 font-weight-bold">
        DPIT
      </span>
      {{-- @else --}}
      {{-- @php $lg = getUnitLogo(Auth::user()->unit_id); @endphp --}}
      {{-- <img src="{{asset($lg)}}" style="min-height:50px;" class="navbar-brand-img h-100 bg-white" alt="main_logo"> --}}
      <span class="font-weight-bold" style="font-size:12px;">
        {{-- @php --}}
        {{-- $u = getUnitName(Auth::user()->unit_id); --}}
        {{-- @endphp --}}
        {{-- {{$u->en_unit_name}} --}}
      </span>
      {{-- @endif --}}
    </a>
  </div>
  <hr class="horizontal dark mt-2">
  <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav sidebar-menu">
      {{-- @php 
        $dash = 'Dashboard';
        $da = getSliderMenu($dash); 
      @endphp --}}
      {{-- @if($da->status =='1')
      <li class="nav-item active-li">
        <i class="fa fa-info-circle d-inline" aria-hidden="true"></i>
        <a class="nav-link  d-inline" href="{{url('home')}}">
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      @endif

      @if(!in_array(Auth::user()->user_type,['11','13','15']))
      @if(in_array(Auth::user()->user_type,['9','3']))
      @if(Auth::user()->unit_id == '0')

      @php $us = 'Units';  $uns = getSliderMenu($us); @endphp
      @if($uns->status =='1')
      <li class="nav-item">
        <i class="fa fa-info-circle d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('units')}}">
          <span class="nav-link-text ms-1">Units</span>
        </a>
      </li>
      @endif

      @php $ua = 'Users';  $usr = getSliderMenu($ua); @endphp
      @if($usr->status =='1')
      <li class="nav-item">
        <i class="fa fa-user d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('users')}}">
          <span class="nav-link-text ms-1">Users</span>
        </a>
      </li>
      @endif
      
      @if(Auth::user()->user_type == '9' && Auth::user()->unit_id == '0')
      @php $gr = 'General Reports';  $grs = getSliderMenu($gr); @endphp
      @if($grs->status =='1')
      <li class="nav-item">
      <i class="fa fa-file d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('general-reports')}}">
          <span class="nav-link-text ms-1">General Reports</span>
        </a>
      </li>
      @endif
      @endif

      @php $ql = 'Quick Links';  $qls = getSliderMenu($ql); @endphp
      @if($qls->status =='1')
      <li class="nav-item">
        <i class="fa fa-info-circle d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('quicklinks')}}">
          <span class="nav-link-text ms-1">Quick Links</span>
        </a>
      </li>
      @endif

      @php $ol = 'OL';  $ols = getSliderMenu($ol); @endphp
      @if($ols->status =='1')
      <li class="nav-item">
      <i class="fa fa-arrow-right" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('ol')}}">
          <span class="nav-link-text ms-1">OL</span>
        </a>
      </li>
      @endif

      @php $wl = 'Website Logo';  $wlo = getSliderMenu($wl); @endphp
      @if($wlo->status =='1')
      <li class="nav-item">   
      <i class="fa fa-circle-o" aria-hidden="true"></i> 
        <a class="nav-link d-inline" href="{{route('frontlogo')}}">
          <span class="nav-link-text ms-1">Website Logo</span>
        </a>
      </li>
      @endif

      @php $ts = 'Translations';  $trs = getSliderMenu($ts); @endphp
      @if($trs->status =='1')
      <li class="nav-item">
        <i class="fa fa-language d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('translation.index')}}">
          <span class="nav-link-text ms-1">Translations</span>
        </a>
      </li>
      @endif

      @php $cp = 'Custom Pages';  $cps = getSliderMenu($cp); @endphp
      @if($cps->status =='1')
      <li class="nav-item">
        <i class="fa fa-file d-inline"></i>
        <a class="nav-link d-inline" href="{{route('page.index')}}">
          <span class="nav-link-text ms-1">Custom Pages</span>
        </a>
      </li>
      @endif
      @endif
    
      
      @if(in_array(Auth::user()->user_type,['9']) && Auth::user()->unit_id =='0')
      @php $ar = 'Admin Reports';  $ars = getSliderMenu($ar); @endphp
      @if($ars->status =='1')     
      <li class="nav-item">
        <i class="fa fa-file d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('admin-reports')}}">
          <span class="nav-link-text ms-1">Reports</span>
        </a>
      </li>
      @endif
      @endif

      @if(Auth::user()->user_type == '9' && Auth::user()->unit_id == '0')
      <li class="nav-item">
      <i class="fa fa-user-cog d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('control-manager')}}">
          <span class="nav-link-text ms-1">Control Manager</span>
        </a>
      </li>
      @endif
      @endif

      @php $si = 'Slider Images';  $sis = getSliderMenu($si); @endphp
      @if($sis->status =='1') 
      <li class="nav-item">
        <i class="fa fa-picture-o d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('unit-website',[Crypt::encrypt('website_slider_images'),Crypt::encrypt('0')])}}">
          <span class="nav-link-text ms-1">Slider Images</span>
        </a>
      </li>
      @endif

      @php $au = 'About Us';  $abu = getSliderMenu($au); @endphp
      @if($abu->status =='1') 
      <li class="nav-item">
        <i class="fa fa-file-text d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('unit-website',[Crypt::encrypt('unit_websites'),Crypt::encrypt('0')])}}">
          <span class="nav-link-text ms-1">About Us</span>
        </a>
      </li>
      @endif

      @php $cu = 'Contact Us';  $cus = getSliderMenu($cu); @endphp
      @if($cus->status =='1')
      <li class="nav-item">
        <i class="fa fa-address-book d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('unit-website',[Crypt::encrypt('unit_website_contact'),Crypt::encrypt('0')])}}">
          <span class="nav-link-text ms-1">Contact Us</span>
        </a>
      </li>
      @endif

      @php $ps = 'Products';  $pss = getSliderMenu($ps); @endphp
      @if($pss->status =='1')
      <li class="nav-item">
        <i class="fa fa-product-hunt d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('unit-website',[Crypt::encrypt('product'),Crypt::encrypt('0')])}}">
          <span class="nav-link-text ms-1">Products</span>
        </a>
      </li>
      @endif

      
      @if(Auth::user()->unit_id =='0')
      @php $cm = 'CMD Message';  $cmd = getSliderMenu($cm); @endphp
      @if($cmd->status =='1')
      <li class="nav-item">
        <i class="fa fa-info-circle d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('unit-website',[Crypt::encrypt('cmd_msg'),Crypt::encrypt('0')])}}">
        <span class="nav-link-text ms-1">CMD Message</span>
        </a>
      </li>
      @endif

      @php $mr = 'Media Releases';  $mrs = getSliderMenu($mr); @endphp
      @if($mrs->status =='1')
      <li class="nav-item">
        <i class="fa fa-medium d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('unit-website',[Crypt::encrypt('media_releases'),Crypt::encrypt('0')])}}">
          <span class="nav-link-text ms-1">Media Releases</span>
        </a>
      </li>
      @endif

      @php $ww = "What's New";  $wwn = getSliderMenu($ww); @endphp
      @if($wwn->status =='1')
      <li class="nav-item">
        <i class="fa fa-newspaper-o d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('unit-website',[Crypt::encrypt('whats_news'),Crypt::encrypt('0')])}}">
          <span class="nav-link-text ms-1">What's New</span>
        </a>
      </li>
      @endif

      @php $aa = 'Awards & Achievements';  $aaa = getSliderMenu($aa); @endphp
      @if($aaa->status =='1')
      <li class="nav-item">
        <i class="fa fa-trophy d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('unit-website',[Crypt::encrypt('award_achievements'),Crypt::encrypt('0')])}}">
          <span class="nav-link-text ms-1">Awards & Achievements</span>
        </a>
      </li>
      @endif

      @php $mil = 'Milestones';  $mils = getSliderMenu($mil); @endphp
      @if($mils->status =='1')
      <li class="nav-item">
        <i class="fa fa-road d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('unit-website',[Crypt::encrypt('milestones'),Crypt::encrypt('0')])}}">
          <span class="nav-link-text ms-1">Milestones</span>
        </a>
      </li>
      @endif

      @php $pg = 'Photo Gallery';  $phg = getSliderMenu($pg); @endphp
      @if($phg->status =='1')
      <li class="nav-item">
        <i class="fa fa-picture-o" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('gallary')}}">
          <span class="nav-link-text ms-1">Photo Gallery</span>
        </a>
      </li>
      @endif

      @php $wsw = "Who's who";  $whsw = getSliderMenu($wsw); @endphp
      @if($whsw->status =='1')
      <li class="nav-item">
        <i class="fa fa-users d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('unit-website',[Crypt::encrypt('whois'),Crypt::encrypt('0')])}}">
          <span class="nav-link-text ms-1">Who's who</span>
        </a>
      </li>
      @endif
      @endif
      
      @if(Auth::user()->unit_id !='0') 
      @php $mf = 'Manufacture Facility';  $mfs = getSliderMenu($mf); @endphp
      @if($mfs->status =='1')     
      <li class="nav-item">
        <i class="fa fa-info-circle d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('unit-website',[Crypt::encrypt('manu'),Crypt::encrypt('0')])}}">
          <span class="nav-link-text ms-1">Manufacture Facility</span>
        </a>
      </li>
      @endif
      @endif

      @php $pia = 'PIOs Under RTI Act';  $piua = getSliderMenu($pia); $md = 'Mandatory Disclosures';  $mds = getSliderMenu($md); @endphp
      @if($piua->status =='1' || $mds->status =='1') 
      <li class="nav-item">
        <i class="fa fa-check-circle  d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('rti')}}">
          <span class="nav-link-text ms-1">RTI</span>
        </a>
      </li>
      @endif

      @php $ten = 'Tenders';  $tend = getSliderMenu($ten); @endphp
      @if($tend->status =='1') 
      <li class="nav-item">
        <i class="fa fa-gavel d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('tender')}}">
          <span class="nav-link-text ms-1">Tenders</span>
        </a>
      </li>
      @endif

      @php $car = 'Careers';  $cars = getSliderMenu($car); @endphp
      @if($cars->status =='1') 
      <li class="nav-item">
        <i class="fa fa-tasks d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('career')}}">
          <span class="nav-link-text ms-1">Careers</span>
        </a>
      </li>
      @endif

      @php $do = 'Downloads';  $dos = getSliderMenu($do); @endphp
      @if($dos->status =='1') 
      <li class="nav-item">
        <i class="fa fa-download d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('download')}}">
          <span class="nav-link-text ms-1">Downloads</span>
        </a>
      </li>
      @endif

      @php $el = 'E-Library';  $els = getSliderMenu($el); @endphp
      @if($els->status =='1') 
      <li class="nav-item">
        <i class="fa fa-info-circle d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('library')}}">
          <span class="nav-link-text ms-1">E-Library</span>
        </a>
      </li>
      @endif

      @if(checkstatusreportassignedbyuserid(Auth::user()->id) !='0' || checkstatusdynamicreportassignedbyuserid(Auth::user()->id) !='0')
      @php $ars = 'Admin Reports';  $adrs = getSliderMenu($ars); @endphp
      @if($adrs->status =='1') 
      <li class="nav-item">
        <i class="fa fa-file d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('admin-reports')}}">
          <span class="nav-link-text ms-1">Reports</span>
        </a>
      </li>
      @endif
      @endif


      @else
      @if((checkstatusreportassignedbyuserid(Auth::user()->id !='0')) ||(Auth::user()->user_type == 9))
      @php $ads = 'Admin Reports';  $admrs = getSliderMenu($ads); @endphp
      @if($admrs->status =='1')
      <li class="nav-item">
        <i class="fa fa-file d-inline" aria-hidden="true"></i>
        <a class="nav-link d-inline" href="{{route('admin-reports')}}">
          <span class="nav-link-text ms-1">Reports</span>
        </a>
      </li>
      @endif
      @endif

      @endif

      @php $rb = 'Recycle Bin';  $rbs = getSliderMenu($rb); @endphp
      @if($rbs->status =='1')
      <li class="nav-item">
        <i class="fa fa-trash d-inline" aria-hidden="true"></i>
          <a class="nav-link d-inline" href="{{route('recycle-bin')}}">
            <span class="nav-link-text ms-1">Recycle Bin</span>
          </a>
      </li>
      @endif

      @php $rb = 'Change Password';  $rbs = getSliderMenu($rb); @endphp
      @if($rbs->status =='1')
      <li class="nav-item">
        <i class="fa fa-user-lock d-inline" aria-hidden="true"></i>
          <a class="nav-link d-inline" href="{{route('change-password')}}">
            <span class="nav-link-text ms-1">Change Password</span>
          </a>
      </li>
      @endif --}}

      <li class="nav-item">
        <i class="fas fa-book-open d-inline" aria-hidden="true"></i>
          <a class="nav-link d-inline" href="{{ route('home') }}">
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
      </li>

      @if(session('role')==='ADMIN')
        <li class="nav-item">
          <i class="fas fa-desktop d-inline" aria-hidden="true"></i>
            <a class="nav-link d-inline" href="{{ route('list_assets') }}">
              <span class="nav-link-text ms-1">Asset Register</span>
            </a>
        </li>

        <li class="nav-item">
          <i class="fas fa-user" aria-hidden="true"></i>
            <a class="nav-link d-inline" href="{{ route('list_users') }}">
              <span class="nav-link-text ms-1">User Register</span>
            </a>
        </li>

        <li class="nav-item">
          <i class="fas fa-keyboard" aria-hidden="true"></i>
            <a class="nav-link d-inline" href="{{ route('list_consumables') }}">
              <span class="nav-link-text ms-1">Consumable Register</span>
            </a>
        </li>

        <li class="nav-item">
          <i class="fas fa-bell d-inline" aria-hidden="true" id="bell-icon" style="@isset($total_difference)  @if($total_difference<0) color:red; @endif @endisset "></i>
            <a class="nav-link d-inline" href="{{ route('allIssues') }}">
              <span class="nav-link-text ms-1">Complaints</span>
            </a>
        </li>

      @endif
      
      @if(session('role')==='USER')
      <li class="nav-item">
        <i class="fas fa-question-circle d-inline" aria-hidden="true"></i>
          <a class="nav-link d-inline" href="{{ route('raise_request') }}">
            <span class="nav-link-text ms-1">Raise a request</span>
          </a>
      </li>
      @endif

      
      <li class="nav-item">
        <i class="fas fa-lock" aria-hidden="true"></i>
          <a class="nav-link d-inline" href="{{ route('changePassword') }}">
            <span class="nav-link-text ms-1">Change Password</span>
          </a>
      </li>

      <li class="nav-item">
        <i class="fa fa-sign-out" aria-hidden="true"></i>
        <form action="{{route('logout')}}" method="POST" id="logout-form" class="d-inline">
          @csrf
          {{-- <a href="{{route('unit-website')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> --}}

            <span class="nav-link-text ms-1" style="cursor: pointer;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              {{-- @auth --}}
              Logout
              {{-- @endauth --}}
            </span>
          {{-- </a> --}}
        </form>
      </li>

    </ul>
  </div>
</aside>