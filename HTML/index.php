<?php 
include('connection.php');
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 25;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

	$result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM  tutors WHERE deleted=0");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1

$sql = "SELECT t.TutorID, t.firstname, t.lastname,  t.BirthDate, t.patronymic, t.work_start_date, t.phone, t.mail, t.CafedraID, c.cafedraNameKZ, f.facultyNameKZ, t.job_title    from tutors  
t JOIN cafedras  c ON c.cafedraID=t.CafedraID 
JOIN faculties f on c.FacultyID=f.FacultyID WHERE t.deleted=0 LIMIT $offset, $total_records_per_page ";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <script src="scripts/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<style>

body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

.example input[type=text] {
  margin: 12px 100px 10px;
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  width: 80%;
  background: #f1f1f1;
}


form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}


#customers {
  padding: 50px;
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #0CF;
  color: white;
}
</style>
<title>Teacher Profile</title>
<meta charset="utf-8" />
</head>
<body>
<div class="example">
<input type="text" id="search_text" placeholder="Іздеу.." name="search">
</div>
<br>
</br>
<div>
<table id="customers">
<thead>
  <tr>
    <th>Толық аты-жөні</th>
    <th>Факультет</th>
    <th>Кафедра</th>
  </tr>
</thead>
<?php
 if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        //echo "<a href='details.php?tutid={$row['TutorID']}'>{$row['firstname']}  {$row['lastname']} {$row['patronymic']}</a><br>\n";
        echo "<tbody><tr data-href='details.php?tutid={$row['TutorID']}'><td>".$row['firstname']." ".$row['lastname']." ".$row['patronymic']."</td><td>".$row['facultyNameKZ']."</td><td>".$row['cafedraNameKZ']."</td></tr></tbody>";

    } 

}else{
    echo "<h2>Derekter jok</h2>";
}
 mysqli_free_result($result);
 mysqli_close($conn);
?>
</table>
<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong><?php echo $total_no_of_pages." беттің ".$page_no; ?> беті</strong>
</div>

<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Алдыңғы</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Келесі</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Соңғы &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>


</body>

<script >
$(document).ready(function() {
  $("#search_text").keyup(function() {
    var search = $(this).val();
    $.ajax({
      url:'action.php',
      method:'post',
      data:{query:search},
      success:function(response) {
        $("#customers").html(response);
      }
    });
  });
});
$(document).ready(function() {
  $(document.body).on("click", "tr[data-href]", function () {
    window.location.href=this.dataset.href;
  });
});

</script>
</html>