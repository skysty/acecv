<?php
    include('connection.php');
    $tut = $_GET['tutid'];
    
    $sql = "SELECT t.TutorID, t.firstname, t.lastname,  t.BirthDate, t.patronymic, t.work_start_date, t.phone,t.adress, t.mail, t.CafedraID, c.cafedraNameKZ, f.facultyNameKZ, t.job_title, t.photo, t.ScientificDegreeID, s.NAMEKZ  from tutors  
    t JOIN cafedras  c ON c.cafedraID=t.CafedraID 
    JOIN faculties f on c.FacultyID=f.FacultyID  Join scientificdegree s On  s.ID=t.ScientificDegreeID Where t.TutorID ='$tut' and deleted=0 ";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    $row = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<!-- ==============================
    Project:        Metronic "Acecv" Frontend Freebie - Responsive HTML Template Based On Twitter Bootstrap 3.3.4
    Version:        1.0
    Author:         KeenThemes
    Primary use:    Corporate, Business Themes.
    Email:          support@keenthemes.com
    Follow:         http://www.twitter.com/keenthemes
    Like:           http://www.facebook.com/keenthemes
    Website:        http://www.keenthemes.com
    Premium:        Premium Metronic Admin Theme: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
================================== -->
<html lang="en" class="no-js">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Портфолио</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <!-- GLOBAL MANDATORY STYLES -->
       
        <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

        <!-- PAGE LEVEL PLUGIN STYLES -->
        <link href="css/animate.css" rel="stylesheet">
        <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>

        <!-- THEME STYLES -->
        <link href="css/layout.css" rel="stylesheet" type="text/css"/>
        <style>
         .table{
             font-size:11px;
         }
        </style>
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <!-- END HEAD -->

    <!-- BODY -->
    <body id="body" data-spy="scroll" data-target=".header">

        <!--========== HEADER ==========-->
        <header class="header navbar-fixed-top">
            <!-- Navbar -->
            <nav class="navbar" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="menu-container js_nav-item">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon"></span>
                        </button>

                        <!-- Logo -->
                        <div class="logo">
                            <a class="logo-wrap" href="#body">
                                <img class="logo-img" src="img/logo.png" alt="Asentus Logo">
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-collapse">
                        <div class="menu-container">
                            <ul class="nav navbar-nav navbar-nav-right">
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="index.php">ОПҚ Тізімі</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#body">Портфолио</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#about">Қысқаша мәлімет</a></li>
                                <!--<li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#work">Work</a></li>-->
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#contact">Байланыс</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Navbar Collapse -->
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        <!--========== END HEADER ==========-->

        <!--========== SLIDER ==========-->
        <div class="promo-block">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 sm-margin-b-60">
                        <div class="margin-b-30">
                            <h1 class="promo-block-title"><?php echo $row['firstname']?> <br/> <?php echo $row['lastname']?><br/> <?php echo $row['patronymic']?></h1>
                            <p class="promo-block-text"><?php  $job=$row['job_title'];
                                                                echo  ucfirst(strtolower($job)); ?></p>
                        </div>
                        <!--<ul class="list-inline">
                            <li><a href="#" class="social-icons"><i class="icon-social-facebook"></i></a></li>
                            <li><a href="#" class="social-icons"><i class="icon-social-twitter"></i></a></li>
                            <li><a href="#" class="social-icons"><i class="icon-social-dribbble"></i></a></li>
                            <li><a href="#" class="social-icons"><i class="icon-social-behance"></i></a></li>
                            <li><a href="#" class="social-icons"><i class="icon-social-linkedin"></i></a></li>
                        </ul>-->
                    </div>
                    <div class="col-sm-6">
                        <div class="promo-block-img-wrap">
                            <img class="promo-block-img img-responsive" src="imageView.php?TutorID=<?php echo $row["TutorID"]; ?>"  align="Avatar" width="350" height="475">
                        </div>
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!--========== SLIDER ==========-->

        <!--========== PAGE LAYOUT ==========-->
        <!-- About -->
        <div id="about">
            <div class="container content-lg"> 
                <div class="row">
                    <div class="col-sm-5 sm-margin-b-60">
                        <img class="full-width img-responsive" src="img/500x700/01.jpg" alt="Image" width="350" height="475">
                    </div>
                    <div class="col-sm-7">
                        <div class="section-seperator margin-b-50">
                            <div class="margin-b-50">
                                <div class="margin-b-30">
                                    <h2>Қысқаша мәлімет</h2>
                                    <p>Ғылыми дәрежесі: <?php  $degree=$row['ScientificDegreeID']; 
                                              switch($degree){
                                                  case 2:
                                                    echo $row['NAMEKZ'];
                                                    break;
                                                  case 3:
                                                    echo $row['NAMEKZ'];
                                                    break;
                                                  case 4:
                                                    echo $row['NAMEKZ'];
                                                    break;
                                                  case 5:
                                                    echo $row['NAMEKZ'];
                                                    break;
                                                  default:
                                                    echo 'Ғылыми дәрежесі жоқ';            
                                                }
                                          ?></p>
                                          <p>Факультет: <?php echo $row['facultyNameKZ']?></p>
                                          <p>Кафедра: <?php echo $row['cafedraNameKZ']?></p>

