<?php
    include('connection.php');
    $tut = $_GET['tutid'];
    
    $sql = "SELECT t.TutorID, t.firstname, t.lastname,  t.BirthDate, t.patronymic, t.work_start_date, t.phone, t.mail, t.CafedraID, c.cafedraNameKZ, f.facultyNameKZ, t.job_title, t.photo  from tutors  
    t JOIN cafedras  c ON c.cafedraID=t.CafedraID 
    JOIN faculties f on c.FacultyID=f.FacultyID  Where t.TutorID ='$tut' and deleted=0 ";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    $row = mysqli_fetch_array($result);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Website Layout</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 5px;
  text-align: center;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #2086DC;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create three equal columns that floats next to each other */

.column1 {
  float: left;
  width: 30%;
  padding: 15px;
  
  
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width:600px) {
  .column {
    width: 100%;
  }
}
</style>

</head>
<body>

<div class="header">
  <h1>Header</h1>
  <p>Resize the browser window to see the responsive effect.</p>
</div>

<div class="topnav">
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
</div>

<div class="row">
  <div class="column1">
    <h2>Column</h2>
    <ul>
      
        <img src="imageView.php?TutorID=<?php echo $row["TutorID"]; ?>"/>
        <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>

	</ul>
  </div>
  
  <div class="column">
    <h2>Қысқаша мәлімет</h2>
    <p>Аты-Жөні:<?php echo $row['firstname'].' '.$row['lastname'].' '.$row['patronymic']?></p>
    <p>Туылған жылы:<?php echo $row['BirthDate']?></p>
    <p>Кафедра:<?php echo $row['cafedraNameKZ']?></p>
    <p>Факультет:<?php echo $row['facultyNameKZ']?></p>
  </div>
  
  
</div>
</body>
</html>