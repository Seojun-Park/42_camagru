<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";


    $bno = $_GET['idx'];
    
    if($bno && $_GET['userid'] && $_POST['content']){
        $user = mq("select username from member where id='" .$_GET['userid']. "'");
        $username = $user->fetch_array();
        $sql = mq("insert into reply(feed_num,name,content) values('".$bno."','".$username['username']."','".$_POST['content']."')");
        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='../main.php';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
