<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from user where id= $id";
    $res= mysqli_query($con,$sql);
    if($res){
        //echo "deleted successfull";
        header('location:dispaly.php');

    }else{
        die(mysqli_error($con));
    }
}

?>