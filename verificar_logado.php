<?php

session_start();
if(!isset($_SESSION['logado'])){
    header("Location:login.php?erro3=sim");

}

?>