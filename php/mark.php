<?php

require_once("db.php");

if(isset($_GET['id'])) {
    
	$id = htmlspecialchars($_GET['id']);

	if($id != "") {

        $res = $db->query("UPDATE dealsList SET done=1 WHERE id='$id'");

        if($res != false) {
            header('Location: ../index.php');
        } else {
            echo "Error! Can not mark a deal!";
        }
    } else {
    	header('Location: index.php');
    }
} else {
	echo "Error! Please try again!";
}

?>