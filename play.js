export default class Play
{
    constructor(size)
    {
        this.size = size;
        this.width = 48;
        this.height = 48;
        this.position = {
            x:1255,
            y:360
        };
        this.frameX = 0;
        this.frameY = 0;
        this.speedX = 0;
        this.speedY = 0;
        this.moving = false;
        this.speed = 9;
    }

    draw(canvas,playerSprite)
    {
        // if(this.frameX < 3 && this.moving === 1){
        //     this.frameX++;
        // }else{
        //     this.frameX = 0;
        // }

        canvas.drawImage(playerSprite,this.width*this.frameX,this.height*this.frameY,this.width,this.height,this.position.x,this.position.y,this.width,this.height);
        this.frameX++;
        if(this.frameX > 3){
            this.framex = 0;
        }
    }

    update()
    {
        window.addEventListener('keydown', function (e) {
            Play.key = e.code;
            this.moving = true;
        })
        window.addEventListener('keyup', function (e) {
            Play.key = false;
            this.moving = false;
        })
        if (Play.key && Play.key == "ArrowLeft" && this.position.x > 5) {this.speedX = -1; this.frameY = 1; this.frameX++;}
        if (Play.key && Play.key == "ArrowRight" && this.position.x < 1303 - this.width) {this.speedX = 1; this.frameY = 2; this.frameX++;}
        if (Play.key && Play.key == "ArrowUp" && this.position.y > 5) {this.speedY = -1; this.frameY = 3; this.frameX++;}
        if (Play.key && Play.key == "ArrowDown" && this.position.y < 525 - this.width) {this.speedY = 1; this.frameY = 0; this.frameX++;}
        
        // this.frameX++;
        // if(this.frameX > 3){
        //     this.framex = 0;
        // }
        
        this.position.x += this.speedX;
        this.position.y += this.speedY;    

        

        // if(this.frameX >= 3 && this.moving){
        //     this.frameX++;
        // }else{
        //     this.frameX = 0;
        // }

    }


}