<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            @role('doctor')
            <li>
                <a href="/doctor"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('doctor.publications.index')}}">All Posts</a>
                    </li>
                    <li>
                        <a href="{{route('doctor.publications.create')}}">Create Post</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Patient Categories<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('doctor.patientcategories.index')}}">All Categories</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Content Categories<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('doctor.publicationcategories.index')}}">All Categories</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Data Request<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('doctor.request.fields')}}">Create Fields</a>
                    </li>
                    <li>
                        <a href="{{route('doctor.request.create')}}">Create New Request</a>
                    </li>
                    <li>
                        <a href="{{route('doctor.request.index')}}">All Requests</a>
                    </li>

                </ul>
            </li>

            @endrole
        </ul>
    </div>
</div>
