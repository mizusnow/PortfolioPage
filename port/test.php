<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ゆきみずも.com</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=540px">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./font/font-awesome/css/font-awesome.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="./js/jquery.smoothScroll.js"></script>
	<script src="./js/back.js"></script>
	<script>
	$(function(){
	    var setElm = $('.scrImg'),
	    delayHeight = 100;
	 
	    setElm.css({'margin-left':'-200px',display:'block',opacity:'1'});
	    $('html,body').animate({scrollTop:0},1);
	 
	    $(window).on('load scroll resize',function(){
	        setElm.each(function(){
	            var setThis = $(this),
	            elmTop = setThis.offset().top,
	            elmHeight = setThis.height(),
	            scrTop = $(window).scrollTop(),
	            winHeight = $(window).height();
	            if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
	                setThis.stop().animate({'margin-left':'0',opacity:'1'},800);
	            } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
	                setThis.stop().animate({'margin-left':'-200px',opacity:'0'},800);
	            }
	        });
	    });
		//モーダルウィンドウ関連
		$(function($){
			var samuneArray = new Array($(".samune").length);
			var modalArray = new Array($(".modal").length);
			for(var i=0;i<$(".samune").length;i++){
				samuneArray[i] = $(".samune").eq(i);
				modalArray[i] = $(".modal").eq(i);
			}
			function viewModal(i){
				//モーダル起動
				samuneArray[i].click(function(){
					$("body").append('<div id="modal_back"></div>');
					$("#modal_back").css({'display':'block',opacity:'0'});
					$("#modal_back").animate({opacity:'1'},500);
					modalArray[i].css({display:'block',opacity:'0'});
					modalArray[i].animate({opacity:'1'},500);
				});
				//モーダル終わり
				modalArray[i].click(function(){
					modalArray[i].animate({opacity:'0'},{
						duration:500,complete:function(){
							modalArray[i].css({display:'none'});
						}
					});
					$("#modal_back").animate({opacity:'0'},{
						duration:500,complete:function(){
							$("#modal_back").remove();
						}
					});
				});
			}
			for(var i=0; i<samuneArray.length;i++){
				viewModal(i);
			}
		});

	});
	</script>
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
</head>
<body>
	<div id="wrapper">
	<canvas id="canvas_back" width="100%" height="100%"></canvas>
	</div>
	<header>
		<nav>
			<ol id="menu">
				<a href="#first"><li>first</li></a>
				<a href="#me"><li>me</li></a>
				<a href="#works"><li>works</li></a>
				<a href="#contact"><li>contact</li></a>
			</ol>
		</nav>
	</header>
	<div id="main">
			<section class="content" id="first">
				<h1>YukiMizumo<span class="red">.</span>com</h1>
				<p id="top_title">水野由貴のサイト</p>
				<aside class="hosoku">
					<p>まだまだ未熟な学生が作る、未完成なサイトです。</p>
					<p><span class="red">”</span>好き<span class="red">”</span>を詰め込んで作りました。</p>
				</aside>
			</section>
			<section class="content" id="me">
				<div class="center_cont">
					<p><img src="./img/IMG_2623mini.png" class="scrImg fl" alt="photo"></p>
					<div id="prof">
						<h2>about me</h2>
						<p>
							<ol>
								<li>水野由貴　MizunoYuki</li>
								<li>1993 / 07 / 24 (現在21歳)</li>
								<li>岐阜県多治見市出身→名古屋市在住</li>
								<li>名古屋市立大学　芸術工学部　在学中</li>
								<li>就職活動中</li>
							</ol>
						</p>
						<aside class="hosoku2">
							<p>
								<ol>
									<li>html5,phpを猛勉強中</li>
									<li>jsももっと使えるようになりたい</li>
									<li>3Dも気になる…。</li>
									<li>名古屋で就職したい</li>
								</ol>
							</p>
						</aside>
					</div>
				</div>
			</section>
			<section class="content desfl" id="works">
				<h2>works</h2>
				<div class="samune shadow rad center_cont">
					<img src="./img/a3_s.png" alt="">
					<table>
						<tr><td colspan="2" class="tit_work">JavaScriptを用いたブラウザアプリ</td></tr>
						<tr><td>(iPhone対応)</td></tr>
						<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr>
							<td>個人製作</td>
							<td></td>
						</tr>
						<tr>
							<td>製作時期：</td>
							<td>2013.08(卓展)</td>
						</tr>
					</table>
				</div>
				<div class="modal rad shadow">
					<div class="modal_nakami">
						<p class="tit_work">JavaScriptを用いたブラウザアプリゲーム</p>
						<div>
							<p>２ヶ月ほどJavaScriptを勉強していました。</p>
							<p>アプリ自体は１週間弱で作ったものです。</p>
							<p>当時自分が使っていたiPhone4Sサイズで作っています。</p>
							<p>CreateJSというライブラリを使用しています。</p>
						</div>
					</div>
				</div>
				<div class="samune shadow rad">
					<img src="./img/a2_s.png" alt="">
					<table>
						<tr><td colspan="2" class="tit_work">「身体的錯覚」をテーマにした展示物</td></tr>
						<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
							<td>グループ製作:</td>
							<td>5名</td>
						</tr>
						<tr>
							<td>担当：</td>
							<td>リーダー, Processing, Arduino</td>
						</tr>
						<tr>
							<td>製作時期：</td>
							<td>2014.12 - 2015.01</td>
						</tr>
					</table>
				</div>
				<div class="modal rad shadow">
					<div class="modal_nakami">
						<p class="tit_work">「身体的錯覚」をテーマにした展示物</p>
						<div>
							<p>岐阜県柳ヶ瀬のビッカフェさんで行われた研究室の展示会に合わせて、</p>
							<p>私含め当時の３年生５人で製作にあたりました。</p>
							<p>計画の段階ではUnityとArduinoを使用する予定だったのですが、</p>
							<p>いざ連携させようとするとうまくいかず…。（※提出3日前）</p>
							<p>Unity担当と相談した結果、並行してProcessingでも製作しておくことに。</p>
							<p>結局、残念ながらUnityは断念し、Processingでの展示となりました。</p>
						</div>
					</div>			
				</div>
				<div class="samune shadow rad">
					<img src="./img/a1_s.png" alt="">
					<table>
						<tr><td colspan="2" class="tit_work">アクセサリの企画・製作・販売</td></tr>
						<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr>
							<td>グループ製作:</td>
							<td>5名</td>
						</tr>
						<tr>
							<td>担当：</td>
							<td>リーダー, 全行程</td>
						</tr>
						<tr>
							<td>製作時期：</td>
							<td>2014.05 - 2014.08</td>
						</tr>
					</table>
				</div>
				<div class="modal rad shadow">
					<div class="modal_nakami">
						<p class="tit_work">アクセサリの企画・製作・販売</p>
						<div>
							<p>　総勢21名が5つのグループに分かれ、それぞれのグループが「五感」の１つを担当して製作にあたりました。<br>
							　私が所属するグループは「触覚」を担当しました。<br>
							　後輩とのグループ活動は初めてだったので、話し合いを活発化させることが第一関門となりました。</p>
							<p>　「羽」をモチーフに、布選び・色にこだわりました。<br>
							　また、マーブリングで染め、一点物としての価値も大切にしました。</p>
						</div>
					</div>
				</div>
			</section><!--worksおわり-->
			<section class="content" id="contact">
				<h2>contact</h2>
				<p>なんかいろいろ！！</p>
				<p>ああああああああああ</p>
				<p>ああああああああああ</p>
				<p>ああああああああああ</p>
				<p>ああああああああああ</p>
				<p>ああああああああああ</p>
				<p>ああああああああああ</p>
			</section>
	</div>
	<footer>
		<p>製作2015.05.9-</p>
	</footer>
</body>
</html>