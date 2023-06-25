<?php
 
 session_start();
 include "Connection.php";
 if(isset($_POST['approve']))
 {
    $userid=$_SESSION['userid'];
    $applicationid=$_SESSION['appid'];
    $status="Approve";
    $select= "SELECT * from practical_training where fk_userid='$userid'";
    $sql = mysqli_query($GLOBALS['conn'],$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['fk_userid'];
    if($res == $userid)
    {
       $update = "UPDATE practical_training set applicationstatus='$status'where applicationid='$applicationid'";
       $sql2=mysqli_query($GLOBALS['conn'],$update);
if($sql2)
       { 
           /*Successful*/
           header('location:ViewApplicationList.php');
       }
 }
}
 if(isset($_POST['reject']))
 {
    $userid=$_SESSION['userid'];
    $applicationid=$_SESSION['appid'];
    $status="Reject";
    $select= "SELECT * from practical_training where fk_userid='$userid'";
    $sql = mysqli_query($GLOBALS['conn'],$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['fk_userid'];
    if($res == $userid)
    {
       $update = "UPDATE practical_training set applicationstatus='$status'where applicationid='$applicationid'";
       $sql2=mysqli_query($GLOBALS['conn'],$update);
if($sql2)
       { 
           /*Successful*/
           header('location:ViewApplicationList.php');
       }
 }
}
?>