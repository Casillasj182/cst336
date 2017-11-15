
var mountains, trees;
var mouse;
var leftarrowdown=false;
var rightarrowdown=false;
var gametimer;
var inAir=false;
const mouse_speed=10;
const gravity=2;
var mouseFallSpeed=0;


document.addEventListener('keydown',function(event)
{
	if(event.keyCode==37) leftarrowdown=true;
	if(event.keyCode==39) rightarrowdown=true;
	if(event.keyCode==38) jump();
	
})

document.addEventListener('keyup',function(event)
{
	if(event.keyCode==37) leftarrowdown=false;
	if(event.keyCode==39) rightarrowdown=false;
})


function gameloop()
{
	var mouseY=parseInt(mouse.style.top);
	var treesX=parseInt(trees.style.left);
	var mountainsX=parseInt(mountains.style.left);
	
	if(mouseY < 250)
	{
		mouseFallSpeed+=gravity;
		mouse.style.top=(mouseY+ mouseFallSpeed) + 'px'; 
		
		var newMouseY=mouseY+mouse;
		if(newMouseY>250)
		{
			newMouseY=250;
			mouse.style.top=newMouseY + 'px';
		}
		
	
	}
	


	var mouse_src = mouse.src.split('/').pop();
	if(mouse_src=='mouse_jumping.gif')
	{
	
			if(mouse.className=='flip')
			{
				if(treesX < 0)
				{
					trees.style.left=treesX+mouse_speed + 'px';		
					mountains.style.left=mountainsX+mouse_speed/2 + 'px';	
				}
			}
		
		
		else
		{
			if(treesX > -2400)
			{
				
				trees.style.left=treesX-mouse_speed + 'px';		
				mountains.style.left=mountainsX-mouse_speed/2 + 'px';	
			}
			
		}
	}
		
	
	
	
else
{

		if(leftarrowdown||rightarrowdown)
		{
			if(mouse_src!='images/mouse_running.gif')
			{
			//mouse.className='flip-H'
			mouse.src='images/mouse_running.gif';
			}
		}
		else
		{	
			mouse.src='images/mouse_standing.gif';
		}
		


	
}

	//Making the trees move so the object looks like its moving

	if(leftarrowdown&&treesX < 0)
	{
		mouse.className='flip';
		trees.style.left=treesX+mouse_speed + 'px';
		mountains.style.left=mountainsX+mouse_speed/2 + 'px';
	}
	if(rightarrowdown&&treesX > -2400)
	{
		mouse.className='';
		trees.style.left=treesX-mouse_speed + 'px';
		mountains.style.left=mountainsX-mouse_speed/2 + 'px';
	}
	

	
}

function jump()
{
	//inAir=true;
	mouse.src='images/mouse_jumping.gif';  
	mouseFallSpeed = -30;
	var mouseY=parseInt(mouse.style.top);
	
	if(mouseY >= 250)
	{
		mouse.style.top='249px';
	}
}

function initializeGame(){
	mountains = document.getElementById('mountains');
	mountains.style.left='0px';
	mountains.style.top='0px';
	
	trees = document.getElementById('trees');
	trees.style.left='0px';
	trees.style.top='0px';

	mouse = document.getElementById('mouse');
	mouse.style.left = '340px';
	mouse.style.top = '0px';
	
	gametimer=setInterval(gameloop,50);
}

