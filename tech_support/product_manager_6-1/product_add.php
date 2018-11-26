<?php include "../view/header.php" ?>


    <!DOCTYPE>
    <html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" media="screen" href="../main.css"/>
        <h1>Add Product</h1>
    </head>
    <body>
    <form action="itemAdder.php" method="post">
        Name: <input type="text" name="name"><br>
        Product Code: <input type="text" name="productCode"><br>
        Version: <input type="text" name="version"><br>
        Release Date: <input type="text" name="releaseDate"> yyyy--mm-dd<br>
        <input type="submit" name="Add Product" value="Add Product">
    </form>
    <p><a href="http://localhost/SportsProTechSupport-master/tech_support/product_manager_6-1/">View Products</a></p>
    </body>

    </html>



<?php include "../view/footer.php"?>