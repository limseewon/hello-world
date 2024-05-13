<?php
$title = 'Q&A';
$cssRoute1 = '<link rel="stylesheet" href="/helloworld/user/css/notice_detail.css">';
$cssRoute2 = '<link rel="stylesheet" href="/helloworld/user/css/notice.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';

// 질문 ID 받아오기
$qna_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 조회수 증가
if ($qna_id > 0) {
    $sql = "UPDATE qna SET view = view + 1 WHERE idx = $qna_id";
    $result = $mysqli->query($sql);
}

// 질문 데이터 가져오기
if ($qna_id > 0) {
    $sql = "SELECT * FROM qna WHERE idx = '$qna_id'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
}

// 댓글 목록 가져오기
if ($qna_id > 0) {
    $sql = "SELECT * FROM qna_comment WHERE idx = '$qna_id' ORDER BY id DESC";
    $comment_result = $mysqli->query($sql);
}
?>

<div class="container">
    <h2 class="h2_t nt">Q&amp;A</h2>
    <section>
        <div class="content-box nb">
            <table class="table tc">
                <thead>
                    <tr>
                        <th scope="col">강의명</th>
                        <th scope="col">제목</th>
                        <th scope="col">작성자</th>
                        <th scope="col">조회수</th>
                        <th scope="col">답변 여부</th>
                        <th scope="col">작성일</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?= $row['lecture_name']; ?></th>
                        <td><?= $row['title']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['view']; ?></td>
                        <td><button type="button" class="btn btn-success"><?= $row['reply']; ?></button></td>
                        <td><?= $row['date']; ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="notice-detail-box jcsb d-flex">
                <div class="notice-content h5">
                    <p><?= $row['content']; ?></p>
                </div>
            </div>
            <hr>
            <div class="reply_content d-flex aic jcsb">
                <h5>답변</h5>
                <button type="button" class="btn btn-success p" id="commentToggle">댓글쓰기</button>
            </div>
            <hr>
            <div class="reply_comments">
                <div class="comment-form" style="display: none;">
                    <form action="qna_save_insert.php" method="POST">
                        <input type="hidden" name="idx" value="<?= $qna_id ?>">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-person-circle me-2 h5"></i>
                            <div class="flex-grow-1">
                                <textarea class="form-control" name="comment" rows="3" placeholder="댓글을 입력하세요"></textarea>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">등록</button>
                        </div>
                    </form>
                </div>
                <div class="comment-list">
                    <?php while ($comment = $comment_result->fetch_assoc()) : ?>
                        <div class="comment-item">
                            <div class="d-flex align-items-start mb-3">
                                <i class="bi bi-person-circle me-2 h5"></i>
                                <div class="flex-grow-1">
                                    <div class="comment-header">
                                        <span class="comment-author"><?= $comment['name']; ?></span>
                                        <span class="comment-date"><?= $comment['regdate']; ?></span>
                                    </div>
                                    <div class="comment-body">
                                        <p><?= $comment['comment']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <div>
        <button type="button" class="btn btn-success bd"><a href="/helloworld/user/qna/qna.php">목록</a></button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var commentToggle = document.getElementById('commentToggle');
        var commentForm = document.querySelector('.comment-form');

        commentToggle.addEventListener('click', function() {
            if (commentForm.style.display === 'none') {
                commentForm.style.display = 'block';
            } else {
                commentForm.style.display = 'none';
            }
        });
    });

    // 페이지 로드 시 댓글 개수에 따라 reply 값 업데이트
    var qnaId = <?= $qna_id ?>;
    if (qnaId > 0) {
        var commentCount = $('.comment-item').length;
        var replyStatus = commentCount > 0 ? '답변' : '미답변';
        $.get('update_reply.php?idx=' + qnaId + '&reply=' + replyStatus);
    }
</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>