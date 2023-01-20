<!-- Header Section -->
<?php

?>
</style>
<?php
include_once('./_common.php');
require_once "./inc/header.php";
include_once('./_head.sub.php');

$sql = " select *,FN_CODE('quiz_type',a.quiz_type) quiz_type_name from nan_quiz a left join nan_quiz_data_file b on b.file_idx = a.file_id where a.del_yn = 'n' limit 0,5  ";
$result_recent = sql_query($sql);


?>



<script>

    function list_load(){
        var data = new FormData();
        data.append("type", "get_main_list")
        data.append("name", $('#name').val());
        $.ajax({
            url: "ajaxProc.php",
            type: 'post',
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data)
            {
                if (data.code == "200")
                {
                    $.each(data.data , function(index , element){
                        alert(element);
                    });

                }else{
                    alert(data.msg);
                    return false;
                }
            },
            error: function (e)
            {
                alert("에러 : " + e.responseText);
            }
        });
    }
</script>
<!-- First slide -->
	<div class=" mt-2 ">
			<div class="flex flex-row items-center justify-between "> 
				<div class="flex flex-row">

 
					<p> Recent </p> 

					<span>  </span>  </div>
			</div> 

			<div class="relative overflow-x-hidden w-full"  >
				<div class="relative">
                    <div class="text-white text-4xl w-10  flex items-center justify-center font-bold cursor-pointer bg-gradient-to-r from-slate-600 absolute left-0" id="home-arrow-left" rel="home-recent-panel-recent"> < </div>
					<ul class="flex flex-row gap-2 overflow-x-auto min-[639px]:overflow-x-auto home-recent-panel-recent" id="home-recent-panel">
                        <?php for ($i=0; $recent_row=sql_fetch_array($result_recent); $i++) { ?>
					  	<li onclick="location.href='/main/wiki-detail.php?quiz_idx=<?=$recent_row['quiz_idx']?>'">
							<!!-img class="w-full" src="<?=$recent_row['full_url']?>" alt="Mountain"-->
                            <img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2"><?=$recent_row['quiz_subject']?></div>
								<p class="text-gray-700 text-base">
									<?=$recent_row['quiz_type_name']?>
								</p>
							</div> 
					    </li>
                        <?php } ?>
					</ul>   
						<div class="text-white text-4xl w-10  h-full flex items-center justify-center font-bold cursor-pointer bg-gradient-to-l from-slate-600  absolute right-0 top-0" id="home-arrow-right" rel="home-recent-panel-recent"> > </div>
				</div> 
		</div> 
	</div>

<!-- Second slide --> 

	<div class=" mt-2 ">
			<div class="flex flex-row items-center justify-between "> 
				<div class="flex flex-row">

					<p> Recommend </p> 

					<span> > </span>  </div> 
			<!-- 	<div>
		        	<img class="w-5 h-5"  src="/img/ellipsis-solid.svg" /> 
		    	</div> -->
			</div> 

			<div class="relative overflow-x-hidden w-full"  >
				<div class="relative">

	<!-- 				<div class="absolute flex flex-row justify-between w-full top-0 h-full items-center" id="home-arrow">
				 -->						
							<div class="text-white text-4xl w-10  flex items-center justify-center font-bold cursor-pointer bg-gradient-to-r from-slate-600 absolute left-0" id="home-arrow-left" rel="home-recent-panel-recommend"> < </div>
				<!-- 	</div>
 -->

					<ul class="flex flex-row gap-2 overflow-x-auto min-[639px]:overflow-x-auto home-recent-panel-recommend" id="home-recent-panel">   
					  	<li >
							<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">Mountain 1 </div>
								<p class="text-gray-700 text-base">
									Quiz
								</p>
							</div> 
					    </li>

					  	<li>
							<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">Mountain 2</div>
								<p class="text-gray-700 text-base">
									Quiz
								</p>
							</div> 
					    </li>  


					  	<li>
							<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">Mountain 3 </div>
								<p class="text-gray-700 text-base">
									Quiz
								</p>
							</div> 
					    </li>  

					  	<li>
							<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">Mountain 4</div>
								<p class="text-gray-700 text-base">
									Quiz
								</p>
							</div> 
					    </li>  

					  	<li>
							<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">Mountain 5</div>
								<p class="text-gray-700 text-base">
									Quiz
								</p>
							</div> 
					    </li>    
					</ul>  





						<div class="text-white text-4xl w-10  h-full flex items-center justify-center font-bold cursor-pointer bg-gradient-to-l from-slate-600  absolute right-0 top-0" id="home-arrow-right" rel="home-recent-panel-recommend"> > </div>
				</div> 
		</div> 
	</div>





