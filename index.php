
<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'hng'; // Nama Database
 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Fail to connect to MySQL: ' . mysqli_connect_error());   
}
 
$sql = 'SELECT `id`, `hotel_name`, `hotel_address`, `hotel_location`, `hotel_rating` FROM `test`';
         
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hotels.ng Test</title>

    <h2>Hotels.ng Tests-- Babatunde Adedolapo</h2>
    <p>First Task for Hotels.ng Internship by Mark Essien</p>
    <p><b>Hotels in Ibadan</b></p>
</head>

<body>
<br>
<br>
<?php
 
if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table>
        <thead>
            <tr>
                <th> ID</th>
                <th>HOTEL NAME</th>
                <th>ADDRESS</th>
                <th>LOCATION</th>
                <th>RATING</th>
            </tr>
        </thead>
        <tbody>';
         
while ($row = mysqli_fetch_array($query))
{
    echo '<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['hotel_name'].'</td>
            <td>'.$row['hotel_address'],'</td>
            <td>'.$row['hotel_location'],'</td>
            <td>'.$row['hotel_rating'].'</td>
        </tr>';
}
echo '
    </tbody>
</table>';
if ($conn->query($sql)==TRUE){
    echo "<br> <br>";
    echo  " File Printed from Database Successfully!";
} else {
    echo "Error:" . $sql . "<br>".$conn->error;


}

 

mysqli_free_result($query);
 
mysqli_close($conn);


?>