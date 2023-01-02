<?php

    if ( 0 < $_FILES['file']['error'] ) {
        echo false;
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
        echo true;
    }

?>