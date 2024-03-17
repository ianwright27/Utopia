<?php
// Include the database connection
require_once('../../db.php');

// Function to fetch poll choices for a given poll ID
function fetchPollChoices($pollId, $conn) {
    // Query to fetch poll choices for the given poll ID
    $query = "SELECT choice FROM poll_choices WHERE poll_id = $pollId";
    $result = $conn->query($query);

    // Check if there are any poll choices
    if ($result->num_rows > 0) {
        // Initialize an array to store the poll choices
        $choices = array();
        // Loop through each row of the result set
        while ($row = $result->fetch_assoc()) {
            // Add the choice to the choices array
            $choices[] = $row['choice'];
        }
        return $choices;
    } else {
        // If there are no poll choices, return an empty array
        return array();
    }
}

// Function to fetch the username based on user ID
function fetchUsername($userId, $conn) { 
    // Implement your database query here to fetch the username 
    $stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['username'];
    } else {
        return "Unknown User";
    }
}


// Function to fetch latest posts
function fetchLatestPosts($conn) {
    // Query to fetch the latest posts along with associated data
    $query = "SELECT p.*, ps.views, ps.likes, ps.reposts, ps.comments, ps.saves 
              FROM posts p 
              LEFT JOIN post_stats ps ON p.post_id = ps.post_id
              ORDER BY p.post_id DESC 
              LIMIT 10"; // Adjust the LIMIT as needed

    // Execute the query
    $result = $conn->query($query);

    // Initialize an array to store post data
    $posts = array();

    // Check if there are any posts
    if ($result->num_rows > 0) {
        // Loop through each row of the result set
        while ($row = $result->fetch_assoc()) {
            // Extract data from the row
            $postId = $row['post_id'];
            $postTime = $row['time_posted'];
            $postTitle = $row['post_title'];  
            $userId = $row['user_id'];
            $username = fetchUsername($userId, $conn);
            $postType = $row['post_type'];
            $pollId = $row['poll_id']; 

            // Initialize an array to store post details
            $post = array(
                'post_id' => $postId,
                'post_title' => $postTitle,
                'post_username' => $username, 
                'post_time' => $postTime,  
                'user_id' => $userId,
                'post_type' => $postType,
                'poll_id' => $pollId,
                'views' => $row['views'],
                'likes' => $row['likes'],
                'reposts' => $row['reposts'],
                'comments' => $row['comments'],
                'saves' => $row['saves']
            );

            // If the post has a poll, fetch poll choices
            if ($pollId != null) {
                $post['poll_choices'] = fetchPollChoices($pollId, $conn);
            }

            // Add the post to the posts array
            $posts[] = $post;
        }
    }

    return $posts;
}

// Fetch latest posts
$latestPosts = fetchLatestPosts($conn);

// Output the HTML for each post
foreach ($latestPosts as $post) {
    $username = fetchUsername($post['user_id'], $conn);
    // Output the HTML for each post using the template
?>

<div class="post">
        <div class="post-header">
            <!-- <img class="post-author-pic" src="../uploads/users/219969.png" alt=""> -->
            <img class="post-author-pic" src="../uploads/users/219969.png" alt="">
            <!-- <p class="post-author">Anonymous User #2345664</p> -->
            <p class="post-author">
                <?php echo $post['post_username']; ?>
            </p>

            <div class="menu align-items-center post-menu" title="more">
                <i class="fa-solid fa-ellipsis"></i>
            </div>
        </div>
        <div class="post-content">
            <br>
            <!-- <h4 class="post-title">Most Toxic Firms in Nairobi 🤣 Let's Go!</h4> -->
            <h4 class="post-title">
                <?php echo $post['post_title']; ?>
            </h4>
            <p class="remark">
                <!-- <span class="remark_value">52</span> -->
                <!-- <span class="remark_value">[[[ (optional) how many poll answers have been given so far ]]]</span> -->
                <!-- recorded so far -->
            </p>
            <br>
            
            <?php

            if (isset($post['poll_choices']) && is_array($post['poll_choices'])) {
            ?>
                <div class="post-actions">
                    <?php
                    foreach ($post['poll_choices'] as $choice) {
                        echo '<button class="btn poll-choice-btn">' . $choice . '</button>'; 
                        echo '<br>';  
                            
                    }
                    ?>
                            
                </div>
            
            <?php
            }
            ?>

        </div>
        <div class="post-footer">
            <br>
            <div class="row">
                <ul class="post-date">
                    <li>
                        <!-- <span class="date">11:01 PM 28-02-2024</span> -->
                        <span class="date"><?php echo $post['post_time']; ?></span>
                        .&nbsp;
                    </li>
                    <li>
                        <!-- <span class="views">100K</span> views -->
                        <span class="views"><?php echo $post['views']; ?></span> views
                    </li>
                </ul>
            </div>

            <div class="row post-metadata">
                <div class="col text-center post-likes">
                    <i class="fa-regular fa-comment"></i>
                    <!-- 50.6K -->
                    <?php echo $post['comments']; ?>
                </div>
                <div class="col text-center post-comments">
                    <i class="fa-solid fa-retweet"></i>
                    <!-- 50.6K -->
                    <?php echo $post['reposts']; ?>
                </div>
                <div class="col text-center post-comments">
                    <i class="fa-regular fa-heart"></i>
                    <!-- 100K -->
                    <?php echo $post['likes']; ?>
                </div>
                <div class="col text-center post-saves">
                    <i class="fa-regular fa-bookmark"></i>
                    <!-- 58K -->
                    <?php echo $post['saves']; ?>
                </div>
                <div class="col text-center post-share">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                    <!-- I'll implement this functionality later, I have a plan -->
                </div>
            </div>
        </div>
    </div>

<?php
}

// Close the database connection
$conn->close();
?>
