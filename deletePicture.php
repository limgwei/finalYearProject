<?php
  
        $filename = "img/null.jpg";
        if (file_exists($filename)) {
          unlink("img/null.jpg");
          echo 'File '.$filename.' has been deleted';
        } else {
          echo 'Could not delete '.$filename.', file does not exist';
        }
      


?>