<?php
include("includes/db.php");
$id=(int)$_GET["id"];
$sql="DELETE FROM `usuarios` WHERE  `id`=$id;";
DB::query($sql);
header('location: index.php');
?>