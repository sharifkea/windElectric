<?php
 //require_once 'src/data.php';    
    include ('header.php');
    $_SESSION['Number']=0;
    $_SESSION['back']=0;
?>  
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>    
        </section>  
    </nav>

    <style>
        nav esection#mainMenu a.dropbtn{
            background-color:#72ade5;
        }
    </style>
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
                <span id="spanCBM" onclick= 'closeCBM()' class="close">&times;</span>
                <section id="searchResults">  
                </section>
            </div>
        </div>
        <div id='editor'>
        <script>
             operationP(1,'CbM');
        </script>
    </body>
</html>