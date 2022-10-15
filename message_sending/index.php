<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sending Message to Multiple Users</title>
    <link rel="stylesheet" href="../bootstrap.css" />
    <script src="../jquery.js"></script>
</head>
<body class="bg-ino">
<h2 class="p-3 text-secondary">Sending Message To Multiple Users.</h2>
<br />
<div class="row">
    <div class="col-sm-7">

        <input type="text" id="txtMessage" class="container form-control" placeholder="Enter Your Message.." />
    </div>
    <div class="col-sm-2">
        <button class="btn btn-primary" id="btnSend">Send</button>
    </div>
</div>
<br />
<div class="container">
<table class="table table-responsive table-primary table-hover table-striped">
    <tr><th>
        User ID
    </th>
<th>
    Name
</th>
<th>Select User</th></tr>
<?php 

$dataQuery = mysqli_query(mysqli_connect("localhost",'root','','assignment'),"select * from tblUsers;");

if($dataQuery)
{
    while($data = mysqli_fetch_array($dataQuery))
    {
        echo "<tr><td>".$data[0]."</td><td><a href='allmsg.php?id=".$data[0]."'>".$data[1]."</a></td><td><input type='checkbox' id=".$data[0]." /></td></tr>";
    }
}

?>
</table>
</div>
<script>
    //function GetCheckID()
    {
        $('#btnSend').click(function(){
            var selected = new Array();
$('table input[type="checkbox"]:checked').each(function() {
    selected.push($(this).attr('id'));
});
$.ajax({
    url:'send.php',
    data:{
        msg:$('#txtMessage').val(),
        users:selected,
    },
    type:"POST",
    success:function(response)
    {
        alert(response)
    }
})
        })
    }
</script>
</body>
</html>