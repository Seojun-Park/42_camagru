<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/hooks/func_view.php";
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/css/reset.css" />
    <link rel="stylesheet" href="/css/feed.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Camagru</title>
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
        <div >
            body
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
    var fileTarget = $(".file_box .file_hidden");

    fileTarget.on("change", function() {
        if (window.FileReader) {
            // 파일명 추출
            var filename = $(this)[0].files[0].name;
        } else {
            // Old IE 파일명 추출
            var filename = $(this)
                .val()
                .split("/")
                .pop()
                .split("\\")
                .pop();
        }

        $(this)
            .siblings(".upload_name")
            .val(filename);
    });
    /* 파일명 가져오기 end */

    /* 파일 이미지 가져오기 start */
    var imgTarget = $(".file_box .file_hidden");

    imgTarget.on("change", function() {
        var parent = $(this).parent();
        parent.children(".upload-display").remove();

        if (window.FileReader) {
            //image 파일인지 검사
            if (!$(this)[0].files[0].type.match(/image\//)) return;

            var reader = new FileReader();
            reader.onload = function(e) {
                var src = e.target.result;
                console.log(e);
                console.log(e.target);
                parent.prepend(
                    '<div class="upload-display"><img src="' +
                    src +
                    '" class="upload-thumb"></div>'
                );
            };
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            $(this)[0].select();
            $(this)[0].blur();
            var imgSrc = document.selection.createRange().text;
            parent.prepend(
                '<div class="upload-display"><img class="upload-thumb"></div>'
            );

            var img = $(this)
                .siblings(".upload-display")
                .find("img");
            img[0].style.filter =
                "progid:DXImageTransform.Microsoft.AlphaImageLoader(enable='true',sizingMethod='scale',src=\"" +
                imgSrc +
                '")';
        }
    });
</script>

</html>