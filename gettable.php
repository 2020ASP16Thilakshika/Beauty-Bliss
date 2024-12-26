

<!DOCTYPE html>
<html>
<head>
	<title>STUDENT LIST</title>
</head>
<body>

	<?php
//get the db connection file

require_once 'dbconf.php'; //(conf/dbconf.php) (folder/file)
require_once 'myfun.php';

//PrintTable ("student",$connect);
student($connect);

?>



</body>
</html>
