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
                <a href="/doctor"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('doctor.posts.index')}}">All Posts</a>
                    </li>
                    <li>
                        <a href="{{route('doctor.posts.create')}}">Create Post</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Content Categories<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('doctor.contentcategories.index')}}">Categories</a>
                    </li>
                </ul>
            </li>


        </ul>
    </div>
</div>