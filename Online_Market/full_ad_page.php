<?php
include_once("session.php"); 
include_once("Car.php");
include_once("UserMangerController.php");
include_once("Home.php");
include_once("Job.php");
if(!class_exists('User.php'))
{
   include_once("User.php");
}
session_start(); 
?>

<html>
    <head>
        <title>Search page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="css/style.css" media="screen" />
        <link href="css/bootstrap.min.css" rel="stylesheet"> 
        <link href="css/style.css" rel="stylesheet" media="screen"> 
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="css/main.css" rel="stylesheet" media="screen">
        <link href="css/slick.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap-theme.css" rel="stylesheet" media="screen"> 
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">   
        <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
        <style type="text/css"> 
          .labelname { font-size:20px; font-weight:bold; font-family:Tahoma, Geneva, sans-serif; color:#33C; padding:10px; }  
        </style> 

    </head> 

    <body style="background-color:#101010;">
        <?php 

            ob_start();  
              $user_obj = new UserMangerController(); 
               
              $email = $_SESSION['login_email'];
              $id = $_SESSION['id'];

              $userName = $user_obj->getUser($email)->getName();

              $place = $_SESSION['place'];
              $category = $_SESSION['cat'];
              
              
              $controller = new UserMangerController();
              $arr = $controller->filter($category , $place) ; 
                                 
            ob_end_flush();
            /* @var $PHP_SELF type <?php ech $PHP_SELF ?> */
        ?>
        <div class="left" > 
        </div>
        <div class="right" > 
        </div>
        <div class="head" style="border-style: solid; background-color:#FFFFFF;"> 
            <div id="block_container">
            	<img id="profile" src="img/profile.jpg" style="float:left;">
            	<?php echo '<p style="font-size:40px; color:#FF0000; text-transform: uppercase; ">'.$userName.'</p>'; ?>
            </div> 
             
             <!-- nav bar  -->
            <header style="height:50px; ">

                   <nav class="navbar navbar-inverse" role="navigation" style="height:50px; padding-top:2px;">
                      <div class="container-fluid">  
                           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
                            <ul class="nav navbar-nav">
                               <li ><a href="/online_market/profilePage.php">My Account</a></li>
                               <li ><a href="/online_market/homePage.php">Home</a></li> 
                               <li><a href="logout.php">logout</a></li>
                            </ul> 
                            </div>
                     </div>
                  </nav>
            </header> 
            <br><br> 
             
                <div id="userads" align="center">
                    <table cellpadding="5" class="contain">
                            <form name="home" method="post" class="contain"> 
                               <center><label class="labelname">The full description of the ad</label></center>
                              <?php
                              $place = $_POST['place'];
                              $category = $_POST['category'];

                              if (isset($_POST['search']) && $place && $category) {
                                $place = $_POST['place'];
                                $category = $_POST['category'];
                                $controller = new UserMangerController(); 
                              }
                                 $arr = $controller->getUserAds(1); 
                                    $i=0;
                                    echo "<table border=\"4px solid black;\" style=\"width: 60%;border: 4px solid black;\">";
                                   // echo "<tr><center><button type=\"button\" onclick='f1(this)' style=\"background-color: green; color: white;\" id=\"show\">click here to view the ad with details</button></center></tr>";
                                    echo "<tr><th style=\"background-color: green; color: white;\"><center>" . "Title : " . "</center></th><td><center>" . $arr[$i]->getTitle() . "</center></td></tr>";
                                    echo "<tr><th style=\"background-color: green; color: white;\"><center>" . "Description : " . "</center></th><td><center>" . $arr[$i]->getDescription() ."</center></td></tr>";
                                    echo "<tr><th style=\"background-color: green; color: white;\"><center>" . "Category : " . "</center></th><td><center>" . $arr[$i]->getCategory() . "</center></td></tr>";
                                    echo "<tr><th style=\"background-color: green; color: white;\"><center>" . "place : " . "</center></th><td><center>" . $arr[$i]->getPlace() . "</center></td></tr>";
                                    echo "<tr><th style=\"background-color: green; color: white;\"><center>" . "Provider Name : " . "</center></th><td><center>" . $arr[$i]->getProviderName() . "</center></td></tr>";
                                    echo "<tr><th style=\"background-color: green; color: white;\"><center>" . "Provider mobile : " . "</center></th><td><center>" . $arr[$i]->getProviderMobile (). "</center></td></tr>";
                                    echo "<tr><th style=\"background-color: green; color: white;\"><center>" . "Note : " . "</center></th><td><center>" . $arr[$i]->getNote() . "</center></td></tr>"; 
                                    echo "<tr><th style=\"background-color: #3366CC; color: white;\"><center>" . "Car Brand : " . "</center></th><td><center>" . $arr[$i]->getBrand() . "</center></td></tr>"; 
                                    echo "<tr><th style=\"background-color: #3366CC; color: white;\"><center>" . "Car Model : " . "</center></th><td><center>" . $arr[$i]->getModel() . "</center></td></tr>";
                                    echo "<tr><th style=\"background-color: #3366CC; color: white;\"><center>" . "Car Price : " . "</center></th><td><center>" . $arr[$i]->getPrice() . "</center></td></tr>";
                                    echo "<tr><th style=\"background-color: #3366CC; color: white;\"><center>" . "Car km : " . "</center></th><td><center>" . $arr[$i]->getKMs() . "</center></td></tr>";
                                    echo "<tr><th style=\"background-color: #3366CC; color: white;\"><center>" . "Car capacity : " . "</center></th><td><center>" . $arr[$i]->getCapacity(). "</center></td></tr>";
                                    echo "</table>"; 
                                    echo "<br>"; 
                                        
                               
                               ?>
                                  
                             

                             </form>
                    </table>
                </div>  
            <br>
           

            <br><br><br><br><br><br><br><br><br><br>
            

            <br><br><br><br><br><br><br><br><br><br><br><br>
             <br><br><br><br><br><br><br><br><br><br><br><br>
            
        </div>
        
 
    </body>
    
</html>