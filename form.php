<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action = "func.php" method = "POST">
	<table >
		<tr >
			<td align=right>Registration Number: </td>
			<td><input type="text" name="id"/></td>
		</tr>
		<tr>
			<td align=right>NAME: </td>
			<td><input type="text" name="name"/></td>
		</tr>
			<tr>
				<td align=right>AGE</td>
			<td><input type="number" name="age"/></td>
			</tr>
			<tr>
				<td align=right>course</td>
				<td>
				<select name= "course">
				<option value="CS">CS</option>
				<option value="AMC">AMC</option>
				<option value="ICT">ICT</option>
			</select>
			</td>
			</tr>

		<tr>
			<td></td>
			<td><input type="submit" value="Add a new Student"></td>
		</tr>

	</table>

</form>
</body>
</html>