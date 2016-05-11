<?php include "includes/header.php";?>
<?php include "includes/db.php";?>


    <!-- Navigation -->
    <?php include "includes/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php 
                
                if(isset($_GET['p_id'])) {
                    $the_post_id = $_GET['p_id'];
                    $the_post_user = $_GET['author'];
                }
                
                
                $query = "SELECT * FROM posts WHERE post_user = '{$the_post_user}' ";
                $select_all_posts_query = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        
                    $post_title = $row['post_title'];
                    $post_user = $row['post_user'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                 ?>
                       
                          
                <h1 class="page-header">
                    All Posts by <?php echo $post_user ?>
                    <small><?php echo $post_user ?></small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $the_post_id; ?>"><?php echo $post_title ?></a>
                </h2>
<!--
                <p class="lead">
                    All Posts by <?php echo $post_user ?>
                </p>
-->
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <a href = "post.php?p_id=<?php echo $the_post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image;?>" alt=""></a>
                <hr>
                <p><?php echo $post_content ?></p>
                <hr>             
        <?php } ?>
                

                <!-- Blog Comments -->
                
                
                
                
                <!-- Comments Form -->

                <hr>
        </div>

            <!-- Blog Sidebar Widgets Column -->
            
            <?php include "includes/sidebar.php";?>
            
            

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?> 
