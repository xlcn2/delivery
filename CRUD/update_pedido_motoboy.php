 <?php
            	if ($_POST)
            {
                  require 'banco.php';
                    
                  $id_pedido = $_POST['id_pedido'];
		          $id_motoboy = $_POST['id_motoboy'];
                  
                

		

		            // update data
		   
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE ordem_pedido  set  id_motoboy= ? WHERE id = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($id_motoboy, $id_pedido));
                    Banco::desconectar();
                  
                    header ("Location: ../pedidos_motoboy.php");
		
	}