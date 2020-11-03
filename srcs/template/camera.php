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
            <section id="app" hidden>
                <div class="camera_view">
                    <video id="monitor" autoplay></video>
                    <section id="app" class="preview">
                        <canvas id="photo"></canvas>
                    </section>
                    <div class="button_sec">
                        <button id="on">Camera On</button>
                        <button id='shutter'>Capture</button>
                        <button id="stop">Camera Off</button>
                    </div>
                </div>
                <div class="sticker_sec">
                    <div>Choose your Sticker :D</div>
                    <ul class="sticker_list">
                        <?php foreach ($files as $f) {
                            echo "<li class='li_img'>";
                            echo "<img id='sticker_img' src='" . $f . "' alt='sticker' />";
                            echo "</li>";
                        }
                        ?>
                    </ul>
                </div>
            </section>
        </div>
    </div>
</body>
<footer>
    Copyright &copy; Jin 2020 - All Rights Reserved
</footer>

</html>