<?php
$title = '공지사항';
$cssRoute1 ='<link rel="stylesheet" href="/helloworld/user/css/notice.css">';
$cssRoute2 ='';
$cssRoute3 ='';
$cssRoute4 ='';

$script1 = '';
$script2 = '';
$script3 = '';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';
$paginationTarget = 'notice';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/pagination.php';

$sql = "SELECT * FROM notice WHERE 1=1";
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
if ($keyword) {
  $sql .= " AND title LIKE '%$keyword%'";
}

$date_option = isset($_GET['date']) ? $_GET['date'] : '';

$order_by = "";

switch ($view_option) {
    case '1':
        $order_by = " ORDER BY view DESC";
        break;
    case '2':
        $order_by = " ORDER BY view ASC";
        break;
    default:
        $order_by = " ORDER BY idx DESC";
}

if ($date_option === 'latest') {
  $order_by = " ORDER BY regdate DESC";
} elseif ($date_option === 'oldest') {
  $order_by = " ORDER BY regdate ASC";
}

$sql .= $order_by;

$result_count = $mysqli->query($sql);
$totalcount = $result_count->num_rows;

$pageCount = 10; // 한 페이지에 보여줄 게시물 수
$pageNumber = isset($_GET['pageNumber']) ? $_GET['pageNumber'] : 1; // 현재 페이지 번호
$start = ($pageNumber - 1) * $pageCount; // 해당 페이지의 첫 번째 게시물 인덱스

$sql .= " LIMIT $start, $pageCount"; // LIMIT 절 추가
$result = $mysqli->query($sql);
?>

<div class="container">
  <h2 class="h2_t">공지사항</h2>
  <div class="d-flex jcsb tb">
    <select class="form-select form-select-lg mb-3 sb p" aria-label="Large select example" id="dateFilter" onchange="location.href='notice.php?date='+this.value+'&keyword=<?= $keyword ?>'">
      <option value="all" <?= $date_option === 'all' ? 'selected' : '' ?>>전체</option>
      <option value="latest" <?= $date_option === 'latest' ? 'selected' : '' ?>>최신순</option>
      <option value="oldest" <?= $date_option === 'oldest' ? 'selected' : '' ?>>과거순</option>
    </select>
    <form class="block-top d-flex search_bar" action="notice.php" method="GET">
      <input type="hidden" name="date" value="<?= $date_option ?>">
      <input class="form-control me-2 search" type="search" placeholder="제목을 입력하시오." aria-label="Search" id="searchInput" name="keyword" value="<?= $keyword ?>">
      <button class="btn btn-outline-success btn_search" type="submit" id="searchButton">검색</button>
    </form>
  </div>
  <div class="table-container">
    <table class="table table-striped table-hover notice_tb jcsb"> 
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
      <?php
              // board테이블에서 idx를 기준으로 내림차순해서 10개까지 표시
             
              // output data of each row
              while($row = $result->fetch_assoc()) {
              
                  //title변수에 DB에서 가져온 title을 선택
                  $title=$row["title"];
                  if(iconv_strlen($title)>30)
                  {
                    //title이 30을 넘어서면 ...표시
                    $title=str_replace($row["title"],iconv_substr($row["title"],0,30,"utf-8")."...",$row["title"]);
                  }
              ?>
              <tr>
                  <th scope="row" class="no_th"><?= $row['idx'];?></th>
                  <td class="title_td"><a href="notice_detail.php?id=<?= $row['idx']; ?>"><?= $title; ?></a></td>
                  <td><?= $row['name'];?></td>
                  <td><?= $row['view'];?></td>
                  <td><?= $row['regdate'];?></td>
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
            echo "<li class=\"page-item\"><a href=\"notice.php?pageNumber=1&keyword=$keyword&date=$date_option\" class=\"page-link\" >처음</a></li>";
            //이전
            if ($block_num > 1) {
                $prev = ($block_num - 2) * $block_ct + 1;
                echo "<li class=\"page-item\"><a href=\"notice.php?pageNumber=$prev&keyword=$keyword&date=$date_option\" class=\"page-link\">이전</a></li>";
            }
            }
                
            for ($i = $block_start; $i <= $block_end; $i++) {
            if ($i == $pageNumber) {
                echo "<li class=\"page-item active\"><a href=\"notice.php?pageNumber=$i&keyword=$keyword&date=$date_option\" class=\"page-link\">$i</a></li>";
            } else {
                echo "<li class=\"page-item\"><a href=\"notice.php?pageNumber=$i&keyword=$keyword&date=$date_option\" class=\"page-link\">$i</a></li>";
            }            
            }  

            if ($pageNumber < $total_page) {
            if ($block_end < $total_page) {
                $next = $block_num * $block_ct + 1;
                echo "<li class=\"page-item\"><a href=\"notice.php?pageNumber=$next&keyword=$keyword&date=$date_option\" class=\"page-link\">다음</a></li>";
            }
            echo "<li class=\"page-item\"><a href=\"notice.php?pageNumber=$total_page&keyword=$keyword&date=$date_option\" class=\"page-link\">마지막</a></li>";
            }        
            ?>
        </ul>
        </div>    
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>