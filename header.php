<?php
include("auth1.php");
if(!isset($_SESSION['farm'])){
    if(!isset($_GET['c'])){
        header("Location: index.php");
    }
    else $_SESSION['farm']=$_GET['c'];
}
date_default_timezone_set ( 'Europe/Copenhagen' );
require_once 'src/data.php';
$datetime = new DateTime();
$datetime->modify('next monday');
$date = $datetime->format( 'Y-m-d' );
$service = new data;
$returnValue=$service->getUpAllCount($date);//to get Number of weekly tasks from DB
$count=intval($returnValue[0]['COUNT(*)']);
$_SESSION['count']=$count;

$ser = new data;
$datetime = new DateTime();
$datetime->modify('first day of next month');
$date = $datetime->format( 'Y-m-d' );
$returnValue=$ser->getUpAllCount($date); //to get Number of monthly tasks from DB
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
            <a href="history.php" class="main" id="re">Remarks</a> 
            <a href="logout.php" class="main" id="lo">Logout</a>
            <?php if($_SESSION['count']>0) { ?><input id="upCount" class="week" type="number" value="<?php echo ($_SESSION['count']);?>" readonly><?php } ?>
            <?php if($_SESSION['count']>0){ ?> <a href="upcoming.php?m=1" class="main" id="upw">Upcoming(W)</a> <?php } ?>
            <?php if($_SESSION['countMonth']>0) { ?><input id="upCount" class='month' type="number" value="<?php echo ($_SESSION['countMonth']);?>" readonly><?php } ?>
            <?php if($_SESSION['countMonth']>0){ ?> <a href="upcoming.php?m=2" class="main" id="upm">Upcoming(M)</a> <?php } ?>
            <div  class="dropdown" id='in'>
                <a href="#" class="dropbtn">Operation Philosophy</a>
                <div class="dropdown-content">
                    <a href="cbm.php">CbM</a>
                    <a href="rcm.php">RCM</a>
                    <a href="opp.php">History</a>
                </div>
            </div>
            
                    
        