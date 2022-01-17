<?php
/***********************************************************
Author:Nishan Chettri
Website:www.nishanchettri.com
Email: nishan.chettri01@universitadipavia.it
Github: nishanchettri
************************************************************/
/***********************************************************
This script helps to update the value of database table.
************************************************************/

//Server credentials
$servername = "localhost";
$dbname = "id18270231_projectdb";
$username = "id18270231_bgroupunipv";
$password = "C6@538fSunRIv&3)";

$state=$_GET['state']; //for get request

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if($state!="")          //check for the column if data is present or not to update the data
{
  $sql = "UPDATE click SET state='$state' WHERE id=1";

  if (mysqli_query($conn, $sql)) 
   {
     echo "Record updated successfully";
   } 
  else 
   {
     echo "Error updating record: " . mysqli_error($conn);
   }

}
mysqli_close($conn);//close connection
?>