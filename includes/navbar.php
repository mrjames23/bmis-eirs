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
                        <small><?= $profile['brgy_id'] ?? 'No Barangay ID' ?></small>
                    </p>
                </li>
                <li class="user-footer text-sm">
                    <button class="btn btn-default btn-flat userSettings" data-toggle="modal" data-target="#modal_user_settings">
                        <i class="fas fa-users-cog"></i>&nbsp;Settings
                    </button>
                    <a href="logout" class="btn btn-default btn-flat float-right">
                        <i class="nav-icon fas fa-sign-out-alt"></i>&nbsp;Sign out
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
<div class="modal fade" id="modal_user_settings" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title">
                    <li class="fas fa-users-cog"></li> User Settings
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="post">
                <div class="modal-body">
                    <div class="card-body m-0 p-0">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="text" class="form-control" name="email" id="email" required />
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact Number</label>
                            <input type="text" class="form-control" name="contact" id="contact" required />
                        </div>
                        <div class="form-group">
                            <label for="old_pass">Old password</label>
                            <input type="password" class="form-control" name="old_pass" id="old_pass" required />
                        </div>
                        <div class="form-group">
                            <label for="pass">New password</label>
                            <input type="password" class="form-control" name="pass" id="pass" required />
                        </div>
                        <div class="form-group">
                            <label for="pass2">Confirm new password</label>
                            <input type="password" class="form-control" name="pass2" id="pass2" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="type" id="type" value="" />
                    <input type="hidden" name="action" id="action" value="" />
                    <input type="submit" name="btn_action" id="btn_action" class="btn btn-primary" value="SAVE" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>