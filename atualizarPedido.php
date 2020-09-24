<?php

error_reporting(0);
ini_set(“display_errors”, 0 );
/*
/*
* Gerar um arquivo .txt para imprimir na impressora Bematech MP-20 MI
*/

$n_colunas = 40; // 40 colunas por linha

/**
* Adiciona a quantidade necessaria de espaços no inicio
* da string informada para deixa-la centralizada na tela
*
* @global int $n_colunas Numero maximo de caracteres aceitos
* @param string $info String a ser centralizada
* @return string
*/
function centraliza($info)
{
global $n_colunas;

$aux = strlen($info);

if ($aux < $n_colunas) {
// calcula quantos espaços devem ser adicionados
// antes da string para deixa-la centralizada
$espacos = floor(($n_colunas - $aux) / 2);

$espaco = '';
for ($i = 0; $i < $espacos; $i++){
$espaco .= ' ';
}

// retorna a string com os espaços necessários para centraliza-la
return $espaco.$info;

} else {
// se for maior ou igual ao número de colunas
// retorna a string cortada com o número máximo de colunas.
return substr($info, 0, $n_colunas);
}

}

/**
* Adiciona a quantidade de espaços informados na String
* passada na possição informada.
*
* Se a string informada for maior que a quantidade de posições
* informada, então corta a string para ela ter a quantidade
* de caracteres exata das posições.
*
* @param string $string String a ter os espaços adicionados.
* @param int $posicoes Qtde de posições da coluna
* @param string $onde Onde será adicionar os espaços. I (inicio) ou F (final).
* @return string
*/
function addEspacos($string, $posicoes, $onde)
{

$aux = strlen($string);

if ($aux >= $posicoes)
return substr ($string, 0, $posicoes);

$dif = $posicoes - $aux;

$espacos = '';

for($i = 0; $i < $dif; $i++) {
$espacos .= ' ';
}

if ($onde === 'I')
return $espacos.$string;
else
return $string.$espacos;

}

$txt_cabecalho = array();
$txt_itens = array();
$txt_valor_total = '';
$txt_rodape = array();

$txt_cabecalho[] = ' ';
$txt_cabecalho[] = 'SCOOBY LANCHES';


$txt_cabecalho[] = ' ';
// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    $dataLocal = date('d/m/Y H:i:s', time());
$txt_cabecalho[] = $dataLocal ;



$txt_cabecalho[] = ' ';
$txt_cabecalho[] = 'Informações do Pedido:';
$txt_cabecalho[] = ' '; // força pular uma linha entre o cabeçalho e os itens

$txt_rodape[] = '=========================================';

$txt_cabecalho[] = ' '; // força pular uma linha entre o cabeçalho e os itens

$txt_itens[] = array('Qtd','Cod.', 'Produto', '',  'V. UN', 'Total');

$tot_itens = 0;
                
                 require 'CRUD/banco.php';
                $pdo = Banco::conectar();
                   
               

               $pdo = Banco::conectar();
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql = "SELECT id FROM pedidoRecente ORDER BY id DESC LIMIT 1";
               $q = $pdo->prepare($sql);
               $q->execute();
               $data = $q->fetch(PDO::FETCH_ASSOC);
               Banco::desconectar();
               $idPedidoRecente = $_POST['idPedido'];



               $id = $_POST['lanche'];
               $quantidade = $_POST['QTD'];
               $nomelanche = $_POST['nome'];
               $observacao = $_POST['observacao'];

               //desconto
               $desconto_1 = $_POST['desconto'];
               $source = array('.', ',');
               $replace = array('', '.');
               $desconto = str_replace($source, $replace, $desconto_1);
               
                $pdo = Banco::conectar();
                $datahj = date("Y-m-d H:i:s"); 

                $pdo = Banco::conectar();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "DELETE FROM pedidoAtual where idCliente = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['idCliente']));
                Banco::desconectar();
                    
                $pdo = Banco::conectar();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "DELETE FROM pedidoRecente where idCliente = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['idCliente']));
                Banco::desconectar();

                 

               for($i = 0; $i < count($id); $i++) {
                
               $idLanche = $id[$i];
               $pdo = Banco::conectar();
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql = "SELECT * FROM lanche where id = ?";
               $q = $pdo->prepare($sql);
               $q->execute(array($idLanche));
               $data = $q->fetch(PDO::FETCH_ASSOC);
               Banco::desconectar();
                 $tot_iten = $data['valor']*$quantidade[$i];
                $txt_itens[] = array($quantidade[$i], $data['id'], $data['nome'], '',  number_format($data['valor'],2,",","") ,number_format($tot_iten,2,",",""));
             $tamanho = strlen($data['nome']);
              if($tamanho>20){
                $resto = substr($data['nome'], 20);
                $txt_itens[] = array("", "", $resto, "","", "");       
               }
               if(empty($observacao[$i])){
                       
               }
               else{
                    $txt_itens[] = array("","Obs* " , $observacao[$i], "","", ""); 
                    $tam = strlen($observacao[$i]);
               if($tam>20){
                    $restoObs = substr($observacao[$i], 20);
                    $txt_itens[] = array("","",$restoObs, "","", "");       
               }
                   
                     $txt_itens[] = array("", "", '', "","", ""); 
               }
               $tot_itens += $data['valor']*$quantidade[$i];
                
                $idCliente = $_POST['idCliente'];
                $idLanche = $data['id'];
                $obs = $observacao[$i];
                $lanche = $data['nome'];
                $valorP = $data['valor'];
                $quant = $quantidade[$i];
                   
                $pdo = Banco::conectar();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO pedidoRecente (dataPedido, idCliente, idLanche, observacaoLanche, detalhes, valorPedido, qtd, id) VALUES(?,?,?,?,?,?,?,?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($datahj,$idCliente, $idLanche, $obs, $lanche,$valorP,$quant,$idPedidoRecente));
                Banco::desconectar(); 
            }



            


   if(!empty($desconto)){
          $tot_itens = $tot_itens - $desconto;
          $tot_ite = number_format($tot_itens,2,",","");
          $aux_valor_total = 'Desconto: R$ '.number_format($desconto ,2,",","").' Sub-total: '.$tot_ite;
    }
