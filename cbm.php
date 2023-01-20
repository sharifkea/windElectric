<?php
 //require_once 'src/data.php';    
    include ('header.php');
    $_SESSION['Number']=0;
    $_SESSION['back']=0;
?>  
        
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
                <span id="span" class="close">&times;</span>
                <section id="searchResults">  
                </section>
            </div>
        </div>
        <script>
             operationP(1,'CbM');
        </script>
    </body>
</html>