<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php"; /* db load */
?>
<!doctype html>

<head>
	<meta charset="UTF-8">
	<title>게시판</title>
	<link rel="stylesheet" type="text/css" href="../../styles/test.css" />
</head>

<body>
	<?php
	$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
	$hit = mysqli_fetch_array(mq("select * from board where idx ='" . $bno . "'"));
	$fet = mq("update board set hit = '" . $hit . "' where idx = '" . $bno . "'");
	$sql = mq("select * from board where idx='" . $bno . "'"); /* 받아온 idx값을 선택 */
	$board = $sql->fetch_array();
	?>
	<!-- 글 불러오기 -->
	<div id="board_read">
		<h2><?php echo $board['title']; ?></h2>
		<div id="user_info">
			<?php echo $board['name']; ?> <?php echo $board['date']; ?>
			<div id="bo_line"></div>
		</div>
		<div>
			파일 : <a href="../../upload/<?php echo $board['file']; ?>" download><?php echo $board['file']; ?></a>
		</div>
		<div id="bo_content">
			<?php echo nl2br("$board[content]"); ?>
		</div>
		<!-- 목록, 수정, 삭제 -->
		<div id="bo_ser">
			<ul>
				<li><a href="/">[목록으로]</a></li>
				<li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
				<li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
			</ul>
		</div>
		<div class="reply_view">
			<h3>댓글목록</h3>
			<?php
			$sql3 = mq("select * from reply where con_num='" . $bno . "' order by idx desc");
			while ($reply = $sql3->fetch_array()) {
				?>
				<div class="dap_lo">
					<div><b><?php echo $reply['name']; ?></b></div>
					<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
					<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
					<div class="rep_me rep_menu">
						<a class="dat_edit_bt" href="#">수정</a>
						<a class="dat_delete_bt" href="#">삭제</a>
					</div>
					<!-- 댓글 수정 폼 dialog -->
					<div class="dat_edit">
						<form method="post" action="rep_modify_ok.php">
							<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
							<textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
							<input type="submit" value="수정하기" class="re_mo_bt">
						</form>
					</div>
				</div>
			<?php } ?>

			<!--- 댓글 입력 폼 -->
			<div class="dap_ins">
				<form action="reply_ok.php?idx=<?php echo $bno; ?>" method="post">
					<input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디">
					<div style="margin-top:10px; ">
						<textarea name="content" class="reply_content" id="re_content"></textarea>
						<button id="rep_bt" class="re_bt">댓글</button>
					</div>
				</form>
			</div>
		</div>
		<!--- 댓글 불러오기 끝 -->
		<div id="foot_box"></div>
	</div>
</body>

</html>