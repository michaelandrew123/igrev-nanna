<?php
/** Include file */
include_once('./_common.php');

/**
if (!$is_member) {
    $jsonContent = array(
        'code' => '201',
        'msg' => '로그인 해주세요.',
    );
}
**/
$type = ifilter("type", "", "string");
if ($type == "login")
{
    $today = date("Y-m-d");

    $mb_id = ifilter("mb_id", "", "string");
    $mb_password = ifilter("mb_password", "", "string");


    if (!$mb_id || !$mb_password){
        $jsonContent = array(
            'code' => '202',
            'msg' => '회원아이디나 비밀번호를 입력해주세요.',
        );


    }else{
        $mb = get_member($mb_id);

        if ((!(isset($mb['mb_id']) && $mb['mb_id']) || !login_password_check($mb, $mb_password, $mb['mb_password']))) {

            $jsonContent = array(
                'code' => '203',
                'msg' => '가입된 회원아이디가 아니거나 비밀번호가 틀립니다.\\n비밀번호는 대소문자를 구분합니다.',
            );
        }

        set_session('mb_id', $mb['mb_id']);
        set_session('mb_password', $mb_password);
        set_session('mb_name', $mb['mb_name']);
        set_session('mb_memo', $mb['mb_memo']);
        set_session('waiting_average', $mb['waiting_average']);
// FLASH XSS 공격에 대응하기 위하여 회원의 고유키를 생성해 놓는다. 관리자에서 검사함 - 110106
        set_session('mb_key', md5($mb['mb_datetime'] . get_real_client_ip() . $_SERVER['HTTP_USER_AGENT']));
        $jsonContent = array(
            'code' => '200',
            'msg' => '로그인 되었습니다.',
        );
    }

}else if ($type == "join")
{

    $mb_id = ifilter("mb_id", "", "string");
    $mb_password = ifilter("mb_password", "", "string");
    $mb_name = ifilter("mb_name", "", "string");
    $mb_memo = ifilter("mb_memo", "", "string");
    $waiting_average = ifilter("waiting_average", "1", "NUMBER");



    if(!$mb_id){
        $jsonContent = array(
            'code' => '202',
            'msg' => '회원아이디를 입력해주세요.',
        );
    }
    $mb = get_member($mb_id);
    if(isset($mb['mb_id'])){
        $jsonContent = array(
            'code' => '202',
            'msg' => '사용중인 아이디 입니다. 다른 아이디를 입력해주세요.',
        );
    }

    if(!$mb_password){
        $jsonContent = array(
            'code' => '202',
            'msg' => '비밀번호를 입력해주세요.',
        );
    }

    $result = passwordCheck($mb_password);
    if ($result[0] == false)
    {
        $jsonContent = array(
            'code' => '201',
            'msg' => $result[1],
        );
    }

    if(!$mb_name){
        $jsonContent = array(
            'code' => '202',
            'msg' => '매장명을 입력해주세요.',
        );
    }

    if(!$mb_memo){
        $jsonContent = array(
            'code' => '202',
            'msg' => '한줄소개를 입력해주세요.',
        );
    }

    if(!$waiting_average){
        $jsonContent = array(
            'code' => '202',
            'msg' => '평균대기시간을 입력해주세요.',
        );
    }

    if (!$mb_id || !$mb_password){
        $jsonContent = array(
            'code' => '202',
            'msg' => '회원아이디나 비밀번호를 입력해주세요.',
        );
    }

   if(!isset($jsonContent)){
        $sql = " insert into {$g5['member_table']}
                    set mb_id = '{$mb_id}',
                         mb_password = '".get_encrypt_string($mb_password)."',
                         mb_name = '{$mb_name}',
                         mb_memo = '{$mb_memo}',
                         mb_today_login = '".G5_TIME_YMDHIS."',
                         mb_datetime = '".G5_TIME_YMDHIS."',
                         mb_ip = '{$_SERVER['REMOTE_ADDR']}',
                         mb_level = '{$config['cf_register_level']}',
                         mb_login_ip = '{$_SERVER['REMOTE_ADDR']}',
                         mb_open_date = '".G5_TIME_YMD."',
                         waiting_average = '{$waiting_average}'
    ";
        sql_query($sql);

        $jsonContent = array(
            'code' => '200',
            'msg' => '회원가입이 되었습니다.',
        );
   }
}else if ($type == "mody")
{
    $mb_password = ifilter("mb_password", "", "string");
    $mb_name = ifilter("mb_name", "", "string");
    $mb_memo = ifilter("mb_memo", "", "string");
    $waiting_average = ifilter("waiting_average", "1", "NUMBER");

    if(!$_SESSION['mb_id']){
        $jsonContent = array(
            'code' => '201',
            'msg' => '로그인 해주세요.',
        );
    }

    if(!$mb_password){
        $jsonContent = array(
            'code' => '202',
            'msg' => '비밀번호를 입력해주세요.',
        );
    }

    $result = passwordCheck($mb_password);
    if ($result[0] == false)
    {
        $jsonContent = array(
            'code' => '201',
            'msg' => $result[1],
        );
    }

    if(!$mb_name){
        $jsonContent = array(
            'code' => '202',
            'msg' => '매장명을 입력해주세요.',
        );
    }

    if(!$mb_memo){
        $jsonContent = array(
            'code' => '202',
            'msg' => '한줄소개를 입력해주세요.',
        );
    }

    if(!$waiting_average){
        $jsonContent = array(
            'code' => '202',
            'msg' => '평균대기시간을 입력해주세요.',
        );
    }

    if(!isset($jsonContent)){
        $sql = " update {$g5['member_table']}
                    set mb_password = '".get_encrypt_string($mb_password)."',
                         mb_name = '{$mb_name}',
                         mb_memo = '{$mb_memo}',
                         waiting_average = '{$waiting_average}'
                where mb_id = '{$_SESSION['mb_id']}'
    ";
        sql_query($sql);

        $jsonContent = array(
            'code' => '200',
            'msg' => '회원정보 수정이 완료 되었습니다.',
        );
    }
}else if ($type == "wating_step1")
{
    $c_hp = ifilter("c_hp", "", "string");

    if(!preg_match( "/^[0-9]/i", $c_hp )){
        $jsonContent = array(
            'code' => '202',
            'msg' => '전화번호에 문자가 들어갔습니다. 확인해주세요.',
        );
    }

    if(strlen($c_hp) != 11){
        $jsonContent = array(
            'code' => '202',
            'msg' => '전화번호가 11자리가 아닙니다. 확인해주세요.',
        );
    }

    if(!isset($jsonContent)){
        /**
    }
       // $sql = " insert into customer
                    set mb_id = '{$_SESSION['mb_id']}',
                         c_hp = '{$c_hp}'";
       // print_r($sql);
      //  sql_query($sql);
         * **/
      //  sql_query(" insert into customer set mb_id = '{$_SESSION['mb_id']}', c_hp = '{$c_hp}', status = 'REG'", false);
     //   $c_idx = sql_fetch("select last_insert_id() c_idx from dual");
        set_session('c_hp', $c_hp);
        $jsonContent = array(
            'code' => '200',
            'msg' => '저장 되었습니다.',
        );
    }
}else if ($type == "wating_step2")
{
    $adult_cnt = ifilter("adult_cnt", "", "string");
    $child_cnt = ifilter("child_cnt", "", "string");

    if(!preg_match( "/^[0-9]/i", $adult_cnt )){
        $jsonContent = array(
            'code' => '202',
            'msg' => '성인 인원수에 문자가 들어갔습니다. 확인해주세요.',
        );
    }

    if(!preg_match( "/^[0-9]/i", $child_cnt )){
        $jsonContent = array(
            'code' => '202',
            'msg' => '유아 인원수에 문자가 들어갔습니다. 확인해주세요.',
        );
    }

    if(!isset($jsonContent)){
        /**
        }
        // $sql = " insert into customer
        set mb_id = '{$_SESSION['mb_id']}',
        c_hp = '{$c_hp}'";
        // print_r($sql);
        //  sql_query($sql);
         * **/
        //  sql_query(" insert into customer set mb_id = '{$_SESSION['mb_id']}', c_hp = '{$c_hp}', status = 'REG'", false);
        //   $c_idx = sql_fetch("select last_insert_id() c_idx from dual");
        set_session('adult_cnt', $adult_cnt);
        set_session('child_cnt', $child_cnt);
        $jsonContent = array(
            'code' => '200',
            'msg' => '저장 되었습니다.',
        );
    }
}else if ($type == "wating_step3")
{
    $adult_cnt = ifilter("adult_cnt", "", "string");
    $child_cnt = ifilter("child_cnt", "", "string");
    $c_hp = ifilter("c_hp", "", "string");

    if(!preg_match( "/^[0-9]/i", $c_hp )){
        $jsonContent = array(
            'code' => '202',
            'msg' => '전화번호에 문자가 들어갔습니다. 확인해주세요.',
        );
    }

    if(strlen($c_hp) != 11){
        $jsonContent = array(
            'code' => '202',
            'msg' => '전화번호가 11자리가 아닙니다. 확인해주세요.',
        );
    }

    if(!preg_match( "/^[0-9]/i", $adult_cnt )){
        $jsonContent = array(
            'code' => '202',
            'msg' => '성인 인원수에 문자가 들어갔습니다. 확인해주세요.',
        );
    }

    if(!preg_match( "/^[0-9]/i", $child_cnt )){
        $jsonContent = array(
            'code' => '202',
            'msg' => '유아 인원수에 문자가 들어갔습니다. 확인해주세요.',
        );
    }

    if(!isset($jsonContent)){

        sql_query(" insert into customer set mb_id = '{$_SESSION['mb_id']}', c_hp = '{$c_hp}', adult_cnt = '{$adult_cnt}', child_cnt = '{$child_cnt}', status = 'WAIT', reg_date = now(), status_change_date = now()", false);
        $c_idx = sql_fetch("select last_insert_id() c_idx from dual");
        set_session('c_idx', $c_idx);
        $jsonContent = array(
            'code' => '200',
            'msg' => '저장 되었습니다.',
            'c_idx' => $c_idx,
        );
    }
}else if ($type == "get_shop_waiting_list")
{
    if($_SESSION['mb_id']){
        $arr = array();
        $sql = " select *,if(status_change_date > now() - INTERVAL 2 MINUTE,'REQUEST','OVER') req_status,TIMEDIFF(now(), status_change_date) comp_dif,TIMEDIFF(now(), reg_date) dif from customer where mb_id = '".$_SESSION['mb_id']."'  and DATE_FORMAT(reg_date, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') ";
        $result = sql_query($sql);
        for ($i=0; $row=sql_fetch_array($result); $i++) {
            $arr[$i] = $row;
        }
        $jsonContent = array(
            'code' => '200',
            'msg' => '조회 되었습니다.',
            'data' => $arr,
        );
    }else{
        $jsonContent = array(
            'code' => '201',
            'msg' => '로그인 해주세요.',
        );
    }
}else if ($type == "set_status_change")
{
    if($_SESSION['mb_id']){
        $c_idx = ifilter("c_idx", "", "string");
        $status = ifilter("status", "", "string");
        sql_query(" update customer set  status = '{$status}', status_change_date = now() where c_idx = '{$c_idx}'", false);
        $jsonContent = array(
            'code' => '200',
            'msg' => '변경 되었습니다.',
        );
    }else{
        $jsonContent = array(
            'code' => '201',
            'msg' => '로그인 해주세요.',
        );
    }
}else if ($type == "change_shop_name")
{
    if($_SESSION['mb_id']){
        $mb_name= ifilter("mb_name", "", "string");
        sql_query(" update g5_member set  mb_name = '{$mb_name}' where mb_id = '{$_SESSION['mb_id']}'", false);
        $_SESSION['mb_name'] = $mb_name;
        $jsonContent = array(
            'code' => '200',
            'msg' => '변경 되었습니다.',
        );
    }else{
        $jsonContent = array(
            'code' => '201',
            'msg' => '로그인 해주세요.',
        );
    }
}else if ($type == "change_shop_memo")
{
    if($_SESSION['mb_id']){
        $mb_memo= ifilter("mb_memo", "", "string");
        sql_query(" update g5_member set  mb_memo = '{$mb_memo}' where mb_id = '{$_SESSION['mb_id']}'", false);
        $_SESSION['mb_memo'] = $mb_memo;
        $jsonContent = array(
            'code' => '200',
            'msg' => '변경 되었습니다.',
        );
    }else{
        $jsonContent = array(
            'code' => '201',
            'msg' => '로그인 해주세요.',
        );
    }
}else if ($type == "get_main_list")
{
        $main_recent_arr = array();
        $main_recommend_arr = array();
        $main_similar_arr = array();
        $sql = " select *,FN_CODE('quiz_type',a.quiz_type) quiz_type_name from nan_quiz a left join nan_quiz_data_file b on b.file_idx = a.file_id limit 0,5  ";
        $result = sql_query($sql);
        for ($i=0; $row=sql_fetch_array($result); $i++) {
            $main_recent_arr[$i] = $row;
        }

        $sql = " select *,FN_CODE('quiz_type',a.quiz_type) quiz_type_name from nan_quiz a left join nan_quiz_data_file b on b.file_idx = a.file_id limit 0,5  ";
        $result = sql_query($sql);
        for ($i=0; $row=sql_fetch_array($result); $i++) {
            $main_recommend_arr[$i] = $row;
        }

        $sql = " select *,FN_CODE('quiz_type',a.quiz_type) quiz_type_name from nan_quiz a left join nan_quiz_data_file b on b.file_idx = a.file_id limit 0,5  ";
        $result = sql_query($sql);
        for ($i=0; $row=sql_fetch_array($result); $i++) {
            $main_similar_arr[$i] = $row;
        }
        $jsonContent = array(
            'code' => '200',
            'msg' => '조회 되었습니다.',
            'recent_ata' => $main_recent_arr,
            'recommend_data' => $main_recommend_arr,
            'similar_data' => $main_similar_arr,
        );
}else if ($type == "wiki_save")
{
    if($_SESSION['mb_id']){
        $quiz_subject= ifilter("quiz_subject", "", "string");
        $quiz_desc= ifilter("quiz_desc", "", "string");
        $quiz_contents= ifilter("quiz_contents", "", "html");

        sql_query(" insert into nan_quiz set mb_id = '{$_SESSION['mb_id']}', quiz_subject = '{$quiz_subject}',quiz_desc = '{$quiz_desc}',quiz_contents = '{$quiz_contents}', reg_date = now(), status='MAKE',quiz_type='4' ", false);
        $_SESSION['mb_memo'] = $mb_memo;
        $jsonContent = array(
            'code' => '200',
            'msg' => '저장 되었습니다.',
        );
    }else{
        $jsonContent = array(
            'code' => '201',
            'msg' => '로그인 해주세요.',
        );
    }
}else if ($type == "wiki_update")
{
    if($_SESSION['mb_id']){
        $quiz_idx= ifilter("quiz_idx", "", "string");
        $quiz_subject= ifilter("quiz_subject", "", "string");
        $quiz_desc= ifilter("quiz_desc", "", "string");
        $quiz_contents= ifilter("quiz_contents", "", "string");

        sql_query(" update nan_quiz set  , quiz_subject = '{$quiz_subject}',quiz_desc = '{$quiz_desc}',quiz_contents = '{$quiz_contents}', edit_date = now(), status='MAKE',quiz_type='4' where mb_id = '{$_SESSION['mb_id']}' and quiz_idx = '{$quiz_idx}'", false);
        $_SESSION['mb_memo'] = $mb_memo;
        $jsonContent = array(
            'code' => '200',
            'msg' => '변경 되었습니다.',
        );
    }else{
        $jsonContent = array(
            'code' => '201',
            'msg' => '로그인 해주세요.',
        );
    }
}


header('Content-Type: application/json');
print json_encode($jsonContent);


function passwordCheck($_str)
{
    $pw = $_str;
    $num = preg_match('/[0-9]/u', $pw);
    $eng = preg_match('/[a-z]/u', $pw);
    $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);

    if(strlen($pw) < 6 || strlen($pw) > 20)
    {
        return array(false,"비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 6자리 ~ 최대 20자리 이내로 입력해주세요.");
        exit;
    }

    if(preg_match("/\s/u", $pw) == true)
    {
        return array(false, "비밀번호는 공백없이 입력해주세요.");
        exit;
    }

    if( $num == 0 || $eng == 0 || $spe == 0)
    {
        return array(false, "비밀번호는 영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
        exit;
    }

    return array(true);
}