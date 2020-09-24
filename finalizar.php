 <?php   
                    require 'CRUD/banco.php';

                    Banco::desconectar();
                    

                    $qtDiaria = 0;
                    $valorPedidos = 0;
                    $valorEntrega = 0;
                    $total = 0;
                    $qt_balcao = 0;
                    $total_balcao = 0;

                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT dataPedido FROM dataPedidos ORDER BY dataPedido DESC LIMIT 1";
                    $q = $pdo->prepare($sql);
                    $q->execute();
                    $data = $q->fetch(PDO::FETCH_ASSOC);
                    Banco::desconectar();
                    $expediente = $data['dataPedido']; 


                    $pdo = Banco::conectar();
                    $sql = 'SELECT * FROM ordem_pedido';
                    foreach($pdo->query($sql)as $row)
                        {   $qtDiaria += 1;
                            $valorPedidos += $row['valor_itens'];
                            $valorEntrega += $row['valor_entrega'];
                            $total += $row['valor_pedido'];
                        }

                   $pdo = Banco::conectar();
                    $sql = 'SELECT * FROM ordem_pedido_balcao';
                    foreach($pdo->query($sql)as $row)
                        {   $qt_balcao += 1;

                            $total_balcao += $row['valor_pedido'];
                        }



                       

                    //cria o relatório diário   
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "INSERT INTO relatorios (data, entregas, produtos, total, total_pedidos, total_balcao, total_pedidos_balcao) VALUES(?,?,?,?,?,?,?)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($expediente,$valorEntrega,$valorPedidos,$total,$qtDiaria, $total_balcao, $qt_balcao));
                    Banco::desconectar(); 
                    
                    
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE expediente  set  status= ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array('Finalizado'));
                    Banco::desconectar();

                 
                    
                    echo"<script>  alert('Expediente Finalizado, relatório gerado.');
                    window.location.replace('relatorio.php');</script>";