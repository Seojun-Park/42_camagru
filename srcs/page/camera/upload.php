<?php
include $_SERVER['DOCUMENT_ROOT'] . "/hooks/func_view.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Camagru_Upload</title>
    <link rel="stylesheet" href="/css/upload.css" />
</head>

<body>
    <div class="header">
        <?php echo view('../header.php'); ?>
    </div>
    <div class="wrapper">
        <form enctype="multipart/form-data" action="upload_ok.php" method="post">
            <label for="image">imagename:</label>
            <input type="file" name="upimage" id="up_image" /><br />
            <input type="submit" name="submit" value="Submit" />
        </form>
    </div>
    <div class="header">
        <?php echo view('../footer.html'); ?>
    </div>
</body>

</html>