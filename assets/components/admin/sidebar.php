<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-success">
        <img src="../assets/images/my-logo.png" alt="UPHMC-B Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-bold px-4">UPHMC-B</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/images/admin-img.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block px-3"><?php echo $info['userFName'] ?? ""; ?> <?php echo $info['userLName'] ?? ""; ?></a>
            </div>
        </div>
        
        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fa-solid fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
         -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon classwith font-awesome or any other icon font library -->
                <li class="nav-header">MENU</li>

                <li class="nav-item">
                    <a href="#" class="nav-link nav-buildings nav-queues">
                        <i class="nav-icon fa-solid fa-hospital"></i>
                        <p>
                            Buildings
                            <i class="right fa-solid fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?route=buildings" class="nav-link nav-buildings">
                                <i class="fa-solid fa-hospital-user nav-icon"></i>
                                <p>Manage Buildings</p>
                            </a>
                        </li>

                        <?php 
                            $buildings = $class->getBuilding();
                            if (!empty($buildings)) {
                                foreach ($buildings as $building) { 
                                    $defaultBuilding[] = $building['buildingUniqueId'];
                                }
                            }
                        ?>

                        <li class="nav-item">
                            <a href="index.php?route=queues&buid=<?php echo $defaultBuilding[0] ?? ""; ?>" class="nav-link nav-queues">
                                <i class="fa-solid fa-arrow-up-9-1 nav-icon"></i>
                                <p>Monitor Queues</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="nav-item">
                    <a href="#" class="nav-link nav-mab-1 nav-mab-2">
                        <i class="nav-icon fa-solid fa-arrow-up-9-1"></i>
                        <p>
                            Monitor Queue
                            <i class="right fa-solid fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?route=mab-1" class="nav-link nav-mab-1">
                                <i class="fa-solid fa-hospital nav-icon"></i>
                                <p>MAB-1</p>
                            </a>
                        </li>

                        <?php 
                            //$buildings = $class->getBuilding();
                            //if (!empty($buildings)) {
                                //foreach ($buildings as $building) { 
                                    //$defaultBuilding[] = $building['buildingUniqueId'];
                                //}
                            //}
                        ?>

                        <li class="nav-item">
                            <a href="index.php?route=mab-2&buid=<?php //echo $defaultBuilding[0] ?? ""; ?>" class="nav-link nav-mab-2">
                                <i class="fa-solid fa-hospital nav-icon"></i>
                                <p>MAB-2</p>
                            </a>
                        </li>
                    </ul>
                </li> -->

                <li class="nav-item">
                    <a href="#" class="nav-link nav-questions nav-declaration-forms">
                        <i class="nav-icon fa-solid fa-table-list"></i>
                        <p>
                            Manage Form
                            <i class="right fa-solid fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?route=questions" class="nav-link nav-questions">
                                <i class="fa-solid fa-solid fa-circle-question nav-icon"></i>
                                <p>Manage Questions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="index.php?route=declaration-forms" class="nav-link nav-declaration-forms">
                                <i class="fa-solid fa-newspaper nav-icon"></i>
                                <p>Declaration Forms</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="nav-item">
                    <a href="index.php?route=form" class="nav-link nav-form">
                        <i class="nav-icon fa-solid fa-circle-question"></i>
                        <p>
                            Manage Form
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?route=declaration-forms" class="nav-link nav-declaration-forms">
                        <i class="nav-icon fa-solid fa-newspaper"></i>
                        <p>
                            Declaration Forms
                        </p>
                    </a>
                </li>  -->

                <li class="nav-item">
                    <a href="#" class="nav-link nav-activity-logs nav-manage-accounts nav-contact-us">
                        <i class="nav-icon fa-solid fa-cog"></i>
                        <p>
                            Configuration
                            <i class="right fa-solid fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?route=activity-logs" class="nav-link nav-activity-logs">
                                <i class="fa-solid fa-solid fa-address-book nav-icon"></i>
                                <p>Activity Logs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?route=manage-accounts" class="nav-link nav-manage-accounts">
                                <i class="fa-solid fa-solid fa-users-gear nav-icon"></i>
                                <p>Manage Accounts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?route=contact-us" class="nav-link nav-contact-us">
                                <i class="fa-solid fa-phone nav-icon"></i>
                                <p>Contact Us</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="nav-item">
                    <a href="index.php?route=manage-accounts" class="nav-link nav-manage-accounts">
                        <i class="nav-icon fa-solid fa-users-gear"></i>
                        <p>
                            Manage Accounts
                        </p>
                    </a>
                </li> -->

                
                <li class="nav-item">
                    <a href="#" class="nav-link nav-form-questionnaire-report nav-declaration-forms-report nav-queues-report nav-activity-logs-report">
                    <i class="nav-icon fa-solid fa-folder-closed"></i>
                        <p>
                            Reports
                            <i class="right fa-solid fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- <li class="nav-item">
                            <a href="index.php?route=mab-1-report" class="nav-link nav-mab-1-report">
                                <i class="fa-solid fa-hospital nav-icon"></i>
                                <p>MAB-1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?route=mab-2-report" class="nav-link nav-mab-2-report">
                                <i class="fa-solid fa-hospital nav-icon"></i>
                                <p>MAB-2</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="index.php?route=queues-report&buid=<?php echo $defaultBuilding[0] ?? ""; ?>" class="nav-link nav-queues-report">
                                <i class="fa-solid fa-arrow-up-9-1 nav-icon"></i>
                                <p>Queues</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?route=form-questionnaire-report" class="nav-link nav-form-questionnaire-report">
                                <i class="fa-solid fa-table-list nav-icon"></i>
                                <p>Form Questionnaire</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?route=declaration-forms-report" class="nav-link nav-declaration-forms-report">
                                <i class="fa-solid fa-newspaper nav-icon"></i>
                                <p>Declaration Forms</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?route=activity-logs-report" class="nav-link nav-activity-logs-report">
                                <i class="fa-solid fa-solid fa-address-book nav-icon"></i>
                                <p>Activity Logs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?route=contact-us-report" class="nav-link nav-contact-us-report">
                                <i class="fa-solid fa-phone nav-icon"></i>
                                <p>Contact Us</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="index.php?route=my-profile" class="nav-link nav-my-profile">
                        <i class="nav-icon fa-solid fa-user-gear"></i>
                        <p>
                            My Profile
                        </p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a href="index.php?route=generate-qr" class="nav-link nav-generate-qr">
                        <i class="nav-icon fa-solid fa-qrcode"></i>
                        <p>
                            Generate QR
                        </p>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    
    <!-- <div class="sidebar-custom">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="widgets.html" class="nav-link active">
                    <i class="nav-icon fa-solid fa-th"></i>
                    <p>
                        Sign Out
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
        </ul>

        <a href="#" class="btn btn-link"><i class="fa-solid fa-cogs"></i></a>
        <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Help</a>
    </div> -->
    <!-- /.sidebar-custom -->
</aside>