
<html>
<head>
 <!--<title>STOCK MARKET MANAGEMENT</title>-->
 <!--<h1 align ="center">Stock Market Management</h1>-->
 <!-- Bootstrap core CSS -->
 <meta charset="UTF-8">
        <title>Restaurant Search Engine</title>
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

<style>
table, th, td {
  border: 1px solid black;
}
body.one {
    background-color: white;
    padding-top: 100px;
    padding-right: 30px;
    padding-bottom: 50px;
    padding-left: 80px;
  }
  body {
      background-image: url("bgdesert.jpg");
  }
}
</style>

<body class ="one">
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
                            <li><a class="color_animation" href=index.html>ABOUT</a></li>
                            <li><a class="color_animation" href=RSE.php>QUERIES</a></li>
                            <li><a class="color_animation" href=index1.php>RESTAURANTS</a></li>
                           <!-- <li><a class="color_animation" href="#beer">BEER</a></li>
                            <li><a class="color_animation" href="#bread">BREAD</a></li>
                            <li><a class="color_animation" href="#featured">FEATURED</a></li>-->
                            <!-- <li><a class="color_animation" href="#contact">CONTACT</a></li>-->
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>
         
        <div id="top" class="starter_container bg">
            <div class="follow_container">
                <div class="col-md-4 col-md-offset-3">
                    <h2 class="top-title"> Queries</h2>
                  
                    <hr>
                </div>
            </div>
        </div>

<!--nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only"></span>
            </button>
            <a class="navbar-brand" style="color: #ffffff;" href="http://localhost:8012/projectstock">Restauarnt Search Engine</a>
          </div>
          </div>
2      </nav>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="dist/js/bootstrap.min.js"></script>-->
<br>
<br>
<br>
<br>
<br>

<div align= "center">
<form name="query1" method="POST" action="RSE2.php"><br>
<p align ="left"><b>Query-1 List the Restaurants which are best rated by customers in terms of cuisine rating and overall rating.</b> <br><br><br>

select Distinct Restaurant.Restaurant_Name from Restaurant,Rating_Feedback 
where Restaurant.Restaurant_ID=Rating_Feedback.Restaurant_ID and Rating_Feedback.Customer_Overall_Rating>=4 and Rating_Feedback.Customer_Cuisine_Rating>=4 ;

</p>
<br><br>
 
  <input type="submit" value="query1" name="query1"/><br><br><br>
</form>



<form action="RSE2.php" method="POST"><br>
  <p align = "left"><b>Restaurants that allow to make reservations for more than 50 number of people for dinner</b><br><br><br>
  select Restaurant.Restaurant_Name,Reservation.Restaurant_Reservation_Capacity_Per_Hour,Restaurant.Restaurant_OpenHours 
from (Reservation join Restaurant on Reservation.Restaurant_ID=Restaurant.Restaurant_ID) 
where Reservation.Restaurant_Reservation_Capacity_Per_Hour>=50 and Reservation.Reservation_Time in (select Reservation.Reservation_Time from Reservation);

  </p>
  <!--Enter the data:<input type ="text" name="increaseprice" size="30"/><br><br>-->
  <br><br>
  <input type="submit" value="query2" name="query2"/><br><br><br>
</form>

<form action="RSE2.php" method="POST"><br>
  <p align ="left"><b>Query-3 Restaurants with rating above 3 (5 being the best) for a cuisine “Chinese” in location “Arlington”</b><br><br><br>
  select count(*) select Distinct Restaurant.Restaurant_Name,Restaurant.Restaurant_OpenHours,Restaurant_Location.Restaurant_City,Restaurant_Location.Restaurant_State from ((((Restaurant join RestaurantProvidingCuisineType on Restaurant.Restaurant_ID=RestaurantProvidingCuisineType.Restaurant_ID)join Cuisine on RestaurantProvidingCuisineType.Cuisine_ID=Cuisine.Cuisine_ID) join Rating_Feedback on Restaurant.Restaurant_ID=Rating_Feedback.Restaurant_ID)join Restaurant_Location on Restaurant_Location.Zip=Restaurant.Zip) 
