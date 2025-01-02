

<!DOCTYPE html>
<html>
<head>
    <title>printtable</title>
</head>
<body>
   
<?php

 
require_once 'db.php'; 
require_once 'func.php';


 
 $id = $_GET['user_id'];

 PrintTable($id,$connect);


?>


</body>
</html>
