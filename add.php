<?php 
    require_once('connection.php');

    if (isset($_REQUEST['btn_insert'])) {
        $name = $_REQUEST['txt_name'];
        $comment = $_REQUEST['txt_comment'];

        if (empty($firstname)) {
            $errorMsg = "Please enter Name";
        } else if (empty($lastname)) {
            $errorMsg = "please Enter comment";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO tbl_person(name, comment) VALUES (:name, :comment)");
                    $insert_stmt->bindParam(':name', $name);
                    $insert_stmt->bindParam(':comment', $comment);

                    if ($insert_stmt->execute()) {
                        $insertMsg = "Insert Successfully!!";
                        header("refresh:2;show.php");
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
<body>

    <div class="container">
    <div class="display-3 text-center">Add</div>

    <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>Wrong! <?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>
    

    <?php 
         if (isset($insertMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>Success! <?php echo $insertMsg; ?></strong>
        </div>
    <?php } ?>

    <form method="post" class="form-horizontal mt-5">
            
            <div class="form-group text-center">
                <div class="row">
                    <label for="name" class="col-sm-3 control-label">Fisrtname</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_name" class="form-control" placeholder="Enter name">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="name" class="col-sm-3 control-label">Comment</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_comment" class="form-control" placeholder="Enter comment">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_insert" class="btn btn-success" value="Add">
                    <a href="show.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>


    </form>

    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
