<?php
$sub_menu = "900910";
include_once("./_common.php");

if ($w == 'u')
    check_demo();


check_admin_token();

$pu_id = trim($_POST['pu_id']);


$sql_common = "  pu_subject = '{$_POST['pu_subject']}',
                 pu_content = '{$_POST['pu_content']}',
		pu_url = '{$_POST['pu_url']}',
                 mb_id = '{$member['mb_id']}',
                 mb_name = '{$member['mb_name']}' ";

if ($w == '')
{
    sql_query(" insert into push_data set {$sql_common}, pu_datetime = NOW() ");
    //echo " insert into push_data set {$sql_common}, pu_datetime = NOW() ";
	$pu_id = sql_insert_id();
}
else if ($w == 'u')
{


    $sql = " update push_data
                set {$sql_common}
                where pu_id = '{$pu_id}' ";
    sql_query($sql);
}
else
    alert('제대로 된 값이 넘어오지 않았습니다.');

goto_url('./push_send_form.php?'.$qstr.'&amp;w=u&amp;pu_id='.$pu_id, false);
?>