<?php
     
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $genderError = null;
        $biographyError = null;
         
        // keep track post values
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $biography = $_POST['biography'];

        //print_r($_POST);

         
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($gender)) {
            $genderError = 'Please enter Gender ';
            $valid = false;
        }
         
        if (empty($biography)) {
            $biographyError = 'Please enter your biography';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                        
            $sql = "UPDATE authors set name = ?, gender = ?, biography = ? where id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$gender,$biography,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM authors where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $name = $data['name'];
        $gender = $data['gender'];
        $biography = $data['biography'];
        Database::disconnect();


    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <link   href="css/mine.css" rel="stylesheet">
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Update an Author</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  rows="10" cols="30" placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($genderError)?'error':'';?>">
                        <label class="control-label">Gender</label>
                        <div class="controls">
                            <select name="gender" class="custom-select">
                              <option value="<?php echo !empty($gender)?$gender:'';?>" selected><?php echo !empty($gender)?$gender:'';?></option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>                            
                            <?php if (!empty($genderError)): ?>
                                <span class="help-inline"><?php echo $genderError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($biographyError)?'error':'';?>">
                        <label class="control-label">Biography</label>
                        <div class="controls">
                            <textarea name="biography" placeholder="Enter biography?" rows="10" cols="40"><?php echo !empty($biography)?$biography:'';?></textarea>
                            <?php if (!empty($biographyError)): ?>
                                <span class="help-inline"><?php echo $biographyError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
    <script src="js/jquery.min.js"></script>    
    <script src="js/bootstrap.min.js"></script>    
  </body>
</html>