where Restaurant_Location.Restaurant_City='Arlington' and Rating_Feedback.Customer_Overall_Rating>=3 and Cuisine.Cuisine_Name='Chinese';
</p>
<br><br>
 Enter the Cusine:<input type ="text" name="cuisine" size="30"/><br><br>

  Enter the Location:<input type ="text" name="location" size="30"/><br><br>
  <input type="submit" value="query3" name="query3"/><br><br><br>
</form>

<form action="RSE2.php" method="POST"><br>
  <p align ="left"><b>Query-4 Restaurants which are  rated more than 3 for a period of time  in location “Arlington”.</b><br><br><br>
 select DISTINCT Restaurant_Name,Restaurant_OpenHours,Restaurant_City,Restaurant_State,Customer_Overall_Rating
from ((select Restaurant_Name, Zip,Restaurant_OpenHours,Customer_Overall_Rating
      from Restaurant JOIN Rating_Feedback ON Restaurant.Restaurant_ID = Rating_Feedback.Restaurant_ID
                  where Customer_Overall_Rating >=3 AND Restaurant_Visited_Date between '2016-11-01' AND '2016-11-08')AS temp JOIN Restaurant_Location ON temp.Zip = Restaurant_Location.Zip)
where Restaurant_City='Arlington';
 </p>
 <br><br>
  <input type="submit" value="query4" name="query4"/><br><br><br>
</form>

<form action="RSE2.php" method="POST"><br>
  <p align ="left"><b>Query-5 Customers and count of number of times they have provided the ratings for the Restaurants visited  in a period of time</b><br><br><br>
   select Customer.Customer_Name,count(*) as Customer_Rating_Count from Customer,Rating_Feedback where Customer.Customer_ID=Rating_Feedback.Customer_ID  group by Customer.Customer_Name having 
 exists(Select * from Rating_Feedback where Rating_Feedback.Restaurant_Visited_Date  between '2016-10-09' and '2016-11-08') ;
  </p>
  Enter the From date:<input type ="text" name="date1" size="30"/><br><br>
  Enter the To date:<input type ="text" name="date2" size="30"/><br><br>
  <input type="submit" value="query5" name="query5"/><br><br><br>
</form>




<form action="RSE2.php" method="POST"><br>
  <p align ="left"><b>Query-6 List of Restaurants taht serve the given cuisine type.</b><br><br><br>
  SELECT Restaurant_Name, Cuisine_Name 
  FROM restaurant join cuisine join restaurantprovidingcuisinetype 
  WHERE Cuisine_Name='Indian' ;</p><br><br>
  Enter the cuisine:<input type ="text" name="cuisinevalue" size="30"/><br><br>
  <input type="submit" value="query6" name="query6"/><br><br><br>
</form>

<form action="RSE2.php" method="POST"><br>
  <p align ="left"><b>Query-7 List the restaurant details with the given budget range </b><br><br><br>
     select Restaurant_Name, Restaurant_Menu, Restaurant_Contact, Restaurant_Email, Budget 
     from restaurant JOIN budget_range on restaurant.Budget_Id=budget_range.Budget_Id where Budget>=100;<br></p>
          <input type="radio" name="radio" value="0 to 20$"> 0-20$<br>
     <input type="radio" name="radio" value="20 to 40$"> 20-40$<br>
     <input type="radio" name="radio" value="40 to 80$"> 40-80$<br>
     <input type="radio" name="radio" value="100$ and above"> 100$ and above<br> <br><br>
  
  <input type="submit" value="query7" name="query7"/><br><br><br>
</form>



<form action="RSE2.php" method="POST"><br>
  <p align ="left"><b>Query-8  List the restaurants in the location Arlington</b><br><br><br>
    SELECT Restaurant_Name, Restaurant_OpenHours,Restaurant_city 
    FROM restaurant, restaurant_location 
    WHERE restaurant.Zip= restaurant_location.Zip AND Restaurant_city="Arlington";</p>
   Enter the location :<input type ="text" name="locationvalue" size="30"/><br><br>
  <input type="submit" value="query8" name="query8"/><br><br><br>
</form>

