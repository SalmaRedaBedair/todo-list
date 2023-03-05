<?php 
echo "<pre>";
// print_r($_POST);
$task = $_POST['taskName'];
$task = trim($task);
$check = $task ??false;
if(file_exists('todo.json')){
    $json = file_get_contents('todo.json');
    $jsonArray = json_decode($json,true);
    $jsonArray[$task]=['completed' => false];
    $jsonInput=json_encode($jsonArray);
    
        file_put_contents('todo.json', $jsonInput, JSON_PRETTY_PRINT);
        
    header("LOCATION: index.php");
}else {
    echo "please check json file";
}


?>