<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/hooks/func_view.php";

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
<meta charset="utf-8" />
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/camera.css" />
<title>Camagru</title>
<script src="/js/html2canvas.js"></script>
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
            shutter.onclick = () => {
                canvas.getContext("2d").drawImage(video, 0, 0);
                html2canvas(document.querySelector("#photo")).then(canvas => {
                    document.querySelector(".side").appendChild(canvas);
                });
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
            }
        } catch (err) {
            console.error(err);
        }
    };
</script>
</head>

<body>
    <div class='header'>
        <?php echo view('header.php'); ?>
    </div>
    <div class="wrapper">
        <div class="main_sec">
            <section id="app" hidden>
                <div class="camera_view">
                    <video id="monitor" autoplay></video>
                    <div class="button_sec">
                        <button id="on">Camera On</button>
                        <button id="shutter">Capture</button>
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
        <div class="side_sec">
            <section id="app" class="side" hidden>
                <canvas id="photo"></canvas>
            </section>
        </div>
    </div>
    <div class="header">
        <?php echo view('footer.html') ?>
    </div>
</body>

</html>