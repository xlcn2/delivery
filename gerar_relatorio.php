<?php

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
session_start();
$txt_cabecalho[] = $_SESSION['nome'];


$txt_cabecalho[] = ' ';
// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    $dataLocal = date('d/m/Y H:i:s', time());
$txt_cabecalho[] = $dataLocal;
$txt_cabecalho[] = '=========================================';
$txt_cabecalho[] = ' ';
$txt_cabecalho[] = 'Valores Diários';

include('CRUD/banco.php');
$pdo = Banco::conectar();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT * FROM relatorios where id = ?";
       $q = $pdo->prepare($sql);
       $q->execute(array($_REQUEST['idRelatorio']));
       $data = $q->fetch(PDO::FETCH_ASSOC);
       Banco::desconectar();

$dt = $data['data'];
$dataRelatorio = date("d/m/Y", strtotime($dt));


$txt_cabecalho[] = 'referentes à '.$dataRelatorio;
$txt_cabecalho[] = ' '; // força pular uma linha entre o cabeçalho e os itens

$txt_cabecalho[] = 'Delivery';

$txt_cabecalho[] = ' '; // força pular uma linha entre o cabeçalho e os itens
$txt_rodape[] = ' ';

$txt_itens[] = array('Entregas', 'Pedidos', 'Qtd. de Pedidos', '', '', '');
$txt_itens[] = array('','','','','','');
$tot_itens = 0;
                      
       


                        $txt_itens[] = array('R$ '.number_format($data['entregas'],2,",",""),'R$ '.number_format($data['produtos'],2,",",""),$data['total_pedidos'], '','', '');
                  
                        
                        
                        $aux_valor_total = '';



// calcula o total de espaços que deve ser adicionado antes do "Sub-total" para alinhado a esquerda

$total_espacos = $n_colunas - strlen($aux_valor_total);

$espacos = '';




for($i = 0; $i < $total_espacos; $i++){
$espacos .= ' ';
}

$txt_valor_total = $espacos.$aux_valor_total;




     

$txt_rodape[] = 'Total em Pedidos: R$ '.number_format($data['total'],2,",","");

$txt_rodape[] = ' ';
$txt_rodape[] = '--------------------------------------';
$txt_rodape[] = ' ';
$txt_rodape[] = '             Balcão';
$txt_rodape[] = ' ';
$txt_rodape[] = ' ';
$txt_rodape[] = 'Qtd. de Pedidos:  '.$data['total_pedidos_balcao'];
$txt_rodape[] = ' ';
$txt_rodape[] = 'Total em Pedidos: R$ '.number_format($data['total_balcao'],2,",","");
$txt_rodape[] = ' ';
$txt_rodape[] = '--------------------------------------';
$txt_rodape[] = ' ';
$txt_rodape[] = '             Motoboys';
 $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM relatorio_motoboy';
                        foreach($pdo->query($sql)as $row2){  
                            if($row2['id_relatorio']==$_REQUEST['idRelatorio']){
                                
                                $txt_rodape[] = 'Nome: '.$row2['nome_motoboy'];
                                $txt_rodape[] = 'Total de Entregas: '.$row2['qtd_entregas'];
                                $txt_rodape[] = 'Total em Taxas: '.number_format($row2['total_taxas_entrega'],2,",","");
                                $txt_rodape[] = '---';

                       
                             }
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

$itens[] = addEspacos($item[0], 11, 'F')
  . addEspacos($item[1], 11, 'F')
  . addEspacos($item[2], 15, 'I')
  . addEspacos($item[3], 4, 'I')
  . addEspacos($item[4], 7, 'I')
  . addEspacos($item[5], 1, 'I');

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



$txt = $txt1;
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
