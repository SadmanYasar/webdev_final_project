<?php
 
 session_start();
 include "Connection.php";
 if(isset($_POST['edit']))
 {
    $id=$_SESSION['userid'];
    $name=$_POST['name'];
    $username=$_POST['username'];
    $phone=$_POST['Phone'];
    $email=$_POST['email'];
    $address=$_POST['Address'];
    $password=$_POST['Password'];
    $age=$_POST['Age'];
    $select= "select * from users where userid='$id'";
    $sql = mysqli_query($GLOBALS['conn'],$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['userid'];
    if($res == $id)
    {
   
       $update = "UPDATE users set name='$name', phone='$phone',email='$email', address='$address', age='$age' where userid='$id'";
       $sql2=mysqli_query($GLOBALS['conn'],$update);
       $update = "UPDATE login set username='$username', password='$password' where fk_userid='$id'";
       $sql3=mysqli_query($GLOBALS['conn'],$update);
    }
    header('location:EditProfile_Form.php');
}
?>