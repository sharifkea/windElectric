<?php
    include ('header.php');   
    $_SESSION['back']=0;
?>

</section>
</nav>
        
<main id="main">        
    
        <section id="pictures">
            <img src="img/Bladt.jpg" id="wp" alt="Wind Power">
            <a href="turbine.php?a=A01">
                <img src="img/turbine.jpg" id="tur" alt="wind turbine" >
            </a>
            <div class="one">
                <div class="two" id="stComp">
                    <a href="substlv.php">
                        <img src="img/Lv.jpg" id="lv" alt="Lvimh" >
                    </a>
                    <a href="substhv.php">
                        <img src="img/Hv.jpg" id="hv" alt="Mv img" >
                    </a>
                </div>
                <img onclick=clickSST(this) src="img/substation.jpg" id="sub" alt="Substation" >
            </div>
            <a href="turbine.php?a=A01">
                <img src="img/blade1.jpg" id="bld1" alt="Blade one" >
            </a>
            <a href="turbine.php?a=A01">
                <img src="img/blade2.jpg" id="bld2" alt="Blade two" >
            </a>
            <a href="turbine.php?a=A01">
                <img src="img/blade3.jpg" id="bld3" alt="Blade three" >
            </a>
            <a href="turbine.php?a=A01">
                <img src="img/tower.jpg" id="twr" alt="Tower" >
            </a>
            <a href="#" >
                <img onclick='ptCall("Inter-Array Cable","IAC-","01")' src="img/iaCable.jpg" id="iaC" alt="I A Cable" >
            </a>
            <a href="#" >
                <img onclick='ptCall("Offshore Export Cable","OEC-","01")' src="img/oeCable.jpg" id="oeC" alt="O E Cable" >
            </a>
            <a href="#" >
                <img onclick='ptCall("Land Cable","LC-","01")' src="img/land.jpg" id="lC" alt="L Cable" >
            </a>
            <a href="#" >
                <img onclick='ptCall("HV Switchgear GIS","HVS-","01")' src="img/onshore.jpg" id="osc" alt="L Cable" >
            </a>
            <a href="#" >
                <img onclick='ptCall("Offshore HDD Punch-out","HDD-","01")' src="img/hdd.jpg" id="hdd" alt="L Cable" >
            </a>
            
        </section>

</main>
 <!-- The Modal -->
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
</html>