<html>

<head>
    <link rel="shortcut icon" href="../images/transparent-logo.png" type="image/x-icon">
</head>

<body>
    <?php
    include('../config.php');
    include('Admin.php');
    echo '<h1 style="text-align: center; margin-top: 50px;">Listing of All User</h1>';
    ?>

    <form action="search_user.php" method="post" align="center">
        <input class="search-user-input" style="padding:10px; width: 20%;" type="text" name="name"/> &nbsp;
        <input class="admin-btn" style="width: 100px; font-size:18px;" id="search" type="submit" value="Search"/>
    </form>

   <?php
    $q1=mysqli_query($conn,"SELECT * FROM users")or die(mysqli_connect_error());
    $q2=mysqli_query($conn,"SELECT * FROM login")or die(mysqli_connect_error());

    //buttons
    echo '<div style="display: inline-flex; margin-left: 1100px;">
    <a href="add_user.php"><button class="insert-button" style="display: width: 100px; font-size:18px;">Add</button></a>
    </div>';


    echo '<div class="container-insert-table">';
    echo '<table class="bordered">
         <tr>
         <th align="left">User ID</th>
         <th align="left">Name</th>
         <th align="left">Username</th>
         <th align="left">Role</th>
         <th align="left">Edit</th>
         <th align="left">Delete</th>
         <th align="left">View</th>
         </tr>';

            while (($row=mysqli_fetch_array($q1))) {
                $row2=mysqli_fetch_array($q2);
                echo '<tr>
                    <td align="left">' . $row['userid'] . '</td>
                    <td align="left">' . $row['name'] . '</td>
                    <td align="left">' . $row2['username'] . '</td>
                    <td align="left">';
                    if ($row2['userlevel'] == 1) {
                        echo "Admin";
                    } else if ($row2['userlevel'] == 2) {
                        echo "Coordinator";
                    } else if ($row2['userlevel'] == 3) {
                        echo "Student";
                    }
                    echo '</td>
                <td align="left"><a href="edit_user.php?id=' . $row['userid'] . '">Edit</a></td>
                <td align="left"><a href="delete_user.php?id=' . $row['userid'] . '">Delete</a></td>
                <td align="left"><a href="view_user.php?id=' . $row['userid'] . '">View</a></td>
            </tr>';
                }
    echo "</table>";
	echo '</div>'; //container-insert-table
  
    mysqli_close($conn);

    echo '<br> <br> <br>';

    //buttons
    echo '<div style="display: inline-flex; margin-left: 50%;">
        <button class="insert-button" style="display: width: 100px; font-size:18px;" onclick="history.back()">Go Back</button>
    </div>';


    echo '<br> <br> <br> <br>';    

    include('../includes/footer.php');
    ?>
</body>

</html>