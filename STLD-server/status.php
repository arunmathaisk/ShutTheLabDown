<?php
 require 'rb-sqlite.php';
 $cur_dir = getcwd();
 $cur_dir = "sqlite:". $cur_dir . "/stld.db"; 
 R::setup($cur_dir);
 
    if(isset($_GET['lab_number']))
    {   $lab_number =$_GET['lab_number'];
        $labs = R::find('lab', ' number LIKE ?', [ $lab_number ] );
        $len = sizeof($labs);
        if ($len==1)
        {
            foreach ($labs as $lab)
            {
                echo $lab->status;
            }
     
        }
        else{
            echo "Lab with number ".$lab_number." does not exist";
        }
        exit;
    }
    else{
        echo "Lab number not passed as argument";
    }
   

    
?>
