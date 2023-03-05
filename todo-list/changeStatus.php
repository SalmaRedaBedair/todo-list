<?php
// print_r($_POST);
// die();
if (file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $jsonArray = json_decode($json, true);
    $task=$_POST['check'];
    if (isset($task)) {
        $jsonArray[$task]['completed'] = !$jsonArray[$task]['completed'];
        $jsonInput = json_encode($jsonArray);
        
        file_put_contents('todo.json', $jsonInput, JSON_PRETTY_PRINT);
        
        header("LOCATION: index.php");
    }
} else {
    echo "please check json file";
}
?>