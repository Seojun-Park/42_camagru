<?php
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <title>Camagru</title>
    <script>
        window.onload = async () => {
            const video = document.getElementById('monitor');
            const canvas = document.getElementById('photo');
            const shutter = document.getElementById('shutter');

            try {
                video.srcObject = await navigator.mediaDevices.getUserMedia({
                    video: true
                });

                await new Promise((resolve) => video.onloadedmetadata = resolve);
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                document.getElementById('app').hidden = false;

                shutter.onclick = () => canvas.getContext('2d').drawImage(video, 0, 0);
            } catch (err) {
                console.error(err);
            }
        };
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="main_sec">
            <section id="app" hidden>
                <div class="camera_view">
                    <video id="monitor" autoplay></video>
                    <button id="shutter">&#x1F4F7;</button>
                </div>
            </section>
        </div>
        <div class="side_sec">
            <section id="app" hidden>
                <canvas id="photo"></canvas>
            </section>
        </div>
    </div>
</body>

</html>