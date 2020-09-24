<?php 


        require 'banco.php';
        $idCliente = $_POST['idCliente'];
        if($_POST['codigo']=="" && $_POST['lanche']==""){
            
       echo"<script>  alert('Escolha ao menos um dos campos.');
            window.location.replace('../adicionar_pedido_balcao.php?id=".$idCliente."');</script>";
        
        }
        $teste =  $_POST['lanche'];
      if($_POST['codigo']=="" && $teste=!""){
            
       $id = $_POST['lanche'];
       $pdo = Banco::conectar();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT * FROM lanche where id = ?";
       $q = $pdo->prepare($sql);
       $q->execute(array($id));
       $data = $q->fetch(PDO::FETCH_ASSOC);
       Banco::desconectar();

                $datahj = date("Y-m-d H:i:s");
                $idLanche = $data['id'];
                $obs =  $_POST['observacao'];
                $lanche = $data['nome'];
                $valor = $data['valor'];
                $qtd = $_POST['qtd'];
                
                $pdo = Banco::conectar();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO pedido_balcao (dataPedido, idCliente, idLanche, observacaoLanche, detalhes, valorPedido,qtd) VALUES(?,?,?,?,?,?,?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($datahj,$idCliente, $idLanche, $obs, $lanche, $valor,$qtd));
                Banco::desconectar(); 

                 header ("Location: ../adicionar_pedido_balcao.php?id=".$idCliente);

      }
        
    else{
        	$id = $_POST['codigo'];
       

       $pdo = Banco::conectar();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT * FROM lanche where id = ?";
       $q = $pdo->prepare($sql);
       $q->execute(array($id));
       $data = $q->fetch(PDO::FETCH_ASSOC);
        if($data){
       Banco::desconectar();

                $datahj = date("Y-m-d H:i:s");
                $idLanche = $data['id'];
                $obs =  $_POST['observacao'];
                $lanche = $data['nome'];
                $valor = $data['valor'];
                $qtd = $_POST['qtd'];
                
                $pdo = Banco::conectar();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO pedido_balcao (dataPedido, idCliente, idLanche, observacaoLanche, detalhes, valorPedido,qtd) VALUES(?,?,?,?,?,?,?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($datahj,$idCliente, $idLanche, $obs, $lanche, $valor,$qtd));
                Banco::desconectar(); 

                 header ("Location: ../adicionar_pedido_balcao.php?id=".$idCliente);}
        else{
            echo"<script>  alert('Codigo do produto não encontrado.');
            window.location.replace('../adicionar_pedido_balcao.php?id=".$idCliente."');</script>";
        }
    }