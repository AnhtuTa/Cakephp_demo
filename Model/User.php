<?php
class User extends AppModel {
    var $name = "User";//tên của model

    function checkLogin($u, $p) {
    	$sql = "SELECT * FROM users WHERE username = '$u' AND password = '$p'";
    	$this->query($sql);

    	if($this->getNumRows() == 0) {
    		return false;
    	} else return true;
    }
}