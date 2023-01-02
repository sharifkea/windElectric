<?php
 require_once 'src/data.php';    
    include ('header.php');
    $_SESSION['Number']=0;
    $_SESSION['back']=0;
?>  
        
        </section>  
    </nav>
    <body>
        
        <main>
            <div class='content'>
            </div>
            <div id="out">
            </div>
        </main>
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div id="modal-content">
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
            histortPageStart();
    </script>
    </body>
</html>