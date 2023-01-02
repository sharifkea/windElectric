<?php
    include ('header.php');
    $_SESSION['Number']=0;
    $_SESSION['back']=0;
?>  
    </section>    
    </nav>
    <body>
        <main id="sstM">        
        <article>
        <section id="pictures2">
            <img src="img/sld1.jpg" id="sld1" alt="Single line diagram">
            <a onclick='ptCall("MV Switchgear","MVS-","01")'>
            <img src="img/mv1.jpg" id="mv1" alt="mv1" >
            </a>
            <a onclick='ptCall("MV Switchgear","MVS-","02")'>
            <img src="img/mv1.jpg" id="mv2" alt="mv1" >
            </a>
            <a onclick='ptCall("MV Switchgear","MVS-","03")'>
            <img src="img/mv1.jpg" id="mv3" alt="mv1" >
            </a>
            <a onclick='ptCall("MV Switchgear","MVS-","04")'>
            <img src="img/mv1.jpg" id="mv4" alt="mv1" >
            </a>
            <a onclick='ptCall("MV Switchgear","MVS-","05")'>
            <img src="img/mv1.jpg" id="mv5" alt="mv1" >
            </a>
            <a onclick='ptCall("MV Switchgear","MVS-","06")'>
            <img src="img/mv1.jpg" id="mv6" alt="mv1" >
            </a>
            <a onclick='ptCall("MV Switchgear","MVS-","07")'>
            <img src="img/mv1.jpg" id="mv7" alt="mv1" >
            </a>
            <a onclick='ptCall("MV Switchgear","MVS-","08")'>
            <img src="img/mv1.jpg" id="mv8" alt="mv1" >
            </a>
            <a onclick='ptCall("MV Switchgear","MVS-","09")'>
            <img src="img/mv1.jpg" id="mv9" alt="mv1" >
            </a>
            <a onclick='ptCall("MV Switchgear","MVS-","10")'>
            <img src="img/mv1.jpg" id="mv10" alt="mv1" >
            </a>
            <a onclick='ptCall("MV Switchgear","MVS-","11")'>
            <img src="img/mv1.jpg" id="mv11" alt="mv1" >
            </a>
            <a onclick='ptCall("HV Switchgear GIS","HVS-","01")'>
            <img src="img/hv1.jpg" id="hv1" alt="HVS-1" >
            </a>
            <a onclick='ptCall("HV Switchgear GIS","HVS-","02")'>
            <img src="img/hv1.jpg" id="hv2" alt="HVS-1" >
            </a>
            <a onclick='ptCall("HV Switchgear GIS","HVS-","03")'>
            <img src="img/hv1.jpg" id="hv3" alt="HVS-1" >
            </a>
            <div id="dpt1">
                <a href="powerST.php?a='01'" id="apt1">
                    <img src="img/pt1.jpg" id="pwt1" alt="pt-1" >
                    <div id="pt1Menu" class="dropDownMenu">
                        <a href=# class='dropDown'> </a>
                        <a onclick='ptCall("Power Transformer","PT-","01")' class='dropDown'>Power Transformer</a>
                        <a onclick='ptCall("Conservator Tank (CT)","PT-","01")' class='dropDown'>Conservator Tank (CT)</a>
                        <a onclick='ptCall("CT Oil Level Gauge","PT-","01")' class='dropDown'>CT Oil Level Gauge</a>
                        <a onclick='ptCall("HV & LV Tank Cover Bushings","PT-","01")' class='dropDown'>HV & LV Tank Cover Bushings</a>
                        <a onclick='ptCall("On Load Tap Changer (TC)","PT-","01")' class='dropDown'>On Load Tap Changer (TC)</a>
                        <a onclick='ptCall("TC Oil Level Gauge","PT-","01")' class='dropDown'>TC Oil Level Gauge</a>
                        <a onclick='ptCall("Tap Position Indicator","PT-","01")' class='dropDown'>Tap Position Indicator</a>
                        <a onclick='ptCall("TC Motor Control","PT-","01")' class='dropDown'>TC Motor Control</a>
                        <a onclick='ptCall("Drain & Sample Valves","PT-","01")' class='dropDown'>Drain & Sample Valves</a>
                        <a onclick='ptCall("Silica Gel Breather","PT-","01")' class='dropDown'>Silica Gel Breather</a>
                        <a onclick='ptCall("Control Cabinet","PT-","01")' class='dropDown'>Control Cabinet</a>
                    </div>
                </a>
            </div>
            <div id="dpt2">
                <a href="powerST.php?a='02'" id="apt2">
                <img src="img/pt1.jpg" id="pwt2" alt="pt-1" >
                    <div id="pt2Menu" class="dropDownMenu">
                        <a href=# class='dropDown'> </a>
                        <a onclick='ptCall("Power Transformer","PT-","02")' class='dropDown'>Power Transformer</a>
                        <a onclick='ptCall("Conservator Tank (CT)","PT-","02")' class='dropDown'>Conservator Tank (CT)</a>
                        <a onclick='ptCall("CT Oil Level Gauge","PT-","02")' class='dropDown'>CT Oil Level Gauge</a>
                        <a onclick='ptCall("HV & LV Tank Cover Bushings","PT-","02")' class='dropDown'>HV & LV Tank Cover Bushings</a>
                        <a onclick='ptCall("On Load Tap Changer (TC)","PT-","02")' class='dropDown'>On Load Tap Changer (TC)</a>
                        <a onclick='ptCall("TC Oil Level Gauge","PT-","02")' class='dropDown'>TC Oil Level Gauge</a>
                        <a onclick='ptCall("Tap Position Indicator","PT-","02")' class='dropDown'>Tap Position Indicator</a>
                        <a onclick='ptCall("TC Motor Control","PT-","02")' class='dropDown'>TC Motor Control</a>
                        <a onclick='ptCall("Drain & Sample Valves","PT-","02")' class='dropDown'>Drain & Sample Valves</a>
                        <a onclick='ptCall("Silica Gel Breather","PT-","02")' class='dropDown'>Silica Gel Breather</a>
                        <a onclick='ptCall("Control Cabinet","PT-","02")' class='dropDown'>Control Cabinet</a>
                    </div>
                </a>
            </div>
            <div id="dpt3">
                <a href="powerST.php?a='03'" id="apt3">
                <img src="img/pt1.jpg" id="pwt3" alt="pt-1" >
                    <div id="pt3Menu" class="dropDownMenu">
                    <a href=# class='dropDown'> </a>
                        <a onclick='ptCall("Power Transformer","PT-","03")' class='dropDown'>Power Transformer</a>
                        <a onclick='ptCall("Conservator Tank (CT)","PT-","03")' class='dropDown'>Conservator Tank (CT)</a>
                        <a onclick='ptCall("CT Oil Level Gauge","PT-","03")' class='dropDown'>CT Oil Level Gauge</a>
                        <a onclick='ptCall("HV & LV Tank Cover Bushings","PT-","03")' class='dropDown'>HV & LV Tank Cover Bushings</a>
                        <a onclick='ptCall("On Load Tap Changer (TC)","PT-","03")' class='dropDown'>On Load Tap Changer (TC)</a>
                        <a onclick='ptCall("TC Oil Level Gauge","PT-","03")' class='dropDown'>TC Oil Level Gauge</a>
                        <a onclick='ptCall("Tap Position Indicator","PT-","03")' class='dropDown'>Tap Position Indicator</a>
                        <a onclick='ptCall("TC Motor Control","PT-","03")' class='dropDown'>TC Motor Control</a>
                        <a onclick='ptCall("Drain & Sample Valves","PT-","03")' class='dropDown'>Drain & Sample Valves</a>
                        <a onclick='ptCall("Silica Gel Breather","PT-","03")' class='dropDown'>Silica Gel Breather</a>
                        <a onclick='ptCall("Control Cabinet","PT-","03")' class='dropDown'>Control Cabinet</a>
                        ptCall("Brake of Wind Turbine","WTG-","
                    </div>
                </a>
            </div>
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
