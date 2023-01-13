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
                <img src="img/SLD/sld-substation.jpg" id="sld3" alt="Single line diagram">
            
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
