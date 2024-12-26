
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<?php

	require_once 'dbconf.php';	
	

if ($_SERVER['REQUEST_METHOD'] == "POST") {
			//echo "Got the POST request from client";
			
				$reg = $_POST['id'];
				$name = $_POST['name'];
				$age = $_POST['age'];
				$course = $_POST['course'];
				AddData($connect,$reg,$name,$age,$course);
	}
			//echo "Hello";
function AddData($connect,$reg,$name,$age,$course){
			try{

                //Quary
                $sql = "INSERT INTO students VALUES('$reg','$name',$age,'$course')";
                //execute the quary
                $result = mysqli_query($connect,$sql);

                if ($result){
                    echo "New student record created successfully";
                    printTable("students",$connect);
                }else{
                    die("Error".mysqli_error($connect));
                }

		    } catch(Exception $e){
			    die($e->getMessage());
	        }
		}
    
function PrintTable($tableName,$connect){
            try{
            
                $sql = "SELECT * FROM $tableName";
            
            
                $result = mysqli_query($connect,$sql);
            
                if (mysqli_num_rows($result)>0) {
                
            
                    echo "<table border=1> ";
            
                $col = mysqli_fetch_fields($result);
            
                echo "<tr>";
                foreach ($col as $value) {
                    
                        echo "<td>".$value->name."</td>";
                    }
                    echo "</tr>";
                    while($row = mysqli_fetch_assoc($result)){
                        
                    echo "<tr>";
                    foreach ($row as $key => $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                    }
                    echo "</table>";
                } 
                else{
                    echo "No results"; 
                }
            
                }
            
            
            catch(Exception $e){
                die($e->getMessage());
            }
        }
?>
<a href="form.php">Go back</a>
</body>
</html>
