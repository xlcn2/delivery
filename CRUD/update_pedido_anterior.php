 <?php
            	if ($_POST)
            {
                  require 'banco.php';
                    
                  $id_cliente = $_POST['id_cliente'];
		          $qtd = $_POST['qtd'];
                  $obs = $_POST['obs'];
                  $id = $_POST['id'];
		           $id_ped = $_POST['id_ped'];
                

		

		            // update data
		   
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE pedidoRecente  set  qtd= ?, observacaoLanche = ? WHERE id_individual = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($qtd, $obs, $id));
                    Banco::desconectar();
                  
                    header ("Location: ../pedidoAnterior.php?id=".$id_cliente."&idPed=".$id_ped);
		
	}