<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Bookcase database demostation</title>
    </head>
    <body>
    <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin-left: 20px; margin-top: 30px">Dropdown button
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
              <li><a href="Bookcase.php">SELECT FULLNAME FROM CUSTOMER ORDER BY FULLNAME;</a></li>
              <li><a href="Bookcase2.php">SELECT Title FROM BOOK ORDER BY Title;</a></li>
              <li><a href="Bookcase3.php">SELECT COUNT(Title), Genre FROM BOOK GROUP BY Genre;</a></li>
              <li><a href="Bookcase4.php">SELECT bookstore.BOOKSTORE_ADDRESS, publisher_order.ID FROM bookstore JOIN publisher_order ON bookstore.BOOKSTORE_ZIP_CODE=publisher_order.BOOKSTORE_ZIP_CODE;</a></li>
              <li><a href="Bookcase5.php">SELECT customer_order.CUSTOMER_ID, book.title FROM customer_order LEFT JOIN book ON book.ISBN=customer_order.ISBN;</a></li>
              </ul>
            </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">BOOKSTORE_ADDRESS</th>
                <th scope="col">ID</th>
              </tr>
            </thead>
            <tbody>
              <?php include 'Bookcasesql.php';
                $query = "SELECT bookstore.BOOKSTORE_ADDRESS, publisher_order.ID FROM bookstore JOIN publisher_order ON bookstore.BOOKSTORE_ZIP_CODE=publisher_order.BOOKSTORE_ZIP_CODE";
                $x = 1;
                if($result = $mysqli->query($query)){
                  while($row = $result -> fetch_assoc()){
                    echo '<tr>';
                    echo '<th scope="row">'. $x .'</th>';
                    echo '<td>'.$row["bookstore.BOOKSTORE_ADDRESS"].'</td>';
                    echo '<td>'.$row["publisher_order.ID"].'</td> </tr>';
                    $x = $x + 1;
                  }
                  $result->free();
                }
              ?> 
            </tbody>
          </table>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>