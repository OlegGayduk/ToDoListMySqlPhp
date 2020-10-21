<?php

require_once("php/db.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Список дел</title>
	<link rel='stylesheet' type='text/css' href='css/main.css'/>
</head>
<body>

	<div class="container">
		<div class="tasks-wrap">
		<?php

            $res = $db->query("SELECT * FROM dealsList");

            if($res->num_rows > 0) {

                $i = 1;
                
                while($row = $res->fetch_assoc()) {
                    if($row['done'] == false) {
                        echo "<div class='tasks'>".$i++.". <div class='tasks-text-wrap'>".$row['text']."</div><a class='mark-btn' href='php/mark.php?id=".$row['id']."'></a><a class='delete-btn' href='php/delete.php?id=".$row['id']."'></a></div>";
                    } else {
                        echo "<div class='tasks'>".$i++.". <div class='tasks-text-wrap'>".$row['text']."</div><div class='marked-btn'></div><a class='delete-btn' href='php/delete.php?id=".$row['id']."'></a></div>";
                    }
                }
            } else {
                echo "You don't have any deals yet.";
            }

            $db->close();

        ?>
        </div>
        <form class="send-form-wrap" method="POST" action="php/add.php">
        	<textarea class="send-textarea" placeholder="Напишите дело..." type="textarea" name="add_text"></textarea>
        	<input class="send-btn" type="submit" value="Добавить"/>
        </form>
	</div>

</body>
</html>