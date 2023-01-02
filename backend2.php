<?php
     session_start();
     require_once 'src/data.php';
    $return=0;
  

    if(!empty($_REQUEST['Number'])){
        $service = new data;
        if($_REQUEST['Number']==1){
            //($userId,$eventId,$eventName,$category,$eventDate,$place
        // $_REQUEST['Id']=$_SESSION['Id'];
            $returnValue=$service->getAllHistory();
            /*{firstName:"John", lastName:"Doe", age:46}
            $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
            echo $age["Peter"];
            echo $age["Ben"];*/ 
            echo json_encode($returnValue);
        }
        if($_REQUEST['Number']==2){
            $returnValue=$service->insertHistory($_REQUEST);
            echo $returnValue;
        }
        if($_REQUEST['Number']==3){
            $returnValue=$service->taskOne();
            echo json_encode($returnValue);
        }
        if($_REQUEST['Number']==4){
            $returnValue=$service->insertTask($_REQUEST);
            echo $returnValue;
        }
        if($_REQUEST['Number']==5){
            $returnValue=$service->getComponents(); 
            echo json_encode($returnValue);
        }
        if($_REQUEST['Number']==6){
            if(isset($_REQUEST['comId'])){
                $returnValue=$service->getMideWComId($_REQUEST['comId']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['comId'];
            }
            else echo 'No Com Id';
        }
        if($_REQUEST['Number']==7){
            if(isset($_REQUEST['mideId'])){
                $returnValue=$service->getTask($_REQUEST['mideId']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['comId'];
            }
            else echo 'No Com Id';
        }
        if($_REQUEST['Number']==8){
            if(isset($_REQUEST['mideId'])){
                $returnValue=$service->getHistoryWM($_REQUEST['mideId']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            }
            else echo 'No Com Id';
        } 
        if($_REQUEST['Number']==9){
            if(isset($_REQUEST['comCode'])&& isset($_REQUEST['code'])){
                $returnValue=$service->getTaskWCC($_REQUEST['comCode'],$_REQUEST['code']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            }
            else echo 'No Com Id';
        }    
        if($_REQUEST['Number']==10){
                $returnValue=$service->getUpAll(); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            
        }      
        if($_REQUEST['Number']==11){
            if(isset($_REQUEST['taskId'])){
                $returnValue=$service->delUp($_REQUEST['taskId']); 
                if($returnValue==1){
                    $_SESSION['count']=$_SESSION['count']-1;
                    echo $_SESSION['count'];
                }
                else echo 'Rony';
            }
            else echo '11 No Com Id';
        }   
        if($_REQUEST['Number']==12){
            if(isset($_REQUEST['id'],$_REQUEST['last_date'], $_REQUEST['next_date'])){
                $returnValue=$service->setTask($_REQUEST['id'],$_REQUEST['last_date'], $_REQUEST['next_date']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            }
            else echo '12 No Com Id';
        }   
        if($_REQUEST['Number']==13){
            if(isset($_REQUEST['date'])){
                $returnValue=$service->getTaskDate($_REQUEST['date']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            }
            else echo '13 No Com Id';
        }   
        if($_REQUEST['Number']==14){
            if(isset($_REQUEST['id'])){
                $returnValue=$service->insUp($_REQUEST['id']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            }
            else echo '14 No Com Id';
        }    
        if($_REQUEST['Number']==15){
            if(isset($_REQUEST['company'],$_REQUEST['password'])){
                $returnValue=$service->getUser($_REQUEST['company'],$_REQUEST['password']); 
                if(isset($returnValue[0]['id'])){
                    $_SESSION['company']=$_REQUEST['company'];
                    $_SESSION['user']=$returnValue[0]['id'];
                    //if($returnValue["id"]=='1'){$returnValue["id"]='5';}
                    echo json_encode($returnValue);
                }
                else {$x['0']['id']='0'; echo json_encode($x);}
                //echo $_REQUEST['mideId'];
            
            }
            else echo '15 No Com Id';
        } 
        if($_REQUEST['Number']==16){
            if(isset($_REQUEST['id'])){
                $returnValue=$service->insUpM($_REQUEST['id']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            }
            else echo '14 No Com Id';
        }
        if($_REQUEST['Number']==17){
            $returnValue=$service->getUpAllM(); 
            echo json_encode($returnValue);
            //echo $_REQUEST['mideId'];
        } 
        if($_REQUEST['Number']==18){
            
            $returnValue=$service->delAllM(); 
            echo json_encode($returnValue);
            //echo $_REQUEST['mideId'];
        }    
        if($_REQUEST['Number']==20){
            if(isset($_REQUEST['comCode'])){
                $returnValue=$service->getMideWComCode($_REQUEST['comCode']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['comId'];
            }
            else echo '20 No Com Id';
        }
        if($_REQUEST['Number']==21){
            $_FILES=$_REQUEST['file'];
            if(isset($_FILES)){
                //require_once 'src/data.php';
                $service = new data;
                $statusMsg = '';
                //echo '<script>console.log("'.$_FILES.'")</script>';
                
                // File upload path
                $targetDir = "uploads/";
                $fileName = $_FILES["name"];
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                
                if(!empty($_FILES["name"])){
                    // Allow certain file formats
                    $allowTypes = array('jpg','png','jpeg','gif','pdf');
                    if(in_array($fileType, $allowTypes)){
                        move_uploaded_file($_FILES["tmp_name"], $targetFilePath);
                        $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                        // Upload file to server
                        /*if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                            //$insert=$service->intoImg($fileName);
                            if($insert){
                                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                            }else{
                                $statusMsg = "File upload failed, please try again. Changing image name might help!";
                            } 
                        }else{
                            $statusMsg = "Sorry, there was an error uploading your file.";
                        }*/
                    }else{
                        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                    }
                }else{
                    $statusMsg = 'Please select a file to upload.';
                }
                echo $statusMsg;
                // Display status message
                }
            else echo '21No Com Id';
        }
          
        
    
        else echo false;
        //else  $_SESSION['Number'] =1;
    // echo ($_SESSION['Number']);
    }

?>