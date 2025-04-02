<?php
if (!isset($_SESSION)) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>African Wild Life</title>
    <link rel="icon" href="../../img/logo.png" type="image/icon">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://kit.fontawesome.com/7be85ed243.js"></script>
    <style>
      .background-text a {
    color: white;
    text-decoration: none;
}
    </style>
</head>
<body>
    
  <?php include '../includes/navbar.php'; ?>

  <main>
    <img class="main-image" src="../image/leo.webp" alt=""> 
    </main>
    <div class="container">
    <p class="p-main">LEOPARD <br> <span style="font-size: 14px;">Wildlife Conservation / Leopard</span></p>

    <p class="p-header1">What is the African leopard?</p>
        <p class="p-maintext">It is the second-largest living big cat after the tiger.<br>

Males are unique among the cat species for their thick mane of brown or black hair encircling their head and neck.<br>

The mane darkens with age, and the thicker and darker a mane is, the healthier the cat.<br>

Both males and females roar—a sound heard as far as 8 kilometers away.<br></p>
    </div>

    <table>
    <tr>
        <th><span class="orange">CONSERVATION STATUS</span> VULNERABLE</th>
        <th><span class="orange">SCIENTIFIC NAME</span> PANTHERA PARDUS</th>
        <th><span class="orange">WEIGHT</span> 17 TO 90 KILOGRAMS (37 TO 198 POUNDS)</th>
    </tr>
    <tr>
        <th><span class="orange">SIZE</span> 60 TO 70 CM AT THE SHOULDER (24 TO 28 INCHES) AND ABOUT 1 TO 2.3 METERS IN LENGTH (3.3 TO 7.5 FEET)</th>
        <th><span class="orange">LIFE SPAN</span> 12 TO 17 YEARS IN THE WILD, UP TO 23 YEARS IN CAPTIVITY</th>
        <th><span class="orange">HABITAT</span> FORESTS, SAVANNAS, MOUNTAINS, AND GRASSLANDS</th>
    </tr>
    <tr>
        <th><span class="orange">DIET</span> CARNIVOROUS</th>
        <th><span class="orange">GESTATION</span> AVERAGE ABOUT 90 TO 105 DAYS</th>
        <th><span class="orange">PREDATORS</span> HUMANS</th>
    </tr>
</table>

     
     <div class="container">
     <div class="all">
                <div class="right">
                    <img class="lion-female" src="../image/leo-female.jpg" alt="">
                   
                </div>
                <div class="left">
                    <p class="p-main1">Challenges</p>
                    <p class="p-main2">Loss of Habitat.</p>
                    <p class="p-main3">Humans are pushing big cats out of their natural habitats. In the past two decades, their populations have steadily decreased, with a staggering 43% decline. As human populations expand, so does agriculture, settlements, and the construction of roads, which all contribute to the destruction of vital wildlife habitats.</p>
            
                    <p class="p-main2"> Human-Wildlife Conflict.</p>
            
                    <p class="p-main3">As their habitats shrink, big cats, like lions, are being pushed into closer proximity to human settlements. This increased interaction, coupled with a decrease in natural prey, forces these cats to hunt livestock for food. As a result, farmers often retaliate by killing the cats, further endangering the species.</p>
            
                    <p class="p-main2">Hunting for Trophies and Rituals.</p>
                    <p class="p-main3">Big cats are also being hunted by humans for various reasons. They are killed in rituals of bravery, prized as hunting trophies, and, unfortunately, targeted for their body parts, which are believed to have medicinal and magical properties. This illegal hunting is a significant threat to their survival. <br>

These combined challenges contribute to the declining population of big cats, and urgent conservation efforts are needed to protect them from further harm.







</p>
            
                </div>
     </div>
     </div>
     <br><br><br>
     <div class="main-continue">
    <div class="container solutions">
    <div class="mcone">
        <br>
        <p class="p-main1">Solution</p>
        <p class="p-main2">Mitigate human-wildlife conflict.</p>
        <p class="p-main3">Retaliation is the primary reason people kill this big cat. We work with communities to help them realize the big cat’s value and to help them protect their families and livestock from carnivore predation. In Ruaha National Park, where 10 percent of the world’s remaining lion population can be found, AWF’s Ruaha Carnivore Project is fostering a much-needed shift in the local opinion of carnivores. Since 2012, AWF has been working with Ruaha’s communities to build livestock enclosures to protect livestock from predation, and, in turn, protect big cats and other carnivores from conflict with humans. In addition, Ruaha Carnivore Project provides community benefits to villages that demonstrate success in living peacefully with carnivores.

            Since 2012, AWF has been working with Ruaha’s communities to build livestock enclosures to protect livestock from predation, and, in turn, protect big cats and other carnivores from conflict with humans. In addition, Ruaha Carnivore Project provides community benefits to villages that demonstrate success in living peacefully with carnivores.
            
            </p>
            <br>
            <img style=" width: 90%;" src="../image/baby-leo.jpg" alt="">
    </div>
    <div class="mctwo">
        <br>
        <br>
        
        <img style="width: 80%" src="../image/bwleo.jpg" alt="">
        <br>
        <br>
        
        <p class="p-main3">African Wildlife Foundation’s researchers are working to gain an understanding of carnivores’ populations, behaviors, movements, and interactions with people in order to develop appropriate conservation actions. Since 2002, our Large Carnivore Research Project has undertaken research aimed at ensuring the continued survival of large predators living around Botswana, Namibia, Zambia, and Zimbabwe. There are few regions as important to the viability of lion populations as the Tarangire-Manyara ecosystem. Halting the decline of lion populations in this region is imperative to the long-term success of the species. The African Wildlife Foundation partners with the Tarangire Lion Research Initiative to compile data from the local lion population. This data helps us better understand the demographic composition of lions in the landscape and pinpoint areas of potential threat to the species. To mitigate human-lion conflict, AWF has designed and constructed predator-proof enclosures for herdsmen to protect their cattle from lion attacks and hosts ongoing education and awareness programs to inform the community about safeguarding their livestock. As a result of AWF and community efforts, there has not been a single retaliatory killing in the landscape since March 2018.</p>
        <br>
        <br>
    </div>
    
</div>

   

<?php include("../includes/footer.php"); ?>




</body>
</html>

