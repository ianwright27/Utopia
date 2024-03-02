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
                    <a href="../home/">
                        <?php echo $app_name_placeholder; ?>
                    </a>
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

                <button class="m-2 logout-btn">
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

                <!-- Posting UI -->
                <div class="posting-ui">

                    <!-- "What's happening?!" variation -->
                    <div class="whats-happening">
                        <!-- Profile picture (optional) -->
                        <img class="profile-pic" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="Profile Picture">
                        <input type="text" class="" placeholder="What have you discovered?">
                    </div>

                    <!-- Icons for image, GIF, poll creation, emoji, schedule post, and tag live location (currently only poll creation) -->
                    <div class="icons">
                        <div class="icon-group">
                            <i class="bi bi-list-ul"></i>
                            &nbsp;
                            <i class="bi bi-emoji-smile"></i>
                        </div>
                    </div>

                    <!-- "Post" button -->
                    <button class="post-button">Post</button>
                </div>


                <!-- Posts / Reports here -->
                <!-- Post UI -->
                <?php
                require_once "sample_posts.php";
                ?>

            </div>

            <div class="col-lg-3 sidebar-col" id="limited-scroll">
                <!-- Limited scroll column content -->
                <!-- Search row -->
                <div class="search-row">
                    <!-- Search input and button -->
                    <i class="bi bi-search"></i>
                    <input type="text" class="search-box" placeholder="Search" aria-label="Search" aria-describedby="search-icon">
                </div>

                <!-- Trending reports -->
                <div class="trending-reports">
                    <!-- Trending reports content -->
                    <h4 class="text-center">Trending Reports For You</h4>
                    <ul class="list-group">
                        <!-- List items for trending reports -->
                        <li class="list-group-item">
                            <div class="menu align-items-center">
                                <i class="bi bi-three-dots"></i>
                            </div>
                            <div class="category">Business</div>
                            <div class="keyword">Wright</div>
                            <div class="frequency">
                                <span class="reports">369K</span> reports
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="menu align-items-center">
                                <i class="bi bi-three-dots"></i>
                            </div>
                            <div class="category">Music</div>
                            <div class="keyword">Rihanna</div>
                            <div class="frequency">
                                <span class="reports">169K</span> reports
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="menu align-items-center">
                                <i class="bi bi-three-dots"></i>
                            </div>
                            <div class="category">Travel</div>
                            <div class="keyword">AirBnB</div>
                            <div class="frequency">
                                <span class="reports">1009</span> reports
                            </div>
                        </li>
                        <!-- Add more list items as needed -->
                    </ul>
                </div>

            </div>
        </div>
    </div>


</body>

</html>