<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap.css">
</head>
<body class="container text-primary">
<table class="w-100 table table-responsive table-striped table-hover">
    <tr>
        <th>Message</th>
        <th>Response Time</th>
    </tr>
    <?php

$con = mysqli_connect("localhost","root","","assignment");

$query = mysqli_query($con,"select * from tblmsg where user_id=".$_GET['id']."");

if($query)
{
    while($row = mysqli_fetch_assoc($query))
    {
        echo "<tr><td>".$row['msg']."</td><td>".$row['time_']."</td></tr>";
    }
}

?>
</table>    
</body>
</html>