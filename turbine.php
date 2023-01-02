<?php
    include ('header.php');
    if(isset($_GET['a']) /*you can validate the link here*/){
        $a=$_GET['a'];
        //echo ($a);
        $_SESSION['Number']=$a;
    }
    if($_SESSION['Number']==0){
    
        header("Location: subst.php");
        exit();
        }else
        {
            
 
            if(isset($_SESSION['back'])&& $_SESSION['back']==1){

                ?>
                <a href="sldPak.php" class="main" id="sldP">Back</a>
                <?php
                $_SESSION['back']=2;
        
            }
?>
</section>
</nav>
        
<body>
    <h1>Wind Turbine WTG-<?php echo ($_SESSION["Number"]);?></h1>
        <div class="three">
            <div class="four" id="tbComp">
                <a onclick='ptCall("Tap Position Indicator of Wind Turbine","WTG-","<?php echo ($_SESSION["Number"]);?>")'>
                    <img src="img/turbine/anemometer2.jpg" id="at" alt="anomometer" >
                </a>
                <a onclick='ptCall("Brake of Wind Turbine","WTG-","<?php echo ($_SESSION["Number"]);?>")'>
                    <img src="img/turbine/brake2.jpg" id="at" alt="brake" >
                </a>
                <a onclick='ptCall("Controller of Wind Turbine","WTG-","<?php echo ($_SESSION["Number"]);?>")'>
                    <img src="img/turbine/controller2.jpg" id="at" alt="Lvimh" >
                </a>
                <a onclick='ptCall("Gear Box of Wind Turbine","WTG-","<?php echo ($_SESSION["Number"]);?>")'>
                    <img src="img/turbine/gbox2.jpg" id="at" alt="Mv img" >
                </a>
                <a onclick='ptCall("Generator of Wind Turbine","WTG-","<?php echo ($_SESSION["Number"]);?>")'>
                    <img src="img/turbine/generator2.jpg" id="at" alt="Lvimh" >
                </a>
                <a onclick='ptCall("High-speed Shaft of Wind Turbine","WTG-","<?php echo ($_SESSION["Number"]);?>")'>
                    <img src="img/turbine/hss2.jpg" id="at" alt="Mv img" >
                </a>
                <a onclick='ptCall("Low-speed Shaft of Wind Turbine","WTG-","<?php echo ($_SESSION["Number"]);?>")'>
                    <img src="img/turbine/lss2.jpg" id="at" alt="Lvimh" >
                </a>
                <a onclick='ptCall("Pitch System of Wind Turbine","WTG-","<?php echo ($_SESSION["Number"]);?>")'>
                    <img src="img/turbine/psystem.jpg" id="at" alt="Mv img" >
                </a>
                <a onclick='ptCall("Wind Vane of Wind Turbine","WTG-","<?php echo ($_SESSION["Number"]);?>")'>
                    <img src="img/turbine/wvane.jpg" id="at" alt="Lvimh" >
                </a>
                <a onclick='ptCall("Yaw Drive of Wind Turbine","WTG-","<?php echo ($_SESSION["Number"]);?>")'>
                    <img src="img/turbine/ydrive2.jpg" id="at" alt="Mv img" >
                </a>
                <a onclick='ptCall("Yaw Motor of Wind Turbine","WTG-","<?php echo ($_SESSION["Number"]);?>")'>
                    <img src="img/turbine/ymotor2.jpg" id="at" alt="Mv img" >
                </a>
            </div>
            <img onclick=clickTurbine(this) src="img/turbine/Turbine_cutaway2.jpg" id="tc" alt="Substation" >
        </div>
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span id="span" class="close">&times;</span>
                <section id="searchResults">  
                </section>
            </div>
        </div>
        <div id="imgModal" class="imgM">
            <span class="closeImg" onclick= 'closeImgModal()'>&times;</span>
            <img class="imgM-content" id="img01">
        </div>
    </body>
</html>
<?php

    }
?>