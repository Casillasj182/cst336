 $("#letterBtn").click( function(){ 
               // updateImage();
               
               var boxVal = $("#letterBox").val();
               alert(boxVal);
               
            } );
            
    
            function updateImage() {
                
                //document.getElementById("man").innerHTML = "<img src='img/stick_5.png' >";
                $("img").attr("src","img/stick_3.png");
            }
    
            
            var selectedWord = "";
            var selectedHint = "";
            var board = "";
            var remainingGuesses = 6;
            var words = ["snake", "monkey", "beetle", "octopus", "horse"];
            var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                            'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                            'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

            
            startGame();
            
            function startGame() {
                
                pickWord();
                initBoard();
                updateBoard();
                createLetters();
           
                //updateMan();
                
            }
            
            function pickWord() {
                var randomInt = Math.floor( Math.random() * words.length );
                selectedWord = words[randomInt].toUpperCase();
                //console.log(selectedWord);
            }
            
            function updateBoard() 
            {
                 $("#word").empty();
                for (var letter of board) {
                    document.getElementById("word").innerHTML += letter + " ";
                }
            }
            
            function initBoard()
            {
               
                for (var i=0; i < selectedWord.length; i++ ) {
                    
                    board += "_";
                    
                }
                
                console.log(board);
                
            }
              
            function replaceAt(str,index,value)
            {
                return str.substr(0,index) + value + str.substr(index+value.length);
            }
            
            function updateWord(positions,letter)
            {
                for(var pos of positions)
                {
                    board=replaceAt(board,pos,letter);
                }
                updateBoard();
            }
          
            
            function createLetters(){
                
                for (var letter of alphabet) {
                    
                    $("#letters").append("<button class='letter' id='"+letter+"'>" + letter + "</button>");
                }
                
            }
           
            
             
            function updateMan()
            {
                $("#hangImg").attr("src","img/stick_" + (6-remainingGuesses)+".png");
            }
            function checkLetter(letter) {
                
                var positions = new Array();
                
                for (var i=0; i < selectedWord.length; i++) {
                    console.log(selectedWord);
                    if (letter == selectedWord[i]) {
                        
                        positions.push(i);
                        
                    }
                    
                }
                
                if(positions.length>0)
                {
                    updateWord(positions,letter);
                    
                    if(!board.includes('_'))
                    {
                        endGame(true);
                    }
                }
                else
                    {
                        remainingGuesses-=1;
                        updateMan();
                    }
                    
                    if(remainingGuesses<=0)
                    {
                        endGame(false);
                    }
            /*
                else
                {
                    remainingGuesses--;
                    $("#hangImg").attr("src","img/stick_" + (6-remainingGuesses) + ".png");
                    updateMan();
                
                }
                -->
        */
               // endGame(false);
            }
            
            //events
            
            $("button").click( function(){
                //alert($(this).attr("id"))
        checkLetter($(this).attr("id"))
            });
            
            
            $(".replayBtn").on("click",function()
            {
                location.reload();
            });
           
function endGame(win)
{
    $("#letters").hide();
    
    if(win)
    {
        $('#won').show();
    }
    else
    {
        $('#lost').show();
    }
}
 $(".letter").on("click",function() {
                console.log($(this).attr("id"));
            })