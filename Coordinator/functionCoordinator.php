<?php
 
 include ('Connection.php');

function getUsersData($id)
 {
    $array=array();
    $select= "select * from users where userid='$id'";
    $sql = mysqli_query($GLOBALS['conn'],$select);
    while($row=mysqli_fetch_assoc($sql))
    {
        $array['id']=$row['userid'];
        $array['email']=$row['email'];
        $array['name']=$row['name'];
        $array['address']=$row['address'];
        $array['age']=$row['age'];
        $array['phone']=$row['phone'];
    }
    $select= "select * from login where fk_userid='$id'";
    $sql = mysqli_query($GLOBALS['conn'],$select);
    while($row=mysqli_fetch_assoc($sql))
    {
        $array['username']=$row['username'];
        $array['password']=$row['password'];
    }
    return $array;
}


function getApplication($app_id)
 {
    $array=array();
    $select= "SELECT * from practical_training where applicationid='$app_id'";
    $sql = mysqli_query($GLOBALS['conn'], $select);
    
    while($row=mysqli_fetch_assoc($sql))
    {
        $array['appid']=$row['applicationid'];
        $array['appdate']=$row['applicationdate'];
        $array['status']=$row['applicationstatus'];
        /*$array['gender']=$row['gender'];
        $array['matric']=$row['matricnumber'];
        $array['nation']=$row['nationality'];
        $array['com_name']=$row['companyname'];
        $array['com_no']=$row['companycontactno'];
        $array['com_email']=$row['companyemail'];
        $array['dept']=$row['department'];
        $array['job']=$row['jobtitle'];
        $array['sdate']=$row['startdate'];
        $array['edate']=$row['enddate'];*/
        $array['apptitle']=$row['applicationtitle'];
        $array['userid']=$row['fk_userid'];
    }
    $select= "SELECT * from company where fk_applicationid='$app_id'";
    $sql = mysqli_query($GLOBALS['conn'], $select);
    
    while($row=mysqli_fetch_assoc($sql))
    {
        $array['com_name']=$row['companyname'];
        $array['com_no']=$row['companycontactno'];
        $array['com_email']=$row['companyemail'];
        $array['dept']=$row['department'];
        $array['job']=$row['jobtitle'];
        $array['sdate']=$row['startdate'];
        $array['edate']=$row['enddate'];
    }
    $select= "SELECT * from user_detail where fk_applicationid='$app_id'";
    $sql = mysqli_query($GLOBALS['conn'], $select);
    
    while($row=mysqli_fetch_assoc($sql))
    {
        $array['gender']=$row['gender'];
        $array['matric']=$row['matricnumber'];
        $array['nation']=$row['nationality'];
    }   

    return $array;
}


function getFullApplication($app_id)
{
    $array_Application=getApplication($app_id);
    $array_Profile=getUsersData($array_Application['userid']);
}

function checkUserLevel($id)
{
    $array=getUsersData($id);
    if($array['userlevel']==1)
        return "Admin";
    else if($array['userlevel']==2)
        return "Coordinator";
    else
        return "Student";
}

function displayProfile($id)
{
    $array=getUsersData($id);
    echo "<h1>".checkUserLevel($id)."</h1><br>";
    echo "<table>";
    echo "<tr><td>Name: </td><td>".$array['name']."</td></tr>";
    echo "<tr><td>Username: </td><td>".$array['username']."</td></tr>";
    echo "<tr><td>Age: </td><td>".$array['age']."</td></tr>";
    echo "<tr><td>Phone No.: </td><td>".$array['phone']."</td></tr>";
    echo "<tr><td>email: </td><td>".$array['email']."</td></tr>";
    echo "<tr><td>Address: </td><td>".$array['address']."</td></tr>";
    echo "</table>";
}


function displayFullApplication($userid, $appid)
{
    $array1=getApplication($appid);
    $array2=getUsersData($userid);
    
        echo "<div class='tableA'>";
            echo "<table class='tablePracticalTraining'>";
                echo "<h2>A. Personal Information</h2>";
                echo "<tr id='line-height-report'><td id='num'>1.</td><td class='question1'>Applicant's Name</td><td>".$array2['name']."</td></tr>";
                echo "<tr id='line-height-report'><td id='num'>2.</td><td class='question1'>Age</td><td>".$array2['age']."</td></tr>";
                echo "<tr id='line-height-report'><td id='num'>3.</td><td class='question1'>Gender</td><td>".$array1['gender']."</td></tr>";
                echo "<tr id='line-height-report'><td id='num'>4.</td><td class='question1'>Nationality</td><td>".$array1['nation']."</td></tr>";
                echo "<tr id='line-height-report'><td id='num'>5.</td><td class='question1'>Matric Number</td><td>".$array1['matric']."</td></tr>";
                echo "<tr id='line-height-report'><td id='num'>6.</td><td class='question1'>Contact Number</td><td>".$array2['phone']."</td></tr>";
                echo "<tr id='line-height-report'><td id='num'>7.</td><td class='question1'>Email</td><td>".$array2['email']."</td></tr>";
                echo "<tr id='line-height-report'><td id='num'>8.</td><td class='question1'>Address</td><td>".$array2['address']."</td></tr>";
            echo "</table>";
        echo "</div>";

        echo "<div class='tableB'>";
            echo "<table class='tablePracticalTraining'>";
                echo "<h2>B. Company Information</h2>";
                echo "<tr id='line-height-report'><td id='num'>1.</td><td class='question1'>Company Name</td><td>".$array1['com_name']."</td></tr>";
                echo "<tr id='line-height-report'><td id='num'>2.</td><td class='question1'>Company Contact Number</td><td>".$array1['com_no']."</td></tr>";
                echo "<tr id='line-height-report'><td id='num'>3.</td><td class='question1'>Company Email</td><td>".$array1['com_email']."</td></tr>";
            echo "</table>";
        echo "</div>";

        echo "<div class='tableC'>";
            echo "<table class='tablePracticalTraining'>";
                echo "<h2>C. Practical Training Information</h2>";
                echo "<tr id='line-height-report'><td id='num'>1.</td><td class='question1'>Department Name</td><td>".$array1['dept']."</td></tr>";
                echo "<tr id='line-height-report'><td id='num'>2.</td><td class='question1'>Job Title</td><td>".$array1['job']."</td></tr>"; 
                echo "<tr id='line-height-report'><td id='num'>3.</td><td class='question1'>Start Date</td><td>".$array1['sdate']."</td></tr>";   
                echo "<tr id='line-height-report'><td id='num'>4.</td><td class='question1'>End Date</td><td>".$array1['edate']."</td></tr>";   
            echo "</table>";
            echo "</div>";
}
