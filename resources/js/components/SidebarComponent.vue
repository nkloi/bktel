<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img
                        src="images/user2-160x160.jpg"
                        class="img-circle elevation-2"
                        alt="User Image"
                    />
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input
                        class="form-control form-control-sidebar"
                        type="search"
                        placeholder="Search"
                        aria-label="Search"
                    />
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fa fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
                <div class="sidebar-search-results">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="search-title">
                                <strong class="text-light"></strong>N<strong
                                    class="text-light"
                                ></strong
                                >o<strong class="text-light"></strong>
                                <strong class="text-light"></strong>e<strong
                                    class="text-light"
                                ></strong
                                >l<strong class="text-light"></strong>e<strong
                                    class="text-light"
                                ></strong
                                >m<strong class="text-light"></strong>e<strong
                                    class="text-light"
                                ></strong
                                >n<strong class="text-light"></strong>t<strong
                                    class="text-light"
                                ></strong>
                                <strong class="text-light"></strong>f<strong
                                    class="text-light"
                                ></strong
                                >o<strong class="text-light"></strong>u<strong
                                    class="text-light"
                                ></strong
                                >n<strong class="text-light"></strong>d<strong
                                    class="text-light"
                                ></strong
                                >!<strong class="text-light"></strong>
                            </div>
                            <div class="search-path"></div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul
                    class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false"
                >
                    <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-tachometer"></i>
                            <p>
                                Dashboard
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../../index.html" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Dashboard v1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../index2.html" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Dashboard v2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../index3.html" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Dashboard v3</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="../widgets.html" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Widgets
                                <span class="right badge badge-danger"
                                    >New</span
                                >
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a
                                    href="../charts/chartjs.html"
                                    class="nav-link"
                                >
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>ChartJS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../charts/flot.html" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Flot</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="../charts/inline.html"
                                    class="nav-link"
                                >
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Inline</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../charts/uplot.html" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>uPlot</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fa fa-tree"></i>
                            <p>
                                UI Elements
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../UI/general.html" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>General</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../UI/icons.html" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Icons</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../UI/buttons.html" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Buttons</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../UI/sliders.html" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Sliders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="../UI/modals.html"
                                    class="nav-link active"
                                >
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Modals &amp; Alerts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../UI/navbar.html" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Navbar &amp; Tabs</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../UI/timeline.html" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Timeline</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../UI/ribbons.html" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Ribbons</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            <p>
                                Forms
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a
                                    href="../forms/general.html"
                                    class="nav-link"
                                >
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>General Elements</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="../forms/advanced.html"
                                    class="nav-link"
                                >
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Advanced Elements</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="../forms/editors.html"
                                    class="nav-link"
                                >
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Editors</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="../forms/validation.html"
                                    class="nav-link"
                                >
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Validation</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-table"></i>
                            <p>
                                Tables
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a
                                    href="../tables/simple.html"
                                    class="nav-link"
                                >
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Simple Tables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../tables/data.html" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>DataTables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="../tables/jsgrid.html"
                                    class="nav-link"
                                >
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>jsGrid</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
