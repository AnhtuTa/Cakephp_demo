<?php
class UsersController extends AppController{
	public $name = "Users"; // tên của Controller User
	function index(){
		//$this->layout= 'home'; // new name of layout that you are going  to assign
        //$this->set('posts', $this->Post->find('all'));
		$data = $this->User->find("all");
		$this->set("data",$data);
	}

	function hello() {

	}

	// var $uses = array();
	// function index(){
	// 	$this->autoRender=false;
	// 	echo "<h2>Hello my website</h2>";
	// }

	function login() {
		$error = "";
		if(isset($_POST['btnLogin'])) {
			$user = $_POST['username'];
			$pass = md5($_POST['password']);

			if($this->User->checkLogin($user, $pass)) {
				$this->Session->write('loginedUser', $user);
				//ĐÉO LÀM ĐƯỢC NHƯ SAU! ĐỊNH MỆNH BỌN CAKEPHP
				// $this->redirect("info"); //đăng nhập thành công thì chuyển trang thông tin
				// $arr = array('controller' => 'users', 'action' => 'info');
				// $this->redirect($this->referer($arr));
				// header('Location: https://www.facebook.com/');
				$infoString = "Đăng nhập thành công roài!<br> Click <a href='info'>vào đây</a> để xem thông tin của bạn!";
				$this->set("infoString", $infoString);	// giống request.setAttribute("infoString", $infoString) trong JSP. Và bên file login.ctp sẽ sử dụng = cách echo cái biến $infoString là xong!

				// gửi lại dữ liệu ở các textfield vừa nhập để bên view hiển thị lại
				$this->set("user_resend", $user);
			} else {
				$error = "Tên đăng nhập và mật khẩu không đúng";
				$this->set("error", $error);
			}
		}
	}

	function info() {
		//kiểm tra có session hay không
		if($this->Session->check('loginedUser')) {
			$this->set('loginedUser_name', $this->Session->read('loginedUser'));
			// Bên file view (info.ctp) có thể đọc giá trị này = biến $loginedUser_name
			// Cái này khá giống EL trong JSP
		} else $this->render('login');
	}
}