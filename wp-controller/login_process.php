

<?php 
session_start(); // Iniciar sessao e guardar dados

/*
Rotina para configuracao do acesso ao banco de dados e consulta de dados de login ao banco de dados


Autor:
Rafael Alessi Muntsch
rafalessi87@gmail.com
*/

// Configuracoes banco de dados
$dbhost = 'mysql.rafaelalessimuntsch.com';
$dbusername='rafmun1_root';
$dbpassword='nintendo64';
$dbdatabase='rafmun1_users';

/*
Configuracao e consulta ao Mysql (futuramente PDO)
*/

// Inserir funcoes para chamada MySql 
require_once("bootstrap.php"); 
// Conectar ao banco de dados
conectar($dbhost,$dbusername,$dbpassword,$dbdatabase);

// Fazer consulta ao Mysql 
// Preparar dados
$username = $_POST["username"];
$password = $_POST["password"];
//Chamar a funcao consulta 
consulta($username,$password);


// Perguntar se o login foi bem sucedido ou nao
if ($_SESSION["authenticated"]== true) {
	$login->status = true;
	$login->result = 1; }
else {
	$login->status=false;
	$login->result = 0; }

print(json_encode($login));
?>

