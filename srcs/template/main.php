<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <title>Camagru</title>
    <script>
        function stop(e) {
            var stream = video.srcObject;
            var tracks = stream.getTracks();

            for (var i = 0; i < tracks.length; i++) {
                var track = tracks[i];
                track.stop();
            }

            video.srcObject = null;
        }
    </script>

</head>

<body>
    <div class="wrapper">
        <div class="main_sec">
            <div>
                <video autoplay="true" id="videoElement"></video>
            </div>
            <div class="button_sec">
                <div class="camera_button">
                    take
                </div>
                <div class="camera_button">
                    stop
                </div>
            </div>
        </div>
        <div class="side_sec">
            second col
        </div>
    </div>
</body>
<script>
    var video = document.querySelector("#videoElement");
    if (navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(function(stream) {
                video.srcObject = stream;
            })
            .catch(function(err0r) {
                console.log("Something went wrong!");
            });
    }
</script>

</html>