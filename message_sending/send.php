<?php

if(empty($_POST['msg']))
{
    echo "Please Enter Your Message First";
}

else
{
    $users =  count($_POST['users']);
    
    $con = mysqli_connect("localhost","root","","assignment");
    
    for($a=0;$a<$users;$a++)
    {
        $result = mysqli_query($con,"insert into tblMsg(user_id,msg) values(".$_POST['users'][$a].",'".$_POST['msg']."');");
    }

    echo "Message Sent Successfully..";
}

?>