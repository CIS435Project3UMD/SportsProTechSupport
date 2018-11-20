<?php include '../view/header.php'; ?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!-- <title>Page Title</title> -->
	<link rel="stylesheet" type="text/css" media="screen" href="../main.css" />
</head>
	<body>
		<main>
			<h3>Customer Search</h3>

			<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
				<label for="lastNameSearched">Last Name: </label>
				<input type="text" name="lastNameSearched">
				<input type="submit" value="Search">
			</form>

			<?php if (!empty($_POST)): ?>
				<?php
					try {

						$dsn = 'mysql:host=localhost;dbname=tech_support';
						$username = 'ts_user';
						$password = 'pa55word';
						$db = new PDO($dsn, $username, $password);
						// echo "<p>You are connected to the database!</p>";
						
						$ln = $_POST["lastNameSearched"];
						$query = 
						'SELECT 
							firstName, 
							lastName, 
							email, 
							city FROM customers WHERE lastName = :ln';
						$statement = $db->prepare($query);
						$statement->bindValue(':ln', $ln);
						$statement->execute();
						$products = $statement->fetchAll();
						$statement->closeCursor();

					}
					catch (Exception $e) {
						echo 'Caught exception: ',  $e->getMessage(), "\n";
					}
			?>
	  			<h3>Results</h3>
				<table>
					<tr>
						<th>Name</th>
						<th>Email Address</th>
						<th>City</th>
						<th></th>
					</tr>
					<?php foreach ($products as $product): ?>
					<tr>
						<td><?php echo $product['firstName'] . " " . $product['lastName']; ?></td>
						<td><?php echo $product['email']; ?></td>
						<td><?php echo $product['city']; ?></td>
						<td>
							<a href="/customer_view_update.php">
								<form action="./customer_view_update.php" method="post">
									<input type="hidden" name="thisEml" value="<?php echo $product['email'] ?>">
									<input type="submit" value="Select">
								</form>
							</a>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			<?php endif; ?>
		</main>
	</body>
</html>

<?php include '../view/footer.php'; ?>