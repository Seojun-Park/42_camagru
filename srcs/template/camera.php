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
<script>
    window.onload = async () => {
        var video = document.getElementById('monitor');
        const canvas = document.getElementById('photo');
        const shutter = document.getElementById('shutter');
        const stop = document.getElementById('stop');
        const on = document.getElementById('on');
        try {
            video.srcObject = await navigator.mediaDevices.getUserMedia({
                video: true
            });
            await new Promise((resolve) => video.onloadedmetadata = resolve);
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            document.getElementById('app').hidden = false;
            document.getElementsByClassName('preview').hidden = true;
            document.getElementById('photo').hidden = true;

            shutter.onclick = () => {
                canvas.getContext("2d").drawImage(video, 0, 0);
                html2canvas(document.querySelector("#photo")).then(canvas => {
                    document.querySelector(".preview").appendChild(canvas);
                });
                video.hidden = true;
                document.getElementById('photo').hidden = false;
            };

            on.onclick = () => {
                if (navigator.mediaDevices.getUserMedia) {
                    navigator.mediaDevices.getUserMedia({
                            video: true
                        })
                        .then(function(stream) {
                            video.srcObject = stream;
                        })
                }
            }
            stop.onclick = () => {
                const stream = video.srcObject;
                var tracks = stream.getTracks();
                for (var i = 0; i < tracks.length; i++) {
                    var track = tracks[i];
                    track.stop();
                }
                video.srcObject = null;
                navigator.mediaDevices.getUserMedia({
                        video: true
                    })
                    .then(function(stream) {
                        video.srcObject = stream;
                    })
                console.log("captured")
            }
        } catch (err) {
            console.error(err);
        }
    };
</script>

</head>

<body>
    <header>
        <div class="header_row first_col">
            <a href="/">logo</a>
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
                        <img id="pre_img" alt="preview" width="300" />
                        <input type="text" id="send_image" name="send" />
                    </div>
                </label>
                <div class="submit_btns">
                    <input type="button" id="submit_btn" value="CAPTURE" onclick=fix_image(); />
                    <input type="submit" id="submit_btn" value="UPLOAD" name="submit" />
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
        <!-- <div class="main_sec">
            <section id="app" hidden>
                <div class="camera_view">
                    <section id="app" class="preview">
                        <video id="monitor" autoplay></video>
                        <input type="text" id="send_image" name="send" />
                        <canvas id="photo"></canvas>
                    </section>
                    <div class="button_sec">
                        <button id="on">Camera On</button>
                        <button id='shutter'>Capture</button>
                        <button id="stop">Camera Off</button>
                    </div>
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
            </section>
        </div> -->
    </div>
</body>
<footer>
    Copyright &copy; Jin 2020 - All Rights Reserved
</footer>
<script>
    var pre_img = document.getElementById('photo');
    var canvas = document.createElement("canvas");
    canvas.width = 500;
    canvas.height = 500;
    var context = canvas.getContext("2d");
    context.globalCompositeOperation = "source-over";

    const chosen_sticker = (index) => {
        const img = document.getElementsByClassName('li_img')[index];
        const uri = img.getAttribute('src');
        var tmpImage = new Image();
        tmpImage.src = uri;
        tmpImage.onload = function() {
            context.drawImage(this, 280, 280, 250, 250);
            var dataURI = canvas.toDataURL("image/jpeg");
            document.querySelector("#photo").src = dataURI;
        }
    }

    const fix_image = () => {
        const img = document.querySelector("#photo").getAttribute('src');
        const input = document.getElementById('send_image');
        var tmpImage = new Image();
        tmpImage.src = img;
    }
</script>

</html>