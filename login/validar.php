<?php
 
// inclui o arquivo de inicialização
require 'init.php';


 
// resgata variáveis do formulário
$login = $_GET['login'];
$senha = $_GET['senha'];
 

if (empty($senha) || empty($senha))
{
      echo "<script> alert('insira login e senha'); 
      window.location.replace('../index.php'); </script>";
    exit;
} 
 
$PDO = db_connect();
 

$sql = "SELECT * FROM usuarios WHERE senha like '".$senha."' AND user like '".$login."'";
$stmt = $PDO->prepare($sql);
 

 
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($users) <= 0)
{
     echo "<script> alert('login ou senha incorretos!'); 
     window.location.replace('../index.php'); </script>";
    exit;
}
 
// pega o primeiro usuário
$user = $users[0];

if($user['nivel']=="admin"){
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = $user['user'];
       $_SESSION['nivel'] = $user['nivel'];
    
     
        header('Location: ../painelAdm.php');
}
else{
 session_cache_expire(1080);
 session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user'] = $user['user'];
        
       require '../CRUD/banco.php';
       $pdo = Banco::conectar();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT * FROM dados_empresa";
       $q = $pdo->prepare($sql);
       $q->execute();
       $data = $q->fetch(PDO::FETCH_ASSOC);
       Banco::desconectar();
    
    $_SESSION['nome'] = $data['nome'];
    $_SESSION['usuario'] = $data['usuario'];
    $_SESSION['senha'] = $data['senha'];

header('Location: ../painel_inicial.php');
}
