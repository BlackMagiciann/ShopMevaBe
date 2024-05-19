<?php
session_start();

// Hủy bỏ toàn bộ session
session_destroy();

// Chuyển hướng về trang index.php
header("Location: index.php");
exit();
?>
