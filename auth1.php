
<?php

//session_set_cookie_params(0);
session_start();
//$query2 = mysql_query("update users set `online` = '0' where `online` = '1' AND (`last_time_spotted` < NOW() - INTERVAL 15 MINUTE), $connection);
if(!isset($_SESSION["id"])){
header("Location: login.php");
exit(); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="1200; url=logout.php" />
    <script src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
          //debugger; 
          var validNavigation = false;

          // Attach the event keypress to exclude the F5 refresh
          $(document).bind('keypress', function(e) {
            //let validNavigation = false;

            if (e.keyCode == 116){
              validNavigation = true;
              //e.preventDefault();
            }
          });

          // Attach the event click for all links in the page
          $("a").bind("click", function() {
            validNavigation = true;
          });

          // Attach the event submit for all forms in the page
          $("form").bind("submit", function() {
            validNavigation = true;
          });

          // Attach the event click for all inputs in the page
          $("input[type=submit]").bind("click", function() {
            validNavigation = true;
          }); 
          $("input").bind("click", function() {
            validNavigation = true;
          });
          $('#oppForm').on("submit", function(){
            validNavigation = true;
          });
          $("#opfid").on("submit", function() {
            validNavigation = true;
          });
          window.onbeforeunload = function(e) {                
              if (validNavigation!=true) {  
                console.log(e.keyCode);                          
                 //var status = 'abandoned';
                 let num='Number=25';
                $.ajax({
                  url: "backend2.php?"+num,
                  type: "GET",
                  success: function(data) { 
                                  
                  }     
                });
              }
          };
        }); 
    </script>
</head>
</html>