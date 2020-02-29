<?php
setcookie('nameUser', $getUser, time()-3000);
setcookie('roleUser', $getRole, time()-3000);
setcookie('idUser', $getId, time()-3000);
header("location:index.php");
