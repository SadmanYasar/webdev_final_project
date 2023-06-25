<html>
	<head>
		<title>Report Homepage</title>
		<link rel="stylesheet" href="../style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
    	<link href="https://fonts.googleapis.com/css2?family=Cousine&family=Montserrat:ital,wght@0,400;1,200&display=swap" rel="stylesheet">	
	</head>

	<?php
	    include "Admin.php";
		include "../config.php";
		//session_start();
		$id = $_SESSION['userid'];
		$test_status = "Approve";
		$query = "SELECT * FROM practical_training";
		$result = mysqli_query($conn, $query) or die(mysqli_connect_error());
		$x = 0;
	?>

	<body>
	<h1 style="text-align: center; margin-top: 50px;">List of Practical Training</h1> <!--added-->

		<form method = "post" action="view_student_report.php">
			<?php
			echo '<div class="container-insert-table">';
			echo '<div class="table-adjust">';
				echo "<table class='bordered'>";
					echo "<tr>";
						echo "<th>No.</th>";
						echo "<th>Title</th>";
						echo "<th>Status</th>";
						echo "<th>Report</th>";
					echo "</tr>";

					foreach($result as $row) {
						$x = $x + 1;
						echo "<tr>";
							echo "<td>" .$x. "</td>";
							echo "<td>$row[applicationtitle]</td>";
							echo "<td>" .$row['applicationstatus']. "</td>";
							if($row['applicationstatus'] != $test_status) {
								echo "<td>-</td>";
							}
							else {
								echo '<td><a href ="view_student_report.php?t_id='.$row['applicationid'].'">View</a></td>';
							}
						echo "</tr>";
					}
					echo "</table>";
				echo '</div>'; //table-adjust
			echo '</div>'; //container-insert-table

				?>
		</form>

		<br> <br> <br> 

	</body>
</html>

<?php include '../includes/footer.php' ?>
