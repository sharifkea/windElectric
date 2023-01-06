$(document).ready(function() {
    $(document).delegate('#verify', 'click', function(e) {
        e.preventDefault();
        const email = $('#em').val();
        if(email == null || email == ""){
            alert("Email is required");
            return
        }
        else{
            let num='Number=23&email='+email;
            //window.location='index.php';
            $.ajax({
                url: "backend2.php?"+num,
                type: "GET",
                success: function(data) { 
                        if(data==1){
                            alert('A customer already using this Email. You can not use it for Registration.');
                        } else {
                            alert('You can use this email.');
                        }
                },
                error: function(err) {
                    alert('error');                    
                }
            });
        }
    });
    // Customer Registration
    $('#cr').on("submit", function(e) {
        e.preventDefault();
        const email = $('#em').val(); 
        console.log(email);   
        const formData= $("#cr").serialize();
        console.log(formData);
        let num='Number=23&email='+email;
        //window.location='index.php';
        $.ajax({
            url: "backend2.php?"+num,
            type: "GET",
            success: function(data) { 
                console.log(data);
                if (data==0){
                    num='Number=24&'+formData;
                    $.ajax({
                        /*url:'addUser.php',
                        method:'POST',
                        data:fromData,
                        contentType:false,
                        cache:false,
                        processData:false,
                        success:function(data){*/
                        
                        url: "backend2.php?"+num,
                        type: "GET",
                        success: function(data) { 
                            console.log(data);
                            if(data==true){
                                alert("New User Added.");
                                window.location='index.php';
                            }
                            else{
                                alert("Something went wrong.");
                            } 
                        }
                    });
                }
                else{
                    alert("A User already exists for this Email address. User not added. Try with another Email Address.");
                }
            }
        });      
    });
});