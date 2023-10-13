<div class="profile-widget-header">
    @if(auth()->user()->images != [] &&  @is_file_exists(auth()->user()->images['image_128x128'],auth()->user()->images['storage']))
        <img alt="{{auth()->user()->user_name}}" src="{{get_media(auth()->user()->images['image_128x128'],auth()->user()->images['storage'])}}" class="rounded-circle profile-widget-picture">
    @else
        <img alt="{{auth()->user()->user_name}}" src="{{static_asset('images/default/user.jpg')}}" class="rounded-circle profile-widget-picture">
    @endif
    <div class="profile-widget-items">
        <div class="profile-widget-item">
            <div class="profile-widget-item-value">{{auth()->user()->user_name }}</div>
            <div class="profile-widget-item-label">{{auth()->user()->email }}</div>
        </div>
    </div>
</div>
<div class="card-footer text-left">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link @yield('profile')" href="{{ auth()->user()->user_type == 'seller' ? route('seller.profile') : route('admin.profile') }}"><i class="bx bx-user"></i>Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('login-activity')" href="{{auth()->user()->user_type == 'seller' ? route('seller.login.activity') : route('admin.login.activity') }}"><i class='bx bx-file'></i>Login Activities</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('password-change')" href="{{auth()->user()->user_type == 'seller' ? route('seller.password.change') : route('admin.password.change') }}"><i class='bx bxs-key'></i>Change Password</a>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0);" onclick="logout_user_devices('/logout-other-devices', '')" class="nav-link" id="setting-tab"><i class='bx bx-log-out'></i>Logout From Other Devices</a>
        </li>
    </ul>
</div>
