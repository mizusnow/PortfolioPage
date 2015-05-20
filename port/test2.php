
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
	<script type="text/javascript" src="./js/jquery_1.7.1_jquery.min.js"></script>
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
			var modalEndArray = new Array($(".modal_end").length);
			for(var i=0;i<$(".samune").length;i++){
				samuneArray[i] = $(".samune").eq(i);
				modalArray[i] = $(".modal").eq(i);
				modalEndArray[i] = $(".modal_end").eq(i);
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
				modalEndArray[i].click(function(){
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
<?php
	mb_language("japanese");
	mb_internal_encoding("UTF-8");

	if(!empty($_POST["name"])){
		$name = $_POST["name"];
		$address = $_POST["address"];
		$title = $_POST["title"];
		if(!empty($_POST["res"])) {
			$res = $_POST["res"];
		}else{
			$res = "不要";
		}
		$message = $_POST["message"];
		$myaddress = "mizusnow@gmail.com";

		$send_title = "メールフォームテスト";
		$send_message = '名前：'.$name.'\nメールアドレス：'.$address.'\n件名：'.$title.'\n返信：'.$res.'\n内容\n'.$message;
		$check = true;

		if($check){
		 	echo "<script type='text/javascript'>";
		 	echo "alert(";
		 	echo "'送信完了しました！".'\nありがとうございます！\n\n';
		 	//echo $send_message;
		 	echo '\n\n'.'※実際には送信していません！\n（まだセキュリティ面が不十分な為,mb_send_mail()はコメントアウトしています）'."'";
		 	echo ");";
		 	echo "</script>";
		}else{
			echo "<script type='text/javascript'>";
			echo "alert('送信失敗しました…');";
			echo "</script>";			
		}
	}
?>
</head>
<body>
	<div id="wrapper">
	<canvas id="canvas_back" width="100%" height="100%"></canvas>
	</div>
	<header>
		<nav>
			<ol id="menu">
				<a class="rad" href="#first"><li>first</li></a>
				<a class="rad" href="#me"><li>me</li></a>
				<a class="rad" href="#works"><li>works</li></a>
				<a class="rad" href="#contact"><li>contact</li></a>
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
						<p><a href="./canvas/" target="_blank">→実際に動かしてみる！</a></p>
						<p class="modal_end">×とじる</p>
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
						<img src="./img/work_photo/biccafe1_200.jpg">
						<img src="./img/work_photo/biccafe2_200.jpg">
						<p>岐阜県柳ヶ瀬のビッカフェさんで行われた研究室の展示会に合わせて、</p>
						<p>私含め当時の３年生５人で製作にあたりました。</p>
						<p class="modal_end">×とじる</p>
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
						<img src="./img/work_photo/materi2_200.jpg">
						<img src="./img/work_photo/materi3_200.jpg">
						<p>卓全体のテーマは「五感」、私のグループの担当は「触覚」でした。</p>
						<p>「羽」をモチーフに、布選び・色にこだわりました。</p>
						<p>マーブリングで染め、一点物としての価値も大切にしました。</p>
						<p class="modal_end">×とじる</p>
					</div>
				</div>
			</div>
		</section><!--worksおわり-->
		<section class="content" id="contact">
			<h2>contact</h2>
			<form method="post" action="test2.php" class="rad">
				<table>
					<tr>
						<td>名前</td>
						<td><input type="text" name="name" size="40"></td>
					</tr>
					<tr>
						<td>メールアドレス</td>
						<td><input type="text" name="address" size="40"></td>
					</tr>
					<tr>
						<td>件名</td>
						<td><input type="text" name="title" size="40"></td>
					</tr>
					<tr>
						<td>要返信</td>
						<td><input type="checkbox" name="res" value="必要"></td>
					</tr>
					<tr>
						<td>本文</td>
						<td><textarea name="message" cols="40" rows="4"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="送信"></td>
					</tr>
				</table>
			</form>
		</section>
	</div>
	<footer>
		<p>製作2015.05.9-</p>
		<p>html5, css3, jQuery, JavaScript, php 勉強中！</p>
		<p>メールフォームはpost送信→受信まで　※実際にメールサーバは構築してません</p>
	</footer>
</body>
</html>