else{
   
          $tot_ite = number_format($tot_itens,2,",","");
          $aux_valor_total = ' Sub-total: '.$tot_ite;
}



// calcula o total de espaços que deve ser adicionado antes do "Sub-total" para alinhado a esquerda

$total_espacos = $n_colunas - strlen($aux_valor_total);

$espacos = '';

$txt_rodape[] = '=========================================';


for($i = 0; $i < $total_espacos; $i++){
$espacos .= ' ';
}

$txt_valor_total = $espacos.$aux_valor_total;




         



$txt_rodape[] = ' '; // força pular uma linha

$txt_rodape[] = 'Dados do Cliente';

$txt_rodape[] = ' ';

$txt_rodape[] =  'Nome: '.$_POST['nome'].'';
    
$txt_rodape[] =  'Telefone: '.$_POST['telefone'];
 

$texto = $_POST['endereco'];
$tam = strlen($_POST['endereco']);

               if($tam>27){
                $valor =  $tam - 27;
                $texto2 = substr($texto, 0, strlen($texto) - $valor);
                $txt_rodape[] =  'Endereço: '.$texto2;
               }
    else{
                $txt_rodape[] =  'Endereço: '.$_POST['endereco']; 
    }


$tam = strlen($_POST['endereco']);
               if($tam>27){
                    $restoObs = substr($_POST['endereco'], 27);
                    $txt_rodape[] = $restoObs;       
               }
    


$txt_rodape[] =  'Bairro: '.$_POST['bairro'];

$texto = $_POST['complemento'];
$tam = strlen($_POST['complemento']);

               if($tam>24){
                $valor =  $tam - 24;
                $texto2 = substr($texto, 0, strlen($texto) - $valor);
                $txt_rodape[] =  'Complemento: '.$texto2;
               }
    else{
                $txt_rodape[] =  'Complemento: '.$_POST['complemento']; 
    }


$tam = strlen($_POST['complemento']);
               if($tam>24){
                    $restoObs = substr($_POST['complemento'], 24);
                    $txt_rodape[] = $restoObs;       
               }




$texto = $_POST['referencia'];
$tam = strlen($_POST['referencia']);

               if($tam>24){
                $valor =  $tam - 24;
                $texto2 = substr($texto, 0, strlen($texto) - $valor);
                $txt_rodape[] =  'Referencia: '.$texto2;
               }
    else{
                $txt_rodape[] =  'Referencia: '.$_POST['referencia']; 
    }


$tam = strlen($_POST['referencia']);
               if($tam>24){
                    $restoObs = substr($_POST['referencia'], 24);
                    $txt_rodape[] = $restoObs;       
               }

$txt_rodape[] = 'Atendente: '.$_POST['atendente'];

$entreg = number_format($_POST['valor'],2,",","");

$txt_rodape[] = 'Valor da Entrega: R$ '.$entreg.' ';

$txt_rodape[] = ' '; // força pular uma linha

$total = $tot_itens + $_POST['valor'];

$txt_rodape[] = ' '; // força pular uma linha
$ttl = number_format($total,2,",","");
$txt_rodape[] = 'Valor Total: '.$ttl.' R$';

$txt_rodape[] = ' '; // força pular uma linha

if(isset($_POST['cartao'])){
         $txt_rodape[] = 'Pagamento no cartão';



}
else{
            $valor1 = $_POST['troco'];
         $valor = $valor = str_replace('.', ',',$valor1);
        
         $source = array('.', ',');
        $replace = array('', '.');
        $trocoFinal = str_replace($source, $replace, $valor); //remove os pontos e substitui a virgula pelo ponto
     $troco = $trocoFinal - $total;

if($valor1>0){
    $trcf = number_format($trocoFinal,2,",","");
$txt_rodape[] = 'Valor a receber: '.$trcf.' R$';

     $trc = number_format($troco,2,",","");
$txt_rodape[] = 'Troco: '.$trc.' R$';
}
}

