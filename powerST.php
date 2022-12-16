<?php
include ('header.php');
if(isset($_GET['a']) /*you can validate the link here*/){
    $_SESSION['Number']=$_GET['a'];
 }
if($_SESSION['Number']==0){

    header("Location: subst.php");
    exit();
    }else
    //echo ($_SESSION['Number']);
    {
  
?>
</section>
</nav>

<body >
        <div class="five">
            <div class="six" id="psComp">
                <a onclick="ptCall('Tap Position Indicator',<?php echo ($_SESSION['Number']);?>)">
                    <img src="img/PowerT/tPI.jpg" id="at2" alt="anomometer" >
                </a>
                <a onclick="ptCall('TC Oil Level Gauge','PT-',<?php echo ($_SESSION['Number']);?>)">
                    <img src="img/PowerT/TCOilLG.jpg" id="at2" alt="brake" >
                </a>
                <a onclick="ptCall('TC Motor Control','PT-',<?php echo ($_SESSION['Number']);?>)">
                    <img src="img/PowerT/TCMC.jpg" id="at2" alt="Lvimh" >
                </a>
                <a onclick="ptCall('Silica Gel Breather','PT-',<?php echo ($_SESSION['Number']);?>)">
                    <img src="img/PowerT/sgb.jpg" id="at2" alt="Mv img" >
                </a>
                <a onclick="ptCall('On Load Tap Changer (TC)','PT-',<?php echo ($_SESSION['Number']);?>)">
                    <img src="img/PowerT/onLTC.jpg" id="at2" alt="Lvimh" >
                </a>
                <a onclick="ptCall('HV & LV Tank Cover Bushings','PT-',<?php echo ($_SESSION['Number']);?>)">
                    <img src="img/PowerT/HV&LV.jpg" id="at2" alt="Mv img" >
                </a>
                <a onclick="ptCall('Drain & Sample Valves','PT-',<?php echo ($_SESSION['Number']);?>)">
                    <img src="img/PowerT/dsv.jpg" id="at2" alt="Lvimh" >
                </a>
                <a onclick="ptCall('CT Oil Level Gauge','PT-',<?php echo ($_SESSION['Number']);?>)">
                    <img src="img/PowerT/ctOilLG.jpg" id="at2" alt="Mv img" >
                </a>
                <a onclick="ptCall('Conservator Tank (CT)','PT-',<?php echo ($_SESSION['Number']);?>)">
                    <img src="img/PowerT/conTank.jpg" id="at2" alt="Lvimh" >
                </a>
                <a onclick="ptCall('Control Cabinet','PT-',<?php echo ($_SESSION['Number']);?>)">
                    <img src="img/PowerT/cc.jpg" id="at2" alt="Mv img" >
                </a>
                
            </div>
            <img onclick=clickPowerS(this) src="img/PowerT/powertran.jpg" id="tc2" alt="Substation" >
        </div>
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span id="span" class="close">&times;</span>
                <section id="searchResults">  
                </section>
            </div>
        </div>
    </body>
</html>
<?php

    }
?>