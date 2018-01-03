<?php
class Project3sController extends AppController {
	public $name = "Project3s"; // tên của Controller

	public function index() {

	}

	// search using Google custom search
	function custom_search_demo() {
		if(!empty($this->passedArgs['txt_search'])) {
			$query = $this->passedArgs['txt_search'];
			$this->set('search_query', $query);
			//$this->txt_search = $query;	//Giữ lại giá trị nhập vào sau khi submit
		}
	}
	//Hàm do_search() chính là action trong form của custom_search_demo.ctp có tác dụng
    //nhận dữ liệu từ form submit và chuyển dữ liệu lại cho custom_search_demo()
	function do_search() {
		$url['action'] = 'custom_search_demo';
		foreach ($this->data as $key => $value) {
			$url[$key] = $value;	//key là cái txt_search bên custom_search_demo.ctp, còn value là dữ liệu nhập vào txt_search
		}
		$this->redirect($url, null, true);//dùng để chuyển hướng sang action custom_search_demo
	}
}