<!-- ============================================================== -->
        <!-- Sidebar scss in sidebar.scss -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <ul id="slide-out" class="sidenav">
                
                <li>
                    <ul class="collapsible">
                        <li class="small-cap"><span class="hide-menu">PERSONAL</span></li>
                        <li>
                            <a class="collapsible-header has-arrow"><i class="material-icons">dashboard</i><span class="hide-menu"> Dashboard</span></a>
                            <div class="collapsible-body">
                                <ul class="collapsible" data-collapsible="accordion">
                                   
                                   
                                    <li><a href="javascript: void(1);" class="collapsible-header has-arrow"><i class="material-icons">line_weight</i><span class="nav-text">Menu Management</span></a>
                                        <div class="collapsible-body">
                                            <ul class="collapsible" data-collapsible="accordion">
                                                <li><a href="{{ route('menu.index') }}"><i class="material-icons">adjust</i><span class="hide-menu">All Menu</span></a></li>
                                                <li><a href="{{ route('menu.create') }}"><i class="material-icons">adjust</i><span class="hide-menu">Add Menu</span></a></li>
                                            </ul>
                                        </div>
                                    
                                </ul>
                            </div>
                        </li>
                        
                        
                        <li>
                            <a href="javascript: void(0);" class="collapsible-header has-arrow"><i class="material-icons">group</i><span class="hide-menu"> Users Management </span></a>
                            <div class="collapsible-body">
                                <ul>
                                    
                                        
                                            <ul class="collapsible" data-collapsible="accordion">
                                                <li><a href="{{ route('user.index') }}"><i class="material-icons">adjust</i><span class="hide-menu">All Users</span></a></li>
                                                <li><a href="{{ route('user.create') }}"><i class="material-icons">adjust</i><span class="hide-menu">Add Users</span></a></li>
                                            </ul>
                                        
                                  
                                </ul>
                            </div>
                        </li>



                        <li>
                            <a href="javascript: void(0);" class="collapsible-header has-arrow"><i class="material-icons">map</i><span class="hide-menu"> City Management </span></a>
                            <div class="collapsible-body">
                                <ul>
                                    
                                        
                                            <ul class="collapsible" data-collapsible="accordion">
                                                <li><a href="{{ route('city.index') }}"><i class="material-icons">adjust</i><span class="hide-menu">All City</span></a></li>
                                                <li><a href="{{ route('city.create') }}"><i class="material-icons">adjust</i><span class="hide-menu">Add City</span></a></li>
                                            </ul>
                                        
                                  
                                </ul>
                            </div>
                        </li>

                        <li><a href="javascript: void(0);" class="collapsible-header has-arrow"><i class="material-icons">present_to_all</i><span class="nav-text">Banner Management</span></a>
                            <div class="collapsible-body">
                                <ul class="collapsible" data-collapsible="accordion">
                                    <li><a href="{{ route('banner.index') }}"><i class="material-icons">adjust</i><span class="hide-menu">All Banner</span></a></li>
                                    <li><a href="{{ route('banner.create') }}"><i class="material-icons">adjust</i><span class="hide-menu">Add Banner</span></a></li>
                                </ul>
                            </div>
                        </li>

                        <li><a href="javascript: void(0);" class="collapsible-header has-arrow"><i class="material-icons">equalizer</i><span class="nav-text">Category Management</span></a>
                            <div class="collapsible-body">
                                <ul class="collapsible" data-collapsible="accordion">
                                    <li><a href="{{ route('category.index') }}"><i class="material-icons">adjust</i><span class="hide-menu">All category</span></a></li>
                                    <li><a href="{{ route('category.create') }}"><i class="material-icons">adjust</i><span class="hide-menu">Add category</span></a></li>
                                </ul>
                            </div>
                        </li>
                        
                        
                        
                    </ul>
                </li>
            </ul>
        </aside>
        <!-- ============================================================== -->
        <!-- Sidebar scss in sidebar.scss -->
        <!-- ============================================================== -->