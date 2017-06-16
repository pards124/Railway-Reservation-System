<?php
require '../config/db.php';
// Get cURL resource
$curl = curl_init();
$url = 'http://api.railwayapi.com/between/source/GHY/dest/DMV/date/17-06/apikey/'.RAILAPI.'/';
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
$result = json_decode($resp,true);
echo '<table>';
for($i=0; $i<count($result); $i++){
  echo $i;
  echo "<tr>";
  for($j=0; $j<count($result[$i]); $j++){
    echo '<td>'.$result[$i][$j].'</td>';
    for($k=0; $k<count($result[$i][$j]); $k++){
      echo '<td>'.$result[$i][$j][$k].'</td>';
      for($l=0; $l<count($result[$i][$j][$k]); $l++){
        echo '<td>'.$result[$i][$j][$k][$l].'</td>';
      }
    }
  }
  echo '</tr>';
}
echo '</table>';
//print_r($result);
// Close request to clear up some resources
curl_close($curl);


function traverseArray($array)
{
    // Loops through each element. If element again is array, function is recalled. If not, result is echoed.
    foreach ($array as  $value)
    {
        if (is_array($value))
        {
            traverseArray($value); // Or
            // traverseArray($value);
        }
        else
        {
            echo "<pre>";
            echo '<td>'.$value. " </td>";
            echo "</pre>";
        }
    }
  //echo "<br>\n";

}
 ?>
