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
    // $sql = mq("select * from member where id='{$_SESSION['userid']}'");
    // $member = $sql->fetch_array();
    // $sql = mq("select * from board order by idx");
    // $list = 5;
    if (isset($_SESSION['userid'])) { ?>
        <div class='header'>
            <?php echo view('header.php'); ?>
        </div>
        <div class='feed_body'>
            <div class='write_feed'>
                <form action="feed/write_ok.php" method="post">
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="What!?" required></textarea>
                    </div>
                    <div class="bottom_row">
                        <div class="file_box">
                            <input class="upload_name" value="Upload your photo" disabled="disabled" />
                            <label for="b_file">
                                <span>upload</span>
                            </label>
                            <input type="file" id="b_file" class="file_hidden" />
                        </div>
                        <div class="bt_se">
                            <button type="submit">write</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <?php
                        // if (isset($_GET['page'])) {
                        //     $page = $_GET['page'];
                        // } else {
                        //     $page = 1;
                        // }
                        // $sql = mq("select * from feed");
                        // $row_num = mysqli_num_rows($sql); //게시판 총 레코드 수
                        // $list = 5; //한 페이지에 보여줄 개수
                        // $block_ct = 5; //블록당 보여줄 페이지 개수

                        // $block_num = ceil($page / $block_ct); // 현재 페이지 블록 구하기
                        // $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
                        // $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

                        // $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
                        // if ($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
                        // $total_block = ceil($total_page / $block_ct); //블럭 총 개수
                        // $start_num = ($page - 1) * $list; //시작번호 (page-1)에서 $list를 곱한다.
                        // // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
                        ?>-->
            <ul class="timeline">
                <?php
                    $sql = mq("select * from feed order by idx desc limit 0,10");
                    while ($feed = $sql->fetch_array()) {
                        $sql2 = mq("select * from reply where feed_num='" . $feed['idx'] . "'");
                        $usersql = mq("select * from member where username='" . $feed['name'] . "'");
                        $userdata = $usersql->fetch_array();
                        $rep_count = mysqli_num_rows($sql2);
                        ?>
                    <li>
                        <div class='feed_box'>
                            <div class="feed_box">
                                <div class="feed_box_head">
                                    <?php echo $userdata['username']; ?>
                                </div>
                                <div class="feed_box_body">photo</div>
                                <div class="feed_box_bot">
                                    <div class="feed_content">
                                        <span class="u_name">
                                            <?php echo $userdata['username'] . " " ?>
                                        </span>
                                        <span class="f_cont">
                                            <?php echo $feed['content']; ?>
                                        </span>
                                    </div>
                                    <?php
                                            $sql3 = mq("select * from reply where feed_num='" . $feed['idx'] . "' order by idx desc");
                                            while ($reply = $sql3->fetch_array()) { ?>
                                        <div class="dap_lo">
                                            <div>
                                                <b><?php echo $reply['name']; ?></b>
                                                <div class="re_cont">
                                                    <?php if (strlen($reply['content']) > 25) {
                                                                    $cont = str_replace($reply['content'], mb_substr($reply['content'], 0, 25, "utf-8") . "...", $reply['content']);
                                                                    echo $cont;
                                                                } else
                                                                    echo $reply['content'];
                                                                ?>
                                                </div>
                                                <?php echo $reply['date'] ?>
                                                <a class="dat_delete_bt" href="#">delete</a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="dap_ins">
                                        <form action="feed/reply_ok.php?idx=<?php echo $feed['idx'] ?>&userid=<?php echo $_SESSION['userid'] ?>" method="post">
                                            <div style="margin-top:15px; ">
                                                <input type="text" name="content" class="reply_content" id="re_content" placeholder="reply here " />
                                                <button id="rep_bt" class="re_bt">reply</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
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