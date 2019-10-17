<?php
//including the database connection file
include_once("config.php");

// select data in descending order from table/collection "users"

$filter  = [];
$options = ['sort' => ['lastname' => -1]];

$result = $db->agents->find($filter, $options);


    
    //->sort(array('_id' => -1));
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.php">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Surname</td>
		<td>Email</td>
		
	</tr>
	<?php 	
	foreach ($result as $res) {
		echo "<tr>";
		echo "<td>".$res['firstname']."</td>";
		echo "<td>".$res['lastname']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[_id]\">Edit</a> | <a href=\"delete.php?id=$res[_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
