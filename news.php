<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home-style.css">
    <title>KhabarNama</title>
</head>

<body>
    <header>
        <div class="page_width">
            <div class="header-inner">

                <div class="menu-nav">
                    <ul>
                        <li><a href="./">Home</a></li>
                        <li><a href="./news.php">News</a></li>
                    </ul>
                </div>

                <div class="logo">
                    <h1>KhabarNama</h1>
                </div>

                <div class="reg-nav">
                    <ul>
                        <li><button>Sign Up</button></li>
                        <li><button>Log In</button></li>
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
                        <li><a href="news.php?category=Economics">Economics</a></li>
                        <li><a href="news.php?category=Technology">Current Affairs</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </section>

    <!-- This is Static Data Based latest news section that i create first
    later on i changed with dynamic -->
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

        </div>
    </section> -->

    <section class="section_margin">
        <div class="page_width">
            <div class="latest-new">
                <div class="latest-new-head">
                    <?php
                    // Check if a specific category is requested
                    if (isset($_GET['category'])) {
                        $selected_category = $_GET['category'];
                        echo '<h2>' . ucfirst($selected_category) . ' News!</h2>'; // Show selected category title
                    } else {
                        echo '<h2>Latest News!</h2>'; // Default title if no category is specified
                    }
                    ?>
                </div>

                <div class="latest-news-grid">
                    <!-- PHP code starts here -->
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "khabarnama";

                    $connection = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$connection) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Check if a specific category is requested
                    if (isset($_GET['category'])) {
                        $selected_category = $_GET['category'];

                        // Query to retrieve posts based on the selected category
                        $query = "SELECT * FROM posts WHERE post_category = '$selected_category'";
                    } else {
                        // If no category is specified, retrieve all posts
                        $query = "SELECT * FROM posts";
                    }

                    $result = mysqli_query($connection, $query);

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