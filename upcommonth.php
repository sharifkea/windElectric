<?php
 require_once 'src/data.php';
 
     
    include ('header.php');
    $_SESSION['Number']=0;
    $_SESSION['back']=0;
?>  
        <script src="js/upcommonth.js"></script>
        </section>  
    </nav>
    <body>
        
        <main>
            <div id="out">
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
        <script>
            upcommonthMStart();
        </script>
    </body>
</html>