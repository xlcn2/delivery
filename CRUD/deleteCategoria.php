<?php
 
require 'banco.php';

   
  $id = $_REQUEST['id'];

    //Delete do banco:
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM categoria where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Banco::desconectar();
     echo"<script>  alert('Categoria Excluída');
            window.location.replace('../categoria.php');</script>";


?>
