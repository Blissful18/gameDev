import Play from './play.js';

const elem = document.querySelector("#game");
const canvas = elem.getContext("2d");
var keys = [];
var images = ["images/bigmaze.png","images/maze2.png","images/maze3.png","images/angel.png"];
var cnt = 0;
var img = new Image();
img.src = images[cnt];
const playerSprite = new Image();
playerSprite.src = "images/angel.png";

let player = new Play(20);
player.position.x = 5; //5
player.position.y = 5; //5

function loop (deltatime)
{
    canvas.clearRect(0,0,1350,540);
    canvas.drawImage(img,0,0);
    // drawSprite(playerSprite,0,0,player.width,player.height,5,10,player.width,player.height);
    player.speedX = 0;
    player.speedY = 0;   
    player.update();
    if (checkForCollision()) {
        player.position.x -= player.speedX;
        player.position.y -= player.speedY;
        player.speedX = 0;
        player.speedY = 0;
    }
    if (checkForCollision2()) {
        player.position.x -= player.speedX;
        player.position.y -= player.speedY;
        player.speedX = 0;
        player.speedY = 0;
    }
    player.draw(canvas,playerSprite);
    handlePlayerFrame();
    nextLevel();
    console.log("x = " + player.position.x + " y = " + player.position.y);
    requestAnimationFrame(loop);
}

loop();
setInterval(function(){},10);

function handlePlayerFrame(){
    if(player.frameX < 3 && player.moving == 1){
        player.frameX++;
    }else{
        player.frameX = 0;
    }
}

function checkForCollision() {
    var imageData = canvas.getImageData(player.position.x - 1, player.position.y - 1, 15 + 2, 15 + 2);
    var pixels = imageData.data;
  
    for (var i = 0, len = pixels.length; i < len; i++) {
      var red = pixels[i],
          green = pixels[i + 1],
          blue = pixels[i + 2],
          alpha = pixels[i + 3];
  
      // Check for black walls
      if (red === 0 && green === 0 && blue === 0) {
        return true;
      }
    }
    return false;
}

function checkForCollision2() {
    var imageData = canvas.getImageData(player.position.x + 31, player.position.y + 30, 15 + 2, 15 + 2);
    var pixels = imageData.data;
  
    for (var i = 0, len = pixels.length; i < len; i++) {
      var red = pixels[i],
          green = pixels[i + 1],
          blue = pixels[i + 2],
          alpha = pixels[i + 3];
  
      // Check for black walls
      if (red === 0 && green === 0 && blue === 0) {
        return true;
      }
    }
    return false;
}

function nextLevel(){
    if(player.position.x == 1255 && player.position.y == 369 && cnt == 0){
        // $(document).ready(function(){
        //     $("#myModal").modal('show');
        // });
        window.confirm("Level " + (cnt+1) + " Completed");
        cnt++;
        player.position.x = 733; player.position.y = 5;
   
    }else if(player.position.x == 370 && player.position.y == 477 && cnt == 1){
        window.confirm("Level " + (cnt+1) + " Completed");
        cnt++;
        player.position.x = 1255; player.position.y = 5;  
    }else if(player.position.x == 57 && player.position.y == 477 && cnt == 2){
        window.confirm("Level " + (cnt+1) + " Completed");
        cnt++;
        player.position.x = 1255; player.position.y = 5;  
    }
    img.src = images[cnt]; 


}