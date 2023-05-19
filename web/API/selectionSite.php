<?php
  session_start();
  $_SESSION['ville'] = $_POST['ville'];
  echo($_SESSION['ville']);
?>