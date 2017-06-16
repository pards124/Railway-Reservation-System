<?php
class Ticket{
  private $db;
  public function __construct($_db){
    $this->db = $_db;
  }

  public function get_all_ticket(){
    $query = "select * from ticket order by id asc";
    $result = $this->db->query($query);
    while($rows = $result->fetch_object()){
      echo '<tr>';
      echo '<td><input type="checkbox" id="select-all"/></td>';
      echo '<td>'.$rows->id.'</td>';
      echo '<td>'.$rows->source.'</td>';
      echo '<td>'.$rows->destination.'</td>';
      echo '<td>'.$rows->a_time.'</td>';
      echo '<td>'.$rows->d_time.'</td>';
      echo '<td>'.$rows->no_of_passenger.'</td>';
      echo '<td>'.$rows->username.'</td>';
      echo '<td>'.$rows->pnr.'</td>';
      echo '</tr>';
    }
  }
}
?>
