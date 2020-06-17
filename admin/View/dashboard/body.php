<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="/admin/">Администрирование</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i>
    </button
    ><!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">

        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Активность</a><a class="dropdown-item" href="#">Настройки</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/admin/logout/">Выйти</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Информация</div>
<!--                    Собираем текущую информацию по работе сайта-->
                    <a class="nav-link" href="#"
                    >
                        <div class="sb-nav-link-icon"><i class="fas fa-server"></i></div>
                        Статистика</a
                    >
                    <div class="sb-sidenav-menu-heading">Пользователи</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCounterparties"
                       aria-expanded="false" aria-controls="collapseLayouts"
                    >
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Контрагенты
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                        >
                    </a>
                    <div class="collapse" id="collapseCounterparties" aria-labelledby="headingOne"
                         data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="layout-static.html">Информация</a>
                            <a class="nav-link" href="layout-sidenav-light.html">#</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                       aria-expanded="false" aria-controls="collapseLayouts"
                    >
                        <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                        Сотрудники
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                        >
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                         data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="layout-static.html">Информация</a>
                            <a class="nav-link" href="layout-sidenav-light.html">#</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Взаимодействие</div>
                    <a class="nav-link" href="charts.html"
                    >
                        <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                        Заказы</a
                    ><a class="nav-link" href="tables.html"
                    >
                        <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                        Отзывы</a
                    >
                    <div class="sb-sidenav-menu-heading">Настройки</div>
                    <a class="nav-link" href="charts.html"
                    >
                        <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                        Системные</a
                    ><a class="nav-link" href="tables.html"
                    >
                        <div class="sb-nav-link-icon"><i class="fas fa-upload"></i></div>
                        Сервисы</a
                    >
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>

            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Primary Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Warning Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Success Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Danger Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
                            <div class="card-body">
                                <canvas id="myAreaChart" width="100%" height="40"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
                            <div class="card-body">
                                <canvas id="myBarChart" width="100%" height="40"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2019</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>