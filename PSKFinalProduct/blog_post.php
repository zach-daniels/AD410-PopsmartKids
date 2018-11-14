<?php include 'includes/config.php' ?>
<?php
if (isset($_GET['post'])) {
    $id = $_GET['post'];

    /* $query = "SELECT * FROM blog_simple WHERE id='$id'";
     $statement = $db->prepare($query);
     $statement->execute();*/
    $statement = execute_query("SELECT title, body, date, keywords, name, id
FROM blog_simple JOIN author ON blog_simple.author_id = author.author_id WHERE id='$id'");
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Show post title as title for the page
    if ($statement->rowCount() > 0) :
        foreach ($posts as $post) :
            $myTitle = $post['title'];
        endforeach;
    endif;

    if (isset($_POST['post_comment'])) {
        $name = $_POST['name'];
        $comment = $_POST['comment'];

        /*$query = "INSERT INTO comments_simple (name, comment, post) VALUES ('$name','$comment','$id')";
        $statement = $db->prepare($query);
        $statement->execute();*/

        //$statement = execute_query("INSERT INTO comments_simple (name, comment, post) VALUES ('$name','$comment','$id')");
        $query = "INSERT INTO comments_simple (name, comment, post) VALUES (:name, :comment, :id)";
        $boundQ = array(":name", ":comment", ":id");
        $param = array($name, $comment, $id);
        $db = rdy_DB();
        $cmmt = $db->prepare($query);
        $cmmt->bindValue($boundQ[0], $param[0]);
        $cmmt->bindValue($boundQ[1], $param[1]);
        $cmmt->bindValue($boundQ[2], $param[2]);
        $cmmt->execute();
        //echo "<script type='text/javascript'>alert('$param[0] + $param[1] + $param[2]');</script>";
        //bound_query($query, $boundQ, $param);
        //this bit stops the comment being resubmitted upon refreshing the page
        header("Location:blog_post.php?post=$id");
        exit();
    }

    /*$query = "SELECT * FROM comments_simple WHERE post='$id' AND status='1'";
    $commentsStatement = $db->prepare($query);
    $commentsStatement->execute(); */
    $commentsStatement = execute_query("SELECT * FROM comments_simple WHERE post='$id' AND status='1'");

    $comments = $commentsStatement->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!-- Include moved below sql query to allow title to be grabbed before top is made -->
    <?php include 'includes/top.php' ?>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    
    <style>
        .beta_button_desktop {
            display: none;
        }
    </style>
    <!-- START LEFT Column -->
    <div class="spacer"></div>
    <article class="map">

        <div id="fb-root"></div>

        <div class="blog body">
            <?php
            if ($statement->rowCount() > 0) :
                foreach ($posts as $post) :
                    ?>
                    <div class="blog-post">
                        <h1 class="blog-post-title"><?php echo $post['title'] ?></h1>
                        <p class="blog-post-meta"><?php echo $post['date'] ?> by <?php echo $post['name'] ?></p>

                        <?php echo $post['body'] ?>

                    </div><!-- /.blog-post -->
                <?php
                endforeach;
            endif; ?>
        </div> <!--end blog body-->
    </article>
    <!-- END LEFT Column -->

    <hr>
    <br>
    <div class="container">
        <br>
        <blockquote> Comments: <?php echo $commentsStatement->rowCount(); ?></blockquote>
        <br>
        <h4 id="login">Log in to view and add comments</h4>
        <h4 id="user_name"></h4>
		
		<!--  
        <a href="javascript:void(0)" id="logout" onclick="logout()">Logout</a>
        -->
        
        <!-- FACEBOOK BUTTON -->
        
        <fb:login-button
                id="fb-btn"
                data-size="large"
                scope="public_profile,email"
                onlogin="checkLoginState();">
        </fb:login-button>
        
        <!-- GOOGLE BUTTON -->
        <div id="google-btn" class="g-signin2" data-onsuccess="onSignIn"></div>
        
        <!-- LINKEDIN BUTTON -->
        <span id="linkedin-btn"><script type="in/Login"></script></span>
        
    </div>

    <div class="container" id="blog_comment_block">
        <form method="POST">
            <label for="fname">Name</label>
            <input type="text" id="fname" name="name" value="" readonly>

            <label for="subject">Comments</label>
            <textarea id="subject" name="comment" placeholder="Write something.." style="height:200px"></textarea>
            <button type="submit" name="post_comment">Submit</button>
        </form>
        <hr>
    </div>

    <?php
    if ($commentsStatement->rowCount() > 0) :
        foreach ($comments as $comment) :
            ?>
            <div class="container comment">
            <div class=comment-head">
                <h4><?php echo $comment['name'] ?></h4>
            </div>

            <div class="container comment">
                <div class="comment-text">
                    <p><?php echo $comment['comment'] ?></p>
                </div>
            </div>
        <?php
        endforeach;
    endif; ?>
<?php } ?>

<?php include("includes/bottom.php"); ?>