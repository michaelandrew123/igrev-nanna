<!-- Header Section -->
<?php
include_once('./_common.php');
include_once('./_head.sub.php');

if( function_exists('social_check_login_before') ){
    $social_login_html = social_check_login_before();
}

$g5['title'] = '로그인';

$url = isset($_GET['url']) ? strip_tags($_GET['url']) : '/main/home.php';
$od_id = isset($_POST['od_id']) ? safe_replace_regex($_POST['od_id'], 'od_id') : '';

// url 체크
check_url_host($url);
// 이미 로그인 중이라면
if ($is_member) {
    if ($url)
        goto_url($url);
    else
        goto_url(G5_URL);
}

$login_url        = login_url($url);
$login_action_url = G5_HTTPS_BBS_URL."/login_check.php";

// 로그인 스킨이 없는 경우 관리자 페이지 접속이 안되는 것을 막기 위하여 기본 스킨으로 대체
//$login_file = $member_skin_path.'/login.skin.php';
//if (!file_exists($login_file))
 //   $member_skin_path   = G5_SKIN_PATH.'/member/basic';

?>

<?php  require_once "./inc/header.php";?>
<!-- First slide -->
	<div class="grow flex flex-col items-center justify-center">
			<div>
				<div>
					<img src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" class="w-24 m-auto" />
				</div> 
				<div class="block p-6  bg-white max-w-sm">
                    <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
                        <input type="hidden" name="url" value="<?php echo $login_url ?>">
					    <div class="form-group mb-6"> 
					      <input type="text" name="mb_id" id="login_id" size="20" maxLength="20" placeholder="아이디" class="form-control
					        block
					        w-full
					        px-3
					        py-1.5
					        text-base
					        font-normal
					        text-gray-700
					        bg-white bg-clip-padding
					        border border-solid border-gray-300
					        rounded
					        transition
					        ease-in-out
					        m-0
					        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"  placeholder="ID">
					      <small id="emailHelp" class="block mt-1 text-xs text-gray-600">We'll never share your email with anyone
					        else.</small>
					    </div>
					    <div class="form-group mb-6"> 
					      <input type="password" name="mb_password" id="login_pw" size="20" maxLength="20" placeholder="비밀번호" class="form-control block
					        w-full
					        px-3
					        py-1.5
					        text-base
					        font-normal
					        text-gray-700
					        bg-white bg-clip-padding
					        border border-solid border-gray-300
					        rounded
					        transition
					        ease-in-out
					        m-0
					        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputPassword1"
					        placeholder="PW">
					    </div>
					    <div class="form-group form-check mb-6">
					      <input type="checkbox"
					        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                 name="auto_login" id="login_auto_login">
					      <label class="form-check-label inline-block text-gray-800" for="login_auto_login">Check me out</label>
					    </div>
					    <button type="submit" class="
					      px-6
					      py-2.5
					      bg-blue-600
					      text-white
					      font-medium
					      text-xs
					      leading-tight
					      uppercase
					      rounded
					      shadow-md
					      hover:bg-blue-700 hover:shadow-lg
					      focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
					      active:bg-blue-800 active:shadow-lg
					      transition
					      duration-150
					      ease-in-out">LOGIN</button> 
					      <div>
						      <div>Don't have an account yet? </div>
						      <a href="/signup.php" class="underline underline-offset-4 text-blue-600">Sign up</a>
					      </div>
				  </form>
				</div> 
			</div>
	</div>



<!-- from header div element -->
</div>


 
 <!-- Fixed Menu --> 
<?php require_once "./inc/fixed-menu.php"; ?>
 
<!-- Footer Section -->
<?php require_once "./inc/footer.php"; ?>


<script type="text/javascript">
    jQuery(function($){
        $("#login_auto_login").click(function(){
            if (this.checked) {
                this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
            }
        });
    });

    function flogin_submit(f)
    {
        if( $( document.body ).triggerHandler( 'login_sumit', [f, 'flogin'] ) !== false ){
            return true;
        }
        return false;
    }

</script>
