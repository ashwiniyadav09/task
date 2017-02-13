<?php

$dataResponse = array();
$conn=mysqli_connect("localhost","root","","") or die("connection error");
mysqli_select_db($conn,"data") or die("database error");
$insert="insert into ajaxreg (name,email,website,address,city,contact) values('".$_POST["name"]."','".$_POST["email"]."','".$_POST["website"]."','".$_POST["address"]."','".$_POST["city"]."','".$_POST["contact"]."')";
$execute=mysqli_query($conn,$insert);
$dataResponse['status'] = 'Success';
$dataResponse['datalist'] = '';
$select= "select * from ajaxreg";
$execute = mysqli_query($conn,$select);	

$table1="<table><tr><td>id</td><td>name</td><td>email</td><td>website</td><td>address</td><td>city</td><td>contact</td></tr>";
	
	$count = 1;
	while($fetch_records = mysqli_fetch_array($execute,MYSQLI_ASSOC)) {
		$id =$fetch_records['id'];
 		$table1 .= "<tr>
		<td>".$count."</td>
		<td>".$fetch_records['name']."</td>
		<td>".$fetch_records['email']."</td>
		<td>".$fetch_records['website']."</td>
                <td>".$fetch_records['address']."</td>
                <td>".$fetch_records['city']."</td>
                <td>".$fetch_records['contact']."</td>";
               

		$count++;
	}
		$table1 .="</table>";
		$dataResponse['datalist'] = $table1;
		echo json_encode($dataResponse);
		
?>