<?php
	//create a form for searching
	echo $this->Form->create('Book', array('action' => 'do_search'));
	echo $this->Form->input(
		'idOfInput',
    	array('label' => 'Enter something to search', 'name' => 'txt_search', 'style' => 'width: 200px; padding: 5px')
    );
    ///demo///
	echo $this->Form->input(
		'',
		array('name' => 'data[Book][txt_demo]')
		);
    /////////
	echo $this->Form->submit(
		'  Search  ',	// Cái này là giá trị của thuộc tính 'value'
		array('style' => 'margin-top: 10px; cursor: pointer; background: #1a5fce; color: white; padding: 5px;')
	);
	echo $this->Form->end();

	//display results after user click Search button
	if(!empty($search_query)) {
		showSearchResults($search_query);
	}

	function showSearchResults($search_query) {
		$MY_API_KEY = "AIzaSyCyI052uBVUE_Zesxg933FcL681vHkUmEQ";
		$MY_SEARCH_ENGINE_ID_SOICT = "006699419362551519039:wprwgwnhaa8";
		$MY_SEARCH_ENGINE_ID_ENTIRE_WEB = "006699419362551519039:bpvraz38qne";

		$url = "https://www.googleapis.com/customsearch/v1?key=".$MY_API_KEY."&cx=".$MY_SEARCH_ENGINE_ID_ENTIRE_WEB."&q=".$search_query;

		$json_string = file_get_contents($url);		//$json_string có kiểu String
		$json = json_decode($json_string, true);	//$json có kiểu object, nó sẽ là 1 JSON

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
	}
?>