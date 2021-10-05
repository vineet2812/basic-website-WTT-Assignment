<?php
include 'database.php';
if(isset($_POST['submit'])){
    $user=mysqli_real_escape_string($con,$_POST['user']);
    $message=mysqli_real_escape_string($con,$_POST['message']);
    date_default_timezone_set('Asia/Kolkata');
    $time=date('h:i:s a',time());
    if(!isset($user)|| $user=='' || !isset($message)|| $message=='')
    {
        $error="Please fill in your name and a message";
        header("Location: shoutbox.php?error=".urlencode($error));
        exit();
    }
    else
    {
        $query="Insert INTO shouts (user,message,time) VALUES ('$user','$message','$time')";
        if(!mysqli_query($con,$query))
        {
            die('Error' .mysqli_error($con));
        }
        else
        {
            header("Location: shoutbox.php");
            exit();
        }
    }
}
?>