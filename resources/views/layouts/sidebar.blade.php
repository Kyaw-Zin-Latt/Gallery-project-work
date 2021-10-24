<div class="col-12 col-md-3 sidebar teamps-sidebar-open">
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- SideBar Start -->
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @foreach($photos as $p)
                        @if($p->img_type == "logo")
                            <img src="{{ asset('storage/backend/logo/'.$p->photo) }}" width="100px" alt="">
                        @endif
                    @endforeach
                </div>
                <div class="info" style="font-size: 14px; color: #fff; font-weight: bold;">
                    PSWallpers Admin Panel
                </div>
            </div>

            <!-- Sidebar Menu Start-->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item has-treeview">
                        <x-menu-title title="Dashboard" class="fa fa-fw fa-tachometer" link="{{ route('home') }}"></x-menu-title>
                    </li>

                    <li class="nav-item has-treeview ">
                        <x-menu-title title="Entry" class="fa fa-fw fa-pencil-square-o"></x-menu-title>
                        <ul class="nav nav-treeview">
                            <x-menu-item title="Multiple Wallpaper Upload" link="{{ route('home') }}"></x-menu-item>
                            <x-menu-item title="Mass Upload (CSV)" link=""></x-menu-item>
                            <x-menu-item title="Wallpapers" link=""></x-menu-item>
                            <x-menu-item title="Colors" link="{{ route('color.index') }}"></x-menu-item>
                            <x-menu-item title="Categories" link="{{ route('category.index') }}"></x-menu-item>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview ">
                        <x-menu-title title="Approval" class="fa fa-fw fa-check-circle"></x-menu-title>
                        <ul class="nav nav-treeview">
                            <x-menu-item title="Pending" link=""></x-menu-item>
                            <x-menu-item title="Reject" link=""></x-menu-item>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview ">
                        <x-menu-title title="Setting" class="fa fa-fw fa-cog"></x-menu-title>
                        <ul class="nav nav-treeview">
                            <x-menu-item title="About & Setting" link="{{ route('abouts.edit') }}"></x-menu-item>
                            <x-menu-item title="Backend Setting" link="{{ route('backend_configs.edit',$backend->id) }}"></x-menu-item>


                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- Sidebar Menu End  -->

        </div>
        <!-- SideBar End -->
    </aside>
</div>
