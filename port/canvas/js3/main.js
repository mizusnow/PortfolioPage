var check = 'on';//moveするかいなか。
var speed = 100;
var LevelImage;
var StartImage;
var WinImage;
var LoseImage;
var CatImage;
var SayImage;
var Say;
var MemoImage;
var WhichImage;
var Rank;
var RankImage;
var canvas;
var main;
var stage;
var container;
var CircleImg;
var BackImage;
var TitleImage;
var KeyImage;
var Key;
var type;
var Circle;
var FPS = 24;
var k;
var S;
var moveNum = 7;
var ans = 'B';
var LoadImage;
var WincatImage;
var Which;
var ok;
var sp;
var Pick;
var Sstage;

window.onload = function (){

  	var pre = [
		{src: './img3/title.png', id: 'TitleImage'},
		{src: './img3/back.jpg', id: 'BackImage'},
		{src: './img3/key.png', id: 'KeyImage'},
		{src: './img3/rank0.png', id: '0'},
		{src: './img3/rank1.png', id: '1'},
		{src: './img3/rank2.png', id: '2'},
		{src: './img3/level.png', id: 'LevelImage'},
		{src: './img3/win.png', id: 'WinImage'},
		{src: './img3/lose.png', id: 'LoseImage'},
		{src: './img3/start.png', id: 'StartImage'},
		{src: './img3/cat.png', id: 'CatImage'},
		{src: './img3/memo.png', id: 'MemoImage'},
		{src: './img3/which.png', id: 'WhichImage'},
		{src: './img3/say.png', id: 'SayImage'},
		{src: './img3/Wincat.png', id: 'WincatImage'},
		{src: './img3/circle.png', id: 'CircleImage'},
		{src: 'sound/bgm.mp3|hoge.wav', id: 'hoge'}
	];

	preload = new createjs.LoadQueue(false);
	preload.loadManifest(pre, true);
	preload.addEventListener("complete",function(){
		start();
	})

}

//スタートボタン
function start(){

	ok = 'Yes';
	canvas = document.getElementById("canvas");
	main = document.getElementById("main");

	stage = new createjs.Stage(canvas);
	stage.enableMouseOver(10);
	stage.mouseMoveOutside = true;

	createjs.Ticker.setFPS(FPS);
	createjs.Ticker.addListener(stage);

	container = new createjs.Container();
	container.alpha = 0;
	stage.addChild(container);

	var container2 = new createjs.Container();
	container2.alpha = 0;
	stage.addChild(container2);

	createjs.Tween.get(container)
	.to({alpha:1},300)
	createjs.Tween.get(container2)
	.to({alpha:1},300)

	BackImage = new Image();
	BackImage.src = './img3/back.jpg';
	var Back = new createjs.Bitmap(BackImage);
	Back.regX = BackImage.width/2;
	Back.regY = BackImage.height/2;
	Back.x = canvas.width/2;
	Back.y = canvas.height/2;
	container.addChild(Back);

	TitleImage = new Image();
	TitleImage.src = './img3/title.png';
	var Title = new createjs.Bitmap(TitleImage);
	Title.regX = TitleImage.width/2;
	Title.regY = TitleImage.height/2;
	Title.x = canvas.width/2;
	Title.y = canvas.height/3;
	container2.addChild(Title);

	RankImage = new Array(3);
	Rank = new Array(3);
	for(var j = 0; j < 3; j++){
		RankImage[j] = new Image();
		RankImage[j] = './img3/rank'+j+'.png';
		Rank[j] = new createjs.Bitmap(RankImage[j]);
		//なぜかregの指定ができない。
		Rank[j].x = canvas.width/2 - 50;
		Rank[j].y = canvas.height/5*3 + j*30;
		container2.addChild(Rank[j]);
	}

	LevelImage = new Image();
	LevelImage.src = './img3/level.png';
	var Level = new createjs.Bitmap(LevelImage);
	Level.regX = LevelImage.width/2;
	Level.regY = LevelImage.height/2;
	Level.x = canvas.width/2;
	Level.y = Rank[0].y - 20;
	container2.addChild(Level);
	stage.update();

	var num;
	Rank[0].onClick = function (){
		//modo(0);
		if(ok == 'Yes'){
			num=0;
			modo(num);
			ok='no';
		}
	};
	Rank[1].onClick = function(){
		//modo(1);
		if(ok == 'Yes'){
			num=1;
			modo(num);
			ok ='no';
		}
	}
	Rank[2].onClick = function(){
		//modo(2);
		if(ok == 'Yes'){
			num=2;
			modo(num);
			ok ='no';
		}
	}


	function modo(k){
		console.log('mode()  k='+k);
		if(k == 0){
			sp = 1000;
		}else if(k == 1){
			sp = 500;
		}else if (k == 2){
			sp =100;
		}
		speed = sp;
		createjs.Tween.get(Rank[k])
		.to({alpha:0}, 500)
		.to({alpha:1}, 500)
		
		createjs.Tween.get(container2)
		.wait(1500)
		.to({alpha:0}, 1000)
		.call(function(){
			container2.removeChild(Title);
			delete Title;
			for(var j = 0; j < 3; j++){
				container2.removeChild(Rank[j]);
				delete Rank[j];
			}
			container2.removeChild(Level);
			delete Level;
			play();
		})
	}
}

