<?php
//including the database connection file
include_once("config.php");

// select data in descending order from table/collection "users"

$filter  = [];
$options = ['sort' => ['name' => -1]];

$result = $db->hazardsCategories->find($filter, $options);


    

?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<!--<form action="process-public-update.php" method="post" name="form1">
		<!---

         for agent

         <table width="25%" border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Surname</td>
				<td><input type="text" name="surname"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
            <tr> 
				<td>Password</td>
				<td><input type="text" name="password"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
        
        
        --->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        For registered
        
        <table width="25%" border="0">  
            
            <tr> 
				<td>ID</td>
				<td><input type="text" id="id" name="id" value="5d8a174cd1955244fc003037"></td>
			</tr>
			<tr> 
				<td>Name</td>
				<td><input type="text" id="name" name="name"></td>
			</tr>
			<tr> 
				<td>Surname</td>
				<td><input type="text" id="surname" name="surname"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" id="email" name="email"></td>
			</tr>
            
            <tr> 
				<td>Cell Number</td>
				<td><input type="text" id="cell_number" name="cell_number"></td>
			</tr>
            
            <tr> 
				<td>Password</td>
				<td><input type="text" id="password" name="password"></td>
			</tr>
			<tr> 
				<td></td>
				<td><!---<input type="submit" name="update"  value="Update">--->
                
                
                <button type="submit" id="button" name="button">Update</button>
                
                </td>
			</tr>
		</table>
        
        
            
    <script>
        $(document).ready(function(){
            $("#button").click(function(){
                var id=$("#id").val();
                var name=$("#name").val();
                var surname=$("#surname").val();
                var email=$("#email").val();
                var cell_number=$("#cell_number").val();
                var password=$("#password").val();
                $.ajax({
                    url:'process-public-update.php',
                    method:'POST',
                    data:{
                        id:id,
                        name:name,
                        surname:surname,
                        cell_number:cell_number,
                        password:password,
                        email:email
                    },
                   success:function(data){
                       alert(data);
                       $('input[type="text"],textarea').val('');
                   }
                    
                   
                });
            });
        });
    </script>
    
        <!----
        <table width="25%" border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>description</td>
				<td><input type="text" name="description"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
            <tr> 
				<td>contact</td>
				<td><input type="text" name="contact"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table> 

        <table width="25%" border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>surname</td>
				<td><input type="text" name="surname"></td>
			</tr>
			<tr> 
				<td>cell_number</td>
				<td><input type="text" name="cell_number"></td>
			</tr>
            <tr> 
				<td>Emailr</td>
				<td><input type="text" name="email"></td>
			</tr>
            <tr> 
				<td>image</td>
				<td><input type="text" name="image"></td>
			</tr>
			<tr> 
				<td>Work Location</td>
				<td><input type="text" name="address"></td>
			</tr>
            <tr> 
				<td>Password</td>
				<td><input type="text" name="password"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
        
        <table width="25%" border="0">
			
			<tr> 
				<td>title</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr> 
				<td>content</td>
				<td><input type="maincontent" name="maincontent"></td>
			</tr>
            <tr> 
				<td>Imager</td>
				<td><input type="text" name="image"></td>
			</tr>
            
			
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
        
        <table width="25%" border="0">
			
			<tr> 
				<td>name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>description</td>
				<td><input type="maincontent" name="description"></td>
			</tr>
            
            
			
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
</table>
        
        
        <table width="25%" border="0">
			
			<tr> 
				<td>name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Category</td>
                <td>
                <select name="category">
                
                <?php 	
	//foreach ($result as $res) {
        
        //$id = $res['_id'];
        //$name = $res['name'];
        
        
        //echo "<option value='{$id}'>{$name}</option>";
        
       
	//}
	?>
                    
                    </select>
                
                
                </td>
                
                
				
			</tr>
            <tr> 
				<td>tresholds</td>
				<td><input type="text" name="treshold"></td>
			</tr>
            
            <tr> 
				<td>icon</td>
				<td><input type="text" name="icon"></td>
			</tr>
            
            
			
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
        
        
	</form>
</body>
</html>

