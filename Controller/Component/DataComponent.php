<?php
	// Component: áp dụng cho Controller
	// Helper: áp dụng cho View
	class DataComponent extends Object {
		// tạo một hàm trong component Data có chức năng randdom một số bất kỳ,
		// $option là số chữ cái của số
		public function randd($option = 12) {
			$random_letter = rand(0, 9);
			for ($i=1; $i < $option; $i++) { 
				$temp = rand(0, 9);
				$random_letter.=$temp;
			}
			return $random_letter;
		}

		public function getToday() {
			$today = getdate();
			return $today['weekday'].", ".$today["mday"]."/".$today["mon"]."/".$today["year"];
		}

		function initialize($controller, $settings = array()) {
			$this->controller = &$controller;
			//Su dung DataComponent ngoài view
			$this->controller->set('Dataview_ThisIsJustAName', new DataComponent());
		}
		function startup($controller) {}	//$controller là controller sử dụng thằng component này. Trong VD này là BooksController
		function beforeRender($controller) {}
		function shutdown($controller) {}
		function beforeRedirect(&$controller, $url, $status=null, $exit=true) {}
		function redirectSomewhere($value) {}

	}
?>