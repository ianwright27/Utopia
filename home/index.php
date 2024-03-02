<?php
?>

<!DOCTYPE html>
<html lang="en">

<?php

require_once('head.php');
require_once('../app_settings.php');

?>

<body>

    <div class="container">
        <div class="row align-items-start">
            <!-- Setting column -->
            <div class="col-lg-2 settings-col">

                <div class="logo">
                    <b>
                        <?php echo $app_name_placeholder; ?>
                    </b>
                </div>

                <div class="list-group menu-list">
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="bi bi-house-door-fill"></i>
                        <span>Home</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="bi bi-search"></i>
                        <span>Explore</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="bi bi-bell"></i>
                        <span>Notifications</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="bi bi-envelope"></i>
                        <span>Messages</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="bi bi-pencil-square"></i>
                        <span>Post</span>
                    </a>
                </div>

                <button class="btn btn-secondary m-2 logout-btn">
                    <a href="../logout.php" class="text-light">Logout</a>
                </button>

            </div>


            <!-- Content column -->
            <div class="col-lg-7 content-col " id="infinite-scroll">

                <div class="content-heading">
                    <div class="row">
                        <div class="col following p-0">
                            <br>
                            <h2 class="text-center">Following</h2>
                            <!-- Content for "For You" section -->
                            <div class="active_line not_active"></div>
                        </div>
                        <div class="col for_you p-0">
                            <br>
                            <h2 class="text-center">For You</h2>
                            <!-- Content for "Following" section -->
                            <div class="active_line active"></div>
                        </div>
                    </div>
                </div>


                <!-- Posts / Reports here -->
                <!-- Post UI -->
                <?php
                require_once "sample_posts.php";
                ?>

            </div>

            <div class="col-lg-3 sidebar-col" id="limited-scroll">
                <!-- Limited scroll column content -->
                sidebar column (trending reports, connections, ads)
            </div>
        </div>
    </div>


</body>

</html>