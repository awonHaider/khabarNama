<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home-style.css">
    <title>KhabarNama</title>
</head>

<body>
    <section class="userStatusSection">
        <div class="page_width">
        <div class="showLoggedIn">
            <div class="left">
                <p><?php
                    session_start();
                    if (isset($_SESSION["email"])) {
                         echo '<p>Hello! ' . $_SESSION["email"] . '</p>';
                    }
                    ?>
                </p>
            </div>

            <div class="right">
                <?php
                if (isset($_SESSION["email"])) {
                    echo '<a href="./admin_dashboard.php">Go to Admin Dashboard</a>';
                    echo ' | ';
                    echo '<a href="./logout.php">(Log Out)</a>';
                }
                ?>

            </div>
        </div>
        </div>
    </section>
    <header>
        <div class="page_width">
            <div class="header-inner">

                <div class="menu-nav">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="./news.php">News</a></li>
                    </ul>
                </div>

                <div class="logo">
                    <h1>KhabarNama</h1>
                </div>

                <div class="reg-nav">
                    <ul>
                        <li><button><a href="./signup.php">Sign Up</a></button></li>
                        <li><button><a href="./login.php">Log In</a></button></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section class="new-category-section">
        <div class="page_width">
            <div class="news-categories">
                <nav>
                    <ul>
                        <li><a href="news.php?category=Sports">Sports</a></li>
                        <li><a href="news.php?category=Technology">Technology</a></li>
                        <li><a href="news.php?category=Business">Business</a></li>
                        <li><a href="news.php?category=Weather">Weather</a></li>
                        <li><a href="news.php?category=Sports">Economics</a></li>
                        <li><a href="news.php?category=Technology">Current Affairs</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </section>


    <!-- <div class="slider-container">
        <div class="slider">
            <div class="slide">
                <div class="slide-content">
                    <div class="slide-img"><img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                    <div class="slide-text">
                        <h2>Post Title 1</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam placeat necessitatibus, ipsam expedita ipsum sint rerum mollitia ex</p>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide-content">
                    <div class="slide-img"><img src="https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""></div>
                    <div class="slide-text">
                        <h2>Post Title 2</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam placeat necessitatibus, ipsam expedita ipsum sint rerum mollitia ex</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="slider-container">
        <div class="slider">
            <?php
            // Assuming you've established a database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "khabarnama";

            $connection = mysqli_connect($servername, $username, $password, $dbname);

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $query = "SELECT * FROM posts";
            $result = mysqli_query($connection, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="slide">';
                    // Linking each slide to the full post using an anchor tag
                    echo '<a href="post.php?id=' . $row['post_id'] . '" class="post-link">';
                    echo '<div class="slide-content">';
                    echo '<div class="slide-img"><img src="' . $row['post_banner_img'] . '" alt=""></div>';
                    echo '<div class="slide-text">';
                    echo '<h2>' . $row['post_title'] . '</h2>';
                    $content = $row['post_content'];
                    if (strlen($content) > 150) {
                        $content = substr($content, 0, 150) . "...";
                    }
                    echo '<p>' . $content . '</p>';
                    echo '</div></div></a></div>';
                }
            } else {
                echo "No posts available.";
            }

            mysqli_close($connection);
            ?>
        </div>
    </div>



    <!-- <section class="section_margin">
        <div class="page_width">
            <div class="latest-new">
                <div class="latest-new-head">
                    <h2>Latest News!</h2>
                </div>

                <div class="latest-news-grid">

                    <div class="post_container">
                        <div class="post_img">
                            <img src="https://via.placeholder.com/150" alt="Placeholder Image" />
                        </div>
                        <button>Technology</button>
                        <h3>Sample Title</h3>
                        <div class="post_author_details">
                            <div class="author_img">
                                <img src="./images//author//ahmed.jpeg" alt="Author" />
                            </div>
                            <p>John Doe</p>
                            <p>November 24, 2023</p>
                        </div>
                    </div>

                    <div class="post_container">
                        <div class="post_img">
                            <img src="https://via.placeholder.com/150" alt="Placeholder Image" />
                        </div>
                        <button>Technology</button>
                        <h3>Sample Title</h3>
                        <div class="post_author_details">
                            <div class="author_img">
                                <img src="https://via.placeholder.com/50" alt="Author" />
                            </div>
                            <p>John Doe</p>
                            <p>November 24, 2023</p>
                        </div>
                    </div>

                    <div class="post_container">
                        <div class="post_img">
                            <img src="https://via.placeholder.com/150" alt="Placeholder Image" />
                        </div>
                        <button>Technology</button>
                        <h3>Sample Title</h3>
                        <div class="post_author_details">
                            <div class="author_img">
                                <img src="https://via.placeholder.com/50" alt="Author" />
                            </div>
                            <p>John Doe</p>
                            <p>November 24, 2023</p>
                        </div>
                    </div>

                    <div class="post_container">
                        <div class="post_img">
                            <img src="https://via.placeholder.com/150" alt="Placeholder Image" />
                        </div>
                        <button>Technology</button>
                        <h3>Sample Title</h3>
                        <div class="post_author_details">
                            <div class="author_img">
                                <img src="https://via.placeholder.com/50" alt="Author" />
                            </div>
                            <p>John Doe</p>
                            <p>November 24, 2023</p>
                        </div>
                    </div>

                    <div class="post_container">
                        <div class="post_img">
                            <img src="https://via.placeholder.com/150" alt="Placeholder Image" />
                        </div>
                        <button>Technology</button>
                        <h3>Sample Title</h3>
                        <div class="post_author_details">
                            <div class="author_img">
                                <img src="https://via.placeholder.com/50" alt="Author" />
                            </div>
                            <p>John Doe</p>
                            <p>November 24, 2023</p>
                        </div>
                    </div>

                    <div class="post_container">
                        <div class="post_img">
                            <img src="https://via.placeholder.com/150" alt="Placeholder Image" />
                        </div>
                        <button>Technology</button>
                        <h3>Sample Title</h3>
                        <div class="post_author_details">
                            <div class="author_img">
                                <img src="https://via.placeholder.com/50" alt="Author" />
                            </div>
                            <p>John Doe</p>
                            <p>November 24, 2023</p>
                        </div>
                    </div>

                </div>

            </div>

            <div class="latest-news-button">
                <button>See More!</button>
            </div>
        </div>
    </section> -->


    <section class="section_margin">
        <div class="page_width">
            <div class="latest-new">
                <div class="latest-new-head">
                    <h2>Latest News!</h2>
                </div>

                <div class="latest-news-grid">
                    <!-- PHP code starts here -->
                    <?php
                    // Establish database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "khabarnama";

                    // Create connection
                    $connection = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$connection) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Query to retrieve posts from the database
                    $query = "SELECT * FROM posts";
                    $result = mysqli_query($connection, $query);

                    // Check if query executed successfully
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Output HTML for each post dynamically
                            echo '<a href="post.php?id=' . $row['post_id'] . '" class="post_link">';
                            echo '<div class="post_container">';
                            echo '<div class="post_img"><img src="' . $row['post_banner_img'] . '" alt="Post Image"></div>';
                            echo '<button>' . $row['post_category'] . '</button>';
                            echo '<h3>' . $row['post_title'] . '</h3>';
                            echo '<div class="post_author_details">';
                            echo '<div class="author_img"><img src="' . $row['author_image'] . '" alt="Author Image"></div>';
                            echo '<p>' . $row['author_name'] . '</p>';
                            echo '<p>' . $row['post_date'] . '</p>';
                            echo '</div></div>';
                            echo '</a>';
                        }
                    } else {
                        echo "No posts available.";
                    }

                    mysqli_close($connection);
                    ?>
                    <!-- PHP code ends here -->
                </div>
            </div>
        </div>
    </section>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; 2023 KhabarNama. All rights reserved.</p>
        </div>
    </footer>

    <script src="./js//homeScript.js"></script>
</body>

</html>