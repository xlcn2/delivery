 <?php
            	if ($_POST)
            {
                  require 'banco.php';
                    
                  $id_cliente = $_POST['id_cliente'];
		          $qtd = $_POST['qtd'];
                  $obs = $_POST['obs'];
                  $id = $_POST['id'];
		  
                

		

		            // update data
		   
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE pedidoAtual  set  qtd= ?, observacaoLanche = ? WHERE id_individual = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($qtd, $obs, $id));
                    Banco::desconectar();
                  
                    header ("Location: ../adicionar_pedido.php?id=".$id_cliente);
		
	}