<!-- Third slide --> 

	<div class=" mt-2 ">
			<div class="flex flex-row items-center justify-between "> 
				<div class="flex flex-row">

					<p> Similar </p>  
					<span> > </span>  </div>  
			</div> 

			<div class="relative overflow-x-hidden w-full"  >
				<div class="relative"> 					
							<div class="text-white text-4xl w-10  flex items-center justify-center font-bold cursor-pointer bg-gradient-to-r from-slate-600 absolute left-0" id="home-arrow-left" rel="home-recent-panel-similar"> < </div> 

					<ul class="flex flex-row gap-2 overflow-x-auto min-[639px]:overflow-x-auto home-recent-panel-similar" id="home-recent-panel">   
					  	<li >
							<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">Mountain 1 </div>
								<p class="text-gray-700 text-base">
									Quiz
								</p>
							</div> 
					    </li>

					  	<li>
							<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">Mountain 2</div>
								<p class="text-gray-700 text-base">
									Quiz
								</p>
							</div> 
					    </li>  


					  	<li>
							<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">Mountain 3 </div>
								<p class="text-gray-700 text-base">
									Quiz
								</p>
							</div> 
					    </li>  

					  	<li>
							<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">Mountain 4</div>
								<p class="text-gray-700 text-base">
									Quiz
								</p>
							</div> 
					    </li>  

					  	<li>
							<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">Mountain 5</div>
								<p class="text-gray-700 text-base">
									Quiz
								</p>
							</div> 
					    </li>    
					</ul>  





						<div class="text-white text-4xl w-10  h-full flex items-center justify-center font-bold cursor-pointer bg-gradient-to-l from-slate-600  absolute right-0 top-0" id="home-arrow-right" rel="home-recent-panel-similar"> > </div>
				</div> 
		</div> 
	</div>

<!-- Second slide --> 
	<!-- <div class="mt-2">
			<div class="flex flex-row items-center justify-between "> 
				<div>Recommend > </div>  
			</div> 

			<div class="relative overflow-x-hidden w-full" >
				<div class="relative">
					<ul class="flex flex-row gap-2 overflow-x-auto min-[639px]:overflow-x-auto ">   
					  	<li >
								<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
								<div class="px-6 py-4">
									<div class="font-bold text-xl mb-2">Mountain</div>
									<p class="text-gray-700 text-base">
										Quiz
									</p>
								</div> 
					    </li>

					  	<li>
								<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
								<div class="px-6 py-4">
									<div class="font-bold text-xl mb-2">Mountain</div>
									<p class="text-gray-700 text-base">
										Quiz
									</p>
								</div> 
					    </li>  


					  	<li>
								<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
								<div class="px-6 py-4">
									<div class="font-bold text-xl mb-2">Mountain</div>
									<p class="text-gray-700 text-base">
										Quiz
									</p>
								</div> 
					    </li>  

					  	<li>
								<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
								<div class="px-6 py-4">
									<div class="font-bold text-xl mb-2">Mountain</div>
									<p class="text-gray-700 text-base">
										Quiz
									</p>
								</div> 
					    </li>  

					  	<li>
								<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
								<div class="px-6 py-4">
									<div class="font-bold text-xl mb-2">Mountain</div>
									<p class="text-gray-700 text-base">
										Quiz
									</p>
								</div> 
					    </li>    
					</ul>  
				</div> 
		</div> 
	</div> -->

 
<!-- Third slide --> 
	<!-- <div class=" mt-2 ">
			<div class="flex flex-row items-center justify-between "> 
				<div>Similar> </div>  
			</div> 

			<div class="relative overflow-x-hidden w-full" >
				<div class="relative">
					<ul class="flex flex-row gap-2 overflow-x-auto min-[639px]:overflow-x-auto ">   
				  	<li >
							<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">Mountain</div>
								<p class="text-gray-700 text-base">
									Quiz
								</p>
							</div> 
				    </li>

				  	<li>
							<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">Mountain</div>
								<p class="text-gray-700 text-base">
									Quiz
								</p>
							</div> 
				    </li>  


				  	<li>
							<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">Mountain</div>
								<p class="text-gray-700 text-base">
									Quiz
								</p>
							</div> 
				    </li>  

				  	<li>
							<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">Mountain</div>
								<p class="text-gray-700 text-base">
									Quiz
								</p>
							</div> 
				    </li>  

				  	<li>
							<img class="w-full" src="https://thumbnail.imgbin.com/9/18/6/imgbin-page-page-eqEzfq0Wp9LUg5dSNaPraVN1v_t.jpg" alt="Mountain">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">Mountain</div>
								<p class="text-gray-700 text-base">
									Quiz
								</p>
							</div> 
				    </li>    
					</ul>  
				</div> 
		</div> 
	</div>  -->
 <!-- Fixed Menu --> 
<?php require_once "./inc/fixed-menu.php"; ?> 
 
