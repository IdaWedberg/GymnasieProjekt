<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Responsiv webbdesign</title>
      <link rel="stylesheet" href="css/styleSheet.css?v=1.0">
      <link rel="stylesheet" href="css/gridCSS.css">
   </head>
   <body>
      <header>
         <h1>Webbutveckling 1</h1>
         <h2>- Responsiv Webbdesign</h2>
         <br>
         
         <nav id="topNav">
            <a id="topMenuButton" href="#">☰</a>
            <ul>
               <li><a href="#">Hem</a></li>
               <li><a href="#">HTML</a></li>
               <li><a href="#">CSS</a></li>
               <li><a href="#">Responsiv Webbdesign</a></li>
               <li><a href="#">Mobile First</a></li>
               <li><a href="#">Desktop First</a></li>
               <li><a href="#">Kontakt</a></li>
            </ul>
         </nav>
      </header>
      
      <main>
         <section class="col-12 col-t-6 col-d-6 col-ld-6 red">
            <h2>Lär dig webbutveckling på ett enkelt sätt</h2>
            <p>Denna webbplats är tänkt som en resurs till kursen Webbutveckling 1.
               Tanken är att alla bidrar med sina kunskaper och erfarenheter.
            </p>
         </section>

         <section class="col-12 col-t-6 col-d-6 col-ld-6 silver">
            <h2>Responsiv Webbdesign</h2>
            <p>Denna webbplats är tänkt som en resurs till kursen Webbutveckling 1.</p>
            <p>Tanken är att alla bidrar med sina kunskaper och erfarenheter.</p>
            <img src="img/htmlcss.png" alt="Logga" class="right">
         </section>

         <section class="col-12 col-t-6 col-d-3 col-ld-3 blue">
            <h2>HTML</h2>
            <p>Lär dig grundernai html på endast 55 minuter!</p>
         </section>

         <section class="col-12 col-t-6 col-d-3 col-ld-3 yellow">
            <h2>CSS</h2>
            <p>CSS på 2 x 60 minuter!</p>
            <p>Vi går igenom de vanligaste css-reglerna för att sedan fördjupa oss i animation med css.</p>
         </section>

         <section class="col-12 col-t-6 col-d-3 col-ld-4 green">
            <h2>Mobile First</h2>
            <p>Gör din webbplats tillgänglig för alla med fokus på mobilaenheter.</p>
         </section>

         <section class="col-12 col-t-6 col-d-3 col-ld-2 orange">
            <h2>Desktop First</h2>
            <p>Gör din webbplats tillgänglig för alla med fokus på stora högupplösta skärmar.</p>
         </section>
      </main>
      <?php
         echo "<h1>HELLO PHP</h1>";
      ?>

      <footer>
         <p>Webbutveckling 1,CSS</p>
      </footer>
   </body>
</html>
