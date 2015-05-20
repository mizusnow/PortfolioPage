window.onload = function(){
	sizing();
	Draw();
}

function sizing () {
	$("#canvas_back").attr({height:$("#wrapper").height()});
	$("#canvas_back").attr({width:$("#wrapper").width()});
}

var num_big =40;
var num = 9;
var backfuwa = new Array(num_big);
var fuwa = new Array(num);
var first = true;
function Draw() {
	var canvas = document.getElementById('canvas_back');
	var context = canvas.getContext('2d');
	var width = canvas.width;
	var height = canvas.height;
	var r=150;

	if(first){
		//白い丸生成
		for(var i=0; i<num; i++){
			var x = r*Math.cos(2*Math.PI/9*i) +width/2;
			var y = r*Math.sin(2*Math.PI/9*i) +height/2;
			// var y = r*Math.sin(2*Math.PI/9*i) +400;
			fuwa[i] = new Fuwa(x,y,r);
		}
		//カラフル丸生成
		for(var i=0; i<num_big; i++){
			var r = Math.floor(200+Math.random()*50);
			var g = Math.floor(200+Math.random()*50);
			var b = Math.floor(200+Math.random()*50);
			var color = "rgba("+r+","+g+","+b+",0.3)";
			var yy = Math.random()*2;
			var size = 100+Math.random()*50;
			backfuwa[i] = new BackFuwa(Math.random()*width,Math.random()*height,size,color,yy);
		}
		first=false;
	}else{
		//カラフル丸上昇！
		for(var i=0; i<num_big; i++){
			backfuwa[i].y -= backfuwa[i].yy;
		}
		//カラフル丸が画面より上に行ったら新カラフル丸をつくる
		for(var i=0; i<num_big; i++){
			if(backfuwa[i].y<0-backfuwa[i].size){
				var r = Math.floor(200+Math.random()*50);
				var g = Math.floor(200+Math.random()*50);
				var b = Math.floor(200+Math.random()*50);
				var color = "rgba("+r+","+g+","+b+",0.3)";
				var yy = Math.random()*5;
				var size = 50+Math.random()*100;
				backfuwa[i] = new BackFuwa(Math.random()*width,height+150,size,color,yy);
			}
		}
	}
	//リセット
	context.clearRect(0,0,width,height);
	//カラフル丸描画
	for(var i=0; i<num_big; i++){
	 	context.beginPath();
	 // 	context.strokeStyle = 'rgba(240,240,255,0.8)';
		// context.fillStyle = 'rgba(240,240,255,0.8)';
		context.strokeStyle = backfuwa[i].color;
		context.fillStyle = backfuwa[i].color;
		context.arc(backfuwa[i].x, backfuwa[i].y, backfuwa[i].size, 0, Math.PI*2, false);
		context.fill();
	}
	//白丸描画
	context.strokeStyle = 'rgba(255,255,255,0.5)';
	context.fillStyle = 'rgba(255,255,255,0.5)';
	for(var i=0; i<num; i++){
	 	context.beginPath();
		context.arc(fuwa[i].x, fuwa[i].y, fuwa[i].size, 0, Math.PI*2, false);
		context.fill();
	}
	context.beginPath();
	context.arc(10,10, 20, 0,Math.PI*2,false);
	context.stroke();

	var timer = setTimeout(Draw,50); 
}

function Fuwa(x,y,size){
	this.x = x;
	this.y = y;
	this.size = size;
}
function BackFuwa(x,y,size,color,yy){
	this.x = x;
	this.y = y;
	this.size = size;
	this.color = color;
	this.yy = yy;
}
