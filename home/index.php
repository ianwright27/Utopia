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

                <button class="btn btn-danger m-2">
                    <a href="../logout.php" class="text-light">Logout</a>
                </button>

            </div>


            <!-- Content column -->
            <div class="col-lg-7 content-col" id="infinite-scroll">

                <div class="row content-heading">
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

                <!-- Posts / Reports here -->
                <!-- Post UI -->
                <div class="post">
                    <div class="post-header">
                        <img class="post-author-pic" src="https://cdn-icons-png.flaticon.com/512/219/219969.png" alt="">
                        <p class="post-author">Anonymous User #2345664</p>
                    </div>
                    <div class="post-content">
                        <br>
                        <h4 class="post-title">Most Toxic Firms in Nairobi</h4>
                        <p class="remark">52 recorded so far</p>
                        <br>
                        <div class="post-actions">
                            <button class="btn">View Stats</button>
                        </div>
                    </div>
                    <div class="post-footer">
                        <br>
                        <div class="row">
                            <ul class="post-date">
                                <li>
                                    <span class="date">11:01 PM 28-02-2024</span>
                                    .&nbsp;
                                </li>
                                <li>
                                    <span class="views">100K</span> views
                                </li>
                            </ul>
                        </div>

                        <div class="row post-metadata">
                            <div class="col text-center post-likes">
                                <i class="bi bi-chat"></i>
                                50.6K
                            </div>
                            <div class="col text-center post-comments">
                                <i class="bi bi-file-arrow-up"></i>
                                50.6K
                            </div>
                            <div class="col text-center post-comments">
                                <i class="bi bi-heart"></i>
                                100K
                            </div>
                            <div class="col text-center post-saves">
                                <i class="bi bi-bookmark"></i>
                                58K
                            </div>
                            <div class="col text-center post-share">
                                <i class="bi bi-upload"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-3 sidebar-col" id="limited-scroll">
                <!-- Limited scroll column content -->
                sidebar column (trending reports, connections, ads)
            </div>
        </div>
    </div>


    <h1>Welcome, <? echo $_SESSION['username']; ?></h1>
    <p>What are you thinking?</p>
    <button>Create a report</button>
    <br>
    <button>Need insights</button>
    <br>
    <button>Trending reports for the day!</button>
    <br>
    <button>Check your report stats</button>
    <br>
</body>

</html>