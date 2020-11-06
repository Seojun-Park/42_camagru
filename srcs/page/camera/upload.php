<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/hooks/func_view.php";

$sql = mq("select * from member where id ='" . $_SESSION['userid'] . "'");
$user = $sql->fetch_array();

$dir = "../../asset/stickers";
$handle = opendir($dir);
$files = array();
while (($filename = readdir($handle)) !== false) {
    if ($filename == "." || $filename == "..") {
        continue;
    }
    if (is_file($dir . "/" . $filename)) {
        $files[] = $dir . "/" . $filename;
    }
}

closedir($handle);
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
        <form enctype="multipart/form-data" method="post" class="form_view">
            <label for="up_image" id="pre_label">
                <input type="file" name="upimage" id="up_image" accept="image/*" /><br />
                <div id="preview">
                    <img id="pre_img" src="https://dummyimage.com/406x256/ffffff/000333&text=Click+here+to+upload+image" width="300" alt="preview" />
                    <input type="text" id="send_image" name="send" />
                </div>
            </label>
            <div class="submit_btns">
                <input type="button" id="submit_btn" value="FIX" onclick=fix_image(); />
                <input type="submit" id="submit_btn" name="submit" value="UPLOAD" formaction="upload_ok.php" />
            </div>
        </form>
        <div class="side">
            <div class="stick_title">Choose your Sticker :D</div>
            <a class="sticker_list">
                <?php
                $i = 0;
                foreach ($files as $f) {
                    echo "<button onclick='chosen_sticker(" . $i . ")' id='sticker_btn';>";
                    echo "<img class='li_img " . $i . "' id='getfile2' src='" . $f . "' alt='sticker'/>";
                    echo "</button>";
                    $i++;
                }
                ?>
            </a>
        </div>
    </div>
    <div class="header">
        <?php echo view('../footer.html'); ?>
    </div>
</body>
<script>
    var canvas = document.createElement("canvas");
    canvas.width = 500;
    canvas.height = 500;
    var context = canvas.getContext("2d");
    context.globalCompositeOperation = "source-over";

    var file = document.querySelector("#up_image");
    var file2 = document.querySelector("#getfile2");


    file.onchange = function() {
        var fileList = file.files;

        var reader = new FileReader();
        reader.readAsDataURL(fileList[0]);

        reader.onload = function() {
            var tempImage = new Image();
            tempImage.src = reader.result;
            tempImage.onload = function() {
                context.drawImage(this, 0, 0, 500, 500);
                var dataURI = canvas.toDataURL("image/jpeg");
                document.querySelector("#pre_img").src = dataURI;
            };
        };
    };

    const fix_image = () => {
        const img = document.querySelector("#pre_img").getAttribute('src');
        const input = document.getElementById('send_image');
        var tmpImage = new Image();
        tmpImage.src = img;
        tmpImage.onload = function() {
            context.drawImage(this, 0, 0, 500, 500);
            var dataURI = canvas.toDataURL("image/jpeg");
            document.querySelector("#send_image").value = dataURI;

        }
    }

    const chosen_sticker = (index) => {
        const img = document.getElementsByClassName('li_img')[index];
        const uri = img.getAttribute('src')
        var tmpImage = new Image();
        tmpImage.src = uri;
        tmpImage.onload = function() {
            context.drawImage(this, 80, 180, 150, 150);
            var dataURI = canvas.toDataURL("image/jpeg");
            document.querySelector("#pre_img").src = dataURI;
        };
    };
</script>

</html>