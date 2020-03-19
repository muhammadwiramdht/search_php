<?php include "connection.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>User List</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>User List</h1>
		<p>
			<form action="index.php" method="get">
				<label for="search">Search:</label><br>
				<input type="text" id="search" name="search">
				<input type="submit" value="Submit">
			</form> 
		</p>
		
		<?php 
			if (isset($_GET['search'])) {
				$search = $_GET['search'];
				echo "<p><strong> Hasil Pencarian: " . $search . "</strong></p>";
			}
		?>
		
		<table>
			<tr>
				<th>No</th>
				<th>Name</th>
			</tr>
			<?php 
				if (isset($_GET['search'])) {
					$search = $_GET['search'];
					$sql = "SELECT * FROM mahasiswa WHERE name like '%".$search."%'";
				} else {
					$sql = "SELECT * FROM mahasiswa";
				}
				
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					// output data of each row
					$no = 0;
					while($row = mysqli_fetch_assoc($result)) {
						$no++;
			?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $row["name"];?></td>
			</tr>
			<?php } } else { ?>
				<td colspan="2">0 results</td>
			<?php }
				mysqli_close($conn);
			?>
		</table> 		
	</body>
</html> 