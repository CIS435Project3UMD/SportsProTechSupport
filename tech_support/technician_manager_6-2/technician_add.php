<?php include "../view/header.php" ?>


    <!DOCTYPE>
    <html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" media="screen" href="../main.css"/>
        <h1>Technician List</h1>
    </head>
    <body>
    <form action="add_tech.php" method="post">
        Tech ID: <input type="text" name="techID"><br>
        First Name: <input type="text" name="firstName"><br>
        Last name: <input type="text" name="lastName"><br>
        Email: <input type="text" name="email"><br>
        Phone: <input type="text" name="phone"><br>
        Password: <input type="text" name="password"><br>
        <input type="submit" name="Add technician" value="Add technician">
    </form>
    <p><a href="http://localhost/SportsProTechSupport-master/tech_support/technician_manager_6-2/">View Technicians List</a></p>
    </body>

    </html>



<?php include "../view/footer.php"?>