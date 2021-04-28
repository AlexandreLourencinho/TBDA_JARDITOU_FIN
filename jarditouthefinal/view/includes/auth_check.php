<?php
if(!isset($_SESSION['user_id'])){ 
    header("location: ../../controller/login/se_connecter.php");
} ?>