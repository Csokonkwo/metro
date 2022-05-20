<?php 
include("../path.php");
include("server/posts.php");
include("server/server.php");
$pageName = "Posts";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $companyName; ?> - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Dosis:wght@700&family=Lora:ital@1&family=Noto+Sans&family=Roboto+Condensed:wght@400&display=swap" rel="stylesheet"> 

    <script src="https://kit.fontawesome.com/27416b154a.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../app/css/style.css">
    <link rel="stylesheet" href="../app/css/main.css">
    <link rel="stylesheet" href="css/form.css">
    
</head>
<body>
    <?php include("header.php"); ?>
    
    <!----------- Main section ---------------->
    
    <main>
    <div class="admin-content">
            <div class="button-group">
                <a href="postadd.php" class="btn btn-big">Add post</a>
                <a href="index.php" class="btn btn-big">Manage post</a>
            </div>
            
            <div class="content">
                <br>
                <h2 class="page-title">Manage post</h2>
                <?php include('server/message.php'); ?>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                    <?php foreach ($posts as $key => $post): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $post['title'] ?></td>
                            <?php $theAuthor = selectOne('users', ['id'=> $post['user_id']]); ?>
                            <td><?php echo $theAuthor['username'] ?></td>
                            <td><a href="postedit.php?id=<?php echo $post['id']; ?>" class="edit">edit</a></td>
                            <td><a href="index.php?del_id=<?php echo $post['id']; ?>" class="delete">delete</a></td>
                            <?php if($post['published']): ?>
                                <td><a href="postedit.php?published=0&p_id=<?php echo $post['id'] ?>" class="unpublish">unpublish</a></td>
                            <?php else: ?>
                                <td><a href="postedit.php?published=1&p_id=<?php echo $post['id'] ?>" class="publish">publish</a></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
   
        
    </main>
        
    <?php include("footer.php"); ?>
    
</body>
</html>