<?php
	// Ko thể write Session ở file này:
	// $this->Session->write('Username', 'anhtu95');
	// Lỗi: Method SessionHelper::write does not exist
	// Do đó nên dùng chúng bên controller, và controller phải có
	// SessionHelper (Khai báo như sau: public $components = array('Session'))

	// Gọi lại session đã tạo ở bên controller
	echo $this->Session->read('Username');
	$user = $this->Session->read('user');
	foreach ($user as $phanTuCuaMang) {
		echo "$phanTuCuaMang<br>";
	}

	echo "<br>Có thể dùng key và value:<br>";
	foreach ($user as $key => $value) {
		echo "$key: $value<br>";
	}

	echo $user['name']."<br>";
	
	// Kiểm tra session: check($name) kiểm tra xem có tồn tại session có tên $name hay không return ra true hoặc false
	if($this->Session->check('password')){
		echo "Ton tai sesson[password]<br>";
	}else{
		echo "KHONG ton tai session[password]<br>";
	}

	// Đọc và xóa: consume($name) đọc và xóa giá trị session có tên $name, điều này hữu ít khi muốn đọc và xóa session ngay
	$food = $this->Session->consume('food');
	echo "food = $food<br>";
	$food = $this->Session->read('food');
	echo "food = $food<br>";	// ko còn nữa

?>