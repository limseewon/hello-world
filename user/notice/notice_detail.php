<?php
$title = '공지사항';
$cssRoute1 ='<link rel="stylesheet" href="/helloworld/user/css/notice_detail.css">';
$cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/notice.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';
// 공지사항 ID 받아오기
$notice_id = $_GET['id'];

// 조회수 증가
$sql = "UPDATE notice SET view = view + 1 WHERE idx = $notice_id";
$result = $mysqli->query($sql);


// 공지사항 데이터 가져오기
$sql = "SELECT * FROM notice WHERE idx = $notice_id";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();

// 이전 공지사항 ID 가져오기
$sql_prev = "SELECT MAX(idx) AS prev_id FROM notice WHERE idx < $notice_id";
$result_prev = $mysqli->query($sql_prev);
$row_prev = $result_prev->fetch_assoc();
$prev_id = $row_prev['prev_id'];

// 다음 공지사항 ID 가져오기
$sql_next = "SELECT MIN(idx) AS next_id FROM notice WHERE idx > $notice_id";
$result_next = $mysqli->query($sql_next);
$row_next = $result_next->fetch_assoc();
$next_id = $row_next['next_id'];
?>
<div class="container">
    <h2 class="h2_t nt">공지사항</h2>
    <section>
        <div class="content-box nb">
            <table class="table tc">
                <thead>
                    <tr>
                        <th scope="col">NO.</th>
                        <th scope="col">제목</th>
                        <th scope="col">작성자</th>
                        <th scope="col">조회수</th>
                        <th scope="col">작성일</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?= $row['idx']; ?></th>
                        <td class="tw"><?= $row['title']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['view'];?></td>
                        <td><?= $row['regdate']; ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="notice-detail-box jcsb d-flex">
                <div class="notice-content h5">
                  <p><?= $row['content']; ?></p>
                </div>
                <?php if ($row['is_img'] == 1) : ?>
                <div class="notice-image">
                    <img src="/helloworld/user/img/event_notice.png" id="notice_img" alt="이벤트 프로모션 이미지">
                </div>
                <?php endif; ?>
            </div>
            <!-- 첨부 파일 출력 부분 -->
            <div class="d-flex file">
                    <p>첨부 파일</p>
                    <p><?= $row['file']; ?></p>
                </div>
        </div>
    </section>
    <div class="d-flex jcsb btn_s">
        <div class="r_btn">
                <?php if ($prev_id !== null) : ?>
                    <a href="notice_detail.php?id=<?= $prev_id; ?>" class="btn btn-secondary">이전</a>
                <?php else : ?>
                    <a href="#" class="btn btn-primary disabled">이전</a>
                <?php endif; ?>

                <?php if ($next_id !== null) : ?>
                    <a href="notice_detail.php?id=<?= $next_id; ?>" class="btn btn-secondary">다음</a>
                <?php else : ?>
                    <a href="#" class="btn btn-primary disabled">다음</a>
                <?php endif; ?>
            <!-- <button type="button" class="btn btn-secondary"><a href="">이전</a></button>
            <button type="button" class="btn btn-secondary"><a href="">다음</a></button> -->
        </div>
        <div>
            <button type="button" class="btn btn-danger bd"><a href="/helloworld/user/notice/notice.php">닫기</a></button>
        </div>
    </div>
</div>