<?php
     
    require 'database.php';
 
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
            $sql = "INSERT INTO authors (name,gender,biography) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$gender,$biography));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create an Author</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($genderError)?'error':'';?>">
                        <label class="control-label">Gender</label>
                        <div class="controls">
                            <select name="gender" class="custom-select">
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
                            <textarea name="biography" placeholder="Enter biography?" value="<?php echo !empty($biography)?$biography:'';?>" rows="10" cols="20"></textarea>
                            <?php if (!empty($biographyError)): ?>
                                <span class="help-inline"><?php echo $biographyError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>