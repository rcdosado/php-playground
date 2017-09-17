<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>List of Book Authors</h3>
            </div>
            <div class="row">
            	<p>
            		<a href="create.php" class="btn btn-success">Create</a>
            	</p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Biography</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM authors ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['id'] . '</td>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['gender'] . '</td>';
                            echo '<td>'. $row['biography'] . '</td>';                           
                            echo '<td width="250"><a class="btn btn-primary" href="read.php?id='.$row['id'].'">Read</a>';
                            //echo ' ';
                            echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Edit</a>';
                            //echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
    <script src="js/jquery.min.js"></script>    
    <script src="js/bootstrap.min.js"></script>     

  </body>
</html>
