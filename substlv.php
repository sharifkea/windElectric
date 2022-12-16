<?php
    include ('header.php');
    $_SESSION['Number']=0;
    $_SESSION['back']=0;
?>  
       </section>
</nav>
        
<main id="main">        
    <article>
        <section id="pictures">
            <img src="img/LV/sldForLV.jpg" id="wp" alt="Wind Power">
            <a href="#" onclick='ptCall("Waste Water Collection System","WWCS-","01")'>
                <img src="img/LV/Waste Water Collection System.jpg" id="wwc" alt="Blade one" >
            </a>
            <a href="#" onclick='ptCall("HVAC","HVAC-","01")'>
                <img src="img/LV/HVAC.jpg" id="hva" alt="Blade one" >
            </a>
            <a href="#" onclick='ptCall("LV MV Aux Power Transformer","APT-","01")'>
                <img src="img/LV/LV MV Aux Power Transformer.jpg" id="apt" alt="Blade one" >
            </a>
            <a href="#" onclick='ptCall("CCTV","CCTV-","01")'>
                <img src="img/LV/CCTV.jpg" id="cct" alt="Blade one" >
            </a>
            <a href="#" onclick='ptCall("Earthing Resistor","ER-","01")'>
                <img src="img/LV/Earthing Resistor.jpg" id="err" alt="Blade one" >
            </a>
            <a href="#" onclick='ptCall("Diesel Gen","DG-","01")'>
                <img src="img/LV/Diesel Gen.jpg" id="dgn" alt="Blade one" >
            </a>
            <a href="#" onclick='ptCall("Battery& Charger","BC-","01")'>
                <img src="img/LV/Battery& Charger.jpg" id="bnc" alt="Blade one" >
            </a>
            
            
        </section>
    </article>

        <!-- The Modal -->
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