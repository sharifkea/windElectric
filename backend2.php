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
        else if($_REQUEST['Number']==2){
            $returnValue=$service->insertHistory($_REQUEST);
            echo $returnValue;
        }
        else if($_REQUEST['Number']==3){
            $returnValue=$service->taskOne();
            echo json_encode($returnValue);
        }
        else if($_REQUEST['Number']==4){
            $returnValue=$service->insertTask($_REQUEST);
            echo $returnValue;
        }
        else if($_REQUEST['Number']==5){
            $returnValue=$service->getComponents(); 
            echo json_encode($returnValue);
        }
        else if($_REQUEST['Number']==6){
            if(isset($_REQUEST['comId'])){
                $returnValue=$service->getMideWComId($_REQUEST['comId']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['comId'];
            }
            else echo 'No Com Id';
        }
        else if($_REQUEST['Number']==7){
            if(isset($_REQUEST['mideId'])){
                $returnValue=$service->getTask($_REQUEST['mideId']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['comId'];
            }
            else echo 'No Com Id';
        }
        else if($_REQUEST['Number']==8){
            if(isset($_REQUEST['mideId'])){
                $returnValue=$service->getHistoryWM($_REQUEST['mideId']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            }
            else echo 'No Com Id';
        } 
        else if($_REQUEST['Number']==9){
            if(isset($_REQUEST['comCode'])&& isset($_REQUEST['code'])){
                $returnValue=$service->getTaskWCC($_REQUEST['comCode'],$_REQUEST['code']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            }
            else echo 'No Com Id';
        }    
        else if($_REQUEST['Number']==10){
            date_default_timezone_set ( 'Europe/Copenhagen' );
            $datetime = new DateTime();
            $datetime->modify('next monday');
            $date = $datetime->format( 'Y-m-d' );
            //echo $date;
                $returnValue=$service->getUpAll($date); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            
        }      
        else if($_REQUEST['Number']==11){
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
        else if($_REQUEST['Number']==12){
            if(isset($_REQUEST['id'],$_REQUEST['last_date'], $_REQUEST['next_date'])){
                $returnValue=$service->setTask($_REQUEST['id'],$_REQUEST['last_date'], $_REQUEST['next_date']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            }
            else echo '12 No Com Id';
        }   
        else if($_REQUEST['Number']==13){
            if(isset($_REQUEST['date'])){
                $returnValue=$service->getTaskDate($_REQUEST['date']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            }
            else echo '13 No Com Id';
        }   
        else if($_REQUEST['Number']==14){
            if(isset($_REQUEST['id'])){
                $returnValue=$service->insUp($_REQUEST['id']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            }
            else echo '14 No Com Id';
        }    
        else if($_REQUEST['Number']==15){

            if(isset($_REQUEST['email'],$_REQUEST['password'])){

                $returnValue=$service->getUser($_REQUEST['email']); 
                if(password_verify($_REQUEST['password'], $returnValue[0]['password'])){
                    if($returnValue[0]['log_in']==1){
                        $x['0']['id']='in'; echo json_encode($x);
                    }
                    else{
                        date_default_timezone_set ( 'Europe/Copenhagen' );
                        $datetime = new DateTime();
                        $datetime_str = $datetime->format( 'Y-m-d H:i:s' );
                        //$datetime_str = wp_date( 'Y-m-d H:i:s' );
                        $ret=$service->userLog($returnValue[0]['id'],'1');
                        $_SESSION['email']=$_REQUEST['email'];
                        $_SESSION['userName']=$returnValue[0]['first_name'].' '.$returnValue[0]['last_name'];
                        $_SESSION['admin']=$returnValue[0]['admin'];
                        $_SESSION['id']=$returnValue[0]['id'];
                        $_SESSION['inTime']=$datetime_str;
                        echo json_encode($returnValue);
                    }
                }
                else {$x['0']['id']='0'; echo json_encode($x);}
                //echo $_REQUEST['mideId'];
            
            }
            else echo '15 No Com Id';
        } 
        else if($_REQUEST['Number']==16){
            if(isset($_REQUEST['id'])){
                $returnValue=$service->insUpM($_REQUEST['id']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            }
            else echo '14 No Com Id';
        }
        else if($_REQUEST['Number']==17){
            date_default_timezone_set ( 'Europe/Copenhagen' );
            $datetime = new DateTime();
            $datetime->modify('first day of next month');
            $date = $datetime->format( 'Y-m-d' );
            $returnValue=$service->getUpAll($date); 
            echo json_encode($returnValue);
            //echo $_REQUEST['mideId'];
        } 
        else if($_REQUEST['Number']==18){
            
            $returnValue=$service->delAllM(); 
            echo json_encode($returnValue);
            //echo $_REQUEST['mideId'];
        }    
        else if($_REQUEST['Number']==20){
            if(isset($_REQUEST['comCode'])){
                $returnValue=$service->getMideWComCode($_REQUEST['comCode']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['comId'];
            }
            else echo '20 No Com Id';
        }
        else if($_REQUEST['Number']==21){
            if(isset($_REQUEST['cId'], $_REQUEST['cNo'], $_REQUEST['dId'], $_REQUEST['date'])){
            $returnValue=$service->insConNum($_REQUEST['cId'],$_REQUEST['cNo'], $_REQUEST['dId'], $_REQUEST['date']);
            echo json_encode($returnValue);
            }
            else echo 'No:21 Mid Id';
        }  
        else if($_REQUEST['Number']==22){
            if(isset($_REQUEST['cId'], $_REQUEST['oD'], $_REQUEST['mF'],$_REQUEST['dId'], $_REQUEST['date'])){
            $returnValue=$service->insOpe($_REQUEST['cId'],$_REQUEST['oD'], $_REQUEST['mF'],$_REQUEST['dId'], $_REQUEST['date']);
            echo json_encode($returnValue);
            }
            else echo 'No:22 Mid Id';
        }             
        else if($_REQUEST['Number']==23){
            if(isset($_REQUEST['email'])){
                if($service->findEmail($_REQUEST['email'])!=0) echo 1;
                else echo 0;

                }
            else echo '21No Com Id';
        }
        else if($_REQUEST['Number']==24){
            if(isset($_REQUEST['Email'])){
                foreach($_REQUEST as $x => $x_value) {
                    //echo $x;
                    if(!is_array($_REQUEST[$x])){
                        $_REQUEST[$x]=htmlspecialchars(strip_tags($_REQUEST[$x]));
                        $_REQUEST[$x] = preg_replace('/\s+/', ' ', $_REQUEST[$x]);
                        if ((empty($_REQUEST[$x]))||($_REQUEST[$x]==' ')) $_REQUEST[$x]='';
                        
                    }
                    //$key.=$x;
                }
                $returnValue=$service->addUser($_REQUEST);
                echo $returnValue;
                }
            else echo '24No Com Id';
        }
        else if($_REQUEST['Number']==25){
            date_default_timezone_set ( 'Europe/Copenhagen' );
            $datetime = new DateTime();
            $time = $datetime->format( 'Y-m-d H:i:s' );
            //$time= wp_date( 'Y-m-d H:i:s' );
            //$time=date('Y-m-d H:i:s');
            $retu=$service->insLog($_SESSION['id'],$_SESSION['inTime'],$time);
            $returnValue=$service->userLog($_SESSION['id'],'0');
            session_destroy();
            echo $returnValue;
            
        }
        else if($_REQUEST['Number']==26){
            $returnValue=$service->getLog(); 
            echo json_encode($returnValue);
        }    
        else if($_REQUEST['Number']==27){
            $returnValue=$service->getAllUsers(); 
            echo json_encode($returnValue);
        } 
        else if($_REQUEST['Number']==28){
            if(isset($_REQUEST['id'])){
                $returnValue=$service->delUser($_REQUEST['id']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            }
            else echo '28 No Com Id';
        }   
        else if($_REQUEST['Number']==29){
            if(isset($_REQUEST['id'])){
                $returnValue=$service->insTaskHistory($_REQUEST['id'],$_REQUEST['report'],$_REQUEST['imgName'],$_SESSION['email']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            }
            else echo '29 No Com Id';
        }
        else if($_REQUEST['Number']==30){
            if(isset($_REQUEST['mideId'])){
                $returnValue=$service->getMainHWM($_REQUEST['mideId']); 
                echo json_encode($returnValue);
                //echo $_REQUEST['mideId'];
            }
            else echo '30 No Com Id';
        } 
        else if($_REQUEST['Number']==31){
            if(isset($_REQUEST['mId'])){
                $returnValue=$service->getLDate($_REQUEST['mId']); 
                echo $returnValue;
            }
            else echo '31 No Com Id';
        }
        else if($_REQUEST['Number']==32){
            if(isset($_REQUEST['mId'])){
                $returnValue=$service->upDNDMF($_REQUEST['mId'],$_REQUEST['mF'],$_REQUEST['newDate']); 
                if($returnValue)
                echo $service->insOPH($_REQUEST['mId'],$_REQUEST['ops'],$_SESSION['email']);
                
            }
            else echo '32 No Com Id';
        }
        else if($_REQUEST['Number']==33){
            $returnValue=$service->allOpHis(); 
            echo json_encode($returnValue);
        }
        else if($_REQUEST['Number']==34){
            if(isset($_REQUEST['id'], $_REQUEST['taskId'])){
                $returnValue=$service->upDNDMF($_REQUEST['taskId'],$_REQUEST['mF'],$_REQUEST['newDate']); 
                if($returnValue)
                echo $service->delOPH($_REQUEST['id']);
                
            }
            else echo '3 No Com Id';
        }
        else if($_REQUEST['Number']==35){
            $returnValue=$service->getMideFail($_REQUEST['mId']);
            echo json_encode($returnValue);
    
        }
        else if($_REQUEST['Number']==36){
            echo $service->incFailure($_REQUEST);
        }
        else if($_REQUEST['Number']==37){
            $returnValue=$service->getAllFail();
            if($returnValue=='no Data')
            echo $returnValue;
            else echo json_encode($returnValue);
    
        }
    }
    else echo false;

?>