

<!DOCTYPE html>
<html>
<head>
    <title>printtable</title>
</head>
<body>
   
<?php

 
require_once 'db.php'; 
require_once 'func.php';


 
 $student_id = $_GET['student_id'];

Studentdetails($student_id,$connect);


?>


</body>
</html>
