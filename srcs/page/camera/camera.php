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
<link rel="stylesheet" href="../../css/reset.css" />
<link rel="stylesheet" href="../../css/camera.css" />
<title>Camagru</title>
<script src="../../js/html2canvas.js"></script>
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
        <?php echo view('../header.php'); ?>
    </div>
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
                    <input type="button" id="submit_btn" class="re" value="RETRY" />
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
    <div class="header">
        <?php echo view('../footer.html') ?>
    </div>
</body>
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