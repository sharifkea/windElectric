<?php
include("auth1.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
        <link rel="stylesheet" href="css/style.css" />
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/script14.js"></script>
        <title>Register</title>
    </head>
    <body>
        <header>
            <h1>Welcome To User Registration</h1>
        </header>	
        <main>
            <div class ="form">
                <form action="addUs.php" method="post" name="userReg" id= "cr">           
                    <input id="fn" name="FirstName"  placeholder="First Name" type="text"  required tabindex="1"><br>
                    <input id="ln" name="LastName"  placeholder="Last Name" type="text"  required tabindex="2"><br>
                    <input id="pw" type="password"  name="Password" placeholder="Password" required tabindex="3"><br>
                    <input id="em" placeholder="Email Address" type="email" name="Email"  required tabindex="4">
                    <input id="verify" name="verify" type="button" value="Verify"><br>
                    <input id="ph" name="Phone"  placeholder="Phone Number" type="phone"  tabindex="5"><br>
                    <input type="checkbox" id="ad" name="Admin" value='true' tabindex="6">
                    <label for="admLb">Admin</label><br>
                    <input name="submit" id="customerRegistration" type="submit" value="Submit" tabindex="7">
                </form>
            </div>
            <div>
                <p>Back to <a href='index.php'>Fleets</a></p>
            </div>
        </main>
    </body>
</html>