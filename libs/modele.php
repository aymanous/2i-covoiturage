<?php


// inclure ici la librairie faciliant les requêtes SQL
include_once("maLibSQL.pdo.php");








function recupGeneriqueBdd($table,$colonne,$condition="")
{
	$SQL="SELECT $colonne FROM $table $condition";
	return SQLGetChamp($SQL);
}

function recupGeneriqueBddFE($table,$colonne,$condition="")
{
	$SQL="SELECT $colonne FROM $table $condition";
	return SQLSelect($SQL);
}

function updateGeneriqueBdd($table,$colonne,$valeur,$condition="")
{
	$SQL = "UPDATE $table SET $colonne='$valeur' $condition";
	return SQLGetChamp($SQL);
}

function deleteGeneriqueBdd($table,$condition)
{
	$SQL = "DELETE FROM $table $condition";
	return SQLGetChamp($SQL);
}

function insertGeneriqueBdd($table,$colonnes,$valeurs)
{
	$SQL = "INSERT INTO $table($colonnes) VALUES($valeurs)";
	return SQLInsert($SQL);	
}



?>
