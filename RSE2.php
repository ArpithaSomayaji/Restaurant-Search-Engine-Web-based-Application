<html>
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
<?php
include 'connection.php';
global $conn;
//Query-1
   if (isset($_POST['query1'])){
   $dbh = new PDO("mysql:hos=localhost:80;dbname=restaurantsearchengine","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   $dbh->beginTransaction();
  /* $date2=$_POST['date2'];*/
   $stmt=$dbh->prepare('select Distinct Restaurant.Restaurant_Name from Restaurant,Rating_Feedback 
where Restaurant.Restaurant_ID=Rating_Feedback.Restaurant_ID and Rating_Feedback.Customer_Overall_Rating>=4 and Rating_Feedback.Customer_Cuisine_Rating>=4 ;');

    $stmt->execute();
    echo "<table>
    <tr>
      <th>Restaurant_name</th>
      

    </tr>";
    while($row=$stmt->fetch()){

    echo "<tr>
    <td>".$row[0]."</td>
  
    </tr>";

  }

echo "</table>";
$dbh = null;
}


//QUERY-2
if (isset($_POST['query2'])){
$dbh = new PDO("mysql:hos=localhost:80;dbname=restaurantsearchengine","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
//$date4=$_POST['date4'];
$stmt=$dbh->prepare('select Restaurant.Restaurant_Name,Reservation.Restaurant_Reservation_Capacity_Per_Hour,Restaurant.Restaurant_OpenHours 
from (Reservation join Restaurant on Reservation.Restaurant_ID=Restaurant.Restaurant_ID) 
where Reservation.Restaurant_Reservation_Capacity_Per_Hour>=50 and Reservation.Reservation_Time in (select Reservation.Reservation_Time from Reservation);
');

$stmt->execute();
echo "<table>
<tr>
  <th>Restaurant_Name</th>
  <th>Restaurant_Reservation_Capacity_Per_Hour</th>
  <th>Restaurant_OpenHours</th>

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

//Query-3
if (isset($_POST['query3'])){
$dbh = new PDO("mysql:hos=localhost:80;dbname=restaurantsearchengine","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
//$date=$_POST['date'];
$cuisine=$_POST['cuisine'];
$location=$_POST['location'];
$stmt=$dbh->prepare('select Distinct Restaurant.Restaurant_Name,Restaurant.Restaurant_OpenHours,Restaurant_Location.Restaurant_City,Restaurant_Location.Restaurant_State from 
((((Restaurant join RestaurantProvidingCuisineType on Restaurant.Restaurant_ID=RestaurantProvidingCuisineType.Restaurant_ID)join Cuisine on RestaurantProvidingCuisineType.Cuisine_ID=Cuisine.Cuisine_ID) join Rating_Feedback on Restaurant.Restaurant_ID=Rating_Feedback.Restaurant_ID)join Restaurant_Location on Restaurant_Location.Zip=Restaurant.Zip) 
where Restaurant_Location.Restaurant_City="'.$location.'" and Rating_Feedback.Customer_Overall_Rating>=3 and Cuisine.Cuisine_Name="'.$cuisine.'";
');

 $stmt->execute();
 echo "<table>
 <tr>
   <th>Restaurant_Name</th>
   <th>Restaurant_OpenHours</th>
   <th>Restaurant_City</th>
   <th>Restaurant_State</th>

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


//Query-4
if (isset($_POST['query4'])){
$dbh = new PDO("mysql:hos=localhost:80;dbname=restaurantsearchengine","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
//$date=$_POST['date'];
$stmt=$dbh->prepare(' select DISTINCT Restaurant_Name,Restaurant_OpenHours,Restaurant_City,Restaurant_State,Customer_Overall_Rating
from ((select Restaurant_Name, Zip,Restaurant_OpenHours,Customer_Overall_Rating
      from Restaurant JOIN Rating_Feedback ON Restaurant.Restaurant_ID = Rating_Feedback.Restaurant_ID
                  where Customer_Overall_Rating >=3 AND Restaurant_Visited_Date between "2016-11-01" AND "2016-11-08")AS temp JOIN Restaurant_Location ON temp.Zip = Restaurant_Location.Zip)
where Restaurant_City="Arlington";
');

 $stmt->execute();
 echo "<table>
 <tr>
   <th>Restaurant_Name </th>
   <th>Restaurant_OpenHours </th>
   <th>Restaurant_City </th>
   <th> Restaurant_State</th>
   <th>Customer_Overall_Rating </th>
   
 </tr>";
 while($row=$stmt->fetch()){

 echo "<tr>
 <td>".$row[0]."</td>
 <td>".$row[1]."</td>
 <td>".$row[2]."</td>
 <td>".$row[3]."</td>
 <td>".$row[4]."</td>
 
 
 </tr>";

}

echo "</table>";
$dbh = null;
}

//Query-5
if (isset($_POST['query5'])){
$dbh = new PDO("mysql:hos=localhost:80;dbname=restaurantsearchengine","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
//$date=$_POST['date'];
$date1=$_POST['date1'];
$date2=$_POST['date2'];
$stmt=$dbh->prepare('select Customer.Customer_Name,count(*) as Customer_Rating_Count from Customer,Rating_Feedback where Customer.Customer_ID=Rating_Feedback.Customer_ID  group by Customer.Customer_Name having 
 exists(Select * from Rating_Feedback where Rating_Feedback.Restaurant_Visited_Date between "'.$date1.'" and "'.$date2.'") ;');
$stmt->execute();
echo "<table>
<tr>
  <th>Customer_Name</th>
  <th>Customer_Rating_Count</th>
 
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
$dbh = new PDO("mysql:hos=localhost:80;dbname=restaurantsearchengine","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
$cuisinevalue=$_POST['cuisinevalue'];
$stmt=$dbh->prepare('SELECT Restaurant_Name,Cuisine_Name FROM restaurant ,restaurantprovidingcuisinetype, cuisine WHERE restaurant.Restaurant_ID=restaurantprovidingcuisinetype.Restaurant_ID and restaurantprovidingcuisinetype.Cuisine_ID=cuisine.Cuisine_ID and cuisine.Cuisine_Name="'.$cuisinevalue.'";');

$stmt->execute();
echo "<table>
<tr>
  <th>Restaurant_Name</th>
  <th>Cuisine_Name</th>
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


//query-7
if (isset($_POST['query7'])){
$dbh = new PDO("mysql:hos=localhost:80;dbname=restaurantsearchengine","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
$Budgetvalue=$_POST['radio'];
$stmt=$dbh->prepare('select Restaurant_Name, Restaurant_Menu, Restaurant_Contact, Restaurant_Email, Budget from restaurant JOIN budget_range on restaurant.Budget_Id=budget_range.Budget_Id and Budget="'.$Budgetvalue.'";');

$stmt->execute();
echo "<table>
<tr>
  <th>Restaurant_Name</th>
  <th>Restaurant_Menu</th>
  <th>Restaurant_Contact</th>
  <th>Restaurant_Email</th>
  <th>Budget</th>

</tr>";
while($row=$stmt->fetch()){

echo "<tr>
<td>".$row[0]."</td>
<td>".$row[1]."</td>
<td>".$row[2]."</td>
<td>".$row[3]."</td>
<td>".$row[4]."</td>
</tr>";

}

echo "</table>";
$dbh = null;
}
//Query-8
if (isset($_POST['query8'])){
$dbh = new PDO("mysql:hos=localhost:80;dbname=restaurantsearchengine","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
$locationvalue=$_POST['locationvalue'];
$stmt=$dbh->prepare('SELECT Restaurant_Name, Restaurant_OpenHours,Restaurant_city FROM restaurant, restaurant_location WHERE restaurant.Zip= restaurant_location.Zip AND Restaurant_city="'.$locationvalue.'";');

$stmt->execute();
echo "<table>
<tr>
  <th>Restarant_Name</th>
  <th>Restaurant_OpenHours</th>
  <th>Restaurant_city</th>
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
$dbh = new PDO("mysql:hos=localhost:80;dbname=restaurantsearchengine","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
//$date9=$_POST['date9'];
$stmt=$dbh->prepare('SELECT restaurant.Restaurant_Name,reservation.Reservation_Date,reservation.Reservation_Time,reservation.Reservation_No_Of_People,COUNT(*) as count_value FROM reservation,restaurant,restaurant_location WHERE reservation.Restaurant_ID=restaurant.Restaurant_ID and restaurant_location.Zip=restaurant.Zip and restaurant.Restaurant_Name="Panda House Chinese Restaurant"
  and reservation.Reservation_Date="2016-11-10" GROUP BY reservation.Reservation_Time ORDER BY COUNT(*) DESC LIMIT 1');

$stmt->execute();
echo "<table>
<tr>
  <th>Restaurant_Name</th>
  <th>Reservation_Date</th>
  <th>Reservation_Time</th>
   <th>Reservation_No_Of_People</th>
    <th>count_value</th>
</tr>";
while($row=$stmt->fetch()){
echo "<tr>
<td>".$row[0]."</td>
<td>".$row[1]."</td>
<td>".$row[2]."</td>
<td>".$row[3]."</td>
<td>".$row[4]."</td>
</tr>";
}
echo "</table>";
$dbh = null;
}

//Query-10
if (isset($_POST['query10'])){
$dbh = new PDO("mysql:hos=localhost:80;dbname=restaurantsearchengine","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$dbh->beginTransaction();
//$date=$_POST['date'];
$stmt=$dbh->prepare('SELECT restaurant.Restaurant_Name,restaurant.Restaurant_OpenHours,restaurant_location.Restaurant_City,restaurant_location.Restaurant_State,COUNT(*) as count_value FROM restaurant,restaurant_location,rating_feedback WHERE restaurant.Zip=restaurant_location.Zip and restaurant.Restaurant_ID=rating_feedback.Restaurant_ID and rating_feedback.Restaurant_Visited_Date>="2016-10-09"and rating_feedback.Restaurant_Visited_Date<="2016-11-10" GROUP BY rating_feedback.Restaurant_ID ORDER BY COUNT(*) DESC');

$stmt->execute();
echo "<table>
<tr>
  <th>Restaurant_Name</th>
  <th>Restaurant_OpenHours</th>
  <th>Restaurant_City</th>
   <th>Restaurant_State</th>
   <th>count_value</th>

</tr>";
while($row=$stmt->fetch()){

echo "<tr>
<td>".$row[0]."</td>
<td>".$row[1]."</td>
<td>".$row[2]."</td>
<td>".$row[3]."</td>
<td>".$row[4]."</td>
</tr>";

}

echo "</table>";
$dbh = null;
}

?>
</html>
