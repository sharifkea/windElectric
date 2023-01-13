<?php
    include ('header.php');   
    $_SESSION['Number']=0;
?> 
</section>        
    </nav>
    <style>
        nav section#mainMenu a#pv{
            background-color:#72ade5;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/styles1.css">
     
<?php
    if(isset($_SESSION['back'])&& $_SESSION['back']==2){
        ?>
        <body onload="pkgClk('1')">
        <?php
    }else{
        ?>
        <body>
        <?php
    }$_SESSION['back']=1;
    ?>
    
        <main id="sldPak">        
        <div id="nb">
        <div id="fst" class="flax">
       
            <div id="tpfst" class="bord"><a onclick='pkgClk("1")'><img src="img/pkg/tpkg2.jpg" id="sldimg" alt="Single line diagram"></a></div>
            <div id="cpfst" class="bord"><a onclick='pkgClk("2")'><img src="img/pkg/cpkg2.jpg" id="sldimg" alt="Single line diagram"></a></div><br>
            <div id="spfst" class="bord"><a onclick='pkgClk("3")'><img src="img/pkg/spkg2.jpg" id="sldimg" alt="Single line diagram"></a></div>
            <div id="hlfst" class="bord"><a onclick='pkgClk("4")'><img src="img/pkg/grdpkg2.jpg" id="sldimg" alt="Single line diagram"></a></div>
        </div>
        </div>
        <div id="tpsnd" class="brdOut">
            <a href="turbine.php?a=A01">
            Wind Turbine WTG-A01
            </a><br>
            <a href="turbine.php?a=A02">
            Wind Turbine WTG-A02
            </a><br>
            <a href="turbine.php?a=A03">
            Wind Turbine WTG-A03
            </a><br>
            <a href="turbine.php?a=A04">
            Wind Turbine WTG-A04
            </a><br>
            <a href="turbine.php?a=A05">
            Wind Turbine WTG-A05
            </a><br>
            <a href="turbine.php?a=A06">
            Wind Turbine WTG-A06
            </a><br>
            <a href="turbine.php?a=B01">
            Wind Turbine WTG-B01
            </a><br>
            <a href="turbine.php?a=B02">
            Wind Turbine WTG-B02
            </a><br>
            <a href="turbine.php?a=B03">
            Wind Turbine WTG-B03
            </a><br>
            <a href="turbine.php?a=B04">
            Wind Turbine WTG-B04
            </a><br>
            <a href="turbine.php?a=B05">
            Wind Turbine WTG-B05
            </a><br>
            <a href="turbine.php?a=B06">
            Wind Turbine WTG-B06
            </a><br><br>
            <a onclick='pkgClk("5")' id="aBack">
            Back
            </a>
        </div>
        <div id="cpsnd" class="brdOut">
            <a onclick='ptCall("Inter-Array Cable","IAC-","01")'>
                Inter-Array Cable, IAC-01
            </a><br>
            <a onclick='ptCall("Inter-Array Cable","IAC-","02")'>
            Inter-Array Cable, IAC-02</a><br>
            <a onclick='ptCall("Inter-Array Cable","IAC-","03")'>
            Inter-Array Cable, IAC-03</a><br>
            <a onclick='ptCall("Inter-Array Cable","IAC-","04")'>
            Inter-Array Cable, IAC-04</a><br>
            <a onclick='ptCall("Inter-Array Cable","IAC-","05")'>
            Inter-Array Cable, IAC-05</a><br>
            <a onclick='ptCall("Inter-Array Cable","IAC-","06")'>
            Inter-Array Cable, IAC-06</a><br>
            <a onclick='ptCall("Inter-Array Cable","IAC-","07")'>
            Inter-Array Cable, IAC-07</a><br>
            <a onclick='ptCall("Inter-Array Cable","IAC-","08")'>
            Inter-Array Cable, IAC-08</a><br>
            <a onclick='ptCall("Inter-Array Cable","IAC-","09")'>
            Inter-Array Cable, IAC-09</a><br>
            <a onclick='ptCall("Inter-Array Cable","IAC-","10")'>
            Inter-Array Cable, IAC-10</a><br>
            <a onclick='ptCall("Offshore Export Cable","OEC-","01")'>
            Offshore Export Cable, OEC-01</a><br><br>
            <a onclick='pkgClk("5")' id="aBack">
                Back
            </a>
        </div>
        <div id="spsnd" class="brdOut">Offshore Substation Package <br>
            <a onclick='ptCall("MV Switchgear","MVS-","01")'>MV Switchgear, MVS-1</a><br>
            <a onclick='ptCall("Power Transformer","PT-","01")'>Power Transformer, PT-1</a><br>
            <a  onclick='ptCall("HV Switchgear GIS","HVS-","01")'>HV Switchgear GIS, HVS-1</a><br>
            <a  onclick='ptCall("HV Switchgear GIS","HVS-","02")'>HV Switchgear GIS, HVS-2</a><br>
            <a onclick='ptCall("Fixed Shunt Reactor","FSR-","01")'>Fixed Shunt Reactor, FSR-1</a><br><br>
            Onshore Substation Package<br>
            <a onclick='ptCall("MV Switchgear","MVS-","02")'>MV Switchgear, MVS-2</a><br>
            <a onclick='ptCall("MV Switchgear","MVS-","03")'>MV Switchgear, MVS-3</a><br>
            <a  onclick='ptCall("HV Switchgear GIS","HVS-","03")'>HV Switchgear GIS, HVS-3</a><br>
            <a  onclick='ptCall("HV Switchgear GIS","HVS-","04")'>HV Switchgear GIS, HVS-4</a><br>
            <a  onclick='ptCall("HV Switchgear GIS","HVS-","05")'>HV Switchgear GIS, HVS-5</a><br>
            <a onclick='ptCall("Power Transformer","PT-","02")'>Power Transformer, PT-2</a><br>
            <a onclick='ptCall("Fixed Shunt Reactor","FSR-","02")'>Fixed Shunt Reactor, FSR-2</a><br>
            <a onclick='ptCall("Harmonic Filter","HF-","01")'>Harmonic Filter, HF-1</a><br>
            <a onclick='ptCall("Statcom","STC-","01")'>Statcom, STC-1</a><br><br>
            <a onclick='pkgClk("5")' id="aBack">
                Back
            </a>
        </div>
        <div id="hvsnd" class="brdOut">SKADA<br><br>
            <a onclick='pkgClk("5")' id="aBack">
                Back
            </a>
        </div>
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
