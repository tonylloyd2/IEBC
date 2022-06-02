<?php
include "../databases/connectdb.php";

$thecounty = $_POST['county'];
$county = str_replace("-"," ",$thecounty);

$query = mysqli_query($connectdb,"SELECT * FROM sub_county WHERE countyName='{$county}'");
$data = "";
while ($result = mysqli_fetch_assoc($query)){
   $data .= "<option value=".$result['subCounty'].">".$result['subCounty']."</option>";
}

echo($data);

?>