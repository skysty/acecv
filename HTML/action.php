<?php
include 'connection.php';
$output =' ';
if(isset($_POST['query'])){
    $search=$_POST['query'];
    $stmt=$conn->prepare("SELECT t.TutorID, t.firstname, t.lastname,  t.BirthDate, t.patronymic, t.work_start_date, t.phone, t.mail, t.CafedraID, c.cafedraNameKZ, f.facultyNameKZ, t.job_title  from tutors  
    t JOIN cafedras  c ON c.cafedraID=t.CafedraID 
    JOIN faculties f on c.FacultyID=f.FacultyID   
    Where firstname LIKE CONCAT('%',?, '%') or lastname LIKE CONCAT('%',?,'%')  And deleted=0");
    $stmt->bind_param("ss", $search, $search);
} 
else{
    $stmt=$conn->prepare("SELECT t.TutorID, t.firstname, t.lastname,  t.BirthDate, t.patronymic, t.work_start_date, t.phone, t.mail, t.CafedraID, c.cafedraNameKZ, f.facultyNameKZ, t.job_title  from tutors  
    t JOIN cafedras  c ON c.cafedraID=t.CafedraID 
    JOIN faculties f on c.FacultyID=f.FacultyID WHERE t.deleted=0");
}
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows>0){
    $output="<thead>
    <tr>
      <th>Толық аты-жөні</th>
      <th>Факультет</th>
      <th>Кафедра</th>
    </tr>
  </thead>
  <tbody>";
while ($row=$result->fetch_assoc()){
    $output.="<tr data-href='details.php?tutid={$row['TutorID']}'><td>".$row['firstname']." ".$row['lastname']." ".$row['patronymic']."</td><td>".$row['facultyNameKZ']."</td><td>".$row['cafedraNameKZ']."</td></tr>";
}
 $output.="</tbody>";
 echo $output;
}else {
    echo "<h3>Сіз сұрап жатқан сұранымдар жоқ</h3>";
}
?>
