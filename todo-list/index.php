<?php 
$jsonArray=[];
if(file_exists('todo.json')){
    $json = file_get_contents('todo.json');
    $jsonArray = json_decode($json,true);
}else {
    echo "please check json file";
    die();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo list</title>
</head>
<body>
    <form action="newTodo.php" method="post" style="display: inline-block;">
        <input type="text" name="taskName">
        <input type="submit" name="submit">
    </form>
    <br/>
    
        <?php 
        if(isset($jsonArray))
        foreach($jsonArray as $data=>$value):
            // var_dump($value);
            // die();
        ?>
    
        <div>
        <form style="display: inline-block;" method="post" action="changeStatus.php">
        <input name="check" type="hidden" value="<?=$data?>">
        <input type="checkbox" <?php echo ($value['completed']==true)?"checked":"";  ?> style="display: inline-block;" name="checkbox">
        </form>
        <div style="display: inline-block;"><?= $data ?></div>
        
        <form action="delete.php" method="post" style="display: inline-block;">
            <input name="delete" type="hidden" value="<?=$data?>">
            <button>Delete</button>
        </form>
        <?php endforeach;?>
    </div>
</body>
<script>
    const checkboxes=document.querySelectorAll('input[type=checkbox][name=checkbox]');
    checkboxes.forEach(element => {
        element.onclick=function(){
            this.parentNode.submit();
        }
    });
</script>
</html>