<?php
    include ('header.php');
    $_SESSION['Number']=0;
    $_SESSION['back']=0;
    if(isset($_GET['b']) /*you can validate the link here*/){
        $b=$_GET['b'];
?>  
        
        </section>  
    </nav>
    <body>
        
        <main>
            <div class='content'>
            </div>
            <div id="out">
            <h1 class='hh'> Operation Philosophy- <?php echo $b; ?> </h1>
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
            orerationP();
        </script>
    </body>
    <?php } else header("Location: index.php"); ?>
</html>