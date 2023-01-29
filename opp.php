<?php
 //require_once 'src/data.php';    
    include ('header.php');
    $_SESSION['Number']=0;
    $_SESSION['back']=0;
?>  
        
        </section>  
    </nav>
    <style>
        nav section#mainMenu a.dropbtn{
            background-color:#72ade5;
        }
    </style>
    <body>
        
        <main>
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
             operationHistory();
        </script>
    </body>
</html>