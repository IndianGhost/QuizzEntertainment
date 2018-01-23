<?php
	try
	{
        $db = new PDO('mysql:host=127.0.0.1; dbname=tarfihcom', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
    }
    catch (Exception $e)
    {
        die('Un erreur inattendu est survenu : '. $e->getMessage());
    }
?>
