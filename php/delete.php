<?php

require_once("db.php");

if(isset($_GET['id'])) {
    
	$id = htmlspecialchars($_GET['id']);

	if($id != "") {

        $res = $db->query("DELETE FROM dealsList WHERE id='$id'");

        if($res != false) {
            header('Location: ../index.php');
        } else {
            echo "Error! Can not delete a deal!";
        }
    } else {
    	header('Location: index.php');
    }
} else {
	echo "Error! Please try again!";
}

?>