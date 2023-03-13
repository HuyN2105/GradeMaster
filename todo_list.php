<?php
require("conn.php");

$todo = "SELECT * FROM `tasks` WHERE `user_id` = ".$_COOKIE['id']." ORDER BY `time` ASC";
$todo_list = $conn->query($todo);

if($todo_list->num_rows > 0){
    while($row = $todo_list->fetch_assoc()){
        echo '  <li class="todo-list-item">
                    <div class="checkbox">
                        <input type="checkbox" id="checkbox-4" />
                        <label for="checkbox-4">'.$row['task'].'</label>
                    </div>
                    <div class="pull-right action-buttons"><a class="trash todo_del">
                            <em class="fa fa-trash" value="'.$row['id'].'"></em>
                    </a></div>
                </li>';
    } 
}
else{
    echo '  <li class="todo-list-item">
			    <div style="text-align: center"> No task found </div>
		    </li>';
}

?>