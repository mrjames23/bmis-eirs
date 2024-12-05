<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light bg-info sticky-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="../images/avatar.png" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline"><?= $user['user_type'] ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="user-header bg-info">
                    <img src="../images/avatar.png" class="img-circle elevation-2" alt="User Image">
                    <p>
                        <?= $user['email'] ?>
                        <small><?= $user['created_at'] ?></small>
                    </p>
                </li>
                <li class="user-footer text-sm">
                    <a href="logout" class="btn btn-default btn-flat btn-block">
                        <i class="nav-icon fas fa-sign-out-alt"></i>&nbsp;Sign out
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->