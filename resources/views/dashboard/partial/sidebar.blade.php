<div class="main-sidebar sidebar-style-2" style="background-color: black">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            @if(auth()->user()->user_type == 'account holder')
                <a href="{{route('dashboard.ac_holder')}}" style="color:white">E-Banking</a>
            @else
                <a href="{{route('dashboard.index')}}" style="color:white">E-Banking</a>
            @endif
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
                @if(auth()->user()->user_type == 'account holder')
                    <a href="{{route('dashboard.ac_holder')}}" class="nav-link has"><i
                            class="fas fa-fire"></i><span>Dashboard</span></a>
                @else
                    <a href="{{route('dashboard.index')}}" class="nav-link has"><i
                            class="fas fa-fire"></i><span>Dashboard</span></a>
                @endif
            </li>
            @if(auth()->user()->user_type == 'employee')
                <li class="menu-header">Employee</li>
                <li class="dropdown"><a href="{{route('a_holder_request.list')}}" class="nav-link" ><i class="fas fa-columns"></i><span>Account Request</span></a></li>
                <li class="dropdown"><a href="{{route('transaction.request')}}" class="nav-link" ><i class="fas fa-columns"></i><span>Transaction Request</span></a></li>
                <li><a class="nav-link" href="{{route('customers.list')}}"><i class="far fa-user"></i> <span>Customer List</span></a></li>
                <li><a class="nav-link" href="{{route('employee.list')}}"><i class="far fa-user"></i> <span>Employee List</span></a></li>
{{--                <li><a class="nav-link" href="{{route('request.list')}}"><i class="far fa-user"></i> <span>Cheque Book Request</span></a></li>--}}
                <li class="dropdown"><a href="{{route('punch.employee')}}" class="nav-link"><i class="fas fa-th"></i><span>Punch In</span></a></li>
                <li class="dropdown"><a href="{{route('attendance.time')}}" class="nav-link"><i class="fas fa-exclamation"></i><span>Attendance List</span></a></li>
{{--                <li><a class="nav-link" href=""><i class="far fa-file-alt"></i> <span>Report</span></a></li>--}}
            @endif
            @if(auth()->user()->user_type == 'admin')
                <li class="menu-header">Admin</li>
                <li>
                    <a href="{{route('customers.list')}}" class="nav-link "><i class="fas fa-th"></i> <span>Customers List</span></a>
                </li>

                <li class="dropdown">
                    <a href="{{route('employee.list')}}" class="nav-link "><i class="fas fa-th"></i><span>Employee List</span></a>
                </li>
                <li class="dropdown">
                    <a href="{{route('employee.create')}}" class="nav-link"><i class="far fa-user"></i> <span>Add Employee</span></a>
                </li>
                <li class="dropdown">
                    <a href="{{route('bank.list')}}" class="nav-link"><i class="fas fa-th"></i> <span>Bank List</span></a>
                </li>
                <li class="dropdown">
                    <a href="{{route('branch.list')}}" class="nav-link"><i class="fas fa-th"></i> <span>E-Bank Branch List</span></a>
                </li>
{{--                <li class="dropdown">--}}
{{--                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Loan Request</span></a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li><a class="nav-link" href="">Personal Loan</a></li>--}}
{{--                        <li><a class="nav-link" href="">Business Loan</a></li>--}}
{{--                        <li><a class="nav-link" href="">Home Loan</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <li class="dropdown">
                    <a href="{{route('employee.salary')}}" class="nav-link"><i class="far fa-square"></i>
                        <span>Salary</span></a>
                </li>
                <li class="dropdown">
                    <a href="{{route('attendance.time')}}" class="nav-link"><i class="fas fa-exclamation"></i><span>Attendance List</span></a>
                </li>
{{--                <li class="dropdown">--}}
{{--                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i><span>Features</span></a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li><a class="nav-link" href="features-activities.html">Activities</a></li>--}}
{{--                        <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>--}}
{{--                        <li><a class="nav-link" href="features-posts.html">Posts</a></li>--}}
{{--                        <li><a class="nav-link" href="features-profile.html">Profile</a></li>--}}
{{--                        <li><a class="nav-link" href="features-settings.html">Settings</a></li>--}}
{{--                        <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>--}}
{{--                        <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">--}}
{{--                    <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">--}}
{{--                        <i class="fas fa-rocket"></i> Documentation--}}
{{--                    </a>--}}
{{--                </div>--}}
            @endif
            @if(auth()->user()->user_type == 'account holder')
                <li class="menu-header">My Account</li>
{{--                <li><a class="nav-link" href="{{route('deposit')}}"><i class="fas fa-th"></i> <span>Transfer/Deposit</span></a></li>--}}
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Fund Transfer</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{route('mfs.transfer')}}">MFS Transfer</a></li>
                        <li><a class="nav-link" href="{{route('own.transfer')}}">E-Bank Account(Own)</a></li>
{{--                        <li><a class="nav-link" href="{{route('other.transfer')}}">E-Bank Account(Other)</a></li>--}}
                        <li><a class="nav-link" href="{{route('single.transfer')}}">Other Bank Account</a></li>
                    </ul>
                </li>
                <li><a href="{{route('auth.profile')}}" class="nav-link"><i class="fas fa-user"></i> <span>Profile</span></a></li>
{{--                <li><a class="nav-link" href="{{route('cheque.book')}}"><i class="far fa-file-alt"></i> <span>Cheque Book Request</span></a></li>--}}
                <li><a class="nav-link" href="{{route('Customer.report')}}"><i class="far fa-file-alt"></i> <span>Report</span></a></li>
{{--                <li><a class="nav-link" href="{{ route('saved_accounts.index') }}"><i class="far fa-file-alt"></i> <span>Saved Account List</span></a></li>--}}
            @endif
        </ul>
    </aside>
</div>
