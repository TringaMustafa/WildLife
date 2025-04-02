<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/wht.css">
</head>
<body>
    
<main>
    <br><br>
            <div class="left">
                <br><br><br>
                <h2 id="text6">Giraffe</h2>
                <img class="images" id="slideshow">
                <button id="bt1" onclick="changeImg()">Next</button>
            </div>
            <div class="right">
                <br><br><br><br><br><br><br>
                <div class="p-head1">The Enchanting World of Giraffes</div>
                <div class="p-head2">Domesticated animals may steal the spotlight, but in the wild, giraffes stand as towering icons of grace and majesty. With their distinctive spotted coats and impossibly long necks, these gentle giants traverse the African savannas, embodying both strength and serenity. Their peaceful nature and social behavior make them fascinating subjects of study, showcasing their unique adaptation to the wild.</div>

                <br>

                <div class="p-head1">The Whimsical World of Giraffes</div>
                <div class="p-head2">Beyond their ecological role as graceful browsers of the treetops, giraffes have long captured human imagination. Symbolizing wisdom, intuition, and perspective, these towering creatures appear in folklore and mythology across cultures. From ancient African legends to modern artistic representations, the giraffe’s elegance and quiet wisdom have made it a timeless figure of wonder and admiration.</div>
                 <br>

                 <div class="p-head1">The Secret Lives of Giraffes: A Symphony of Heights and Horizons</div>
                 <div class="p-head2">Beneath the vast African sky, where golden grasslands stretch to the horizon, unfolds a silent ballet—the secret lives of giraffes. These towering yet gentle creatures navigate their world with measured strides, their long lashes shielding curious eyes that witness the untamed beauty of their surroundings.</div>
            </div>
        </main>

        <script>

            let i=0;

            let imgArray = ['ph1.avif','ph2.webp','ph3.jpg'];
            
            function changeImg(){
                document.getElementById('slideshow').src = imgArray[i];

                if(i<imgArray.length -1){
                    i++
                }
                else{
                    i=0;
                }
            }
            document.addEventListener(onload, changeImg());
        </script>



</body>
</html>