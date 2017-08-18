
<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'hng'; // Nama Database
 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Fail to connect to MySQL: ' . mysqli_connect_error());   
}
 
$sql = 'SELECT id, f_name, l_name, created
        FROM test';
         
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hotels.ng Test</title>

    <h2>Hotels.ng Tests-- Babatunde Adekunle</h2>
</head>

<body>
<?php
 
if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}
 
echo '<table>
        <thead>
            <tr>
                <th> ID</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>DATE</th>
            </tr>
        </thead>
        <tbody>';
         
while ($row = mysqli_fetch_array($query))
{
    echo '<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['f_name'].'</td>
            <td>'.$row['l_name'],'</td>
            <td>'.$row['created'].'</td>
        </tr>';
}
echo '
    </tbody>
</table>';
 

mysqli_free_result($query);
 
mysqli_close($conn);


?>