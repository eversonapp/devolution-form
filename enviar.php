<?php
header("Content-Type: text/html; charset=utf8", true); 
require ('class.phpmailer.php');
require ('class.smtp.php');
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$razaoSocial = $_POST['razaoSocial'];
$inscricaoEstadual = $_POST['inscricaoEstadual'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$cfop = $_POST['cfop'];
$codProduto = ($_POST['codProduto']);
$dataProduto = $_POST['dataProduto'];
$nfGlobalPlastic = $_POST['nfGlobalPlastic'];
$valorNota = $_POST['valorNota'];
$qtd = $_POST['qtd'];
$defeito = $_POST['defeito'];

if (empty($nome) || empty($cnpj) || empty($email) || empty($telefone) || empty($razaoSocial) || empty($inscricaoEstadual) || empty($cep) || empty($rua) || empty($numero) || empty($bairro) || empty($cidade) || empty($uf) || empty($cfop) || empty($codProduto) || empty($dataProduto) || empty($nfGlobalPlastic) || empty($valorNota) || empty($qtd) || empty($defeito))
{    
	echo "<script>alert('ATENÇÃO: Preencher todos os campos!');window.location='index.html'</script>";	
    exit;
}

$corpo = "<html><body>";
$corpo .= "<b>Formulário de devolução - Global Plastic</b><br><br>";
$corpo .= "<b>DADOS DO CLIENTE</b><br>";
$corpo .= "<b>Nome:</b> $nome <br>";
$corpo .= "<b>Razão Social:</b> $razaoSocial <br>";
$corpo .= "<b>CNPJ:</b> $cnpj <br>";
$corpo .= "<b>Inscrição Estadual:</b> $inscricaoEstadual <br>";
$corpo .= "<b>Telefone:</b> $telefone <br>";
$corpo .= "<b>E-mail:</b> $email <br>";
$corpo .= "<b>CEP:</b> $cep <br>";
$corpo .= "<b>Rua:</b> $rua <br>";
$corpo .= "<b>Número:</b> $numero <br>";
$corpo .= "<b>Bairro:</b> $bairro <br>";
$corpo .= "<b>Cidade:</b> $cidade <br>";
$corpo .= "<b>UF:</b> $uf <br>";
$corpo .= "<b>CFOP:</b> $cfop <br><br>";

$corpo .= "<b>PRODUTOS LISTADOS</b><br>";

foreach($codProduto as $key => $valor){
$corpo .= "<b>Código do produto:</b> $codProduto[$key] <br>";
$corpo .= "<b>Data de emissão da nota fiscal:</b> $dataProduto[$key] <br>";
$corpo .= "<b>Nota Fiscal:</b> $nfGlobalPlastic[$key] <br>";
$corpo .= "<b>Valor:</b> $valorNota[$key] <br>";
$corpo .= "<b>Quantidade:</b> $qtd[$key] <br>";
$corpo .= "<b>Defeito:</b> $defeito[$key] <br><br>";
}
$corpo .= "</body></html>";

$mail = new PHPMailer();
$mail->IsSMTP(); 
$mail->Port = 000;//Definir porta 
$mail->Host = 'smtp.office365.com';//host 
$mail->SMTPAuth = true; 
$mail->Username = 'your@email.com'; 
$mail->Password = 'password';
$mail->From = 'your@email.com.br'; 
$mail->FromName = 'Form name';
$mail->AddAddress('towhom@mail.com.br', 'Name'); 
$mail->IsHTML(true); 
$mail->CharSet = 'utf-8'; 
$mail->Subject  = 'Subject - Name';
$mail->Body = $corpo;
$enviado = $mail->Send();
if ($enviado) {
	$msg = "Fomulário enviado com sucesso. Obrigado.";
	echo "<script>alert('$msg');window.location.assign('index.html');</script>";
	} else
	{
	$msg = "ATENÇÃO: Não foi possível realizar o envio, verifique as informações e tente novamente.";
	echo "<script>alert('$msg');window.location.assign('index.html');</script>";
}
?>	