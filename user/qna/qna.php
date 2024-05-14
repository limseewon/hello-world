<?php
$title = 'Q&A';
$cssRoute1 ='<link rel="stylesheet" href="/helloworld/user/css/Q&A.css">';
$cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/Q&A_detail.css">';
$script1 = '';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';
$paginationTarget = 'qna';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/pagination.php';

$sql = "SELECT * FROM qna WHERE 1=1";
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
if ($keyword) {
   $sql .= " AND title LIKE '%$keyword%'";
}

$answer_option = isset($_GET['answer']) ? $_GET['answer'] : '';
if ($answer_option === 'answered') {
   $sql .= " AND reply = '답변'";
} elseif ($answer_option === 'unanswered') {
   $sql .= " AND reply = '미답변'";
}

$sql .= " ORDER BY idx DESC";

$result_count = $mysqli->query($sql);
$totalcount = $result_count->num_rows;

$sql .= " LIMIT $startLimit, $pageCount";
$result = $mysqli->query($sql);
?>
<div class="container">
    <h2 class="h2_t">Q&amp;A</h2>
    <div class="d-flex jcsb tb">
        <select class="form-select form-select-lg mb-3 sb p" aria-label="Large select example" id="answerFilter" onchange="location.href='qna.php?answer='+this.value+'&keyword=<?= $keyword ?>&pageNumber=<?= $pageNumber ?>'">
            <option value="all" <?= $answer_option === '' ? 'selected' : '' ?>>전체</option>
            <option value="answered" <?= $answer_option === 'answered' ? 'selected' : '' ?>>답변</option>
            <option value="unanswered" <?= $answer_option === 'unanswered' ? 'selected' : '' ?>>미답변</option>
        </select>
        <form class="block-top d-flex search_bar" id="searchForm" action="qna.php" method="GET">
            <input type="hidden" name="answer" value="<?= $answer_option ?>">
            <input type="hidden" name="pageNumber" value="1">
            <input class="form-control me-2 search" type="search" placeholder="제목을 입력하시오." aria-label="Search" id="searchInput" name="keyword" value="<?= $keyword ?>">
            <button class="btn btn-outline-success btn_search" type="submit" id="searchButton">검색</button>
            <button class="btn btn-secondary qna_regist_btn" type="button"><a href="/helloworld/user/qna/qna_regist.php">질문 등록</a></button>
        </form>
    </div>
    <div class="table-container">
        <table class="table table-striped table-hover Q&A_tb p jcsb"> 
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
            <?php
            while ($row = $result->fetch_assoc()) {

            //title변수에 DB에서 가져온 title을 선택
            $title = $row["lecture_name"];
            if (iconv_strlen($title) > 20) {
                //title이 20을 넘어서면 ...표시
                $title = str_replace($row["lecture_name"], iconv_substr($row["lecture_name"], 0, 20, "utf-8") . "...", $row["lecture_name"]);
            }
            
            //content변수에 DB에서 가져온 content를 선택
            $content = $row["title"];
            if (iconv_strlen($content) > 35) {
                //content가 35을 넘어서면 ...표시
                $content = str_replace($row["title"], iconv_substr($row["title"], 0, 35, "utf-8") . "...", $row["title"]);
            }

            // 답변 여부에 따라 버튼 클래스 설정
            $buttonClass = ($row['reply'] === '답변') ? 'btn btn-success bs' : 'btn btn-secondary bn';
            ?>    
                <tr>
                    <th scope="row"><?= $title; ?></th>
                    <td><a href="qna_detail.php?id=<?= $row['idx']; ?>"><?= $content; ?></a></td>
                    <td class="text_center"><?= $row['name']; ?></td>
                    <td class="text_center"><?= $row['view']; ?></td>
                    <td class="text_center"><button type="button" class="btn_class <?= $buttonClass ?>"><?= $row['reply']; ?></button></td>
                    <td><?= $row['date']; ?></td>
                </tr>
                <?php
                  } 
                ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        <ul class="pagination">
            <?php
            $block_ct = 5; // 페이지네이션에 표시할 페이지 번호의 개수를 5로 설정
            $total_page = ceil($totalcount / $pageCount);
            $total_block = ceil($total_page / $block_ct);
            
            $block_num = ceil($pageNumber / $block_ct);
            $block_start = (($block_num - 1) * $block_ct) + 1;
            $block_end = $block_start + $block_ct - 1;
            
            if ($block_end > $total_page) {
            $block_end = $total_page;
            }
            
            if ($pageNumber > 1) {
            echo "<li class=\"page-item\"><a href=\"qna.php?pageNumber=1&keyword=$keyword&answer=$answer_option\" class=\"page-link\" >처음</a></li>";
            //이전
            if ($block_num > 1) {
                $prev = ($block_num - 2) * $block_ct + 1;
                echo "<li class=\"page-item\"><a href=\"qna.php?pageNumber=$prev&keyword=$keyword&answer=$answer_option\" class=\"page-link\">이전</a></li>";
            }
            }
                
            for ($i = $block_start; $i <= $block_end; $i++) {
            if ($i == $pageNumber) {
                echo "<li class=\"page-item active\"><a href=\"qna.php?pageNumber=$i&keyword=$keyword&answer=$answer_option\" class=\"page-link\">$i</a></li>";
            } else {
                echo "<li class=\"page-item\"><a href=\"qna.php?pageNumber=$i&keyword=$keyword&answer=$answer_option\" class=\"page-link\">$i</a></li>";
            }            
            }  

            if ($pageNumber < $total_page) {
            if ($block_end < $total_page) {
                $next = $block_num * $block_ct + 1;
                echo "<li class=\"page-item\"><a href=\"qna.php?pageNumber=$next&keyword=$keyword&answer=$answer_option\" class=\"page-link\">다음</a></li>";
            }
            echo "<li class=\"page-item\"><a href=\"qna.php?pageNumber=$total_page&keyword=$keyword&answer=$answer_option\" class=\"page-link\">마지막</a></li>";
            }        
            ?>
        </ul>
    </div> 
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>