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
		<?php
				try {
					$dsn = 'mysql:host=localhost;dbname=tech_support';
					$username = 'ts_user';
					$password = 'pa55word';
					$db = new PDO($dsn, $username, $password);
					echo "<p>You are connected to the database!</p>";
					
					$eml = $_POST['thisEml'];
					$query = 
					'SELECT 
						firstName, 
						lastName, 
						address, 
						city, 
						state, 
						postalCode, 
						countryCode, 
						phone, 
						email, 
						password
					FROM customers WHERE email = :eml';
					$statement = $db->prepare($query);
					$statement->bindValue(':eml', $eml);
					$statement->execute();
					$products = $statement->fetchAll();
				}
				catch (Exception $e) {
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
		?>
		<form id="aligned" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">

			<?php foreach ($products as $product): ?>

			<label for="firstNameUpdated">First Name: </label>
			<input type="text" name="firstNameUpdated" value="<?php echo $product['firstName'] ?>"><br>

			<label for="lastNameUpdated">Last Name: </label>
			<input type="text" name="lastNameUpdated" value="<?php echo $product['lastName'] ?>"><br>

			<label for="addressUpdated">Address: </label>
			<input type="text" name="addressUpdated" value="<?php echo $product['address'] ?>"><br>

			<label for="cityUpdated">City: </label>
			<input type="text" name="cityUpdated" value="<?php echo $product['city'] ?>"><br>

			<label for="stateUpdated">State: </label>
			<input type="text" name="stateUpdated" value="<?php echo $product['state'] ?>"><br>

			<label for="postalCodeUpdated">Postal Code: </label>
			<input type="text" name="postalCodeUpdated" value="<?php echo $product['postalCode'] ?>"><br>

			<label for="countryCodeUpdated">Country Code: </label>
			<input type="text" name="countryCodeUpdated" value="<?php echo $product['countryCode'] ?>"><br>

			<label for="phoneUpdated">Phone: </label>
			<input type="text" name="phoneUpdated" value="<?php echo $product['phone'] ?>"><br>

			<label for="emailUpdated">Email: </label>
			<input type="text" name="emailUpdated" value="<?php echo $product['email'] ?>"><br>

			<label for="passwordUpdated">Password: </label>
			<input type="text" name="passwordUpdated" value="<?php echo $product['password'] ?>"><br>

			<?php endforeach; ?>

			<input type="submit" value="Update Customer">

			<!-- <?php if (!empty($_POST)): ?>
				<?php 
					try {
						$dsn = 'mysql:host=localhost;dbname=tech_support';
						$username = 'ts_user';
						$password = 'pa55word';
						$db = new PDO($dsn, $username, $password);
						// echo "<p>You are connected to the database!</p>";

						$fn = $_POST['firstNameUpdated'];
						$ln = $_POST['lastNameUpdated'];
						$ad = $_POST['addressUpdated'];
						$cy = $_POST['cityUpdated'];
						$st = $_POST['stateUpdated'];
						$pc = $_POST['postalCodeUpdated'];
						$cc = $_POST['countryCodeUpdated'];
						$pn = $_POST['phoneUpdated'];
						$em = $_POST['emailUpdated'];
						$ps = $_POST['passwordUpdated'];

						$query = 'UPDATE customers SET 
						firstName = $fn,
						lastName = $ln,
						address = $ad,
						city = $cy,
						state = $st,
						postalCode = $pc,
						countryCode = $cc,
						phone = $pn,
						email = $em,
						password = $ps
						WHERE email = :eml';
					}
					catch (Exception $e) {
						echo 'Caught exception: ',  $e->getMessage(), "\n";
					}
				?>
			<?php endif; ?> -->
		</form>

		<a href="/index.php">Search Customers</a>
	</main>
</body>
</html>

<?php include '../view/footer.php'; ?>