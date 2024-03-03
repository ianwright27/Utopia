<?php

$num_posts = 10;

// sample titles based on real issues in my country 
$sample_titles = [
    "Kenyan Govt: Shutting Down Refugee Camps 🤦‍♂️ #RefugeeRights",
    "Femicide Strikes Again 💔 #StopKillingWomen",
    "Justice for Sheila Adhiambo Lumumba 🏳️‍🌈 #EndHomophobia",
    "Break the Chains: Mental Health Rights 🗝️ #EndStigma",
    "Bodies Dumped in River: Govt Turns a Blind Eye 🌊 #JusticeForVictims",
    "Toxic Workplaces: Narcissistic Boss Alert 🚨 #WorkplaceHorror",
    "Schooling Struggles: Why Study When You Can Stress? 😩",
    "Covid-19 Funds Misused: Where's the Accountability? 💸 #Corruption",
    "Beware of Scammers: Safaricom Impersonation Scam 😡 #StayAlert",
    "Rampant Corruption: Is Kenya Really Open for Business? 🤔 #NoTransparency",
    "Children's Privacy Violated: Online Learning Fail 😱 #ProtectOurKids",
    "Mental Health Crisis: Shackling Continues 😞 #BreakTheChains"
];
// sample users 
$sample_usernames = array(
    "GengeTingz47",
    "NjaaHustler96",
    "Wakilisha254Mjengo",
    "MajiKaliKe23",
    "NyamaChoma_Ke88",
    "MkateNyama_Ke55",
    "SimuZetu254",
    "BazeLifestyle47",
    "MchafuSana_Ke",
    "ShereheKe254",
    "HustleGang_Ke",
    "BongeLaStori_Ke"
);

function generateRandomCount()
{
    // Generate a random number between 1 and 999
    $random_number = rand(1, 999);
    // Array containing possible suffixes
    $suffixes = array("K", "M");
    // Randomly select a suffix from the array
    $random_suffix = $suffixes[array_rand($suffixes)];
    // Concatenate the random number and suffix to form the string
    $random_count = $random_number . $random_suffix;
    return $random_count;
}

function generateRandomTime()
{
    // Generate a random hour (between 1 and 12)
    $hour = str_pad(rand(1, 12), 2, "0", STR_PAD_LEFT);
    // Generate a random minute (between 0 and 59)
    $minute = str_pad(rand(0, 59), 2, "0", STR_PAD_LEFT);
    // Randomly choose between AM and PM
    $ampm = rand(0, 1) ? 'AM' : 'PM';
    // Generate a random day (between 1 and 31)
    $day = str_pad(rand(1, 31), 2, "0", STR_PAD_LEFT);
    // Generate a random month (between 1 and 12)
    $month = str_pad(rand(1, 12), 2, "0", STR_PAD_LEFT);
    // Generate a random year (between 2020 and 2030)
    $year = rand(2020, 2030);
    // Concatenate the components to form the time string
    $random_time = "$hour:$minute $ampm $day-$month-$year";
    return $random_time;
}

function generateRandomPic()
{
    $pics = [
        "../uploads/users/0e1cf00605082d11da6385459a3a1687.jpg",
        "../uploads/users/44a67140daac9f67b93315c07b8e2ae0.jpg",
        "../uploads/users/220e4c73f6674d46a84840ebde9f9bc8.webp",
        "../uploads/users/5560va6tsg191.jpg",
        "../uploads/users/219969.png",
        "../uploads/users/00701602b0eac0390b3107b9e2a665e0.jpg",
        "../uploads/users/5821883.jfif",
        "../uploads/users/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f42354d6849535545464c524a35773d3d2d3134362e313463326235313935663361613233393839333838323537353635362e.jfif",
        "../uploads/users/ddaf1c402f3767d7c934aac8520aa12c023fd31c_00.jpg",
        "../uploads/users/funny-profile-picture-9gkayiu1i7j211fg.jpg",
        "../uploads/users/random_profile_picture_by_skybonthebunny_d9mot04-fullview.jpg",
        "../uploads/users/static-assets-upload9375466411229909501.webp"
    ];
    return $pics[array_rand($pics)];
}

for ($i = 0; $i < count($sample_titles); $i++) {
?>

    <div class="post">
        <div class="post-header">
            <!-- <img class="post-author-pic" src="../uploads/users/219969.png" alt=""> -->
            <img class="post-author-pic" src="<?php echo generateRandomPic(); ?>" alt="">
            <!-- <p class="post-author">Anonymous User #2345664</p> -->
            <p class="post-author">
                <?php echo $sample_usernames[array_rand($sample_usernames)]; ?>
            </p>

            <div class="menu align-items-center post-menu" title="more">
                <i class="fa-solid fa-ellipsis"></i>
            </div>
        </div>
        <div class="post-content">
            <br>
            <!-- <h4 class="post-title">Most Toxic Firms in Nairobi 🤣 Let's Go!</h4> -->
            <h4 class="post-title">
                <?php echo $sample_titles[$i]; ?>
            </h4>
            <p class="remark">
                <!-- <span class="remark_value">52</span> -->
                <span class="remark_value"><?php echo rand(1, 500); ?></span>
                recorded so far
            </p>
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
                        <!-- <span class="date">11:01 PM 28-02-2024</span> -->
                        <span class="date"><?php echo generateRandomTime(); ?></span>
                        .&nbsp;
                    </li>
                    <li>
                        <!-- <span class="views">100K</span> views -->
                        <span class="views"><?php echo generateRandomCount(); ?></span> views
                    </li>
                </ul>
            </div>

            <div class="row post-metadata">
                <div class="col text-center post-likes">
                    <i class="fa-regular fa-comment"></i>
                    <!-- 50.6K -->
                    <?php echo generateRandomCount(); ?>
                </div>
                <div class="col text-center post-comments">
                    <i class="fa-solid fa-retweet"></i>
                    <!-- 50.6K -->
                    <?php echo generateRandomCount(); ?>
                </div>
                <div class="col text-center post-comments">
                    <i class="fa-regular fa-heart"></i>
                    <!-- 100K -->
                    <?php echo generateRandomCount(); ?>
                </div>
                <div class="col text-center post-saves">
                    <i class="fa-regular fa-bookmark"></i>
                    <!-- 58K -->
                    <?php echo generateRandomCount(); ?>
                </div>
                <div class="col text-center post-share">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                </div>
            </div>
        </div>
    </div>


<?php
}
?>