<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                </div>
            </li>
            <li>
                <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            <li>
                <a href=""><i class="fa fa-wrench fa-fw"></i>Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin.users.index')}}">All User</a>
                    </li>

                    <li>
                        <a href="{{route('admin.users.create')}}">Create User</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin.posts.index')}}">All Posts</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Patient Categories<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin.patientcategories.index')}}">All Categories</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Invites<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin.invite.index')}}">Create New Invitation</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Data Request<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin.request.fields')}}">Create Fields</a>
                    </li>
                    <li>
                        <a href="{{route('admin.request.requests')}}">Create New Request</a>
                    </li>
                    <li>
                        <a href="">All Requests</a>
                    </li>

                </ul>
            </li> 
        </ul>
    </div>
</div>