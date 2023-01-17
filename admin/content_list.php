<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php
$sub_menu = "300401";
include_once('./_common.php');

if ($is_admin != 'super')
    alert('최고관리자만 접근 가능합니다.');

$sql_common = " from nan_question a
                left join nan_quiz b on (a.quiz_idx = b.quiz_idx)
                left join nan_quiz_data_file c on (a.file_id = c.file_idx)
                left join g5_member e on (b.mb_no = e.mb_no )";
// where b.del_yn = 'n'";



$sql_search = " where (1) ";

if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case "title":
            $sql_search .= " ({$sfl} like '{$stx}%') ";
            break;
        case "mb_id":
            $sql_search .= " ({$sfl} = '{$stx}') ";
            break;
        default:
            $sql_search .= " ({$sfl} like '%{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}
// 테이블의 전체 레코드수만 얻음
$sql = " select count(*) as cnt {$sql_common}  {$sql_search} ";
$row_ = sql_fetch($sql);
$total_count = $row_['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) {
    $page = 1;
} // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select *, b.reg_date as reg_date_ , b.quiz_idx as quiz_idx_ {$sql_common} {$sql_search} ";
$result = sql_query($sql);

$g5['title'] = "컨텐츠 관리";
include_once('./admin.head.php');
?>
<div class="local_wr">
    <span class="btn_ov01"><span class="ov_txt">컨텐츠 개수</span><span class="ov_num"> <?php echo number_format($total_count); ?></span></span>
</div>
<form id="fsearch" name="fsearch" class="local_sch01 local_sch" method="get">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <option value="mb_id" <?php echo get_selected($sfl, "mb_id"); ?>>회원아이디</option>
        <option value="title" <?php echo get_selected($sfl, "title"); ?>>제목</option>
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
    <input type="submit" class="btn_submit" value="검색">
</form>

<?php if ($total_count > 0) { ?>
    <ul id="theme_list">
        <?php
        for ($i = 0; $row = sql_fetch_array($result); $i++) {
            $bg = 'bg' . ($i % 2);
        ?>
            <li>
                <div class="tmli_if">
                    <a href="./contentlist.php?quiz_idx=<?= $row['quiz_idx_'] ?>">
                        <?php if ($row['full_url'] == null) {     ?>
                            <img src="https://www.namdokorea.com/site/jeonnam/tour/images/noimage.gif" alt="" class="card-img-top" style="width: 300px; height: 200px;">
                        <?php } else { ?>
                            <img src="<?php echo $row['full_url']; ?>" alt="" class="card-img-top" style="width: 300px; height: 200px;">
                        <?php } ?>
                    </a>
                    <div class="tmli_tit">
                        <h1 style=" color : blue; padding-top: 10px; font-size:large; text-align: center;">
                            <?php if ($row['quiz_type'] == 4) {
                                echo "WIKI";
                            } else {
                                echo "QUIZ";
                            } ?>
                        </h1>
                        <h1 style="font-size:large;text-align: center; "><?php echo $row['title']; ?></h1>
                        <h1 style="padding-top: 5px;">수정일 <?php echo $row['edit_date'] = date("Y-m-d"); ?></h1>
                        <h1>생성일 <?php echo $row['reg_date_'] = date("Y-m-d"); ?></h1>
                        <h1>상태여부 <?php if ($row['del_yn'] == "y") {
                                        echo "Delect";
                                    } else {
                                        echo "Show";
                                    } ?>
                        </h1>
                        <!-- <h1>mb_no <?php echo $row['mb_no'] ?></h1> -->
                        <!-- 타입(1단일객관식,2복수객관식,3주관식,4wiki) -->
                        <div style=" text-align: center !important;">
                            <input type="button" name="act_button" id="button_action" value="Delect" onclick="del(<?= $row['quiz_idx_'] ?>,'del')" class="btn btn_02">
                            <input type="button" name="act_button" id="button_action" value="Show" onclick="del(<?= $row['quiz_idx_'] ?>,'show')" class="btn btn_02">
                        </div>
                    </div>
                </div>
            </li>
        <?php
        }
        ?>
    </ul>
<?php } else { ?>
    <p class="no_theme">컨텐츠가 없습니다.</p>
<?php } ?>

<?php
include_once('./admin.tail.php');
?>
<script>
    function del(quiz_idx, action) {
        var quiz_idx = quiz_idx;
        var action = action;

        $.ajax({
            url: "./ajaxProc.php",
            method: "POST",
            data: {
                quiz_idx: quiz_idx,
                action: action
            },
            dataType: "json",
            success: function(data) {
                alert("반영 되었습니다.");
            }

        }).done(function(body) {

            var message = body.response.message;

            var error = body.response.error;

            if (error)

                alert('통신 실패');

            /* get_msg(message); */

            if (error == false) {

                var url = '${referer}';

                if (url == '')

                    url = '<c:url value="./content_list" />';

                location.href = url;

                /* location.reload(); */

            }

        });
        document.location.reload();

    }
</script>