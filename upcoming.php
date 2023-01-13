<?php
 require_once 'src/data.php';
 
     
    include ('header.php');
    if(!isset($_GET['m'])){
        header("Location: index.php");
    }else {
        if($_GET['m']==1){$value='Week';
            $aid='a#upw';
        }
        else if($_GET['m']==2){$value='Month';
            $aid='a#upm';}
        else header("Location: index.php");
        
    }
    $_SESSION['Number']=0;
    $_SESSION['back']=0;
?>  
        
        </section>  
    </nav>
        <style>
            nav section#mainMenu <?php echo $aid; ?>{
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
            upcomStart('<?php echo $value; ?>');
        </script>
    </body>
</html>