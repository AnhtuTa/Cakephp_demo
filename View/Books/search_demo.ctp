
<?php
	// VD:
	// https://www.googleapis.com/customsearch/v1?key=AIzaSyCyI052uBVUE_Zesxg933FcL681vHkUmEQ&cx=006699419362551519039:wprwgwnhaa8&q=hoc+bong;

	$query = 'học+bổng';	//something to search on google
	$MY_API_KEY = "AIzaSyCyI052uBVUE_Zesxg933FcL681vHkUmEQ";
	$MY_SEARCH_ENGINE_ID_SOICT = "006699419362551519039:wprwgwnhaa8";
	$MY_SEARCH_ENGINE_ID_ENTIRE_WEB = "006699419362551519039:bpvraz38qne";
	$url = "https://www.googleapis.com/customsearch/v1?key=".$MY_API_KEY."&cx=".$MY_SEARCH_ENGINE_ID_ENTIRE_WEB."&q=".$query;
	$json_string = file_get_contents($url);	//$json_string có kiểu String
	$json = json_decode($json_string, true);		//$json có kiểu object, nó sẽ là 1 JSON
	//var_dump($json, false);

	// Now we need to display that json data!
	$data_array = $json['items'];
	foreach ($data_array as $data) {
		foreach ($data as $key => $value) {
			if($key == 'htmlTitle') {
				echo "<div style='color: blue'>Tiêu đề: ".$value."</div>\n";
			} else if($key == 'link') {
				echo "Link: <a href=".$value.">Click vào đây để đọc tiếp</a><br>\n";
			} else if($key == 'snippet') {
				echo "<div style='color: green'>Snippet: ".$value."</div>\n";
			}
		}
		echo "<br>\n";
	}
?>