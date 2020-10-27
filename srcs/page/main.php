<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/hooks/func_view.php";
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/css/reset.css" />
    <link rel="stylesheet" href="/css/main.css" />
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

        function start(e) {
            var video = document.querySelector("#videoElement");
            if (navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({
                        video: true
                    })
                    .then(function(stream) {
                        video.srcObject = stream;
                    })
                    .catch(function(error) {
                        console.log("Something went wrong!");
                    });
            }
        }
    </script>
</head>

<body>
    <?php
    if (isset($_SESSION['userid'])) {
        $mesql = mq("select * from member where id='" . $_SESSION['userid'] . "'");
        $me = $mesql->fetch_array();
        ?>
        <div class='header'>
            <?php echo view('header.php'); ?>
        </div>
        <div>
            <div class="wrapper">
                <div class="main_sec">
                    <div class="camera_view">
                        <video autoplay="true" id="videoElement"></video>
                    </div>
                    <div class="button_sec">
                        <div class="camera_button">
                            take
                        </div>
                        <div class="camera_button">
                            <button onclick="start();">start</button>
                        </div>
                        <div class="camera_button">
                            <button onclick="stop();">stop</button>
                        </div>
                    </div>
                </div>
                <div class="side_sec">
                    second col
                </div>
            </div>
        </div>
        <div class="header">
            <?php echo view('footer.html') ?>
        </div>
    <?php
    } else {
        echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    }
    ?>
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
            .catch(function(error) {
                console.log("Something went wrong!");
            });
    }
</script>

</html>