<?php
require_once('../config/db.php');

$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if ($db->connect_errno) {
	echo 'Database connection problem: ' . $db->connect_errno;
	exit();
}
require '../classes/class.book.php';
$train_number = $_GET['t_num'];
$train_name = $_GET['t_name'];
$from = $_GET['from']." (".$_GET['from-code'].")";
$to = $_GET['to']." (".$_GET['to-code'].")";
$a_time = $_GET['a_time'];
$d_time = $_GET['d_time'];
$ticket = new Book($db, $from, $to, $a_time, $d_time);
$ticket->get_passenger_details();
$ticket->display_errors();




if(isset($_POST['adult']) && isset($_POST['child'])  && isset($_POST['snr-male']) && !isset($_POST['snr-female'])){
  $this->adult = $this->db->real_escape_string($_POST['adult']);
  $this->child = $this->db->real_escape_string($_POST['child']);
  $this->snr_male = $this->db->real_escape_string($_POST['snr-male']);
  $this->snr_female = $this->db->real_escape_string($_POST['snr-female']);
  $_SESSION['passenger'] = array(
    'adult' => $this->adult,
    'child' => $this->child,
    'snr-male' => $this->snr_male,
    'snr-female' => $this->snr_female,
    'source' => $this->source,
    'destination' => $this->destination,
    'a-time' => $this->a_time,
    'd-time' => $this->d_time
  );
  echo '<script>window.location="./get-passenger-info.php"</script>';
  exit();
} elseif ( $_POST['adult'] < 0) {
  $this->error[] = 'Adult can not select nagetive value';
} elseif ( $_POST['child'] < 0) {
  $this->error[] = 'Child can not select nagetive value';
} elseif ( $_POST['snr-male'] < 0) {
  $this->error[] = 'Senior citizen male can not select nagetive value';
} else( $_POST['snr-female'] < 0) {
  $this->error[] = 'Senior citizen male can not select nagetive value';
}




?>
<?php if(isset($_POST['finish-details'])){
  foreach ($_POST['name-adult'] as $key => $value) {
    foreach ($_POST['age-adult'] as $key1 => $value1) {
      foreach ($_POST['gender-adult'] as $key2 => $value2) {
        $adult = array(
          $value => array(
            'age' => $value1,
            'gender' => $value2
          ),
        );
      }
    }
  }
    foreach ($_POST['name-child'] as $key => $value) {
      foreach ($_POST['age-child'] as $key1 => $value1) {
        foreach ($_POST['gender-child'] as $key2 => $value2) {
          $child = array(
            $value => array(
              'age' => $value1,
              'gender' => $value2
            ),
          );
        }
      }
    }
    foreach ($_POST['name-snr-male'] as $key => $value) {
      foreach ($_POST['age-snr-male'] as $key1 => $value1) {
        foreach ($_POST['gender-snr-male'] as $key2 => $value2) {
          $snr_male = array(
            $value => array(
              'age' => $value1,
              'gender' => $value2
            ),
          );
        }
      }
    }

    foreach ($_POST['name-snr-female'] as $key => $value) {
      foreach ($_POST['age-snr-female'] as $key1 => $value1) {
        foreach ($_POST['gender-snr-female'] as $key2 => $value2) {
          $snr_female = array(
            $value => array(
              'age' => $value1,
              'gender' => $value2
            ),
          );
        }
      }
    }
  $_SESSION['adult'] = $adult;
  $_SESSION['child'] = $child;
  $_SESSION['snr-male'] = $snr_male;
  $_SESSION['snr-female'] = $snr_female;
  echo '<script>window.location="./ticket-result.php"</script>';
  exit();


}?>
create table ticket (id integer(200), source varchar(100), destination varchar(100),
 a_time varchar(10), d_time varchar(10),
no_of_passenger integer(10),username varchar(100),pnr integer(20),
primary key(id), foreign key (username) references user(username)
);

create table passenger (id integer(200), name varchar(200),
type varchar(50),age integer(10),gender varchar(10),ticket integer(200),
primary key(id), foreign key(ticket) references ticket(id)
);


<div class="col-lg-3 action-group">
	<a href="add-train.php" class="btn btn-primary btn-outline btn-action"><span class="fa fa-plus"></span></a>
	<button class="btn btn-danger btn-outline btn-action"><span class="fa fa-trash"></span></button>
	<button class="btn btn-warning btn-outline btn-action"><span class="fa fa-edit"></span></button>
</div>
<div class="col-lg-1"></div>
<div class="col-lg-3 export-group">
	<button class="btn btn-success btn-outline btn-export"><span class="fa fa-file-excel-o"></span></button>
	<button class="btn btn-danger btn-outline btn-export"><span class="fa fa-file-pdf-o"></span></button>
</div>


?>