<form action="RSE2.php" method="POST"><br>
  <p align ="left"><b>Query-9 Restaurant timings within which most of the reservations are made in a Restaurant “Panda House Chinese Restaurant” on 2016-11-10.</b><br><br><br>
  SELECT restaurant.Restaurant_Name,reservation.Reservation_Date,reservation.Reservation_Time,reservation.Reservation_No_Of_People,COUNT(*) FROM reservation,restaurant,restaurant_location WHERE reservation.Restaurant_ID=restaurant.Restaurant_ID and restaurant_location.Zip=restaurant.Zip and restaurant.Restaurant_Name='Panda House Chinese Restaurant' and reservation.Reservation_Date='2016-11-10' GROUP BY reservation.Reservation_Time ORDER BY COUNT(*) DESC LIMIT 1</p><br><br>
 <!-- Enter the date:<input type ="text" name="date9" size="30"/><br><br>-->
  <input type="submit" value="query9" name="query9"/><br><br><br>
</form>

<form action="RSE2.php" method="POST"><br>
  <p align ="left"><b>Query-10  Restaurants which received rating from most number of customers from 2016-10-09 to 2016-11-10</b><br><br><br>
    SELECT restaurant.Restaurant_Name,restaurant.Restaurant_OpenHours,restaurant_location.Restaurant_City,restaurant_location.Restaurant_State,COUNT(*) FROM restaurant,restaurant_location,rating_feedback WHERE restaurant.Zip=restaurant_location.Zip and restaurant.Restaurant_ID=rating_feedback.Restaurant_ID and rating_feedback.Restaurant_Visited_Date>='2016-10-09'and rating_feedback.Restaurant_Visited_Date<='2016-11-10' GROUP BY rating_feedback.Restaurant_ID ORDER BY COUNT(*) DESC</p><br><br>
  <input type="submit" value="query10" name="query10"/><br><br><br>
</form>



 <?php
