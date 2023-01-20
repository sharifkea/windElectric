$(document).ready(function() {
    $('#oppForm').on("submit", function(e) {
        e.preventDefault();   
        const formData= $("#oppForm").serialize();
        console.log(formData);
    });
});