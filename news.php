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
                        <li><a href="./index.php">Home</a></li>
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
                        <li><a href="">Sports</a></li>
                        <li><a href="">Technology</a></li>
                        <li><a href="">Busines</a></li>
                        <li><a href="">Waether</a></li>
                        <li><a href="">Economic</a></li>
                        <li><a href="">Current Affairs</a></li>

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

                // Check connection
                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Query to retrieve posts from the database
                $query = "SELECT * FROM posts";
                $result = mysqli_query($connection, $query);

                // Check if query executed successfully
                if ($result) {
                    // Loop through retrieved posts
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Output HTML for each post dynamically
                        echo '<div class="post_container">';
                        echo '<div class="post_img"><img src="' . $row['post_banner_img'] . '" alt="Post Image"></div>';
                        echo '<button>' . $row['post_category'] . '</button>';
                        echo '<h3>' . $row['post_title'] . '</h3>';
                        echo '<div class="post_author_details">';
                        echo '<div class="author_img"><img src="' . $row['author_image'] . '" alt="Author Image"></div>';
                        echo '<p>' . $row['author_name'] . '</p>';
                        echo '<p>' . $row['post_date'] . '</p>';
                        echo '</div></div>';
                    }
                } else {
                    // Handle errors if the query fails
                    echo "Error retrieving posts: " . mysqli_error($connection);
                }

                // Close database connection
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