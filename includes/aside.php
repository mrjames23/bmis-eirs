<?php if ($user['user_type'] == 'ADMIN') { ?>
    <aside class="main-sidebar sidebar-dark-info elevation-4">
        <a href="#" class="brand-link">
            <img src="<?= $system_logo ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"><?= $system_name ?></span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">MENU</li>
                    <li class="nav-item">
                        <a href="main_page.php" class="nav-link">
                            <i class="fa fa-info nav-icon"></i>
                            <p>Barangay Information</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="announcements.php" class="nav-link">
                            <i class="fa fa-bullhorn nav-icon"></i>
                            <p>Announcements</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="user_profiles.php" class="nav-link">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                User Profiles
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">DOCUMENT PROCESSING</li>
                    <li class="nav-item">
                        <a href="certificates.php" class="nav-link">
                            <i class="nav-icon fas fa-certificate"></i>
                            <p>
                                Certificates
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="barangay_id.php" class="nav-link">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>
                                Barangay ID
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">EQUIPMENT RESERVATIONS</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Inventory
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Reservations
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">ADMIN TOOLS</li>
                    <li class="nav-item">
                        <a href="officials.php" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Officials
                                <!-- <i class="fas fa-angle-left right"></i> -->
                            </p>
                        </a>
                        <!-- <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="officials.php" class="nav-link">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Members</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="positions.php" class="nav-link">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Positions</p>
                                </a>
                            </li>
                        </ul> -->
                    </li>
                    <li class="nav-item">
                        <a href="user_accounts.php" class="nav-link">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                User Accounts
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="settings.php" class="nav-link">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                Settings
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fa fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
<?php } ?>
<?php if ($user['user_type'] == 'STAFF') { ?>
    <aside class="main-sidebar sidebar-dark-info elevation-4">
        <a href="#" class="brand-link">
            <img src="<?= $system_logo ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"><?= $system_name ?></span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">MENU</li>
                    <li class="nav-item">
                        <a href="main_page.php" class="nav-link">
                            <i class="fa fa-info nav-icon"></i>
                            <p>Barangay Information</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="announcements.php" class="nav-link">
                            <i class="fa fa-bullhorn nav-icon"></i>
                            <p>Announcements</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="user_profiles.php" class="nav-link">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                User Profiles
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">DOCUMENT PROCESSING</li>
                    <li class="nav-item">
                        <a href="certificates.php" class="nav-link">
                            <i class="nav-icon fas fa-certificate"></i>
                            <p>
                                Certificates
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="barangay_id.php" class="nav-link">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>
                                Barangay ID
                            </p>
                        </a>
                    </li>
                    <!-- <li class="nav-header">EQUIPMENT RESERVATIONS</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Inventory
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Reservations
                            </p>
                        </a>
                    </li> -->
                    <li class="nav-header">OTHERS</li>
                    <li class="nav-item">
                        <a href="officials.php" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Officials
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fa fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
<?php } ?>
<?php if ($user['user_type'] == 'USER') { ?>
    <aside class="main-sidebar sidebar-dark-info elevation-4">
        <a href="#" class="brand-link">
            <img src="<?= $system_logo ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"><?= $system_name ?></span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">MENU</li>
                    <li class="nav-item">
                        <a href="main_page.php" class="nav-link">
                            <i class="fa fa-info nav-icon"></i>
                            <p>Barangay Information</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="announcements.php" class="nav-link">
                            <i class="fa fa-bullhorn nav-icon"></i>
                            <p>Announcements</p>
                        </a>
                    </li>
                    <li class="nav-header">DOCUMENT PROCESSING</li>
                    <li class="nav-item">
                        <a href="certificates.php" class="nav-link">
                            <i class="nav-icon fas fa-certificate"></i>
                            <p>
                                Certificates
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="barangay_id.php" class="nav-link">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>
                                Barangay ID
                            </p>
                        </a>
                    </li>
                    <!-- <li class="nav-header">EQUIPMENT RESERVATIONS</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Inventory
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Reservations
                            </p>
                        </a>
                    </li> -->
                    <li class="nav-header">OTHERS</li>
                    <li class="nav-item">
                        <a href="officials.php" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Officials
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fa fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
<?php } ?>