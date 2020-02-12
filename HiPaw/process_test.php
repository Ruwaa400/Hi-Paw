<?php

$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}


$sql = "SELECT id FROM pet";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. "<br>";
    }
} else {
    echo "0 results";
}
$db->close();