$txt_rodape[] = ' '; // força pular uma linha

$txt_rodape[] = '---------------------------------------';

$txt_rodape[] = ' '; // força pular uma linha


///

       

    if($_POST){
        $nome = $_POST['nome'];
        
        
            $entrega = $_POST['valor'];
        
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT dataPedido FROM dataPedidos ORDER BY dataPedido DESC LIMIT 1";
            $q = $pdo->prepare($sql);
            $q->execute();
            $data = $q->fetch(PDO::FETCH_ASSOC);
            Banco::desconectar();
            $expediente = $data['dataPedido'];
        
        
        
           
            
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE IGNORE cliente  set  ultimoPedido= ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array(1, $idCliente));
            Banco::desconectar();
          
            
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT codigo FROM ordem_pedido ORDER BY codigo DESC LIMIT 1";
                $q = $pdo->prepare($sql);
                $q->execute();
                $data = $q->fetch(PDO::FETCH_ASSOC);
                Banco::desconectar();
                $codigo = $data['codigo']+1;
              
        

                $pdo = Banco::conectar();
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql = "SELECT * FROM ordem_pedido where id_pedido = ?";
               $q = $pdo->prepare($sql);
               $q->execute(array($_POST['idPedido']));
               $data2 = $q->fetch(PDO::FETCH_ASSOC);
               Banco::desconectar();
        
            
              $hora = date('h:i:s');
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE ordem_pedido  set  atendente= ?, troco=?, hora =?, valor_pedido=?, valor_entrega=?, valor_itens=?, desconto=?  WHERE id_pedido = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($_POST['atendente'],$_POST['troco'], $hora,  $total, $entrega, $tot_itens, $desconto, $idPedidoRecente));
            Banco::desconectar();
            
            $txt_cabecalho[] = 'Pedido n°: '.$data2['codigo'];
            $txt_cabecalho[] = ' ';
       
        
                    $nomeBairro = $_POST['bairro'];
		            $nome= $_POST['nome'];
                    $telefone= $_POST['telefone'];
                    $endereco = $_POST['endereco'];
                    $complemento = $_POST['complemento'];
                    $referencia = $_POST['referencia'];		           
		
        
                    
		      

		            // update data
		   
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE cliente  set  nome= ?, telefone=?, endereco=?,  bairro=?, Complemento=?, referencia=?  WHERE id = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($nome, $telefone, $endereco, $nomeBairro, $complemento, $referencia, $idCliente));
                    Banco::desconectar();
                   


    }


// centraliza todas as posições do array $txt_cabecalho
$cabecalho = array_map("centraliza", $txt_cabecalho);

/* para cada linha de item (array) existente no array $txt_itens,
* adiciona cada posição da linha em um novo array $itens
* fazendo a formatação dos espaçamentos entre cada coluna
* da linha através da função "addEspacos"
*/


foreach ($txt_itens as $item) {

/*
* Cod. => máximo de 5 colunas
* Produto => máximo de 11 colunas
* Env. => máximo de 6 colunas
* Qtd => máximo de 4 colunas
* V. UN => máximo de 7 colunas
* Total => máximo de 7 colunas
*
* $itens[] = 'Cod. Produto Env. Qtd V. UN Total'
*/

$itens[] = addEspacos($item[0], 4, 'F')
  . addEspacos($item[1], 4, 'F')
  . addEspacos($item[2], 20, 'F')
  . addEspacos($item[3], 0, 'I')
  . addEspacos($item[4], 6, 'I')
  . addEspacos($item[5], 6, 'I');

}
/* concatena o cabelhaço, os itens, o sub-total e rodapé
* adicionando uma quebra de linha "\r\n" ao final de cada
* item dos arrays $cabecalho, $itens, $txt_rodape
*/
$txt1 = implode("\r\n", $cabecalho)
. "\r\n"
. implode("\r\n", $itens)
. "\r\n"
. $txt_valor_total // Sub-total
. "\r\n\r\n"
. implode("\r\n", $txt_rodape);

$txt2 = implode("\r\n", $cabecalho)
. "\r\n"
. implode("\r\n", $itens)
. "\r\n"
. $txt_valor_total // Sub-total
. "\r\n\r\n"
. implode("\r\n", $txt_rodape);

$txt = $txt1.$txt2;
// caminho e nome onde o TXT será criado no servidor
$file = 'uploads/nome_arquivo.txt';

// cria o arquivo
$_file = fopen($file,"w");
fwrite($_file,$txt);
fclose($_file);

header("Pragma: public");
// Força o header para salvar o arquivo
header("Content-type: application/save");
header("X-Download-Options: noopen "); // For IE8
header("X-Content-Type-Options: nosniff"); // For IE8
// Pré define o nome do arquivo
header("Content-Disposition: attachment; filename=imprimir.txt");
header("Expires: 0");
header("Pragma: no-cache");


// Lê o arquivo para download
readfile($file);

exit;
