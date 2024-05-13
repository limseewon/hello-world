<?php
$title = 'Q&A';
$cssRoute1 ='';
$cssRoute2 ='';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';
$paginationTarget = 'qna';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/pagination.php';

$sql = "SELECT * FROM qna WHERE 1=1";
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
if ($keyword) {
   $sql .= " AND title LIKE '%$keyword%'";
}

$view_option = isset($_GET['view']) ? $_GET['view'] : '';
switch ($view_option) {
   case '1':
       $sql .= " ORDER BY view DESC";
       break;
   case '2':
       $sql .= " ORDER BY view ASC";
       break;
   default:
       $sql .= " ORDER BY idx DESC";
}

$result_count = $mysqli->query($sql);
$totalcount = $result_count->num_rows;

$sql .= " LIMIT $startLimit, $pageCount";
$result = $mysqli->query($sql);
?>
<div class="container">
    <h2 class="h2_t">Q&amp;A</h2>
    <div class="d-flex jcsb tb">
        <select class="form-select form-select-lg mb-3 sb p" aria-label="Large select example" id="answerFilter">
            <option value="all" selected>전체</option>
            <option value="answered">답변</option>
            <option value="unanswered">미답변</option>
        </select>
        <form class="block-top d-flex search_bar">
            <input class="form-control me-2 search" type="search" placeholder="제목을 입력하시오." aria-label="Search" id="searchInput">
            <button class="btn btn-outline-success btn_search" type="submit" id="searchButton">검색</button>
            <button class="btn btn-secondary qna_regist_btn" type="submit"><a href="/helloworld/user/html/Q&A_regist.html">질문 등록</a></button>
        </form>
    </div>
    <div class="table-container">
        <table class="table table-striped table-hover Q&A_tb p jcsb"> 
            <thead>
                <tr>
                    <th scope="col">강의명</th>
                    <th scope="col">내용</th>
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
            $title = $row["title"];
            if (iconv_strlen($title) > 20) {
                //title이 20을 넘어서면 ...표시
                $title = str_replace($row["title"], iconv_substr($row["title"], 0, 20, "utf-8") . "...", $row["title"]);
            }
            
            //content변수에 DB에서 가져온 content를 선택
            $content = $row["content"];
            if (iconv_strlen($content) > 35) {
                //content가 10을 넘어서면 ...표시
                $content = str_replace($row["content"], iconv_substr($row["content"], 0, 35, "utf-8") . "...", $row["content"]);
            }
            ?>    
                <tr>
                    <th scope="row"><?= $title; ?></th>
                    <td><a href="Q&A_detail.php"><?= $content; ?></a></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['view']; ?></td>
                    <td><button type="button" class="btn btn-success bs"><?= $row['reply']; ?></button></td>
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
            echo "<li class=\"page-item\"><a href=\"Q&A.php?pageNumber=1&keyword=$keyword\" class=\"page-link\" >처음</a></li>";
            //이전
            if ($block_num > 1) {
                $prev = ($block_num - 2) * $block_ct + 1;
                echo "<li class=\"page-item\"><a href=\"Q&A.php?pageNumber=$prev&keyword=$keyword\" class=\"page-link\">이전</a></li>";
            }
            }
                
            for ($i = $block_start; $i <= $block_end; $i++) {
            if ($i == $pageNumber) {
                echo "<li class=\"page-item active\"><a href=\"Q&A.php?pageNumber=$i&keyword=$keyword\" class=\"page-link\">$i</a></li>";
            } else {
                echo "<li class=\"page-item\"><a href=\"Q&A.php?pageNumber=$i&keyword=$keyword\" class=\"page-link\">$i</a></li>";
            }            
            }  

            if ($pageNumber < $total_page) {
            if ($block_end < $total_page) {
                $next = $block_num * $block_ct + 1;
                echo "<li class=\"page-item\"><a href=\"Q&A.php?pageNumber=$next&keyword=$keyword\" class=\"page-link\">다음</a></li>";
            }
            echo "<li class=\"page-item\"><a href=\"Q&A.php?pageNumber=$total_page&keyword=$keyword\" class=\"page-link\">마지막</a></li>";
            }        
            ?>
        </ul>
    </div> 
</div>
<script>
      document.addEventListener('DOMContentLoaded', function() {
        var answerFilter = document.getElementById('answerFilter');
        var searchInput = document.getElementById('searchInput');
        var searchButton = document.getElementById('searchButton');
        var tableRows = document.querySelectorAll('.Q&A_tb tbody tr');

        // 답변 여부 필터링 기능
        answerFilter.addEventListener('change', filterRows);

        // 제목 검색 기능
        searchButton.addEventListener('click', function(event) {
            event.preventDefault();
            filterRows();
        });

        // 행 필터링 함수
        function filterRows() {
            var selectedOption = answerFilter.value;
            var searchTerm = searchInput.value.toLowerCase();

            tableRows.forEach(function(row) {
                var answerStatus = row.querySelector('td:nth-child(5) button').textContent;
                var title = row.querySelector('td:nth-child(2) a').textContent.toLowerCase();

                if (
                    (selectedOption === 'all' || 
                        (selectedOption === 'answered' && answerStatus === '답변') ||
                        (selectedOption === 'unanswered' && answerStatus === '미답변')
                    ) &&
                    title.includes(searchTerm)
                ) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    });
</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>