//材料表示。
function play(){
	console.log('play()');
	KeyImage = new Image();
	KeyImage.src = './img3/key.png';
	Key = new createjs.Bitmap(KeyImage);
	Key.regX = KeyImage.width/2;
	Key.regY = KeyImage.height/2;
	Key.x = canvas.width/4;
	Key.y = canvas.height/2;
	Key.alpha = 0;
	container.addChild(Key);
	createjs.Tween.get(Key)
	.wait(300)
	.to({alpha:1},100)

	CircleImage = new Image();
	CircleImage.src = './img3/circle.png';
	Circle = new Array(3);
	for(var i = 0; i < 3; i++){
		Circle[i] = new createjs.Bitmap(CircleImage);
		Circle[i].regX = CircleImage.width/2;
		Circle[i].regY = CircleImage.height/2;
		Circle[i].y = canvas.height/2;
		Circle[i].x = canvas.width/4 + (canvas.width/4 * i);
		Circle[i].alpha = 0;
		container.addChild(Circle[i]);
	}
	stage.update();
	for(var i = 0; i < 3; i++){
		createjs.Tween.get(Circle[i])
		.to({alpha:1},300)
	}

	startmove();
}

//Keyを見せる動作。
function startmove(){
	console.log('startmove()');
	CatImage = new Image();
	CatImage.src = './img3/cat.png';
	var Cat = new createjs.Bitmap(CatImage);
	Cat.x = -CatImage.width;
	Cat.y = canvas.height/6*1;
	container.addChild(Cat);

	SayImage = new Image();
	SayImage.src = './img3/say.png';
	Say = new createjs.Bitmap(SayImage);
	Say.regX = SayImage.width/2;
	Say.regY = SayImage.height/2;
	Say.x = canvas.width/5*2;
	Say.y = Cat.y;
	Say.alpha = 0;
	container.addChild(Say);

	MemoImage = new Image();
	MemoImage.src ='./img3/memo.png';
	var Memo = new createjs.Bitmap(MemoImage);
	Memo.regX = MemoImage.width/2;
	Memo.regY = MemoImage.height/2;
	Memo.x = Say.x;
	Memo.y = Say.y;
	Memo.alpha = 0;
	container.addChild(Memo);

	stage.update();

	createjs.Tween.get(Circle[0])
	.call(function(){
		createjs.Tween.get(Cat)
		.to({x:0}, 1000)
		.call(function(){
			createjs.Tween.get(Say)
			.to({alpha:1}, 500)
			.call(function(){
				createjs.Tween.get(Memo)
				.to({alpha:1}, 100)
			})
		})
	})
	.wait(2600)
	.to({y:canvas.height/2 - CircleImage.height}, 1000)
	.wait(500)
	.call(function(){
		createjs.Tween.get(Key)
		.to({y:Key.y - 10}, 100)
		.to({y:Key.y},100)
	})
	.wait(1200)
	.to({y:canvas.height/2}, 1000)
	.wait(1000)
	.call(function(){
		StartImage = new Image();
		StartImage.src = './img3/start.png';
		var Start = new createjs.Bitmap(StartImage);
		Start.regX = StartImage.width/2;
		Start.regY = StartImage.height/2;
		Start.x = Say.x;
		Start.y = Say.y;
		Start.alpha = 0;
		container.addChild(Start);
		stage.update();

		createjs.Tween.get(Memo)
		.to({alpha:0}, 300)


		createjs.Tween.get(Start)
		.wait(300)
		.to({alpha:1}, 300)
		.wait(500)
		.to({alpha:0}, 300)
	})
	.wait(1400)
	.call(function(){
		createjs.Tween.get(Say)
		.to({alpha:0}, 300)
	})
	.wait(1000)
	.call(function(){
		k = 0;
		move();
	})
}

function move(){
	console.log('move()');
	check = 'off';
	var xxx = Math.floor(Math.random() * 3);
	var yyy = Math.floor(Math.random() * 3);
	while(xxx==yyy){
		yyy = Math.floor(Math.random() * 3);
	}

	console.log('xxx='+xxx);
	console.log('yyy='+yyy);

	if(xxx == 0){
		createjs.Tween.get(Key)
		.to({x:Circle[yyy].x},speed)
	}else if(yyy == 0){
		createjs.Tween.get(Key)
		.to({x:Circle[xxx].x}, speed)
	}

	createjs.Tween.get(Circle[yyy])
	.to({x:Circle[xxx].x},speed)

	createjs.Tween.get(Circle[xxx])
	.to({x:Circle[yyy].x},speed)
	.wait(500)
	.call(function(){
		if(k < moveNum){
			k++;
			console.log('k='+k);
			move();
		}else{
			console.log('end');
			Pick = 'Yes';
			select();
		}
	})
}

