<?php
require_once 'getData.php';

function PrintTable($students,$connect)
{

try {

	$sql = "SELECT * FROM $students";

	$result = mysqli_query($connect,$sql);
	
	if (mysqli_num_rows($result)>0) {
		
		echo "<table border='1'>";
		$col = mysqli_fetch_fields($result);
		
		echo "<tr>";
		foreach ($col as $value) {
			
			echo "<td>$value->name</td>";
		}
		echo "</tr>";
		
		while ($row = mysqli_fetch_assoc($result)) {
			
			echo "<tr>";
			foreach ($row as $key => $value) {
				echo "<td>$value</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "No results";
	}
	
} catch (Exception $e) {
	die($e->getMessage());
}
}


function PrintTableCols($students,$connect,$colnames)
{
	try {

		
		$sql = "SELECT ";
		for ($i=0; $i < sizeof($colnames)-1; $i++) { 
			$sql .=$colnames[$i].",";
		
		}
		$sql .=$colnames[sizeof($colnames)-1]." from $students";

		$result = mysqli_query($connect,$sql);
		
		if (mysqli_num_rows($result)>0) {
			
			echo "<table border='1'>";
			$col = mysqli_fetch_fields($result);
			
			echo "<tr>";
			foreach ($col as $value) {
				
				echo "<td>$value->name</td>";
			}
			echo "</tr>";
			
			while ($row = mysqli_fetch_assoc($result)) {
				
				echo "<tr>";
				foreach ($row as $key => $value) {
					echo "<td>$value</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No results";
		}
		
	} catch (Exception $e) {
		die($e->getMessage());
	}
}
PrintTableCols("books",$connect,["author","title","isbn"]);

PrintTableCols("reviews",$connect,["reviewer_name","rating"]);
?>