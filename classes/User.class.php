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
			switch ($p_sProperty) {

				case 'Email':
				$this->m_sEmail = $p_vValue; 
				break;

				case 'Password':
				//check to see if psw is at least 5 characters long
				if(strlen($p_vValue) < 5)
				{
					throw new Exception ("Password must be at least 5 characters long");//een error genereren
				}

				$this->m_sPassword = md5($p_vValue . $this->m_sSalt); //this verwijst naar het huidig object hier de variabele u
				break;
			}
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