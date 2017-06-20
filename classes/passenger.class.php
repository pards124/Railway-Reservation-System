<?php
class Passenger{
  private $db;
  public function __construct($_db){
    $this->db = $_db;
  }

  public function get_all_passenger(){
    $query = "select * from passenger order by id asc";
    $result = $this->db->query($query);
    while($rows = $result->fetch_object()){
      echo '<tr>';
      echo '<td><input type="checkbox" id="select-all"/></td>';
      echo '<td>'.$rows->id.'</td>';
      echo '<td>'.$rows->name.'</td>';
      echo '<td>'.$rows->type.'</td>';
      echo '<td>'.$rows->age.'</td>';
      echo '<td>'.$rows->gender.'</td>';
      echo '<td>'.$rows->ticket.'</td>';
      echo '<td>'.$rows->seat_no.'</td>';
      echo '</tr>';
    }
  }
}
?>
