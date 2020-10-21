<?php

require_once("db.php");

if(isset($_POST['add_text'])) {
    
	$text = htmlspecialchars($_POST['add_text']);

	if($text != "") {

        $res = $db->query("INSERT INTO dealsList(text,done) VALUES ('$text',0)");

        if($res != false) {
            header('Location: ../index.php');
        } else {
            echo "Error! Can not write in db!";
        }

    } else {
    	header('Location: index.php');
    }
} else {
	echo "Error! Please try again!";
}
?>