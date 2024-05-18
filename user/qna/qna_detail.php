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
    // qna 테이블에서 질문 데이터 가져오기
    $sql = "SELECT * FROM qna WHERE idx = '$qna_id'";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // members 테이블에서 사용자 아이디 가져오기
        $sql = "SELECT userid FROM members WHERE username = '{$row['name']}'";
        $result = $mysqli->query($sql);

        if ($result && $result->num_rows > 0) {
            $member = $result->fetch_assoc();
            $row['userid'] = $member['userid'];
        } else {
            // members 테이블에서 사용자 아이디를 찾을 수 없는 경우 처리
            $row['userid'] = null;
        }
    } else {
        // qna 테이블에서 질문 데이터를 찾을 수 없는 경우 처리
        $row = null;
    }
}

// 수정 요청 처리
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $lecture_name = $_POST['lecture_name'];

    // 업데이트 쿼리 실행
    $sql = "UPDATE qna SET title = '$title', content = '$content', lecture_name = '$lecture_name' WHERE idx = $qna_id";
    $result = $mysqli->query($sql);

    if ($result) {
        echo "<script>alert('게시물이 수정되었습니다.'); location.href='/helloworld/user/qna/qna_detail.php?id=$qna_id';</script>";
        exit;
    } else {
        echo "<script>alert('수정에 실패했습니다. 다시 시도해주세요.'); history.back();</script>";
        exit;
    }
}

// 댓글 목록 가져오기
if ($qna_id > 0) {
    $sql = "SELECT * FROM qna_comment WHERE idx = '$qna_id' ORDER BY id DESC";
    $comment_result = $mysqli->query($sql);
}
?>

<?php
$title = 'Q&A';
$cssRoute1 = '<link rel="stylesheet" href="/helloworld/user/css/Q&A_detail.css">';
$cssRoute2 = '<link rel="stylesheet" href="/helloworld/user/css/Q&A.css">';
$script1 = '';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';

// ... (중간 생략) ...

?>

<div class="container">
    <h2 class="h2_t nt">Q&amp;A</h2>
    <section>
        <div class="content-box nb">
            <div id="qnaTable">
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
            </div>
            <?php if (isset($_SESSION['UID']) && $_SESSION['UID'] == $row['userid']) : ?>
                <div class="qna_btn d-flex">
                    <a href="#" class="btn btn-link btn_modify" onclick="showEditForm(); return false;">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="#" class="btn btn-link btn_delete" onclick="confirmDelete(<?= $qna_id; ?>, event)">
                        <i class="bi bi-trash"></i>
                    </a>
                </div>
            <?php endif; ?>
            <div id="qnaDetail">
                <div class="qna-detail-box jcsb d-flex h5">
                    <p><?= $row['content']; ?></p>
                    <?php if (!empty($row['files'])) : ?>
                        <img src="/helloworld/user/uploads/<?= $row['files']; ?>" alt="#" class="img_qna">
                    <?php endif; ?>
                </div>
            </div>
            <div id="qnaEditForm" style="display: none;">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="lecture_name" class="form-label">강의명</label>
                        <input type="text" name="lecture_name" id="lecture_name" class="form-control" value="<?= $row['lecture_name'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">제목</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?= $row['title'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">내용</label>
                        <textarea name="content" id="content" class="form-control" rows="5" required><?= strip_tags($row['content']); ?></textarea>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">수정</button>
                    <button type="button" class="btn btn-secondary" onclick="hideEditForm()">취소</button>
                </form>
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
                            <h5 class="mb-0 p">작성자</h5>
                        </div>
                        <textarea class="form-control mt-2" name="comment" rows="3" placeholder="댓글을 입력하세요" required></textarea>
                        </div>
                        <div class="text-end">
                        <button type="submit" class="btn btn-primary">등록</button>
                        </div>
                    </form>
                    <div class="mt-3">
                        <button type="button" class="btn btn-success" onclick="selectAnswer(<?= $qna_id ?>, this)">채택하기</button>
                    </div>
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
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-success btn-sm" onclick="selectAnswer(<?= $qna_id ?>, <?= $comment['id'] ?>)">채택하기</button>
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
    };
     // 삭제 확인 알림창을 위한 JavaScript 함수 추가
     function confirmDelete(qnaId, event) {
        event.preventDefault();
        var confirmation = confirm("정말 삭제하시겠습니까?");
        if (confirmation) {
            window.location.href = "qna_delete.php?id=" + qnaId;
        }
    }
    function showEditForm() {
        document.getElementById('qnaTable').style.display = 'none';
        document.getElementById('qnaDetail').style.display = 'none';
        document.getElementById('qnaEditForm').style.display = 'block';
    }

    function hideEditForm() {
        document.getElementById('qnaTable').style.display = 'table';
        document.getElementById('qnaDetail').style.display = 'block';
        document.getElementById('qnaEditForm').style.display = 'none';
    }
</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>