<?php
    $sql1 = "SELECT  t.TutorID,
    f.facultyNameRU, s.NameRU , tp.theme,
    tp.plot, tp.edition, 
    tp.additional, tp.pubdate , 
    pt.nameru, pl.nameru,
    tp.coauthor , cs.nameru,
    cc.nameru , c1.nameru , tp.edition_year , 
    tp.edition_pages , tp.edition_number   
  FROM tutors t
    JOIN tutorpubs tp ON t.TutorID = tp.TutorID
   JOIN cafedras c ON t.CafedraID = c.cafedraID
   JOIN faculties f ON c.FacultyID = f.FacultyId
   JOIN sciencefields s ON s.Id = tp.sciencefieldID
   JOIN center_countries cc ON tp.countryID= cc.id
   JOIN publication_type pt ON tp.publication_type = pt.id
   JOIN cities c1 ON tp.cityID = c1.id
   JOIN publication_level pl ON tp.publication_level = pl.id
   JOIN center_studylanguages cs ON tp.langID = cs.id
   WHERE t.deleted = 0 AND t.TutorID ='$tut' ";
   $result1 = mysqli_query($conn, $sql1) or die(mysqli_error());
?>

  <h3>Еңбектері</h3>
  <p></p>                                                                                      
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Ғылым саласы</th>
        <th>Басылым</th>
        <th>Шығарылым атауы</th>
        <th>Жарияланған күні</th>
        <th>Сыртқы авторлар, аты-жөні</th>
        <th>Басылымдағы бет нөмірлері</th>
      </tr>
    </thead>
    
    <?php
    $i=0;
     if(mysqli_num_rows($result1) > 0){
    while($row1 = mysqli_fetch_array($result1)){
        $i++;
        echo "<tbody><tr><td>".$i."</td><td>".$row1['NameRU']."</td><td>".$row1['theme']."</td><td>".$row1['edition']."</td><td>".$row1['pubdate']."</td><td>".$row1['coauthor']."</td><td>".$row1['edition_pages']."</td></tr></tbody>";

    }
 } else{
        echo "<h4>Жоқ</h4>";
    }
    
?>
  </table>
  </div>
                            </div>
                                
                            </div>
                        </div>

                        
                        <!-- Progress Box 
                        <div class="progress-box">
                            <h5>Adobe Illustrator <span class="color-heading pull-right">87%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="87"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>Adobe Photoshop <span class="color-heading pull-right">96%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="96"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>Graphic Design <span class="color-heading pull-right">77%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="77"></div>
                            </div>
                        </div>
                         End Progress Box -->
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End About -->


            
        <!-- Contact -->
        <div id="contact">
            <div class="bg-color-sky-light">
                <div class="container content-lg">
                    <div class="row margin-b-40">
                        <div class="col-sm-6">
                           <h2>Байланыс</h2>
                            
                        </div>
                    </div>
                    <!--// end row -->

                    <div class="row">
                        <div class="col-md-3 col-xs-6 md-margin-b-30">
                            <h4>Мекен-жайы</h4>
                            <a href="#"><?php echo $row['adress']?></a>
                        </div>
                        <div class="col-md-3 col-xs-6 md-margin-b-30">
                            <h4>Phone</h4>
                            <a href="<?php echo $row['phone']?>"><?php echo $row['phone']?></a>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <h4>Email</h4>
                            <a href="mailto:<?php echo $row['mail']?>"><?php echo $row['mail']?></a>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <h4>Web</h4>
                            <a href="https://ayu.edu.kz">https://ayu.edu.kz</a>
                        </div>
                    </div>
                    <!--// end row -->
                </div>
            </div>
        </div>
        <!-- End Contact -->
        <!--========== END PAGE LAYOUT ==========-->

        <!--========== FOOTER ==========-->
        <footer class="footer">
            <div class="content container">
                <div class="row">
                    <div class="col-xs-6">
                        <img class="footer-logo" src="img/logo.png" alt="Acecv Logo">
                    </div>
                    <div class="col-xs-6 text-right sm-text-left">
                        <p class="margin-b-0"><a class="fweight-700" href="#"></a>  Powered by: <a class="fweight-700" href="https://ayu.edu.kz/structural-units/it-center">IT Department</a></p>
						<br>
						
                    </div>
                </div>
				<p align="center">© Қожа Ахмет Ясауи атындағы Халықаралық қазақ-түрік университеті | 2021</p>
                <!--// end row -->
            </div>
        </footer>
        <!--========== END FOOTER ==========-->

        <!-- Back To Top -->
        <a href="javascript:void(0);" class="js-back-to-top back-to-top">Жоғары</a>

        <!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- CORE PLUGINS -->
        <script src="vendor/jquery.min.js" type="text/javascript"></script>
        <script src="vendor/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL PLUGINS -->
        <script src="vendor/jquery.easing.js" type="text/javascript"></script>
        <script src="vendor/jquery.back-to-top.js" type="text/javascript"></script>
        <script src="vendor/jquery.smooth-scroll.js" type="text/javascript"></script>
        <script src="vendor/jquery.wow.min.js" type="text/javascript"></script>
        <script src="vendor/jquery.parallax.min.js" type="text/javascript"></script>
        <script src="vendor/jquery.appear.js" type="text/javascript"></script>
        <script src="vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL SCRIPTS -->
        <script src="js/layout.min.js" type="text/javascript"></script>
        <script src="js/components/progress-bar.min.js" type="text/javascript"></script>
        <script src="js/components/swiper.min.js" type="text/javascript"></script>
        <script src="js/components/wow.min.js" type="text/javascript"></script>

    </body>
    <!-- END BODY -->
</html>