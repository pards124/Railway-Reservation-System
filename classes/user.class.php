<?php
/* class user.
 * This class has all the user details and perform all the user related
 * operations
 */
class User {
    private $db;
    protected $username;
    protected $password;
    protected $first_name;
    protected $last_name;
    protected $age;
    protected $email;
    protected $date;
    private $msg = array();
    private $error = array();
    private $is_logged = false;

    // constructor initialize all class memvers
    public function __construct($_db){
        $this->db = $_db;
        $this->update_messages();
    		if (isset($_GET['logout'])) {
    			$this->logout();
    		} elseif (isset($_COOKIE['username']) || (!empty($_SESSION['username']) && !empty($_SESSION['is_logged'])))  {
    			$this->is_logged = true;
    			$this->username = $_SESSION['username'];
    			$this->email = $_SESSION['email'];
        } elseif (isset($_POST['update'])) {
    				$this->update($this->username);
    		} elseif (isset($_POST['register'])) {
    				$this->register();
    		} elseif (isset($_POST['login'])) {
    			$this->login();
    		} elseif (isset($_POST['admin'])) {
    			$this->admin_login();
    		}
    		return $this;
    }

    // Copy error & info messages from $_SESSION to the user object
  	private function update_messages() {
  		if (isset($_SESSION['msg']) && $_SESSION['msg'] != '') {
  			$this->msg = array_merge($this->msg, $_SESSION['msg']);
  			$_SESSION['msg'] = '';
  		}
  		if (isset($_SESSION['error']) && $_SESSION['error'] != '') {
  			$this->error = array_merge($this->error, $_SESSION['error']);
  			$_SESSION['error'] = '';
  		}
  	}

    // get the username
    public function get_username($username){ return $this->username;}
    // get the password
    public function get_password(){ return $this->password; }
    // get first name
    public function get_firstname(){ return $this->first_name; }
    // get last name
    public function get_lastname(){ return $this->last_name; }
    // get age
    public function get_age(){ return $this->age;}
    // get the email
    public function get_email(){ return $this->email;}
    // Check if the user is logged
  	public function is_logged() { return $this->is_logged; }
    // Get errors
    public function get_error() { return $this->error; }
    // Get current date
    public function set_cur_date() { $this->date = date('m/d/Y'); }


