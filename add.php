<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>

    <link rel="stlylesheet" href="bootstrap/bootstrap.css">
</head>
<body>
<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'datadata.mysql.database.azure.com', 'datadata@datadata', 'PuiFai2023', 'ITFLab', 3306);
if (isset($errorMsg)) {
?>
    <div class="alert alert-sucess">
        <strong>Wrong! <?php echo $errorMsg; ?> </strong>
    </div>
<?php 
}
$res = mysqli_query($conn, 'SELECT * FROM guestbook');
?>
<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'datadata.mysql.database.azure.com', 'datadata@datadata', 'PuiFai2023', 'ITFLab', 3306);
if (isset($insertMsg)) {
?>
    <div class="alert alert-sucess">
        <strong>Sucess! <?php echo $insertMsg; ?> </strong>
    </div>
<?php 
}
$res = mysqli_query($conn, 'SELECT * FROM guestbook');
?>
<form method="post" class="form-horizontal">
    <div class+'form-group'>
        <label for="Name" class='col-sm-3 control-label'>Name</label>
        <div class='col-sm-6'>
            <input type='text' name='txt_name' class='form-control' placeholder='Enter Name'></input>
        </div>
    </div>
    <div class+'form-group'>
        <label for="Comment" class='col-sm-3 control-label'>Comment</label>
        <div class='col-sm-6'>
            <input type='text' name='txt_comment' class='form-control' placeholder='Enter Comment'></input>
        </div>
    </div>
    <div class+'form-group'>
        <div class='col-sm-offset-3 col-sm-9 mt-5'>
            <input type='Submit' name='btn_insert' class='btn btn-success' value='Insert'></input>
            <a href='show.php' class='btn btn-danger'>Cancel</a>
        </div>
    </div>
</form>

    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>