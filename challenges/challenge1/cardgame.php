<head>
    <title>Card Game</title>
     <meta charset="utf-8"/>
</head>

<body>
    <center>
        <h1>Random Card Game</h1>
    </center>
    <?php
    function getRandomSuite(){
        $num = rand(0,3);
        switch($num){
                case 0: $suite = "clubs";
                break;
                case 1: $suite = "diamonds";
                break;
                case 2: $suite = "hearts";
                break;
                case 3: $suite = "spades";
                break;
                
        }   
          return $suite;
    }
    
    function getFace(){
         $num = rand(0,4);
        switch($num){
                case 0: $face = "ten";
                break;
                case 1: $face = "jack";
                break;
                case 2: $face = "queen";
                break;
                case 3: $face = "king";
                break;
                case 4: $face = "ace";
        }   
        return $face;
    }
    $suite= getRandomSuite();
    $face=getFace();
   // getRandomSuite();
    
   echo "<img src=\"img/cards/$suite/$face\" />";
    ?>
    
    <p>hello</p>
</body>