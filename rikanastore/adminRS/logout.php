<?php
session_destroy();
echo "<script>alert('anda telat logout');</script>";
echo "<script>location='login.php';</script>";
?>