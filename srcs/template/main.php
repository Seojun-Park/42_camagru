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

                shutter.onclick = () => canvas.getContext('2d').drawImage(video, 0, 0);
                on.onclick = () => {
                    if (navigator.mediaDevices.getUserMedia){
                        navigator.mediaDevices.getUserMedia({
                            video: true
                        })
                        .then(function(stream){
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