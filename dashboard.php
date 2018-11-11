<!DOCTYPE html>

<!--            WebApp by Achille Dantz             -->
<!--           contact : achille@dantz.fr           -->
<!--               MIT License - 2018               -->
<!-- source code at https://github.com/Anthex/LoRa  -->

<html>
   <head>
      <!-- Mobile viewport (semi-responsive ) -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- CSS -->    
      <link rel="stylesheet" type="text/css" href="style.css">
      <link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet">
      <!-- Colorpicker -->
      <script type="text/javascript" src="colorpicker/jscolor.js"></script>
      <!-- Cookies -->
      <script type="text/javascript" src="scripts/cookies.js"></script>
      <!-- Google Charts Library -->
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <!-- Options + fonctions of chart -->
      <script type="text/javascript" src="scripts/chart.js"></script>
      <!-- JQuery -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>
   </head>
   <h1>
      Graphique temps réel
   </h1>
   <h3>
      TO52 - LoRa
   </h3>
   <h4>
      Connecté en tant que : <?php echo $_SERVER['REDIRECT_REMOTE_USER'] ; ?>
   </h4>
   <div id="chart_div"></div>
   <div id="controls">
      <a href='javascript:void(0)' class="btn" id = 'li'>Ligne</a>
      <a href='javascript:void(0)' class="btn" id = 'st'>Colonnes</a>
      <a href='javascript:void(0)' class="btn" id = 'ar'>Aire</a>
   </div>
   <div id="colorpicker">
      <?php include 'colorpicker/colorpicker.php' ?>
   </div>
   </body>
</html>