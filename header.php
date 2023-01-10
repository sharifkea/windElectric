<?php
include("auth1.php");
if(!isset($_SESSION['farm'])){
    if(!isset($_GET['c'])){
        header("Location: index.php");
    }
    else $_SESSION['farm']=$_GET['c'];
}
require_once 'src/data.php';
$service = new data;
$returnValue=$service->getUpRC();//to get Number of weekly tasks from DB
$count=intval($returnValue[0]['COUNT(*)']);
$_SESSION['count']=$count;

$ser = new data;
$returnValue=$ser->getUpRCM(); //to get Number of monthly tasks from DB
$count=intval($returnValue[0]['COUNT(*)']);
$_SESSION['countMonth']=$count;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
    var userEmail='<?php echo $_SESSION['email'];?>';
    var userId='<?php echo $_SESSION['id'];?>';
    var inTime='<?php echo $_SESSION['inTime'];?>';
    </script>
    <script type="text/javascript" src="js/function.js"></script>
    <title>wind-electric</title>
</head>
<body>
<header>
	
<img width="699" height="124" src="https://wind-electric.com/wp-content/uploads/2022/10/logo.svg" class="attachment-full size-full" alt="" loading="lazy">
    
</header>
<nav>
       <section id="mainMenu">
            <a href="index.php" class="main" id="fs">Fleets</a>
            <a href="heli.php" class="main" id="hev">Heli View</a>
            <a href="sld<?php echo $_SESSION['farm']; ?>.php" class="main" id="sldv">SLD View</a>
            <a href="sldPak.php" class="main" id="pv">Package View</a>
            <a href="mainhis.php" class="main" id="mh">Maintenance History</a>
            <a href="history.php" class="main" id="mh">Remarks</a> 
            <a href="logout.php" class="main" id="up">Logout</a>
            <?php if($_SESSION['count']>0) { ?><input id="upCount" class="week" type="number" value="<?php echo ($_SESSION['count']);?>" readonly><?php } ?>
            <?php if($_SESSION['count']>0){ ?> <a href="upcoming.php" class="main" id="up">Upcoming(W)</a> <?php } ?>
            <?php if(isset($_SESSION['countMonth'])&&$_SESSION['countMonth']>0) { ?><input id="upCount" class='month' type="number" value="<?php echo ($_SESSION['countMonth']);?>" readonly><?php } ?>
            <?php if(isset($_SESSION['countMonth'])&&$_SESSION['countMonth']>0){ ?> <a href="upcommonth.php" class="main" id="up">Upcoming(M)</a> <?php } ?>
            <div  class="dropdown" id='in'>
                <a href="#" class="dropbtn">Operation Philosophy</a>
                <div class="dropdown-content">
                    <a href="opp.php?b=CbM">CbM</a>
                    <a href="opp.php?b=RCM">RCM</a>
                </div>
            </div>
            
                    
        