<!-- Footer Section -->
<?php require_once "./inc/footer.php"; ?>


<script type="text/javascript">


    var imgHeight = $('ul#home-recent-panel > li > img').height();
    $('div.home-arrow-left, div.home-arrow-right').height(imgHeight + 'px');

    /*recent*/
    var hrpW = $('ul#home-recent-panel > li').width();
    var hrpLength = $("ul#home-recent-panel > li").length;
    /*end recent*/




    /*recent*/
    var hrpWRecommend = $('ul#home-recent-panel > li').width();
    var hrpLengthRecommend = $("ul#home-recent-panel > li").length;
    /*end recent*/


    var num = 0;
    var numRecent = 0;
    var numRecommend = 0;
    var numSimilar = 0;
    totalLengthCount = hrpW * hrpLength;
    totalLengthCountRecommend = hrpWRecommend * hrpLengthRecommend;


    var defaultScrollHomePage = $('ul#home-recent-panel').scrollLeft();

    $('ul.home-panel-recent').on('touchmove', function() {
        defaultScrollHomePage = $('ul.home-panel-recent').scrollLeft();

        if(defaultScrollHomePage >= hrpW){
            $('div.home-arrow-left-recent').removeClass('hidden');
        }else{
            $('div.home-arrow-left-recent').addClass('hidden');
        }

        if(defaultScrollHomePage >= (totalLengthCount - (hrpW * 2) )){
            $('div.home-arrow-right-recent').addClass('hidden');
        }else{
            $('div.home-arrow-right-recent').removeClass('hidden');
        }


        numRecent = defaultScrollHomePage
    });

    // $('ul.home-panel-recommend').on('touchmove', function() {
    // defaultScrollHomePage = $('ul.home-panel-recommend').scrollLeft();
    // numRecommend = defaultScrollHomePage
    // });
    //
    //
    // $('ul.home-panel-recent').on('touchmove', function() {
    // defaultScrollHomePage = $('ul.home-panel-recent').scrollLeft();
    // numSimilar = defaultScrollHomePage
    // });
    //
    if($('ul.home-panel-recent').scrollLeft() <= hrpW ){
        $('div.home-arrow-left-recent').addClass('hidden');
    }


    $('div.home-arrow-right').on('touchstart', function(){
        var dataRight = $(this).attr('rel');



        if(dataRight == 'home-panel-recent'){
            if(numRecent >= (totalLengthCount - (hrpW * 2) )){
                numRecent = totalLengthCount;
                $('div.home-arrow-right-recent').addClass('hidden')
            }else{
                $('div.home-arrow-left-recent').removeClass('hidden');
                numRecent +=hrpW;
            }

            $('ul.'+dataRight).scrollLeft( numRecent );

        }else if(dataRight == 'home-panel-recommend'){

            if(numRecommend >= totalLengthCountRecommend){
                numRecommend = totalLengthCountRecommend;
                $('div.home-arrow-right-recommend').addClass('hidden')
            }else{

                $('div.home-arrow-left-recommend').removeClass('hidden');
                numRecommend +=hrpWRecommend;
            }
            $('ul.'+dataRight).scrollLeft( numRecommend );
        }
        //
        // else{
        //
        // 	if(numSimilar >= totalLengthCount){
        // 		numSimilar = totalLengthCount;
        // 	}else{
        // 		numSimilar +=hrpW;
        // 	}
        // 	$('ul.'+dataRight).scrollLeft( numSimilar );
        // }
    })

    $('div.home-arrow-left').on('touchstart', function(){
        var dataLeft =$(this).attr('rel');
        if(dataLeft == 'home-panel-recent'){
            if(numRecent <= hrpW){
                $(this).addClass('hidden')
                numRecent = 0;
            }else{
                $('div.home-arrow-right-recent').removeClass('hidden');
                numRecent-=hrpW;
            }
            $('ul.'+dataLeft).scrollLeft( numRecent );
        }
        // else if(dataLeft == 'home-panel-recommend'){
        // 	if(numRecommend <= hrpW){
        // 		numRecommend = 0;
        // 	}else{
        // 		numRecommend-=hrpW;
        // 	}
        // 	$('ul.'+dataLeft).scrollLeft( numRecommend );
        // }else{
        // 	if(numSimilar <= hrpW){
        // 		numSimilar = 0;
        // 	}else{
        // 		numSimilar-=hrpW;
        // 	}
        //
        // 	$('ul.'+dataLeft).scrollLeft( numSimilar );
        // }

    })


    //
    // console.log('inner height: '+window.innerHeight );
    // console.log('inner scrolly: '+window.scrollY );
    // console.log('body: '+ $('body').height());
    //
    //
    // console.log('document height: '+$(document).height() );
    //

</script>
