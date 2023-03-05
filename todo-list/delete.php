<?php
if(file_exists('todo.json')){
    $json = file_get_contents('todo.json');
    $jsonArray = json_decode($json,true);
    if(isset($_POST['delete']))
    {
        unset($jsonArray[$_POST['delete']]);
    }
    $jsonInput=json_encode($jsonArray);
    
        file_put_contents('todo.json', $jsonInput, JSON_PRETTY_PRINT);
        
    header("LOCATION: index.php");
}else {
    echo "please check json file";
}
?>