<?php
$sub_menu = "900910";
include_once('./_common.php');


$sql_common = " from push_data ";

$sql_search = " where (1) ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case 'pu_point' :
            $sql_search .= " ({$sfl} >= '{$stx}') ";
            break;
        case 'pu_level' :
            $sql_search .= " ({$sfl} = '{$stx}') ";
            break;
        case 'pu_tel' :
        case 'pu_hp' :
            $sql_search .= " ({$sfl} like '%{$stx}') ";
            break;
        default :
            $sql_search .= " ({$sfl} like '{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}

if ($is_admin != 'super')
    $sql_search .= " and pu_level <= '{$member['pu_level']}' ";

if (!$sst) {
    $sst = "pu_datetime";
    $sod = "desc";
}



$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함


$listall = '<a href="'.$_SERVER['SCRIPT_NAME'].'" class="ov_listall">전체목록</a>';

$g5['title'] = 'Push관리';
include_once(G5_ADMIN_PATH.'/admin.head.php');

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$colspan = 16;
?>

<div class="local_ov01 local_ov">
    <?php echo $listall ?>
    <span style="height: 30px;display: inline-block;
    line-height: 30px;
    background: #9eacc6;
    color: #fff;
    border-radius: 5px 0 0 5px;
    padding: 0 5px;">발송된 Push</span><span style="    background: #ededed;
    color: #666;
    border-radius: 0 5px 5px 0;
    padding: 0 5px;height: 30px;
    line-height: 30px;display: inline-block;"><?php echo number_format($total_count) ?>건</span>
</div>

<form id="fsearch" name="fsearch" class="local_sch01 local_sch" method="get">

<label for="sfl" class="sound_only">검색대상</label>
<select name="sfl" id="sfl" class="frm_input">
    <option value="pu_subject"<?php echo get_selected($_GET['sfl'], "pu_subject"); ?>>제목</option>
    <option value="pu_content"<?php echo get_selected($_GET['sfl'], "pu_content"); ?>>내용</option>
    <option value="mb_name"<?php echo get_selected($_GET['sfl'], "mb_name"); ?>>발신자</option>
</select>
<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
<input type="text" name="stx" value="<?php echo $stx ?>" id="stx" class="frm_input">
<input type="submit" class="btn_submit" value="검색">

</form>

<form name="fpushlist" id="fpushlist" action="./push_list_update.php" onsubmit="return fmemberlist_submit(this);" method="post" style="position:relative;">
<input type="hidden" name="sst" value="<?php echo $sst ?>">
<input type="hidden" name="sod" value="<?php echo $sod ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
<input type="hidden" name="stx" value="<?php echo $stx ?>">
<input type="hidden" name="page" value="<?php echo $page ?>">
<input type="hidden" name="token" value="">

<div class="tbl_head01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col" id="pu_list_chk">
            <label for="chkall" class="sound_only">목록 전체</label>
            <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
        </th>
        <th scope="col"><?php echo subject_sort_link('pu_subject') ?>제목</a></th>
		<th scope="col">발송자</th>
        <th scope="col">발송횟수</th>
        <th scope="col">성공건수</th>
        <th scope="col">실패건수</th>
        <th scope="col"><?php echo subject_sort_link('pu_datetime', '', 'desc') ?>등록일</a></th>
        <th scope="col"><?php echo subject_sort_link('pu_last', '', 'desc') ?>최근 발송일</a></th>
        <th scope="col">관리</th>
    </tr>

    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {
		$mb = get_member($row['mb_id']);
    ?>

    <tr class="<?php echo $bg; ?>">
        <td headers="pu_list_chk" class="td_chk">
            <input type="hidden" name="pu_id[<?php echo $i ?>]" value="<?php echo $row['pu_id'] ?>" id="pu_id_<?php echo $i ?>">
            <label for="chk_<?php echo $i; ?>" class="sound_only"><?php echo get_text($row['pu_name']); ?> <?php echo get_text($row['pu_nick']); ?>님</label>
            <input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">
        </td>
        <td><?=$row['pu_subject'] ?></td>
		<td class="td_mng"><?=$mb['mb_name']?></td>
        <td class="td_mngsmall"><?=number_format($row['pu_count']) ?></td>
        <td class="td_mngsmall"><?=number_format($row['pu_success_count']) ?></td>
        <td class="td_mngsmall"><?=number_format($row['pu_fail_count']) ?></td>
        <td class="td_datetime"><?=$row['pu_datetime'] ?></td>
        <td class="td_datetime"><?=$row['pu_last'] ?></td>
        <td class="td_mngsmall">
			<a href="./push_form.php?<?=$qstr?>&w=u&pu_id=<?=$row['pu_id']?>">수정</a><br />
			<a href="./push_send_form.php?<?=$qstr?>&w=u&pu_id=<?=$row['pu_id']?>">발송</a>
		</td>
    </tr>


    <?php
    }
    if ($i == 0)
        echo "<tr><td colspan=\"".$colspan."\" class=\"empty_table\">자료가 없습니다.</td></tr>";
    ?>
    </tbody>
    </table>
</div>

<div class="btn_list01 btn_list" style="position: absolute;right: 0;top: -50px;">
    <input type="submit" name="act_button" class="btn btn_02" value="선택삭제" onclick="document.pressed=this.value">
    <a href="./push_form.php" id="member_add" class="btn btn_01">Push추가</a>
</div>

</form>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '?'.$qstr.'&amp;page='); ?>

<script>
function fmemberlist_submit(f)
{
    if (!is_checked("chk[]")) {
        alert(document.pressed+" 하실 항목을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택삭제") {
        if(!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
            return false;
        }
    }

    return true;
}
</script>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
