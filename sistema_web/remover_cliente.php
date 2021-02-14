<?php
	$pront = $_GET['pront'];

	include "inc/cabecalho_conexao.inc";
	
	$SQL = "DELETE FROM usuario WHERE id=$pront";

	include "inc/rodape_conexao.inc";
	
	header('location:consulta_cliente.php');
?>