<?php
 //require_once 'src/data.php';    
    include ('header.php');
    $_SESSION['Number']=0;
    $_SESSION['back']=0;
?>  
        
        </section>  
    </nav>
    <style>
        nav section#mainMenu a#ft{
            background-color:#72ade5;
        }
    </style>
    <body>
        
        <main>
            <div class='content' id='fCont'>
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
             toFDate();
        </script>
    </body>
</html>