/* include 'connection.php';
 global $conn;
//Query-1
    if (isset($_POST['query1'])){
    $dbh = new PDO("mysql:hos=localhost:80;dbname=stockexchange","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $dbh->beginTransaction();
    //$date=$_POST['date'];
    $stmt=$dbh->prepare('SELECT COMP_NAME, SUM(NUM_SHARES_PUR) AS NUMBER_OF_SHARES_SOLD FROM REGISTERED_COMPANIES A INNER JOIN STOCK_PURCHASE_DETAILS B ON (A.COMP_ID=B.COMP_ID) WHERE A.REG_DATE >= "'.$date.'" GROUP BY A.COMP_ID,A.COMP_NAME');

     $stmt->execute();
     echo "<table>
     <tr>
       <th>company name</th>
       <th>Number of shares sold</th>

     </tr>";
     while($row=$stmt->fetch()){

     echo "<tr>
     <td>".$row[0]."</td>
     <td>".$row['NUMBER_OF_SHARES_SOLD']."</td>
     </tr>";

   }

echo "</table>";
$dbh = null;
 }

 //Query-2
 if (isset($_POST['query2'])){
 $dbh = new PDO("mysql:hos=localhost:80;dbname=stockexchange","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 $dbh->beginTransaction();
 //$date=$_POST['date'];
 $stmt=$dbh->prepare('SELECT B.F_NAME AS CUSTOMER_NAME,C.COMP_NAME AS COMPANY_NAME,D.F_NAME AS BROKER_NAME,(PRICE_SOLD-PRICE_PURCHASED)*NUM_SHARES_SOLD FROM STOCK_SALE_DETAILS A INNER JOIN CUSTOMER B ON (A.CUST_ID=B.CUST_ID) INNER JOIN REGISTERED_COMPANIES C ON (A.COMP_ID=C.COMP_ID) INNER JOIN BROKER D ON (A.BROKER_ID=D.BROKER_ID) ORDER BY (PRICE_SOLD-PRICE_PURCHASED)*NUM_SHARES_SOLD DESC LIMIT 1');

  $stmt->execute();
  echo "<table>
  <tr>
    <th>Customer Name</th>
    <th>Company Name</th>
    <th>Broker Name</th>
    <th>Profit</th>

  </tr>";
  while($row=$stmt->fetch()){

  echo "<tr>
  <td>".$row[0]."</td>
  <td>".$row[1]."</td>
  <td>".$row[2]."</td>
  <td>".$row[3]."</td>
  </tr>";

}

echo "</table>";
$dbh = null;
}
 //Query-3
 if (isset($_POST['query3'])){
 $dbh = new PDO("mysql:hos=localhost:80;dbname=stockexchange","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 $dbh->beginTransaction();
 //$date=$_POST['date'];
 $stmt=$dbh->prepare('SELECT COMPANY_ID,COMPANY_NAME,ENTRY_DATE,MAX(I.INCREASE_IN_PRICE) AS PRICE_INCREASE_IN_DOLLARS
FROM
( SELECT A.COMP_ID AS COMPANY_ID,B.COMP_NAME AS COMPANY_NAME,A.ENTRY_DATE,(CLOSING_PRICE-OPENING_PRICE) AS INCREASE_IN_PRICE
FROM DAILY_STOCK_DETAILS A INNER JOIN REGISTERED_COMPANIES B ON (A.COMP_ID=B.COMP_ID) ) I
GROUP BY COMPANY_ID,COMPANY_NAME,ENTRY_DATE
HAVING MAX(I.INCREASE_IN_PRICE) >= 1');

  $stmt->execute();
  echo "<table>
  <tr>
    <th>company_id</th>
    <th>company_name</th>
    <th>Entry_date</th>
    <th>Increase_in_price</th>
  </tr>";
  while($row=$stmt->fetch()){

  echo "<tr>
  <td>".$row[0]."</td>
  <td>".$row[1]."</td>
  <td>".$row[2]."</td>
  <td>".$row[3]."</td>
  </tr>";

 }

 echo "</table>";
 $dbh = null;
 }

//QUERY-4
if (isset($_POST['query4'])){
$dbh = new PDO("mysql:hos=localhost:80;dbname=stockexchange","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
$date=$_POST['date'];
$stmt=$dbh->prepare('SELECT ROLE, COUNT(EMPLOYEE_ID) AS NUMBER_OF_EMPLOYEES
FROM EMPLOYEE
WHERE DATE_OF_JOINING >= '.$date.'
GROUP BY ROLE');

 $stmt->execute();
 echo "<table>
 <tr>
   <th>Role</th>
   <th>Number_of_employees</th>
 </tr>";
 while($row=$stmt->fetch()){

 echo "<tr>
 <td>".$row[0]."</td>
 <td>".$row[1]."</td>
 </tr>";

}

echo "</table>";
$dbh = null;
}

//Query-5
if (isset($_POST['query5'])){
$dbh = new PDO("mysql:hos=localhost:80;dbname=stockexchange","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
//$date=$_POST['date'];
$stmt=$dbh->prepare('SELECT A.F_NAME AS EMPLOYEE_NAME, B.F_NAME AS MANAGER_NAME FROM EMPLOYEE A INNER JOIN EMPLOYEE B ON A.MANAGER_ID = B.EMPLOYEE_ID');

 $stmt->execute();
 echo "<table>
 <tr>
   <th>Employee Name</th>
   <th>Manger Name</th>
 </tr>";
 while($row=$stmt->fetch()){

 echo "<tr>
 <td>".$row[0]."</td>
 <td>".$row[1]."</td>
 </tr>";

}

echo "</table>";
$dbh = null;
}

//Query-6
if (isset($_POST['query6'])){
$dbh = new PDO("mysql:hos=localhost:80;dbname=stockexchange","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
//$date=$_POST['date'];
$stmt=$dbh->prepare('SELECT I.CUSTOMER_ID,I.CUSTOMER_NAME,SUM(I.NUM_SHARES) AS TOTAL_SHARES FROM ( SELECT A.CUST_ID AS CUSTOMER_ID,B.F_NAME AS CUSTOMER_NAME, (TOTAL_PURCHASED - TOTAL_SOLD) AS NUM_SHARES FROM TRANSACTION_MASTER A INNER JOIN CUSTOMER B ON (A.CUST_ID = B.CUST_ID) ) I GROUP BY I.CUSTOMER_ID,I.CUSTOMER_NAME ORDER BY TOTAL_SHARES DESC LIMIT 1');

 $stmt->execute();
 echo "<table>
 <tr>
   <th>Customer_ID</th>
   <th>Customer_Name</th>
   <th>Total_Shares</th>
 </tr>";
 while($row=$stmt->fetch()){

 echo "<tr>
 <td>".$row[0]."</td>
 <td>".$row[1]."</td>
 <td>".$row[2]."</td>
 </tr>";

}

echo "</table>";
$dbh = null;
}

//query-7
if (isset($_POST['query7'])){
$dbh = new PDO("mysql:hos=localhost:80;dbname=stockexchange","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
//$date=$_POST['date'];
$stmt=$dbh->prepare('SELECT I.CUSTOMER_ID,C.F_NAME AS CUSTOMER_NAME,MAX(PROFIT)
FROM
 ( SELECT CUST_ID AS CUSTOMER_ID, SUM((PRICE_SOLD-PRICE_PURCHASED)*NUM_SHARES_SOLD) AS PROFIT
   FROM STOCK_SALE_DETAILS
   GROUP BY CUST_ID ORDER BY PROFIT DESC ) AS I JOIN CUSTOMER C ON (I.CUSTOMER_ID = C.CUST_ID)');

 $stmt->execute();
 echo "<table>
 <tr>
   <th>Customer_ID</th>
   <th>Customer_Name</th>
   <th>Profit</th>
 </tr>";
 while($row=$stmt->fetch()){

 echo "<tr>
 <td>".$row[0]."</td>
 <td>".$row[1]."</td>
 <td>".$row[2]."</td>
 </tr>";

}

echo "</table>";
$dbh = null;
}
//Query-8
if (isset($_POST['query8'])){
$dbh = new PDO("mysql:hos=localhost:80;dbname=stockexchange","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
$date8=$_POST['date2'];
$stmt=$dbh->prepare('SELECT R.COMP_NAME,OPENING_PRICE,CLOSING_PRICE
  FROM DAILY_STOCK_DETAILS D INNER JOIN REGISTERED_COMPANIES R ON (D.COMP_ID = R.COMP_ID)
  WHERE ENTRY_DATE = "'.$date8.'"');

 $stmt->execute();
 echo "<table>
 <tr>
   <th>Company_Name</th>
   <th>Opening Price</th>
   <th>Closing Price</th>
 </tr>";
 while($row=$stmt->fetch()){

 echo "<tr>
 <td>".$row[0]."</td>
 <td>".$row[1]."</td>
 <td>".$row[2]."</td>
 </tr>";

}

echo "</table>";
$dbh = null;
}

//Query-9
if (isset($_POST['query9'])){
$dbh = new PDO("mysql:hos=localhost:80;dbname=stockexchange","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
$date=$_POST['date1'];
$stmt=$dbh->prepare('SELECT R.COMP_ID,R.COMP_NAME,SUM(NUM_SHARES_SOLD) AS NUM_OF_SHARES
FROM STOCK_SALE_DETAILS S INNER JOIN REGISTERED_COMPANIES R ON (S.COMP_ID = R.COMP_ID)
WHERE S.DATE_SOLD = "'.$date.'"
GROUP BY R.COMP_ID,R.COMP_NAME');

 $stmt->execute();
 echo "<table>
 <tr>
   <th>Company_ID</th>
   <th>Company_Name</th>
   <th>Number_of_Shares</th>
 </tr>";
 while($row=$stmt->fetch()){
 echo "<tr>
 <td>".$row[0]."</td>
 <td>".$row[1]."</td>
 <td>".$row[2]."</td>
 </tr>";
}
echo "</table>";
$dbh = null;
}

//Query-10
if (isset($_POST['query10'])){
$dbh = new PDO("mysql:hos=localhost:80;dbname=stockexchange","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
//$date=$_POST['date'];
$stmt=$dbh->prepare('SELECT C.F_NAME AS CUSTOMER_NAME,B.F_NAME AS BROKER_NAME, COUNT(B.BROKER_ID) AS NUM_OF_TRANSACTIONS
FROM
STOCK_SALE_DETAILS S INNER JOIN BROKER B ON (S.BROKER_ID = B.BROKER_ID)
INNER JOIN CUSTOMER C ON(C.CUST_ID = S.CUST_ID)
GROUP BY C.F_NAME,B.F_NAME,B.BROKER_ID');

 $stmt->execute();
 echo "<table>
 <tr>
   <th>Customer Name</th>
   <th>Broker Name</th>
   <th>Number of Transactions</th>

 </tr>";
 while($row=$stmt->fetch()){

 echo "<tr>
 <td>".$row[0]."</td>
 <td>".$row[1]."</td>
 <td>".$row[2]."</td>
 </tr>";

}

echo "</table>";
$dbh = null;
}*/




?>
</div>
</body>
</html>
