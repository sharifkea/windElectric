<?php
    include ('header.php');
    $_SESSION['Number']=0;
    $_SESSION['back']=0;
?>  
</section>        
    </nav>
    <style>
        nav section#mainMenu a#sldv{
            background-color:#72ade5;
        }
    </style>
    <body>
        <main id="sldM">        
        <article>
        <section id="pictures1">
            <img src="img/SLD/drawing.jpg" id="sld2" alt="Single line diagram">
            <a href="turbine.php?a=A01">
            <img src="img/SLD/turbine.jpg" id="tu1" alt="turbine-1" >
            </a>
            <a href="turbine.php?a=A02">
            <img src="img/SLD/turbine.jpg" id="tu2" alt="turbine-1" >
            </a>
            <a href="turbine.php?a=A03">
            <img src="img/SLD/turbine.jpg" id="tu3" alt="turbine-1" >
            </a>
            <a href="turbine.php?a=A04">
            <img src="img/SLD/turbine.jpg" id="tu4" alt="turbine-1" >
            </a>
            <a href="turbine.php?a=A05">
            <img src="img/SLD/turbine.jpg" id="tu5" alt="turbine-1" >
            </a>
            <a href="turbine.php?a=A06">
            <img src="img/SLD/turbine.jpg" id="tu6" alt="turbine-1" >
            </a>
            <a href="turbine.php?a=B01">
            <img src="img/SLD/turbine.jpg" id="tu7" alt="turbine-1" >
            </a>
            <a href="turbine.php?a=B02">
            <img src="img/SLD/turbine.jpg" id="tu8" alt="turbine-1" >
            </a>
            <a href="turbine.php?a=B03">
            <img src="img/SLD/turbine.jpg" id="tu9" alt="turbine-1" >
            </a>
            <a href="turbine.php?a=B04">
            <img src="img/SLD/turbine.jpg" id="tu10" alt="turbine-1" >
            </a>
            <a href="turbine.php?a=B05">
            <img src="img/SLD/turbine.jpg" id="tu11" alt="turbine-1" >
            </a>
            <a href="turbine.php?a=B06">
            <img src="img/SLD/turbine.jpg" id="tu12" alt="turbine-1" >
            </a>
            <a onclick='ptCall("MV Switchgear","MVS-","01")'>
            <img src="img/SLD/mvSwitch.jpg" id="mvs1" alt="mvSwitch-1" >
            </a>
            <a onclick='ptCall("MV Switchgear","MVS-","02")'>
            <img src="img/SLD/mvSwitch.jpg" id="mvs2" alt="mvSwitch-2" >
            </a>
            <a onclick='ptCall("MV Switchgear","MVS-","03")'>
            <img src="img/SLD/mvSwitch.jpg" id="mvs3" alt="mvSwitch-3" >
            </a>
            <a  onclick='ptCall("HV Switchgear GIS","HVS-","01")'>
            <img src="img/SLD/hvSwitch.jpg" id="hvs1" alt="hvSwitch-1" >
            </a>
            <a  onclick='ptCall("HV Switchgear GIS","HVS-","02")'>
            <img src="img/SLD/hvSwitch.jpg" id="hvs2" alt="hvSwitch-2" >
            </a>
            <a  onclick='ptCall("HV Switchgear GIS","HVS-","03")'>
            <img src="img/SLD/hvSwitch.jpg" id="hvs3" alt="hvSwitch-3" >
            </a>
            <a  onclick='ptCall("HV Switchgear GIS","HVS-","04")'>
            <img src="img/SLD/hvSwitch.jpg" id="hvs4" alt="hvSwitch-4" >
            </a>
            <a  onclick='ptCall("HV Switchgear GIS","HVS-","05")'>
            <img src="img/SLD/hvSwitch.jpg" id="hvs5" alt="hvSwitch-5" >
            </a>            
            <a onclick='ptCall("Power Transformer","PT-","01")'>
            <img src="img/SLD/pt1.jpg" id="pt1" alt="PT1" >
            </a>
            <a onclick='ptCall("Power Transformer","PT-","02")'>
            <img src="img/SLD/pt2.jpg" id="pt2" alt="PT2" >
            </a>
            <a onclick='ptCall("Fixed Shunt Reactor","FSR-","01")'>
            <img src="img/SLD/reactor1.jpg" id="rec1" alt="reactor-1" >
            </a>
            <a onclick='ptCall("Fixed Shunt Reactor","FSR-","02")'>
            <img src="img/SLD/reactor1.jpg" id="rec2" alt="reactor-2" >
            </a>
            <a onclick='ptCall("Harmonic Filter","HF-","01")'>
            <img src="img/SLD/reactor2.jpg" id="rec3" alt="reactor-3" >
            </a>
            <a onclick='ptCall("Statcom","STC-","01")'>
            <img src="img/SLD/reactor3.jpg" id="rec4" alt="reactor-4" >
            </a>
            <a onclick='ptCall("Inter-Array Cable","IAC-","01")'>
            <img src="img/SLD/cable.jpg" id="cbl1" alt="cable-1" >
            </a>
            <a onclick='ptCall("Inter-Array Cable","IAC-","02")'>
            <img src="img/SLD/cable.jpg" id="cbl2" alt="cable-2" >
            </a>
            <a onclick='ptCall("Inter-Array Cable","IAC-","03")'>
            <img src="img/SLD/cable.jpg" id="cbl3" alt="cable-3" >
            </a>
            <a onclick='ptCall("Inter-Array Cable","IAC-","04")'>
            <img src="img/SLD/cable.jpg" id="cbl4" alt="cable-4" >
            </a>
            <a onclick='ptCall("Inter-Array Cable","IAC-","05")'>
            <img src="img/SLD/cable.jpg" id="cbl5" alt="cable-5" >
            </a>
            <a onclick='ptCall("Inter-Array Cable","IAC-","06")'>
            <img src="img/SLD/cable.jpg" id="cbl6" alt="cable-6" >
            </a>
            <a onclick='ptCall("Inter-Array Cable","IAC-","07")'>
            <img src="img/SLD/cable.jpg" id="cbl7" alt="cable-7" >
            </a>
            <a onclick='ptCall("Inter-Array Cable","IAC-","08")'>
            <img src="img/SLD/cable.jpg" id="cbl8" alt="cable-8" >
            </a>
            <a onclick='ptCall("Inter-Array Cable","IAC-","09")'>
            <img src="img/SLD/cable.jpg" id="cbl9" alt="cable-9" >
            </a>
            <a onclick='ptCall("Inter-Array Cable","IAC-","10")'>
            <img src="img/SLD/cable.jpg" id="cbl10" alt="cable-10" >
            </a>
            <a onclick='ptCall("Offshore Export Cable","OEC-","01")'>
            <img src="img/SLD/offshoreCB.jpg" id="osc1" alt="Offshore Export Cable-1" >
            </a>
</section>
</article> 
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
    </body>
</html>
