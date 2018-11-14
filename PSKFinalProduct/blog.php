<?php include 'includes/config.php'?>

<?php include 'includes/top.php' ?>

<?php

$statement = execute_query("SELECT title, body, date, keywords, name, id
FROM blog_simple JOIN author ON blog_simple.author_id = author.author_id
ORDER BY id DESC");
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

    <style>
        .beta_button_desktop{
            display:none;
        }
    </style>

    <!-- START LEFT Column -->
    <article class="map">
        <div class="blog-header">
            <h1 class="blog-title">Welcome to PopSmartKids Blog</h1>
            <p class="lead blog-description">The future of learning starts with fresh ideas.</p>
        </div>
        <div class="blog body">

            <?php
            if($statement->rowCount() > 0) :
                foreach ($posts as $post) :
                    ?>
                    <div class="blog-post">
                        <h2 class="blog-post-title"><a href="blog_post.php?post=<?php echo $post['id']?>"><?php echo $post['title']?> </a></h2>
                        <p class="blog-post-meta"><?php echo $post['date']?> by <?php echo $post['name']?></p>

                        <?php $body = $post['body'];
                        $temp_body = strip_tags($body);
                        echo substr($body, 0, 400) . "...";
                        ?>

                    </div><!-- /.blog-post -->
                <?php
                endforeach;
            endif; ?>


        </div> <!--end blog body-->
    </article>
    <!-- END LEFT Column -->


<?php include 'includes/bottom.php' ?>