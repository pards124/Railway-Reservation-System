<?php
/* Class train
*/
class Train{
    private $db;
    private $source;
    private $destination;
    private $train_number;
    private $date_of_journey;
    private $class;
    private $result;
    private $url;
    private $error = array();

    public function __construct($db){
      $this->db = $db;
      if(isset($_POST['search'])){
        $this->search_train();
      }
    }

    public function get_route(){
      if(!empty($_POST['train-number'])){
        $this->from = $this->db->real_escape_string($_POST['train-number']);
        $curl = curl_init();
        $url = 'http://api.railwayapi.com/route/train/'.$this->train_number.'/apikey/'.RAILAPI.'/';
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
        // Send the request & save response to $resp
        $jsone_result = curl_exec($curl);
        $result = json_decode($jsone_result,true);
        print_r($result);
        // Close request to clear up some resources
        curl_close($curl);
        //header('Location: search.result.php');
        //exit();
      } else {
        $this->error[] = 'Enter the train number';
      }
      return $this;
    }

    public function search_train(){
      if(!empty($_POST['source']) && !empty($_POST['destination']) && !empty($_POST['date-of-journey'])){
        $this->source = $this->db->real_escape_string($_POST['source']);
        $this->destination = $this->db->real_escape_string($_POST['destination']);
        $this->date_of_journey = new DateTime($this->db->real_escape_string($_POST['date-of-journey']));
        $doj = $this->date_of_journey->format('d-m');
        $curl = curl_init();
        $url = 'http://api.railwayapi.com/between/source/'.$this->filter_station_code($this->source).'/dest/'.$this->filter_station_code($this->destination).'/date/'.$doj.'/apikey/'.RAILAPI.'/';
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
        // Send the request & save response to $resp
        $this->url = $url;
        $jsone_result = curl_exec($curl);
        $this->result = json_decode($jsone_result,true);
      //  session_start();
        $_SESSION['search-result'] = $this->result;
        $_SESSION['doj'] = $this->date_of_journey;
        curl_close($curl);
        header('Location:./search.result.php');
        exit();
      } elseif(empty($_POST['source'])){
        $this->error[] = 'Enter source station';
      } elseif(empty($_POST['destination'])){
        $this->error[] = 'Enter destination station';
      } elseif(empty($_POST['date-of-journey'])){
        $this->error[] = 'Enter date of jounney';
      }
    }
    public function get_pnr_status(){
      if(!empty('pnr')){
        $this->pnr = htmlspecialchars($_POST['pnr']);
        $curl = curl_init();
        $url = 'http://api.railwayapi.com/pnr_status/pnr/'.$this->pnr.'/apikey/'.RAILAPI.'/';
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
        // Send the request & save response to $resp
        $jsone_result = curl_exec($curl);
        $result = json_decode($jsone_result,true);
        print_r($result);
        // Close request to clear up some resources
        curl_close($curl);
      } else{
        $this->error[] = "Enter pnr number";
      }
    }

    public function seat_availability($train_number, $class_code, $quota_code){
      $curl = curl_init();
      $url = 'http://api.railwayapi.com/check_seat/train/';
      $url .= ''.$train_number.'/source/'.$this->source.'/dest/'.$this->destination.'/date/'.$this->doj.'/';
      $url .= 'class/'.$class_code.'/quota/'.$quota_code.'/apikey/'.RAILAPI.'/';
      // Set some options - we are passing in a useragent too here
      curl_setopt_array($curl, array(
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_URL => $url,
          CURLOPT_USERAGENT => 'Codular Sample cURL Request'
      ));
      // Send the request & save response to $resp
      $jsone_result = curl_exec($curl);
      $result = json_decode($jsone_result,true);
      // Close request to clear up some resources
      curl_close($curl);
      return $result;
    }

    public function filter_station_code($station){
      $str = substr($station, strpos($station,'(')+1);
      $code = trim($str,")");
      return $code;
    }


    public function station_name_to_code($station){
      $curl = curl_init();
      $url = 'http://api.railwayapi.com/name_to_code/station/'.$station.'/apikey/'.RAILAPI.'/';
      // Set some options - we are passing in a useragent too here
      curl_setopt_array($curl, array(
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_URL => $url,
          CURLOPT_USERAGENT => 'Codular Sample cURL Request'
      ));
      // Send the request & save response to $resp
      $this->url = $url;
      $jsone_result = curl_exec($curl);
      $result = json_decode($jsone_result,true);
      $key = $this->recursive_array_search($station, $result);
      // Close request to clear up some resources
      curl_close($curl);
      return $result;
    }


    private function recursive_array_search($needle,$haystack) {
      foreach($haystack as $key=>$value) {
          $current_key=$key;
          if($needle===$value OR (is_array($value) && $this->recursive_array_search($needle,$value))) {
            return $current_key;
          }
      }
      return false;
    }


    public function display_(){
      session_start();
      $result = $_SESSION['search-result'];


    }


    public function display_errors(){
      foreach ($this->error as $error) {
  		echo '<p style="color:red; font-size:16px; margin-top:30px; margin-left:50px">'.$error.'</p>';
      }
    }

    public function display_url(){
      return $this->url;
    }

}
 ?>
