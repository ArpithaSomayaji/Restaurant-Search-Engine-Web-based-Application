<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Restaurant</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style-portfolio.css">
        <link rel="stylesheet" href="css/picto-foundry-food.css" />
        <link rel="stylesheet" href="css/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="icon" href="favicon-1.ico" type="image/x-icon">
    </head>

    <body>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Restaurant Search Engine</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav  clear navbar-right ">
                            <li><a class="navactive color_animation" href=index.html>WELCOME</a></li>
                            <li><a class="color_animation" href=index.htmlp>ABOUT</a></li>
                            <li><a class="color_animation" href=RSE.php>QUERIES</a></li>
                            <li><a class="color_animation" href=index1.php>RESTAURANTS</a></li>
                            
                            
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>
         
        <div id="top" class="starter_container bg">
            <div class="follow_container">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="top-title" href=index1.html> Restaurant</h2>
                    <h2 class="white second-title">" Best in the city "</h2>
                    <hr>
                </div>
            </div>
        </div>

        <!-- ============ About Us ============= -->

        <section id="story" class="description_content">
            <div class="text-content container">
                <div class="col-md-6">
                    
                    <div class="fa fa-cutlery fa-2x"></div>
                    <p class="desc-text">
                    <?php
                    include 'connection.php';
                    global $conn;

                     $dbh = new PDO("mysql:hos=localhost:80;dbname=restaurantsearchengine","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   $dbh->beginTransaction();
  $resname=$_GET['Rest'];
  echo "<h2 ><legend>" .$resname. "</legend></h2>";
   $stmt=$dbh->prepare('SELECT restaurant.Restaurant_ID,restaurant.Restaurant_OpenHours,restaurant.Restaurant_Reservation_Capacity_Per_Hour,restaurant.Restaurant_Contact,restaurant.Restaurant_Email,restaurant.Zip,restaurant_location.Restaurant_Street,restaurant_location.Restaurant_City,restaurant_location.Restaurant_State,budget_range.Budget from restaurant,restaurant_location,budget_range where restaurant.Zip=restaurant_location.zip and restaurant.Budget_ID=budget_range.Budget_ID and restaurant.Restaurant_Name="'.$resname.'" ;');

    $stmt->execute();
    while($row=$stmt->fetch()){

    echo "<h4>  Open Hours :".$row["Restaurant_OpenHours"]. "</h4>";
      echo "<h4>  Contact :".$row["Restaurant_Contact"]. "</h4>";
               echo "<h4> Budget :".$row["Budget"]. "</h4>";
               echo "<h4> Reservation Capacity :".$row["Restaurant_Reservation_Capacity_Per_Hour"]."</h4>";
         echo "<h4> Address :".$row["Restaurant_Street"].",".$row["Restaurant_City"].",".$row["Restaurant_State"].",".$row["Zip"]."</h4>";
  
   
        


  }
                    ?>
                        



                    </p>
                </div>
                <div class="col-md-6">
                    <div class="img-section">
                       <img src="images/kabob.jpg" width="250" height="220">
                       <img src="images/limes.jpg" width="250" height="220">
                       <div class="img-section-space"></div>
                       <img src="images/radish.jpg"  width="250" height="220">
                       <img src="images/corn.jpg"  width="250" height="220">
                   </div>
                </div>
            </div>
        </section>


      
       

       

        <!-- ============ Footer Section  ============= -->

        <footer class="sub_footer">
            <div class="container">
                
                <div class="col-md-4"><p class="sub-footer-text text-center">Back to <a href="#top">TOP</a></p>
                </div>
               
            </div>
        </footer>


        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
        <script type="text/javascript" src="js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>     
        <script type="text/javascript" src="js/jquery.mixitup.min.js" ></script>
        <script type="text/javascript" src="js/main.js" ></script>

    </body>
</html>