function select(){
	Pick = 'Yes';

	console.log('select()');
	WhichImage = new Image();
	WhichImage.src = './img3/which.png';
	Which = new createjs.Bitmap(WhichImage);
	Which.regX = WhichImage.width/2;
	Which.regY = WhichImage.height/2;
	Which.x = Say.x;
	Which.y = Say.y;
	Which.alpha = 0;
	container.addChild(Which);

	stage.update();

	createjs.Tween.get(Say)
	.to({alpha:1}, 300)
	createjs.Tween.get(Which)
	.to({alpha:1}, 300)
	var num;
	ans = 'B';//
	//container.removeEventListener('click', startmove);

	Circle[0].onPress = function(e){
		if(Pick == 'Yes'){
			Pick = 'No';
			ans = 'A';
			done(0);
		}
	}
	
	Circle[1].onPress = function(e){
		if(Pick == 'Yes'){
			Pick = 'No';
			done(1);
		}
	}
	
	Circle[2].onPress = function(e){
		if(Pick == 'Yes'){
			Pick = 'No';
			done(2);
		}
	}
}

function done(num){
	console.log('done, num = '+ num);

	createjs.Tween.get(Say)
	.to({alpha:0}, 300)
	createjs.Tween.get(Which)
	.to({alpha:0}, 300)

	createjs.Tween.get(Circle[num])
	.to({scaleX:1.2, scaleY:1.2},300)
	.to({scaleX:1, scaleY:1}, 300)
	.wait(300)
	.to({y:canvas.height/3}, 1000)
	.wait(500)
	.call(function(){
		for (var k = 0; k < 3; k++){
			createjs.Tween.get(Circle[k])
			.to({y:canvas.height/3}, 1000)
		}
	})
	.wait(300)
	.call(function(){
		createjs.Tween.get(Key)
		.to({x:canvas.width/2}, 1000)
		.call(function(){
			for(var k = 0; k < 3; k++){
				createjs.Tween.get(Circle[k])
				.to({alpha:0}, 1000)
			}
		})
		.wait(2000)
		.call(function(){
			if(ans =='A'){
				win();
			}else{
				lose();
			}
		})
	});
}

function win(){
	console.log('win');
	WincatImage = new Image();
	WincatImage.src ='./img3/wincat.png';
	var Wincat = new createjs.Bitmap(WincatImage);
	Wincat.regX = WincatImage.width/2; 
	Wincat.regY = WincatImage.height/2;
	Wincat.x = canvas.width/2;
	Wincat.y = canvas.height;
	container.addChild(Wincat);

	WinImage = new Image();
	WinImage.src = './img3/win.png';
	var Win = new createjs.Bitmap(WinImage);
	Win.regX = WinImage.width/2;
	Win.regY = WinImage.height/2;
	Win.x = canvas.width/2;
	Win.y = -WinImage.height/2;
	container.addChild(Win);

	stage.update();

	createjs.Tween.get(Wincat)
	.to({y:canvas.height/2}, 2500)

	createjs.Tween.get(Win)
	.wait(3000)
	.to({y:canvas.height/2}, 1000, createjs.Ease.bounceOut)

	stage.onPress = function(){
		console.log('click stage');
		createjs.Tween.get(Win)
		.call(function(){
			reset(container);
		})
		.to({rotation:20}, 400)
		.to({scaleX:2, scaleY:0, alpha:0}, 1000)
	}
}
function lose(){
	console.log('lose()');
	LoseImage = new Image();
	LoseImage.src = './img3/lose.png';
	var Lose = new createjs.Bitmap(LoseImage);
	Lose.regX = LoseImage.width/2;
	Lose.regY = LoseImage.height/2;
	Lose.x = canvas.width/2;
	Lose.y = -LoseImage.height/2;
	container.addChild(Lose);
	stage.update();

	createjs.Tween.get(Lose)
	.to({y:canvas.height/2}, 1000, createjs)//.Ease.bounceOut)

	stage.onPress = function(){
		console.log('click stage');
		createjs.Tween.get(Lose)
		.call(function(){
			reset(container);
		})
		.to({rotation:20}, 400)
		.to({scaleX:2, scaleY:0, alpha:0}, 1000)
	}
}

function reset(obj){
	console.log('reset()');

	createjs.Tween.get(obj)
	.to({alpha:0},1500)
	.call(function(){
		stage.removeChild(obj);
		delete obj;
		start();
	})

}