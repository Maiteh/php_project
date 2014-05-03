<?php
	include_once("DB.class.php");

	class User
	{ 
		private $m_sEmail;
		private $m_sPassword;
		private $m_sSalt ="574987sfdkl;jksldj!@#@&%&ˆ*";
		private $m_sFirstname;
		private $m_sLastname;
		private $m_sPhone;
		private $m_bType;
		public $error = array();

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) 
			{
				
				case 'Email':
					if(!empty($p_vValue)){
					$this->m_sEmail = $p_vValue;
					}else{
						$this->error["errorEmail"] = "Fill in an e-mail adress";
					}
					break;
				
				case 'Password':
					if(strlen($p_vValue) < 5)
		 			{
		 				$this->error['errorPassword']="Choose a password of atleast 5 characters";
		 			}
					else
		 			{
		 				$salt = "IMVYJFDFGDSRT546564FYFGH";
		 				$this->m_sPassword = md5($p_vValue.$salt);
		 				break;
		 			}
		 		case 'Firstname':
					if(!empty($p_vValue)){
						$this->m_sFirstname = $p_vValue;
					}else{
						$this->error["errorFirstname"] = "Fill in your firstname";
					}
					break;

				case 'Lastname':
					if(!empty($p_vValue)){
					$this->m_sLastname = $p_vValue;
					}else{
						$this->error["errorLastname"] = "Fill in your lastname";
					}
					break;

				case 'phone':
					if(!empty($p_vValue)){
					$this->m_sPhone = $p_vValue;
					}else{
						$this->error["errorPhone"] = "Fill in your phonenumber.";
					}
					break;
		}

		public function __get($p_sProperty)
		{

			switch ($p_sProperty) 
			{
				case 'Username':
				return $this->m_sUsername;
				break;
				
				case 'Email':
				return $this->m_sEmail;
				break;

				case 'Password':
				return $this->m_sPassword;
				break;
			}
		}

		public function Register()
		{
			$db = new DB();
			$sql = "insert into tblUser(
						username, email, password) 
					VALUES(
						'" . $db->conn->real_escape_string($this->m_sUsername) . "', 
						'" . $db->conn->real_escape_string($this->m_sEmail) . "', 
						'" . $db->conn->real_escape_string($this->m_sPassword) . "')";
			$db->conn->query($sql);
		}

		public function canLogin()
		{
			$db = new DB();
			$sql = "select * from tblUser
					where username = '" . $db->conn->real_escape_string($this->m_sUsername) . "',
					and password = '" . $db->conn->real_escape_string($this->m_sPassword) . "',
					";

			$result = $db->conn->query($sql);

			if ($result) {
				if (mysqli_num_rows($result) === 0) 
				{
					$available = true;
				}
				else
				{
					$available = false;
				}
			}
			return $available;

		}


	}
?>