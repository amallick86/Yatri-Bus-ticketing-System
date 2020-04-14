<?php 
	include "connection.php";
	class User{
		protected $db;
		public function __construct(){
			$this->db = new DB_con();
			$this->db = $this->db->ret_obj();
		}
		
		
		/*** for registration process ***/
		
		public function reg_user($user_fname, $user_lname, $user_add, $user_phn, $user_dob, $user_uname, $user_pass, $user_cpass){
			//echo "k";
			
			$user_pass = md5($user_pass);

			//checking if the username or email is available in db
			$query = "SELECT * FROM user_account WHERE user_uname='$user_uname'";
			
			$result = $this->db->query($query) or die($this->db->error);
			
			$count_row = $result->num_rows;
			
			//if the username is not in db then insert to the table
			
			if($count_row == 0){
				$query = "INSERT INTO user_account SET user_fname='$user_fname', user_lname='$user_lname', user_add='$user_add', user_phn='$user_phn', user_dob='$user_dob', user_uname='$user_uname', user_pass='$user_pass', user_cpass='$user_cpass'";
				
				$result = $this->db->query($query) or die($this->db->error);
				
				return true;
			}
			else{return false;}
			
			
			}
			
			
			
	/*** for login process ***/
		public function check_loginuser($user_uname, $user_pass){
        $user_pass = md5($user_pass);
		
		$query = "SELECT user_id from user_account WHERE user_uname='$user_uname' and user_pass='$user_pass'";
		
		$result = $this->db->query($query) or die($this->db->error);

		
		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		$count_row = $result->num_rows;
		
		if ($count_row == 1) {
	            $_SESSION['login'] = true; // this login var will use for the session thing
	            $_SESSION['user_id'] = $user_data['user_id'];
	            return true;
	        }
			
		else{return false;}
		

	}
	
	
	public function get_user_fname($user_id){
		$query = "SELECT user_fname FROM user_account WHERE user_id = $user_id";
		
		$result = $this->db->query($query) or die($this->db->error);
		
		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		echo $user_data['user_fname'];
		
	}
	
	
	/*** starting the session ***/
	public function get_session(){
	    return $_SESSION['login'];
	    }

	public function user_logout() {
	    $_SESSION['login'] = FALSE;
		unset($_SESSION);
	    session_destroy();
	    }
	
	
	
	
	
	
	
	
}
class Admin{
		protected $db;
		public function __construct(){
			$this->db = new DB_con();
			$this->db = $this->db->ret_obj();
		}
		//company creat
			public function reg_admin($cmp_name, $cmp_add, $cmp_num, $cmp_pan, $admin_uname, $admin_pass, $admin_cpass){
			//echo "k";
			
			$admin_pass = md5($admin_pass);

			//checking if the username or email is available in db
			$query = "SELECT * FROM admin_account WHERE admin_uname='$admin_uname'";
			
			$result = $this->db->query($query) or die($this->db->error);
			
			$count_row = $result->num_rows;
			
			//if the username is not in db then insert to the table
			
			if($count_row == 0){
				$query = "INSERT INTO admin_account SET cmp_name='$cmp_name', cmp_add='$cmp_add', cmp_num='$cmp_num', cmp_pan='$cmp_pan', admin_uname='$admin_uname', admin_pass='$admin_pass', admin_cpass='$admin_cpass'";
				
				$result = $this->db->query($query) or die($this->db->error);
				
				return true;
			}
			else{return false;}
			
			
			}
			public function check_loginadmin($admin_uname, $admin_pass){
        $admin_pass = md5($admin_pass);
		
		$query = "SELECT admin_id FROM admin_account WHERE admin_uname='$admin_uname' and admin_pass='$admin_pass'";
		
		$result = $this->db->query($query) or die($this->db->error);

		
		$admin_data = $result->fetch_array(MYSQLI_ASSOC);
		$count_row = $result->num_rows;
		
		if ($count_row == 1) {
	            $_SESSION['login'] = true; // this login var will use for the session thing
	            $_SESSION['admin_id'] = $admin_data['admin_id'];
	            return true;
	        }
			
		else{return false;}
		

	}
			
			public function get_cmp_name($admin_id){
		$query = "SELECT cmp_name FROM admin_account WHERE admin_id = $admin_id";
		
		$result = $this->db->query($query) or die($this->db->error);
		
		$admin_data = $result->fetch_array(MYSQLI_ASSOC);
		echo $admin_data['cmp_name'];
		
	}
			
			public function get_session(){
	    return $_SESSION['login'];
	    }

	public function admin_logout() {
	    $_SESSION['login'] = FALSE;
		unset($_SESSION);
	    session_destroy();
	    }
}