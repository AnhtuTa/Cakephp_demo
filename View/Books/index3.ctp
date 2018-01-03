<!DOCTYPE html>
<html>
	<head>
		<title>Ví dụ 3</title>
	</head>
	<body>
	<?php
		echo "<h2>Show a book have id=3 in database</h2>";

		if($data==NULL){
			echo "<h2>There's no book to display</h2>";
		} else{
			echo "<table>
			<tr>
				<td>id</td>
				<td>Book's title</td>
				<td>Books's description</td>
			</tr>";
			// Chú ý: do chỉ có 1 record nên ko dùng foreach
			echo "<tr>";
				echo "<td>".$data['Book']['id']."</td>";
				echo "<td>".$data['Book']['title']."</td>";
				echo "<td>".$data['Book']['description']."</td>";
			echo "</tr>";
		}

	?>