//variable declaration
var
	canvas 			= document.getElementById('myCanvas'), //canvas initialisation
	ctx   		 	= canvas.getContext('2d'), // take a context
	//getting a dom objects
	pike 			= document.querySelector('.pike'),
	button 			= document.getElementById('button'),
	save_btn 		= document.getElementById('save'),
	numbers 		= document.getElementsByTagName('p'),
	//taking a time for game
	date 			= new Date(),
	start 			= date.getTime(),
	attempts 		= 3,
	g  				= 9.8, //taking a parameters for bounces
	//Rect parameters
	Xcoord 			= canvas.width/2,
	Rheight 		= 14,
	Rwidth 			= 165,
	rightPressed 	= false,
	leftPressed 	= false,
	//colors
	blue = red 		= 0,
	green 			= 150,
	score 			= 0,
	number 			= 0,
	changered 		= false,
	changegreen 	= false,
	press_count 	= 0,
	pikes 			= [], 
	objects 		= [],
	velo,acc,F, //bounces paremeters
	i, // cicle variable
	timerId,delta,result; // timer parameters

//score linked object
var Bounce = function(x,y,R,speed,t)
{
	this.R = R;
	this.m = (this.R -14) * 3;
	this.x = x;
	this.y = y;
	this.speed = speed;
	this.t = t;
}
//start initialisation
window.onload = function()
{
	canvas.width = window.innerWidth;
	canvas.height = window.innerHeight;
	canvas.style.backgroundColor = 'black';
	document.addEventListener('keyup',paddleUp,false);
	document.addEventListener('keydown',paddleDown,false);
	var pikeInterval = setTimeout(createPike,1500);
	var movingTimer = setTimeout(moveRect,1);
	timerId = setTimeout(Run,1000/60);
}
//button for restart the game processing
button.onclick = function(){
	window.location.reload();
}
//global function to create pikes
function createPike()
{
	if (result <=0 || attempts <= 0) 
	{
		clearInterval(pikeInterval);
		return;
	}
	var pikeEx = 
	{
		pikeCl:pike.cloneNode(true),
		x:Random(15,canvas.width-15),
		y:0
	}
	pikeEx.pikeCl.style.left = pikeEx.x + 'px';
	document.body.appendChild(pikeEx.pikeCl);
	pikes.push(pikeEx);
	pikeInterval = setTimeout(createPike,1500);
}

//global function to move pikes
function movePikes()
{
	for(i=0;i<pikes.length;i++)
	{
		pikes[i].y+=5;
		pikes[i].pikeCl.style.top = pikes[i].y + 'px';
	}
}
//moving keys performing
function paddleUp(e)
{
	if(e.keyCode == 68) rightPressed = false;
	if(e.keyCode == 65) leftPressed = false;
}

function paddleDown(e){
	if(e.keyCode == 68) rightPressed = true;
	if(e.keyCode == 65) leftPressed = true;
}
//time performing
function Time(){
	var date2 = new Date();
	var now = date2.getTime();
	delta = now - start;
	delta = Math.floor(delta/1000);
	result = 60 - delta;
	if (result <=0 || attempts <= 0) {
		pike.remove();
		for(i=0;i<pikes.length;i++){
			pikes[i].pikeCl.remove();
		}
		button.style.visibility = 'visible';
		save_btn.style.visibility = 'visible';
	}
	ctx.fillStyle = '#675ace';
	ctx.font = 'bold 23px Arial';
	if (result<=10) ctx.fillStyle = 'red';
	ctx.fillText("Time :" + result,10,40);
}
//button to save the result of gamer
save_btn.onclick = function()
{
	if (press_count < 1) 
	{
		var data = JSON.stringify(score);
		var xhr = new XMLHttpRequest();
		var send_data = 'data=' + encodeURIComponent(data);
		xhr.open('GET','put_data.php?' + send_data);
		xhr.send(null);
		xhr.onreadystatechange = function()
		{
			if (xhr.readyState == 4 && xhr.status == 200) 
			{
				console.log(xhr.responseText);
				ctx.fillStyle = 'lightgreen';
				ctx.font = 'bold 21px Arial';
				ctx.fillText('your score saved',canvas.width/2-70,canvas.height/2+130)
			}
		}
	}
	press_count++;
}

//main init global function
function Run()
{
	canvas.width = window.innerWidth;
	canvas.height = window.innerHeight;
	ctx.clearRect(0,0,canvas.width,canvas.height);
	ctx.font = 'bold 23px Arial';
	ctx.fillStyle = 'lightgray';
	ctx.fillText("SCORE",canvas.width-90,37);	
	ctx.fillStyle = 'lightblue';
	ctx.font = 'bold 25px Arial';
	ctx.fillText("attempts",5,134);
	ctx.fillStyle = 'lightgreen';		
	ctx.font = 'bold 18px Arial';
	ctx.fillStyle = '#675ace';
	ctx.fillText("- minus 5",34,78);
	Time();
	if(result <= 0 || attempts <= 0) 
	{
		ctx.clearRect(0,0,canvas.width,canvas.height);
		canvas.style.backgroundColor = 'black';
		ctx.font = 'bold 100px arial';
		ctx.fillStyle = 'red';
		ctx.fillText(attempts <= 0 ? "GAME OVER" : 'YOUR RESULT',canvas.width/2-320,canvas.height/2-20);
		ctx.fillStyle = 'blue';
		ctx.font = '55px Times New Roman';
		ctx.fillText("score:"+score,canvas.width/2+128,canvas.height/2 + 70);
		return;
	}
	if (objects.length == 0) createBalls();
	if (objects[objects.length-1].y > 125) createBalls();
	perform();
	movePikes();	
	changeColor();
	countScore();
	showScore();
	drawBalls();
	timerId = setTimeout(Run,1000/60);
}

