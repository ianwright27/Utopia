<!DOCTYPE html>
<html lang="en">

<?php

session_start();

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
                        <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span>Explore</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fa-regular fa-bell"></i>
                        <span>Notifications</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fa-regular fa-envelope"></i>
                        <span>Messages</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fa-regular fa-user"></i>
                        <span>Profile</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fa-solid fa-pen-to-square"></i>
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
                        <!-- <div class="col following p-0"> -->
                        <!-- <br> -->
                        <!-- <h2 class="text-center">Following</h2> -->
                        <!-- Content for "For You" section -->
                        <!-- <div class="active_line not_active"></div> -->
                        <!-- </div> -->
                        <div class="col for_you p-0">
                            <br>
                            <h2 class="text-center">Feed</h2>
                            <!-- Content for "Following" section -->
                            <div class="active_line active"></div>
                        </div>
                    </div>
                </div>



                <!-- Posting UI -->
                <div class="posting-ui">
                    <form action="../home/functionalities/post.php" method="POST">

                        <!-- Embedding session user ID into a hidden input field -->
                        <input type="hidden" name="session_user_id" id="sessionUserId" value="<?php echo $_SESSION['id']; ?>">
                        <input type="hidden" name="post_type" id="postType" value="post">

                        <!-- "What's happening?!" variation -->
                        <div class="whats-happening">
                            <!-- Profile picture (optional) -->
                            <img class="profile-pic" src="../uploads/user/blank-profile-picture-973460_960_720.webp" alt="Profile Picture">
                            <input type="text" name="poll_title" id="pollTitle" class="" placeholder="What have you discovered?">
                        </div>


                        <!-- Poll Container (Hidden by default) -->
                        <div class="poll-container" style="display: none;">
                            <!-- Poll Choices -->
                            <div class="poll-choices">
                                <!-- <input type="text" class="poll-choice" placeholder="Choice 1"> -->
                                <!-- <input type="text" class="poll-choice" placeholder="Choice 2"> -->
                                <!-- Add Choice Button -->
                                <!-- <button class="add-choice-button">Add Choice</button> -->
                            </div>
                            <!-- Expiry Date Selector -->
                            <input type="datetime-local" name="expiry_date" id="expiryDate" class="expiry-date" placeholder="Expiry Date">
                            <!-- Remove Poll Button -->
                            <button class="remove-poll-button">Remove Poll</button>
                        </div>

                        <!-- Icons for image, GIF, poll creation, emoji, schedule post, and tag live location (currently only poll creation) -->
                        <div class="icons">
                            <div class="icon-group">
                                <i class="fa-solid fa-chart-bar" id="pollButton" title="create a poll"></i>
                                &nbsp;
                                <i class="fa-regular fa-face-laugh-beam" id="emojiButton" title="emoji"></i>
                            </div>
                        </div>

                        <!-- "Post" button -->
                        <input type="submit" class="post-button" id="postButton">
                    </form>


                </div>


                <!-- Post success -->
                <?php
                $alert_msg = "Post sent successfully!";
                if (isset($_REQUEST['post_success'])) {
                    echo '<div class="alert alert-success" role="alert">' . $alert_msg . '</div>';
                }
                ?>

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
                            <div class="menu align-items-center" title="more">
                                <i class="fa-solid fa-ellipsis"></i>
                            </div>
                            <div class="category">Business</div>
                            <div class="keyword">Safaricom</div>
                            <div class="frequency">
                                <span class="reports">369K</span> reports
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="menu align-items-center" title="more">
                                <i class="fa-solid fa-ellipsis"></i>
                            </div>
                            <div class="category">Music</div>
                            <div class="keyword">Nikita Kering</div>
                            <div class="frequency">
                                <span class="reports">169K</span> reports
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="menu align-items-center" title="more">
                                <i class="fa-solid fa-ellipsis"></i>
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