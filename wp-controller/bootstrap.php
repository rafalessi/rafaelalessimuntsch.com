<?php
session_start();
/*
Arquivo auxiliar para guardar funcoes de conexao ao banco de dados e consultas ao MySql
* Futuramente implementar o PDO para abstrair tipo de banco de dados


Autor:
Rafael Alessi Muntsch
rafalessi87@gmail.com
*/
function conectar($dbhost,$dbusername,$dbpassword,$dbdatabase) { // Conectar ao banco de dado
if (($connection = @mysql_connect($dbhost,$dbusername,$dbpassword) === false))
	die("Could not connect to database");

// Selecionar banco de dados
if (@mysql_select_db($dbdatabase) === false)
	die("Could not select database");
}

function consulta($username,$password) {

// Preparar consulta
$sql = sprintf("SELECT * FROM users WHERE username='%s' AND password='%s'",@mysql_real_escape_string($username),@mysql_real_escape_string($password));
// Fazer consulta
$result = mysql_query($sql); // Fazer a busca no mysql a partir da consulta preparada pelo $sql
// Verificar se a consulta foi feita 
if ($result === false) 
	die("consulta nao realizada");
// Verificar se o login esta correto
if (mysql_num_rows($result) == 1){
	$_SESSION["authenticated"] = true; // Guardar que o usuario foi logado
	}
else {// Caso login tenha sido errado 
	$_SESSION["authenticated"] = false;	// grava em variavel global
	}
}
/*try{ // Tentativa de usar PDO. Nao deu certo ainda
	$pdo=new PDO("mysql:host=localhost;dbname=users","root","nintendo"); // Conectar ao banco de dados via PDO, via comando SQL esta deprecado
}
catch(PDOException $e){
	echo 'Erro:'. $e->getMessage();
}
return $pdo;*/
?>

