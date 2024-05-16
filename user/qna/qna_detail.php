<?php
$title = 'Q&A';
$cssRoute1 = '<link rel="stylesheet" href="/helloworld/user/css/Q&A_detail.css">';
$cssRoute2 = '<link rel="stylesheet" href="/helloworld/user/css/Q&A.css">';
$script1 = '';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';

// 질문 ID 받아오기
$qna_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 조회수 증가
if ($qna_id > 0) {
    $sql = "UPDATE qna SET view = view + 1 WHERE idx = $qna_id";
    $result = $mysqli->query($sql);
}

// 현재 로그인한 회원의 정보 가져오기
if (isset($_SESSION['UID'])) {
    $userid = $_SESSION['UID'];
    $sql = "SELECT username FROM members WHERE userid = '$userid'";
    $result = $mysqli->query($sql);
    $member = $result->fetch_assoc();
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
                        <td>
                            <button type="button" class="btn <?= ($row['reply'] == '답변') ? 'btn-success' : 'btn-secondary'; ?>">
                                <?= $row['reply']; ?>
                            </button>
                        </td>
                        <td><?= $row['date']; ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="qna-detail-box jcsb d-flex">
                <div class="qna-content h5">
                    <p><?= $row['content']; ?></p>
                </div>
                <!-- <div class="thumbnail">
                    <img src="<?= $rs->thumbnail; ?>" alt="">
                </div> -->
            </div>
            <hr>
            <div class="reply_content d-flex aic jcsb">
                <div class="d-flex align-items-center">
                    <h5 class="bold me-2">답변</h5>
                    <h5>[<?php echo $comment_result->num_rows; ?>]</h5>
                </div>
                <button type="button" class="btn btn-success p" id="commentToggle">댓글쓰기</button>
            </div>
            <hr>
            <div class="reply_comments">
                <div class="comment-form" style="display: none;">
                    <form action="qna_save_insert.php" method="POST">
                        <input type="hidden" name="idx" value="<?= $qna_id ?>">
                        <div class="mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person-circle me-2 h4"></i>
                                <h5 class="mb-0"><?= isset($member['username']) ? $member['username'] : ''; ?></h5>
                            </div>
                            <textarea class="form-control mt-2" name="comment" rows="3" placeholder="댓글을 입력하세요" required></textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">등록</button>
                        </div>
                    </form>
                </div>
                <div class="comment-list mt-4">
                    <?php while ($comment = $comment_result->fetch_assoc()) : ?>
                        <div class="comment-item">
                            <div class="d-flex">
                                <div class="comment-avatar me-3">
                                    <i class="bi bi-person-circle h4"></i>
                                </div>
                                <div class="comment-body flex-grow-1">
                                    <div class="comment-header mb-1">
                                        <span class="comment-author p fw-bold"><?= $comment['name']; ?></span>
                                        <span class="comment-date text-muted ms-2"><?= $comment['regdate']; ?></span>
                                        <a href="qna_reply_delete.php?id=<?= $qna_id; ?>&comment_id=<?= $comment['id']; ?>" class="delete-link ms-3" onclick="confirmDelete(event)">
                                            <span class="material-symbols-outlined">delete</span>
                                        </a>
                                    </div>
                                    <div class="comment-content">
                                        <p class="mb-0"><?= $comment['comment']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <div class="d-flex justify-content-end mb-5">
        <button type="button" class="btn btn-success bd me-5"><a href="/helloworld/user/qna/qna.php">목록</a></button>
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

    // 댓글 삭제 알림창
    function confirmDelete(event) {
        event.preventDefault(); // 기본 동작 취소

        var confirmation = confirm("정말 삭제하시겠습니까?");
        if (confirmation) {
            // 확인 버튼을 클릭한 경우
            var deleteLink = event.target.closest('.delete-link');
            window.location.href = deleteLink.href;
        }
    }
</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>