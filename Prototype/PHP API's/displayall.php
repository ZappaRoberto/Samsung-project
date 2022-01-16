<?php
/*
Author:Nishan Chettri
Website:www.nishanchettri.com
Email: nishanchettri@gmail.com
*/

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Server Credentials 
$servername = "localhost";
$dbname = "id18270231_projectdb";
$username = "id18270231_bgroupunipv";
$password = "C6@538fSunRIv&3)";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
                  $query = "SELECT state FROM click WHERE id=1";
                  $data=mysqli_query($conn,$query);
if (mysqli_num_rows($data) > 0) 
{
    // Storing the returned array in response
    $response["click"] = array();

    // While loop to store all the returned response in variable
    while ($row = mysqli_fetch_array($data)) {
        $click = array();
        $click["state"] = $row["state"];
	// Push all the items 
        array_push($response["click"], $click);
    }
    // On success
    $response["success"] = 1;
 
    // Show JSON response
    echo json_encode($response);
}	
else 
{
    // If no data is found
    $response["success"] = 0;
    $response["message"] = "No data on click found";
 
    // Show JSON response
    echo json_encode($response);
}
$connection->close();
?>