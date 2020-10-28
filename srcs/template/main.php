<!-- @format -->

<?php
$dir = "../asset/stickers";
$handle = opendir($dir);
$files = array();
while (false !== (!$filename = readdir($handle))) {
    if ($filename == "." || $filename == "..") {
        continue;
    }
    if (is_file($dir . "/" . "filename")) {
        $files[] = $filename;
    }
}

foreach ($files as $f) {
    echo $f;
    echo "<br />";
}

// closedir($handle);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/header.css" />

    <title>Camagru</title>
    <script src="../js/html2canvas.js"></script>
    <script>
        window.onload = async () => {
            var video = document.getElementById("monitor");
            const canvas = document.getElementById("photo");
            const shutter = document.getElementById("shutter");
            const stop = document.getElementById("stop");
            const on = document.getElementById("on");
            const save = document.getElementById("save");

            try {
                video.srcObject = await navigator.mediaDevices.getUserMedia({
                    video: true
                });

                await new Promise(resolve => (video.onloadedmetadata = resolve));
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                document.getElementById("app").hidden = false;

                shutter.onclick = () => {
                    canvas.getContext("2d").drawImage(video, 0, 0);
                    html2canvas(document.querySelector("#photo")).then(canvas => {
                        document.querySelector(".side").appendChild(canvas);
                    });
                };

                on.onclick = () => {
                    if (navigator.mediaDevices.getUserMedia) {
                        navigator.mediaDevices
                            .getUserMedia({
                                video: true
                            })
                            .then(function(stream) {
                                video.srcObject = stream;
                            });
                    }
                };
                stop.onclick = () => {
                    const stream = video.srcObject;
                    var tracks = stream.getTracks();

                    for (var i = 0; i < tracks.length; i++) {
                        var track = tracks[i];
                        track.stop();
                    }
                    video.srcObject = null;
                };
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
                    <div class="button_sec">
                        <button id="on">Camera On</button>
                        <button id="shutter">Capture</button>
                        <button id="stop">Camera Off</button>
                    </div>
                </div>
                <div class="sticker_sec">
                    <?php foreach ($files as $f) {
                        echo "<span>" . $f . "</span>";
                        echo "<br />";
                    }
                    ?>
                </div>
            </section>
        </div>
        <div class="side_sec">
            <section id="app" class="side" hidden>
                <canvas id="photo"></canvas>
            </section>
        </div>
    </div>
</body>
<footer>
    Copyright &copy; Jin 2020 - All Rights Reserved
</footer>

</html>