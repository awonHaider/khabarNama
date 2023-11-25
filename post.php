<?php
// Retrieve the post ID from the URL
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // Fetch post details based on the post ID from the database
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

    // Query to retrieve post details based on ID
    $query = "SELECT * FROM posts WHERE post_id = $post_id";
    $result = mysqli_query($connection, $query);

    // Check if query executed successfully and fetch post details
    if ($result && mysqli_num_rows($result) > 0) {
        $post = mysqli_fetch_assoc($result);
        // Display post details
        $post_title = $post['post_title'];
        $post_content = $post['post_content'];
        // ... (fetch other details as needed)

        // Display the post content on the page
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <!-- Your head content -->
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./css//post-style.css">
            <title><?php echo $post_title; ?></title>
        </head>

        <body>
            <!-- Your header and other sections -->

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

            <section>
                <div class="page_width_body">
                    <div class="post_inner">
                        <button><?php echo $post['post_category']; ?></button>
                        <h2><?php echo $post_title; ?></h2>

                        <div class="post_author_details">
                            <div class="author_img">
                                <img src="<?php echo $post['author_image']; ?>" alt="Author" />
                            </div>
                            <p><?php echo $post['author_name']; ?></p>
                            <p><?php echo $post['post_date']; ?></p>
                        </div>

                        <div class="post-banner">
                            <img src="<?php echo $post['post_banner_img']; ?>" alt="">
                        </div>

                        <div class="post-text">
                            <p><?php echo $post_content; ?></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Your footer and script references -->
            <footer class="site-footer">
                <div class="container">
                    <p>&copy; 2023 KhabarNama. All rights reserved.</p>
                </div>
            </footer>
        </body>

        </html>
<?php
    } else {
        echo "Post not found.";
    }

    mysqli_close($connection);
} else {
    echo "Invalid post ID.";
}
?>