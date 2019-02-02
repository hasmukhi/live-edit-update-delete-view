<html>
	<head>
	</head>
<body>
<?php 
	$status=$_GET["status"];
	if($status=="disp")
	{
	?>

	
    
	<?php
	$link=mysqli_connect("localhost","root","","post");
	$res=mysqli_query($link,"select * from sample_data1");
	echo "<table id='example1'>";
	?>
	<thead>
		<tr>
			<th>Id</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Age</th>
			<th>Delete Action</th>
			<th>Edit Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
		while($row=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>" ?> 	<div id="first_name<?php echo $row['id'] ?>"> <?php echo $row["first_name"]."</div></td>"; 
			echo "<td>" ?> 	<div id="last_name<?php echo $row['id'] ?>"><?php echo $row["last_name"]."</div></td>"; 
		 	echo "<td>" ?> 	<div id="age<?php echo $row["id"] ?>" > <?php echo $row["age"]."</div></td>";
			echo "<td>" ?> 	<input type="button" id="<?php echo $row["id"] ?>" name="<?php echo $row["id"]?>" value="delete" onclick="delete1(this.id)"> <?php echo "</td>";
			echo "<td>" ?> 	<input type="button" id="<?php echo $row["id"] ?>" name="<?php echo $row["id"]?>" value="edit" onclick="edit(this.id)"> 
						   	<input type="button" id="update<?php echo $row["id"] ?>"" name="<?php echo $row["id"]?>" style="visibility: hidden" value="update" onclick="update(this.id)" > <?php echo "</td>";
			echo "</tr>";
		}
	?>
		</tbody>

	<?php
	echo "</table>"; 
	
	}
	if($status=="update")
	{
		echo $id=$_GET["id"];
		$first_name=$_GET["first_name"];
		$last_name=$_GET["last_name"];
		$age=$_GET["age"];

		$first_name=trim($first_name);
		$last_name=trim($last_name);
		$age=trim($age);

		$link=mysqli_connect("localhost","root","","post");
		
		//$query="update sample_data1 set first_name='$first_name',last_name='$last_name',age='$age' where id=$id";
		
		$res=mysqli_query($link,"update sample_data1 set first_name='$first_name',last_name='$last_name',age='$age' where id=$id");

	}
	if($status == "delete")
	{
		$id=$_GET["id"];

		$link=mysqli_connect("localhost","root","","post");
		$res=mysqli_query($link,"delete from sample_data1 where id=$id");
	}
?>
</body>
</html>