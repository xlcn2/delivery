 <?php   
                    require 'CRUD/banco.php';

                    Banco::desconectar();
                    

                    


                    $datahj = date("Y-m-d H:i:s");  
                    // insere a data atual para o proximo expediente
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "INSERT IGNORE INTO dataPedidos (dataPedido) VALUES(?)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($datahj));
                    Banco::desconectar(); 

                    // deleta os registros de pedidos anteriores
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "DELETE FROM ordem_pedido";
                    $q = $pdo->prepare($sql);
                    $q->execute();
                    Banco::desconectar();
                    
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "DELETE FROM pedidoRecente";
                    $q = $pdo->prepare($sql);
                    $q->execute();
                    
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "DELETE FROM ordem_pedido_balcao";
                    $q = $pdo->prepare($sql);
                    $q->execute();
                    Banco::desconectar();
                    
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "DELETE FROM pedido_recente_balcao";
                    $q = $pdo->prepare($sql);
                    $q->execute();
                       
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE expediente  set  status= ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array("Iniciado"));
                    Banco::desconectar();

                    
                    echo"<script>  alert('Expediente Iniciado.');
                    window.location.replace('painel_inicial.php');</script>";