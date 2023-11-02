<?php
session_start();
session_destroy();
echo 'Has cerrado la sesion <a href="/">Volver</a>';
//header('/auth/login.blade.php');
?>
