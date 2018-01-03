<?php
	class MyhelpersController extends AppController {
		// muốn sử dụng Helper nào thì trong controller khai báo nó thông qua biến $helpers
		public $helper = array('Demo');	// sử dụng DemoHelper

		function test() {
			$this->render("test");	// load file view test.ctp
		}
	}
?>