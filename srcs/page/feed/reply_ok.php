<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";


    $bno = $_GET['idx'];
    
    if($bno && $_POST['dat_user'] && $_POST['content']){
        $sql = mq("insert into reply(feed_num,name,content) values('".$bno."','".$_POST['dat_user']."','".$_POST['content']."')");
        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='/page/board/read.php?idx=$bno';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
	
?>