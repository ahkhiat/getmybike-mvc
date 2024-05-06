<?php
$_SESSION = array();
session_unset();
session_destroy();
echo "<script>window.location.href='?controller=home&action=home'</script>"; 
 ?>