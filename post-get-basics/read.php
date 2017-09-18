<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM authors where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/mine.css">
</head>
 
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                            <div class="card">
                                <img class="card-img-top" src="http://success-at-work.com/wp-content/uploads/2015/04/free-stock-photos.gif">
                                <div class="card-block">
                                    <h4 class="card-title"><?php echo $data['name']; ?></h4>
                                    <div class="meta">
                                        <a href="#">Gender : <?php echo $data['gender']; ?></a>

                                    </div>
                                    <div class="card-text">
                                        <?php echo $data['biography']; ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <span class="float-right">Joined in 2013</span>

                                    <div class="form-actions">
                                            <a class="btn btn-success" href="index.php">Back</a>
                                    </div>
                                </div>
                            </div>
            </div> 
        </div> 
    </div><!-- /container -->
    <script src="js/jquery.min.js"></script>   
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

