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
function addEspacos($string, $posicoes, $onde){

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
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql = "SELECT id FROM pedido_recente_balcao ORDER BY id DESC LIMIT 1";
               $q = $pdo->prepare($sql);
               $q->execute();
               $data = $q->fetch(PDO::FETCH_ASSOC);
               Banco::desconectar();
               $idPedidoRecente = $data['id']+1;



               $id = $_POST['lanche'];
               $quantidade = $_POST['QTD'];
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
                    $sql = "DELETE FROM pedido_balcao where idCliente = ?";
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
                $sql = "INSERT INTO pedido_recente_balcao (dataPedido, idCliente, idLanche, observacaoLanche, detalhes, valorPedido, qtd, id) VALUES(?,?,?,?,?,?,?,?)";
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



$txt_rodape[] = 'Dados de atendimento';

$txt_rodape[] = ' ';

$txt_rodape[] = 'Cliente: '.$_POST['nome_cliente'];

$txt_rodape[] = ' '; 


$txt_rodape[] = 'Atendente: '.$_POST['nome_atendente'];



$txt_rodape[] = ' '; // força pular uma linha

$total = $tot_itens;

$txt_rodape[] = ' '; // força pular uma linha

$txt_rodape[] = 'Valor Total: R$ '.number_format($total ,2,",","").' ';

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

$txt_rodape[] = 'Consumo: '.$_POST['consumo'];

$txt_rodape[] = ' '; // força pular uma linha

$txt_rodape[] = '---------------------------------------';

$txt_rodape[] = ' '; // força pular uma linha


    if($_POST){
        
        
           
            

            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT dataPedido FROM dataPedidos ORDER BY dataPedido DESC LIMIT 1";
            $q = $pdo->prepare($sql);
            $q->execute();
            $data = $q->fetch(PDO::FETCH_ASSOC);
            Banco::desconectar();
            $expediente = $data['dataPedido'];
        
        
        
           
            
           
          
           
        //selecionar ultimo codigo adicionado e inserir o proximo
            $hora = date('h:i:s');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT codigo FROM ordem_pedido_balcao ORDER BY codigo DESC LIMIT 1";
            $q = $pdo->prepare($sql);
            $q->execute();
            $data = $q->fetch(PDO::FETCH_ASSOC);
            Banco::desconectar();
            $codigo = $data['codigo']+1;
        
        //inserir pedido a lista diária      
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO ordem_pedido_balcao (id_pedido, idCliente,  troco, hora, codigo, data_pedido, valor_pedido, valor_entrega, valor_itens, desconto, atendente, consumo, cliente) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($idPedidoRecente, $idCliente,$_POST['troco'],$hora,$codigo,$expediente,$total, 0 ,$tot_itens, $desconto,$_POST['nome_atendente'],$_POST['consumo'],$_POST['nome_cliente']));
            Banco::desconectar();
           
        
        
        //inserir numero do pedido
           $txt_cabecalho[] = 'Pedido n°: '.$codigo;
            $txt_cabecalho[] = ' '; // força pular uma linha entre o cabeçalho e os itens
        
        
        
        
        
        
        
      
                   


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
