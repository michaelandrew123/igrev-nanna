<?php
include_once('./_common.php');
//수정

if ($_POST["action"] == "del") {
    $query = sql_query("UPDATE nan_quiz set del_yn = 'y'  WHERE quiz_idx = '" . $_POST["quiz_idx"] . "'");
} elseif ($_POST["action"] == "show") {
    $query = sql_query("UPDATE nan_quiz set del_yn = 'n'  WHERE quiz_idx = '" . $_POST["quiz_idx"] . "'");
} elseif ($_POST["action"] == "co_del") {
    $query = sql_query("UPDATE nan_comment set co_del_yn = 'y'  WHERE co_id = '" . $_POST["co_id"] . "'");
}
