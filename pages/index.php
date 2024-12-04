<?php 
session_start();
if(isset($_SESSION['id'])){
    header('location: ./main_page.php');
}else{
    header('location: ../');
}
?>