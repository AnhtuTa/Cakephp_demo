<?php
	echo "<h2>Show all books in database</h2>";

	if($data==NULL){
		echo "<h2>There's no book to display</h2>";
	} else{
		echo "<table>
		<tr>
			<td>id</td>
			<td>Book's title</td>
			<td>Books's description</td>
		</tr>";
		foreach($data as $item){
			echo "<tr>";
			echo "<td>".$item['books']['id']."</td>";  // CHÚ Ý: bools chứ ko phải Book như các hàm index nhé!
			echo "<td>".$item['books']['title']."</td>";
			echo "<td>".$item['books']['description']."</td>";
			echo "</tr>";
		}
	}

?>