//global function to perform all parameters of objects
function perform()
{		
	for(i=0;i<objects.length;i++)
	{
		objects[i].t+=0.07;
		objects[i].F = objects[i].m * g - objects[i].speed * 10;
		objects[i].acc = objects[i].F/objects[i].m;
		objects[i].velo = objects[i].acc * objects[i].t;
		objects[i].y = objects[i].velo * objects[i].t;			
	}
}
//global function to drawing balls
function drawBalls()
{
	for(i=0;i<objects.length;i++)
	{
		ctx.beginPath();
		ctx.arc(objects[i].x,objects[i].y,objects[i].R,0,2*Math.PI,objects[i].bool);
		ctx.fillStyle = 'white'
		ctx.strokeStyle = '#22c317';
		ctx.lineWidth = '5';
		ctx.fill();
		ctx.stroke();
		ctx.closePath();
		ctx.fillStyle = '#f86926';
		ctx.font = 'bold 27px Arial'
		if(objects[i].m == 33 || objects[i].m == 36 || objects[i].m == 39) ctx.fillText('3',objects[i].x-7,objects[i].y+9);
		if(objects[i].m == 42 || objects[i].m == 45 || objects[i].m == 48) ctx.fillText('5',objects[i].x-9,objects[i].y+9);
		if(objects[i].m == 51 || objects[i].m == 54) ctx.fillText('10',objects[i].x-15,objects[i].y+9);
	}
}
//count of score
function countScore()
{
	for(i=0;i<objects.length;i++)
	{
		if(Xcoord <= objects[i].x - objects[i].R + 20 && Xcoord + Rwidth >= objects[i].x + objects[i].R - 20 && objects[i].y > canvas.height-20)
		{
			if(!changegreen) changegreen = true;
			if (green < 150) 
			{
				green+=40;
				red = 0;
				if (green > 150) green = 150;
			}else green-=40;
			if(objects[i].m == 33 || objects[i].m == 36 || objects[i].m == 39) score+=3;
			if(objects[i].m == 42 || objects[i].m == 45 || objects[i].m == 48) score+=5;
			if(objects[i].m == 51 || objects[i].m == 54) score+=10;
			objects.splice(i,1);
		}else if(objects[i].y >= canvas.height-20)
		{
			changegreen = false;
			red = 200;
			green = 0;
			if(objects[i].m == 33 || objects[i].m == 36 || objects[i].m == 39) score-=3;
			if(objects[i].m == 42 || objects[i].m == 45 || objects[i].m == 48) score-=5;
			if(objects[i].m == 51 || objects[i].m == 54) score-=10;
			if(score < 0)	score = 0;
			objects.splice(i,1);
		}
	}
		for(i=0;i<pikes.length;i++)
		{
		if(pikes[i].x > Xcoord && pikes[i].x < Xcoord + Rwidth && pikes[i].y >= canvas.height-50) 
		{
			changegreen = false;
			red = 200;			
			attempts--;			
			green = 0;
			score-=5;
			if(score < 0)	score = 0;
			pikes[i].pikeCl.remove();
			pikes.splice(i,1);
		}
		if(pikes[i].y > canvas.height - 50) 
		{
			pikes[i].pikeCl.remove();
			pikes.splice(i,1);
		}
	}
}
//init balls
function createBalls()
{
	var Ball = new Bounce(Random(20,canvas.width-105),0,Random(25,32),5,0);	
	objects.push(Ball);
} 
//output for score
function showScore()
{
	ctx.fillStyle = '#aa3408';
	ctx.font = 'bold 45px arial';
	if (changegreen) {
		ctx.fillStyle = '#5eff7b';
	}else if (!changegreen){
		ctx.fillStyle = 'red';
	}		
	ctx.fillText(score,canvas.width-170,44);	
	ctx.fillText(attempts,120,137);
}
//global function to move rect
function moveRect()
{
	if (result <= 0 || attempts <= 0) return false;
	var adding = rightPressed ? 5.3 : leftPressed ? -5.3 : 0;
	Xcoord = Math.max(0,Math.min(Xcoord + adding,canvas.width-140));
	ctx.beginPath();
	ctx.fillStyle = '#efeb43';
	ctx.fillRect(Xcoord,canvas.height-20,Rwidth,Rheight);
	ctx.closePath();
	movingTimer = setTimeout(moveRect,1);
}
//global function to change color
function changeColor()
{
	if (green < 150)
	{
		green++;
	}else if (red > 0)
	{
		red--;
	}
	canvas.style.backgroundColor = rgbFormat(red,green,blue);
}
//color parser
function rgbFormat(red,green,blue)
{
	return 'rgb(' + parseInt(red) + ',' + parseInt(green) + ',' + parseInt(blue) + ')';
}
//random performer
function Random(min,max)
{
	return Math.round(Math.random()*(max-min)+min);
}
