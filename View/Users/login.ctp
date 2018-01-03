<form method="post" action="">
	<fieldset>
		<legend>Đăng nhập</legend>

		<label style='margin-bottom: 5px;'>Tên đăng nhập</label>
		<input type="text" name="username" value="<?php if(isset($user_resend)) echo $user_resend; ?>" /><br />

		<label style='margin-top: 10px; margin-bottom: 5px;'>Mật khẩu</label>
		<input type="password" name="password" /><br />

		<input style='margin-top: 10px;' type="submit" name="btnLogin" value="Login" />

		<br><span class="error"><?php if(isset($error)) echo $error; ?></span><br>
		<div style="color: blue"><?php if(isset($infoString)) echo $infoString; ?></div>
	</fieldset>
</form>

<!-- Sau khi ấn submit thì sẽ server lại sẽ xử lý kq trong hàm login() -->