    // Login
    public function login(){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $this->username = $this->db->real_escape_string($_POST['username']);
            $this->password = md5($this->db->real_escape_string($_POST['password']));
            if($row = $this->verify_password()){
                session_regenerate_id(true);
                $_SESSION['id'] = session_id();
                $_SESSION['username'] = $this->username;
                $_SESSION['email'] = $row->emai;
                $_SESSION['is_logged'] = true;
                // set a cookie that expires on one week
               if(isset($_POST['remember']))
                    setcookie('username',$this->username, time() + 604800);
               // the for page should not resend on refresh, to prevent this
               if(!empty($_SESSION['passenger'])){
                   header('Location: ./get-passenger-info.php');
                   exit();
               } else{
                    header('Location: index.php');
                    exit();
               }
            } else $this->error[] = 'Wrong username or password';
        } elseif (empty($_POST['username'])){
            $this->error[] = 'Username field was empty';
        } elseif(empty($_POST['password'])){
            $this->error[] = 'Password field was empty';
        }
    }

    // verify password
    public function verify_password(){
        $query = 'SELECT * FROM user'
            .' WHERE username = "'.$this->username.'"'
            .'AND password = "'.$this->password.'"';
        return ($this->db->query($query)->fetch_object());
    }

    // register the user
    public function register(){
        if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm-password']) && !empty($_POST['first-name']) && !empty($_POST['last-name']) && !empty($_POST['dob']) && !empty($_POST['email'])){
            if($_POST['password'] == $_POST['confirm-password']){
                $this->username = $this->db->real_escape_string($_POST['username']);
                $this->password = md5($this->db->real_escape_string($_POST['password']));
                $this->first_name = $this->db->real_escape_string($_POST['first-name']);
                $this->last_name = $this->db->real_escape_string($_POST['last-name']);
                $this->dob = $this->db->real_escape_string($_POST['dob']);
                $this->email = $this->db->real_escape_string($_POST['email']);
                $this->set_cur_date();
                // prepare query
                 $query = "INSERT INTO user (username, password, first_name, last_name, dob, email, date)
                    VALUES ('$this->username', '$this->password', '$this->first_name', '$this->last_name', STR_TO_DATE('$this->dob','%m/%d/%Y'), '$this->email', STR_TO_DATE('$this->date','%m/%d/%Y'))";
                  echo $query;
                if($this->db->query($query)){
				    session_regenerate_id(true);
                    $_SESSION['id'] = session_id();
				    $_SESSION['username'] = $username;
				    $_SESSION['email'] = $email;
				    $_SESSION['is_logged'] = true;
				    $this->is_logged = true;
                    $this->msg[] = 'User created, Please login.';
                    $_SESSION['msg'] = $this->msg;
                   // To avoid resending the form on refreshing
         		    header('Location: ' . $_SERVER['REQUEST_URI']);
         			exit();
			    } else $this->error[] = 'Username already exits';
            } else  $this->error[]  = 'Password does not match';
        } elseif(empty($_POST['username'])){
            $this->error[] = 'Username fiels was empty';
        } elseif(empty($_POST['password'])){
                $this->error[] = 'Password fiels was empty';
        } elseif(empty($_POST['first-name'])){
                $this->error[] = 'First name fiels was empty';
        } elseif(empty($_POST['last-name'])){
                $this->error[] = 'Last name fiels was empty';
        } elseif(empty($_POST['dob'])){
                $this->error[] = 'Date of birth fiels was empty';
        } elseif(empty($_POST['email'])){
                $this->error[] = 'Email fiels was empty';
        } elseif(empty($_POST['confirm-password'])){
                $this->error[] = 'You need to confirm you password';
        }
    }

    // Delete an existing user
  	public function delete($user) {
  		$query = 'DELETE FROM user WHERE username = "' . $username . '"';
  		return ($this->db->query($query));
  	}

    // Logout function
    public function logout() {
      session_start();
    	session_unset();
    	session_destroy();
    	$this->is_logged = false;
    	setcookie('username', '', time()-3600);
    	header('Location: index.php');
    	exit();
    }

    // Get info about an user
  	public function get_user_info($username) {
  		$query = "SELECT * FROM user WHERE username = '$username'";
  		$result = $this->db->query($query);
  		return ($result->fetch_object());
  	}

  	// Get all the existing users
  	public function get_users() {
  		$query = "SELECT * FROM user order by username asc";
      $result = $this->db->query($query);
      while($rows = $result->fetch_object()){
        echo '<tr>';
        echo '<td><input type="checkbox" id="select-all"/></td>';
        echo '<td>'.$rows->username.'</td>';
        echo '<td>'.$rows->first_name.'</td>';
        echo '<td>'.$rows->last_name.'</td>';
        echo '<td>'.$rows->dob.'</td>';
        echo '<td>'.$rows->email.'</td>';
        echo '<td>'.$rows->date.'</td>';
        echo '</tr>';
      }
  	}

  	// Print errors in screen
  	public function display_errors() {
  		foreach ($this->error as $error) {
  			echo '<p style="color:red; font-size:16px; margin-top:30px; margin-left:50px">'.$error.'</p>';
  		}
  	}

    // Print errors in screen
  	public function display_msg() {
  		foreach ($this->msg as $msg) {
  			echo '<p style="color:green; font-size:16px; margin-top:30px; margin-left:50px">'.$msg.'</p>';
  		}
  	}

    public function get_total_user(){
      $query = "select count(username) as max_user from user";
      $result = $this->db->query($query)->fetch_object();
      return ($result->max_user);
    }

    public function admin_login(){
      if(!empty($_POST['username']) && !empty($_POST['password'])){
          $this->username = $this->db->real_escape_string($_POST['username']);
          $this->password = md5($this->db->real_escape_string($_POST['password']));
          if($row = $this->verify_password()){
              session_start();
              session_regenerate_id(true);
              $_SESSION['id'] = session_id();
              $_SESSION['admin'] = $this->username;
              $_SESSION['email'] = $row->emai;
              $_SESSION['is_logged'] = true;
              // set a cookie that expires on one week
             if(isset($_POST['remember']))
                  setcookie('username',$this->username, time() + 604800);
              // the for page should not resend on refresh, to prevent this
             header('Location: ./dashboard.php');
             exit();
          } else $this->error[] = 'Wrong username or password';
      } elseif (empty($_POST['username'])){
          $this->error[] = 'Username field was empty';
      } elseif(empty($_POST['password'])){
          $this->error[] = 'Password field was empty';
      }
    }
}
