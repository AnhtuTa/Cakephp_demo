<?php
class BooksController extends AppController{
	public $name = "Books"; // tên của Controller Book
	public $components = array('Data', 'Session');		// Phần public $components = array('Data') nghĩa là: khai báo component Data (xem file DataComponent.php trong Controller/Component)
	// var $helpers = array('Demo'); ko cần nữa vì trong AppController đã có rồi

	//Để sử dụng tính năng phân trang trong Cakephp thì cần phải khai báo thành phần helper Paginator và Namespace paginate
	var $helpers = array('Form', 'Paginator','Html');	//Khi sử dụng view thì nên khai báo thêm helpers “Html”, trong form có cần submit form thì thêm helpers “Form”, có phân trang thì có helpers “Paginator”.
	var $paginate = array();

	function pr($str) {
		echo $str."<br>";
	}
	// 1. Truy vấn không có điều kiện (lấy ra toàn bộ dữ liệu – all)
	// Khi truy cập vào http://localhost/cakephp/books/index
	// thì thằng cakephp sẽ gọi hàm này, do đó index ko đc viết thêm đuôi .ctp
	function index(){
		$data = $this->Book->find("all");	//nghĩa là gọi model Book và model này sẽ lấy tất cả dữ liệu trong tables books và trả về kết quả một dạng mảng 
		$this->set("data",$data);		//gán giá trị vào biến $data để hiển thị tương ứng ngoài view
	}

	// 2. Truy vấn có điều kiện: sử dụng $type là all, first và $params có conditions(điều kiện lấy dữ liệu).
	function index2() {
		// Cach 1
		$conditions = array(
			'conditions' => array('description LIKE' => '7 vi%'),
		);
		$data = $this->Book->find("all", $conditions);	//Lấy tất cả book có description LIKE '7 vi%', do đó tham số đầu tiên là 'all'. Nếu muốn lấy record đầu tiên thì dùng 'first'
		$this->set("data", $data);
	}

	//3. bây giờ chỉ muốn lấy một record có id =3 thì chúng ta sẽ sử dụng first thay vì all
	function index3() {
		$data = $this->Book->find(
			"first",
			array('conditions' => array('id' => 3))
		);
		$this->set("data", $data);
	}

	// 4. Truy vấn theo cách bình thường(viết câu lệnh SQL).
	function pureSQL() {
		$sql = "SELECT * FROM books";
		$data = $this->Book->query($sql);
		$this->set("data", $data);
	}

	function book_list() {
		$this->paginate = array(
			'limit' => 4,	// mỗi page có 4 record
			'order' => array('id' => 'desc'),	//giảm dần theo id
		);
		$data = $this->paginate("Book");	//lấy dữ liệu theo namespace paginate , với  Book  là tên model tương ứng
		$this->set("data", $data);
	}

	//Hàm view() tương ứng với file view.ctp bên dưới hiển thị form và phân trang dữ liệu.
	function view(){
		if(!empty($this->passedArgs)){
			// echo "this->passedArgs là 1 array và có giá trị như sau:<br>";
			// foreach ($this->passedArgs as $key => $value) {
			// 	echo $key." - ".$value."<br>";
			// }
			$conditions = array();
			$data = array();
			if(isset($this->passedArgs['Book.title'])) {	//kiểm tra xem có tồn tại title hay không
				$title = $this->passedArgs['Book.title'];
				$conditions[] = array( 'Book.title LIKE' => "%$title%", );	//điều kiện SQL
				$data['Book']['title'] = $title;	//cho giá trị nhập vào mảng data
			}
			if(isset($this->passedArgs['Book.description'])) {
				$description = $this->passedArgs['Book.description'];
				$conditions[] = array( "OR" => array( 'Book.description LIKE' => "%$description%" ) );
				$data['Book']['description'] = $description;
			}
			$this->paginate = array( 'limit' => 4, 'order' => array('id' => 'desc'), );
			$this->data = $data;	//Giữ lại giá trị nhập vào sau khi submit
			$post = $this->paginate("Book",$conditions);
			$this->set("posts",$post);
		} else echo "<h2>Enter something to search!</h2>";
    }
    //Hàm search() chính là action trong form của view.ctp có tác dụng
    //nhận dữ liệu từ form submit và chuyển dữ liệu lại cho view()
    function search() {
		$url['action'] = 'view';
		foreach ($this->data as $key=>$value){
			foreach ($value as $key2=>$value2){
				$url[$key.'.'.$key2]=$value2;
			}
		}
		$this->redirect($url, null, true);//dùng để chuyển hướng sang action view
    }
	function ptbac2() {
		
	}

	// search using Google custom search
	function search_demo() {
		
	}

	// search using Google custom search
	function custom_search_demo() {
		if(!empty($this->passedArgs['txt_search'])) {
			$query = $this->passedArgs['txt_search'];
			$this->set('search_query', $query);
			$this->txt_search = $query;	//Giữ lại giá trị nhập vào sau khi submit
		}
	}
	//Hàm do_search() chính là action trong form của custom_search_demo.ctp có tác dụng
    //nhận dữ liệu từ form submit và chuyển dữ liệu lại cho view()
	function do_search() {
		$url['action'] = 'custom_search_demo';
		foreach ($this->data as $key => $value) {
			$url[$key] = $value;	//key là cái txt_search bên view, còn value là dữ liệu nhập vào txt_search
		}
		$this->redirect($url, null, true);//dùng để chuyển hướng sang action custom_search_demo
	}

	//////////////// 1 số ví dụ khác ///////////////////
	// Component demo
	function test_component() {
		// sử dụng component Data
		$data = $this->Data->randd(6);
		$this->set("data", $data);
	}

	function show_today() {
		// sử dụng component Data
		$temp = $this->Data->getToday();
		$this->set("today_ThisIsJustAName", $temp);
	}

	// Helper demo
	function show_random_string() {		// tên hàm này có thể khác tên file ở view, vì hàm này render 1 view bất kỳ
		$this->render("test_helper");	// load file view test_helper.ctp
	}

	// Session demo
	function session_demo() {
		$this->Session->write('Username', 'anhtu95');

		// có thể sử dung thêm dấu “.” để tạo thành mảng
		$this->Session->write('user.name', 'Anh tu');
		$this->Session->write('user.address', 'Hanoi');
		$this->Session->write('user.faculty', 'f*cking SET');

		$this->Session->write('friend', 'Nguyen Bka');
		$this->Session->write('food', 'Grape, Mango, Banana');
		$this->Session->write('drink', 'Coca, milk, bia');
		

		// Xóa session: delete($name) xóa giá trị session có tên $name
		$drink = $this->Session->read('drink');
		echo "[controller] drink = $drink<br>";
		$this->Session->delete('drink');	//phải xóa bên controller
		
		$drink = $this->Session->read('drink');
		echo "[controller] drink = $drink<br>";

		// Xóa toàn bộ cookie và session: destroy()
		// $this->Session->destroy();
	}
}