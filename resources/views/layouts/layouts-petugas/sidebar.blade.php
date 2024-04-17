<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="PendataanBarang" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pendataan Barang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="StokBarang" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Stok Barang
                        </p>
                    </a>
                </li>
</aside>
