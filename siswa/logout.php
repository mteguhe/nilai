<?php

if(isset($_COOKIE['username'])){

setcookie('username','', time());

header ('Location: ../index.php');
}
else
{header ('Location: ../index.php');}

?>