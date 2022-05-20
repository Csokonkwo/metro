<?php 

include("path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "single";

if(isset($_GET['id'])){
    $single = selectOne('posts', ['id' => $_GET['id']]);
    $user = selectOne('users', ['id' => $single['user_id']]);
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/head.php"); ?>

    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
    <?php include("includes/header.php")?>
    <!----------- Main section ---------------->
    
    <main>

        <br>
        <div class="single">
            <div class="container">
                <h1><?php echo $single['title']; ?></h1>
                <p><i><?php echo $user['username']; ?></i> <i><?php echo date('F j, Y.', strtotime($single['created_at'])); ?></i></p>
                
                <img src="<?php echo BASE_URL . '/admin/img/'. $single['image']; ?>" alt="" class="post-image single-image">

                <p><?php echo html_entity_decode($single['body']); ?></p>

            </div>
        </div>
    </main>
    
    
    <?php include("includes/footer.php")?>

    <!-- <script>
        $(document).ready(function() {  

            var post_idd = "<?php echo $_GET['id'] ?>";
            var commentCount = 2;
            $("#comment-btn").click(function(){
                commentCount = commentCount + 2;
                $("#comments").load("load_comments.php", {
                    commentNewCount: commentCount,
                    post_id:  post_idd
                });
            });
        });


    </script>
     -->
</body>
</html>