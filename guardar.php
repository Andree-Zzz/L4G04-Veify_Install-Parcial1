<?php
    include("includes/db.php");
    if(isset($_GET['estado'])){
        $estado = $_GET['estado'];
        $id = $_GET['id'];
        if($estado=="activo"){
            $es = "inactivo";
        }else{
            $es = "activo";
        }
        $sql = "UPDATE usuarios set estado='$es' WHERE id='$id'";
        DB::query($sql);
        header('location: index.php');
    }else{
        $accion=$_POST["accion"];
        $id=(int)$_POST["id"];
        $nombres=$_POST["nombres"];
        $apellidos=$_POST["apellidos"];
        $email=$_POST["email"];
        $password=md5($_POST["password"]);
        $estado=$_POST["estado"];
        if($accion=="editar"){
            $sql="UPDATE `usuarios` SET `nombres`='$nombres', `apellidos`='$apellidos',
            `email`='$email', `password`='$password', `estado`='$estado' WHERE  `id`='$id';";
            DB::query($sql);
            header('location: index.php');
        }else{
            $sql="insert into usuarios(nombres,apellidos,email,password,estado)
            values('$nombres','$apellidos','$email','$password','activo')";
            DB::query($sql);
            header('location: index.php');
        }
    }
?>