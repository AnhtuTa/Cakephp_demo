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
			echo "<td>".$item['Book']['id']."</td>";
			echo "<td>".$item['Book']['title']."</td>";
			echo "<td>".$item['Book']['description']."</td>";
			echo "</tr>";
		}
	}

?>