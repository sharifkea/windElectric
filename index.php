<?php
include("auth1.php");
$_SESSION['sld']=1;
if(isset($_SESSION['farm'])){
    unset($_SESSION['farm']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="js/function.js"></script>
    <title>SWf</title>
</head>
		<header>
			<h1 id="in">Fleets of <?php echo $_SESSION['company']; ?></h1>
            
		</header>
        <nav>
            <section id="outSec">
                <a href="logout.php" class="main" id="logout">Logout</a>
            </section>
        </nav>
  
		<body>
            <div id="swfAll">
                <a href="heli.php?c=1">
                    <div id="swf">
                    
                        <p>Wind Farm-1 </P>
                        
                    </div>
                </a>
                <a href="heli.php?c=2">
                    <div id="swf">
                    
                        <p>Wind Farm-2 </P>
                        
                    </div>
                </a>
                <div id="swf">
                    <p>Wind Farm-3 </P>
                </div>
                <div id="swf">
                    <p>Wind Farm-4 </P>
                </div>
                <div id="swf">
                    <p>Wind Farm-5 </P>
                </div>
                <div id="swf">
                    <p>Wind Farm-6 </P>
                </div>
                <div id="swf">
                    <p>Wind Farm-7 </P>
                </div>
                <div id="swf">
                    <p>Wind Farm-8 </P>
                </div>

            </div>
    </body>
</html>
