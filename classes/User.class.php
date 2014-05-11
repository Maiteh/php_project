<?php
	include_once("DB.class.php");

	class User
	{ 
		private $m_sEmail;
		private $m_sPassword;
		private $m_sFirstname;
		private $m_sLastname;
		private $m_sPhone;
		private $m_bAdmin;
		public $error = array();

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) 
			{
				
				case 'Email':
					if(!empty($p_vValue)){
					$this->m_sEmail = $p_vValue;
					}
					else
					{
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
		 				$salt = "IMVYJFDFGDprivate$574987sfdkl;jksldj!@#@&%&ˆ*SRT546564FYFGH";
		 				$this->m_sPassword = md5($p_vValue.$salt);
		 				break;
		 			}
		 		case 'Firstname':
					if(!empty($p_vValue)){
						$this->m_sFirstname = $p_vValue;
					}
					else
					{
						$this->error["errorFirstname"] = "Fill in your firstname";
					}
					break;

				case 'Lastname':
					if(!empty($p_vValue)){
					$this->m_sLastname = $p_vValue;
					}
					else
					{
						$this->error["errorLastname"] = "Fill in your lastname";
					}
					break;

				case 'Phone':
					if(!empty($p_vValue)){
					$this->m_sPhone = $p_vValue;
					}
					else
					{
						$this->error["errorPhone"] = "Fill in your phonenumber.";
					}
					break;

				case 'Admin':
					if($p_vValue == "on"){
						$this->m_bAdmin = "yes";
					}
					else
					{
						$this->m_bAdmin = "no";
					}
					break;
			}
		}

		public function __get($p_sProperty)
		{

			switch ($p_sProperty) 
			{
				case 'Email':
					return $this->m_sEmail;
					break;
				case 'Password':
					return $this->m_sPassword;
					break;
				case 'Firstname':
					return $this->m_sFirstname;
					break;
				case 'Lastname':
					return $this->m_sLastname;
					break;
				case 'Phone':
					return $this->m_sPhone;
					break;
				case 'Admin':
					return $this->m_bAdmin;
					break;
				
			}
		}

		public function Register()
		{
			$db = new DB();
			$isavailable= $this->EmailAvailable($db);
			if($isavailable)
			{
			$sql = "insert into tblklant(
						email, password, firstname, lastname, phone, admin) 
					VALUES(
						'" . $db->conn->real_escape_string($this->m_sEmail) . "', 
						'" . $db->conn->real_escape_string($this->m_sPassword) . "', 
						'" . $db->conn->real_escape_string($this->m_sFirstname) . "',
						'" . $db->conn->real_escape_string($this->m_sLastname) . "',
						'" . $db->conn->real_escape_string($this->m_sPhone) . "',
						'" . $db->conn->real_escape_string($this->m_bAdmin) . "'
						)
					";
			$db->conn->query($sql);
			echo $sql;
		}
		else
		{
			$this->error['errorAvailable'] = "Sorry this e-mail adress already has an account.";
		}
		}

		public function EmailAvailable($db)
		{
			$sql = "select * from tblklant 
					where email = '".$db->conn->real_escape_string($this->m_sEmail)."'
					";
			$result = $db->conn->query($sql);
			if($result)
			{
				$rows = mysqli_num_rows($result);
				if($rows === 0)
				{
					$available = true;
				}
				else
				{
					$available = false;	
				}
			return $available;
			}
		}

		public function canLogin()
		{
			$db = new Db();
			$salt = "IMVYJFDFGDprivate$574987sfdkl;jksldj!@#@&%&ˆ*SRT546564FYFGH";
			$sql = "select * from tblgebruiker 
					where email ='".$db->conn->real_escape_string($this->m_sEmail)."' 
					and
					password='".$db->conn->real_escape_string(md5($this->m_sPassword . $salt))."'
					";
			
			// $sql;

			$result = $db->conn->query($sql);

			if($result->num_rows == 1)
			{
				$db->conn->query($sql);
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['email'] = $this->m_sEmail;
				//header(""); -> redirecten naar 

				echo "tis gelukt";
			}
			else
			{	
				throw new Exception("Sorry, your email or password is incorrect");
			}
		}


	}
?>