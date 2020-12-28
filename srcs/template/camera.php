<?php

$dir = "../asset/stickers";
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
<meta charset="utf-8" />
<link rel="stylesheet" href="../css/reset.css" />
<link rel="stylesheet" href="../css/camera.css" />
<link rel="stylesheet" href="../css/header.css" />
<script src="../js/html2canvas.js"></script>

</head>

<body>
    <header>
        <div class="header_row first_col">
            <a href="/"><img src="../asset/logo.png" alt="logo" width="50px" /></a>
        </div>
        <div class="header_row second_col">
            <span>Camagru</span>
        </div>
        <div class="header_row third_col">
            <div class="col_block">
                <div class="col_block">
                    <a href="/">
                        <button>GALLERY</button>
                    </a>
                </div>
                <a href="/">
                    <button>PROFILE</button>
                </a>
            </div>
            <div class="col_block">
                <a href="../member/logout.php">
                    <button>LOG OUT</button>
                </a>
            </div>
        </div>
        <div class="header_row">
            <div class="dropdown">
                <button>
                    <img src="../asset/burger_icon.svg" alt="burger" />
                </button>
                <div class="dropdown-content">
                    <form method="post">
                        <a href="/">PROFILE</a>
                        <a href="../member/logout.php">LOGOUT</a>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <div class="wrapper">
        <div class="main_sec">
            <form enctype="multipart/form-data" method="post" class="form_view">
                <label for="video_img" id="pre_lable">
                    <video id="monitor" autoplay></video>
                    <div id="preview">
                        <canvas id="pre_img" alt="preview" width="300"></canvas>
                        <input type="text" id="send_image" name="send" />
                    </div>
                </label>
                <div class="submit_btns">
                    <input type="button" id="submit_btn" class="shu" value="SHUTTER" onclick=cameraShutter(); />
                    <input type="button" id="submit_btn" class="fix" value="FIX" onclick=fix_image(); />
                    <input type="submit" id="submit_btn" value="UPLOAD" name="submit" formaction="camera_ok.php" />
                </div>
            </form>
        </div>
        <div class="sticker_sec">
            <div class="sitkcer_title">Choose your Sticker :D</div>
            <a class="sticker_list">
                <?php
                $i = 0;
                foreach ($files as $f) {
                    echo "<button onclick='chosen_sticker(" . $i . ")' id='sticker_btn'>";
                    echo "<img class='li_img " . $i . "'  src='" . $f . "' alt='sticker' />";
                    echo "</button>";
                    $i++;
                }
                ?>
            </a>
        </div>
    </div>
</body>
<footer>
    Copyright &copy; Jin 2020 - All Rights Reserved
</footer>
<script>
    window.onload = async () => {
        var video = document.getElementById('monitor');
        const canvas = document.getElementById('pre_img');
        const shutter = document.getElementsByClassName('shut');
        const fix = document.getElementsByClassName('fix');
        const retry = document.getElementsByClassName('re');

        try {
            video.srcObject = await navigator.mediaDevices.getUserMedia({
                video: true
            })
            await new Promise((resolve) => video.onloadedmetadata = resolve);
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            document.getElementById("pre_img").hidden = true;

        } catch (e) {
            console.log(e);
        }
    }

    const cameraShutter = () => {
        var video = document.getElementById('monitor');
        const canvas = document.getElementById('pre_img');
        const stream = video.srcObject;
        var tracks = stream.getTracks();

        canvas.getContext("2d").drawImage(video, 0, 0);
        html2canvas(document.querySelector("#pre_img")).then(canvas => {
            document.querySelector("#preview").appendChild(canvas);
        });
        video.hidden = true;
        document.getElementById("pre_img").hidden = false;
        for (var i = 0; i < tracks.length; i++) {
            var track = tracks[i];
            track.stop();
        }
        video.srcObject = null;
    }

    const fix_image = () => {
        const img = document.querySelector("#pre_img").getAttribute('src');
        const canvas = document.getElementById("pre_img");
        var tmpImage = new Image();
        var dataURI = canvas.toDataURL("image/jpeg");
        var context = canvas.getContext("2d");
        context.globalCompositeOperation = "source-over";
        tmpImage.src = dataURI;
        tmpImage.onload = function() {
            // context.drawImage(this, 0, 0, 500, 500);
            var dataURI = canvas.toDataURL("image/jpeg");
            document.querySelector("#send_image").value = dataURI;;
        }
        console.log(document.getElementById("send_image"))
    }

    const chosen_sticker = (index) => {
        const img = document.getElementsByClassName('li_img')[index];
        const canvas = document.getElementById("pre_img");
        const uri = img.getAttribute('src');
        var tmpImage = new Image();
        tmpImage.src = uri;
        var context = canvas.getContext("2d");
        context.globalCompositeOperation = "source-over";
        tmpImage.onload = function() {
            context.drawImage(this, 280, 280, 250, 250);
            var dataURI = canvas.toDataURL("image/jpeg");
            document.querySelector("#pre_img").src = dataURI;
        }
    }
</script>

</html>