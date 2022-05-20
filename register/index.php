<?php  
if(isset($_SESSION['id'])){
    header("location: ../app/index.php");
}else{
    header("location: ../index.php");
}

?>