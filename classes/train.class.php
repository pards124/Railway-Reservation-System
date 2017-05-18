<?php
/* Class train
*/
class Train{
    private $db;
    private $from;
    private $to;
    private $dep_date;
    private $class;
    private $error = array();

    public function __construct($db){
      $this->db = $db;
      if(isset($_POST['search'])){
        $this->search();
      }
    }

    public function search(){
      if(!empty($_POST['from']) && !empty($_POST['to']) && !empty($_POST['dep-date']) && !empty($_POST['class'])){
        $this->from = $this->db->real_escape_string($_POST['from']);
        $this->to = $this->db->real_escape_string($_POST['to']);
        $this->dep_date = $this->db->real_escape_string($_POST['dep-date']);
        $this->class = $this->db->real_escape_string($_POST['class']);
        header('Location: search.result.php');
        exit();
      } elseif(empty($_POST['from'])) {
        $this->error[] = 'From field was empty';
      } elseif(empty($_POST['to'])) {
        $this->error[] = 'To field was empty';
      } elseif (empty($_POST['dep-date'])) {
        $this->error[] = 'Deparature date field was empty';
      } elseif (empty($_POST['class'])) {
        $this->error[] = 'Class field was empty';
      }
      return $this;
    }

    public function display_errors(){
      foreach ($this->error as $error) {
  		echo '<p style="color:red; font-size:16px; margin-top:30px; margin-left:50px">'.$error.'</p>';
      }
    }
}
 ?>
