

<!DOCTYPE html>
<html>
<head>
    <title>printtable</title>
</head>
<body>
   
<?php

 
require_once 'db.php'; 
require_once 'func.php';


 
 $id = $_GET['id'];

Userdetails($id,$connect);


?>


</body>
</html>
