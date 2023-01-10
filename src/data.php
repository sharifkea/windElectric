<?php


declare(strict_types=1);
require_once ("connection.php");

class data extends DB{

    function getAllHistory() {
       
        $query = <<<'SQL'
            SELECT *
            FROM all_history;
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();                
        $this->disconnect();
        return $stmt->fetchAll();  
    }
    function getComponents() {
       
        $query = <<<'SQL'
            SELECT *
            FROM components;
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();                
        $this->disconnect();
        return $stmt->fetchAll();  
    }

    function insertHistory($value) 
    {
        $newDb = new DB;
        foreach($value as $x => $x_value) {
            if(isset($value[$x]))$value[$x]=$this->sqlInjection($value[$x]);
        }
        try{
            if($value['note']!=null&&$value['history_mide_id']!=null&&$value['image_name']==null&&$value['user_email']!=null){
                $query = <<<'SQL'
                        INSERT INTO history (note,history_mide_id,user_email) VALUES (?,?,?);
                SQL;
                $stmt = $newDb->pdo->prepare($query);
                $stmt->execute([$value['note'],$value['history_mide_id'],$value['user_email']]);
                $newID = $newDb->pdo->lastInsertId();
                $newDb->disconnect();
                return true;
            }
            else if($value['note']!=null&&$value['history_mide_id']!=null&&$value['image_name']!=null&&$value['user_email']!=null){
                $query = <<<'SQL'
                        INSERT INTO history (note,history_mide_id,image_name,user_email) VALUES (?,?,?,?);
                SQL;
                $stmt = $newDb->pdo->prepare($query);
                $stmt->execute([$value['note'],$value['history_mide_id'],$value['image_name'],$value['user_email']]);
                $newID = $newDb->pdo->lastInsertId();
                $newDb->disconnect();
                return true;
            }
            else return false;

        }
        catch(Exception $e){
            echo $e;
            return false;
        }
    }
    function taskOne(){

        $query = <<<'SQL'
                SELECT  m.id as task_mide_id, o.id as task_ope_id, o.Maintenance_Frequency
                FROM mide m
                JOIN components c on m.component_id = c.id
                JOIN operation o on o.ope_comp_id = c.id;
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();                
        $this->disconnect();
        return $stmt->fetchAll(); 
    }
    function insertTask($value) 
    {
        $newDb = new DB;
        foreach($value as $x => $x_value) {
            if(isset($value[$x]))$value[$x]=$this->sqlInjection($value[$x]);
        }
        try{
            if($value['task_mide_id']!=null&&$value['task_ope_id']!=null){
                $query = <<<'SQL'
                        INSERT INTO tasks (task_ope_id,task_mide_id,last_date,next_date) VALUES (?,?,?,?);
                SQL;
                $stmt = $newDb->pdo->prepare($query);
                $stmt->execute([$value['task_ope_id'],$value['task_mide_id'],$value['last_date'],$value['next_date']]);
                $newID = $newDb->pdo->lastInsertId();
                $newDb->disconnect();
                return true;
            }
            else return false;

        }
        catch(Exception $e){
            echo $e;
            return false;
        }
    }
    function getMideWComId($id){
        $comId=intval($id);
        $query = <<<'SQL'
            SELECT  * FROM mide where component_id=?;          
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$comId]);
        $this->disconnect();
        return $stmt->fetchAll();
    }
    function getTask($id){
        $mideId=intval($id);
        $query = <<<'SQL'
            SELECT  t.id,t.task_mide_id,c.name ,c.component_code, m.code,o.Operation_Description, o.Maintenance_Frequency,t.last_date,t.next_date
            FROM tasks t
            JOIN mide m on t.task_mide_id = m.id
            JOIN components c on m.component_id = c.id
            JOIN operation o on o.id = t.task_ope_id
            where t.task_mide_id=?;          
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$mideId]);
        $this->disconnect();
        return $stmt->fetchAll();
    }

    function getHistoryWM($id){
        $mideId=intval($id);
        $query = <<<'SQL'
            SELECT *
            FROM all_history
            where mide_id=?;
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$mideId]);
        $data=$stmt->fetchAll();
        if(count($data)>0)
        {   $this->disconnect();
            return $data;
        }
        else{
            $stmt='';
            $query = <<<'SQL'
            SELECT  m.id as mide_id,c.name as componentName,c.component_code, m.code
                FROM mide m
                JOIN components c on m.component_id = c.id
                where m.id=?;
            SQL;
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$mideId]);
            $this->disconnect();
            return $stmt->fetchAll();
        }
        //return 'rony';
    }
    function getTaskWCC($comCode,$code){
        $query = <<<'SQL'
            SELECT  t.id,t.task_mide_id,c.name ,c.component_code, m.code,o.Operation_Description, o.Maintenance_Frequency,t.last_date,t.next_date
            FROM tasks t
            JOIN mide m on t.task_mide_id = m.id
            JOIN components c on m.component_id = c.id
            JOIN operation o on o.id = t.task_ope_id
            where c.component_code=? and m.code=?;          
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$comCode,$code]);
        $this->disconnect();
        return $stmt->fetchAll();
    }
    function getUpRC(){
        $query = <<<'SQL'
            Select COUNT(*) FROM upcoming;          
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();                
        $this->disconnect();
        return $stmt->fetchAll(); 
    }
    function getUpRCM(){
        $query = <<<'SQL'
            Select COUNT(*) FROM upcommonth;          
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();                
        $this->disconnect();
        return $stmt->fetchAll(); 
    }
    function getUpAll(){
        $query = <<<'SQL'
        SELECT  t.id,t.task_mide_id,c.name ,c.component_code, m.code,o.Operation_Description, o.Maintenance_Frequency,t.last_date,t.next_date
        FROM    upcoming u
        JOIN  tasks t on u.task_id=t.id
        JOIN mide m on t.task_mide_id = m.id
        JOIN components c on m.component_id = c.id
        JOIN operation o on o.id = t.task_ope_id;
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $this->disconnect();
        return $stmt->fetchAll();
    }
    function getUpAllM(){
        $query = <<<'SQL'
        SELECT  t.id,t.task_mide_id,c.name ,c.component_code, m.code,o.Operation_Description, o.Maintenance_Frequency,t.last_date,t.next_date
        FROM    upcommonth u
        JOIN  tasks t on u.task_id=t.id
        JOIN mide m on t.task_mide_id = m.id
        JOIN components c on m.component_id = c.id
        JOIN operation o on o.id = t.task_ope_id;
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $this->disconnect();
        return $stmt->fetchAll();
    }

    function delUp($id){
        $taskId=intval($id);
        try{
            $query = <<<'SQL'
            delete from upcoming where task_id=?;
            SQL;
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$taskId]);
            $this->disconnect();
            return $stmt->rowCount();
        }
        catch(Exception $e){
            return false;
        }
    }
    function delUpM($id){
        $taskId=intval($id);
        try{
            $query = <<<'SQL'
            delete from upcommonth where task_id=?;
            SQL;
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$taskId]);
            $this->disconnect();
            return $stmt->rowCount();
        }
        catch(Exception $e){
            return false;
        }
    }
    function getTaskDate($date){
        $query = <<<'SQL'
            call upcoming_tasks(?);          
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$date]);
        $this->disconnect();
        return $stmt->fetchAll();
    }
    function insUp($id){
        $taskId=intval($id);
        try{
            $query = <<<'SQL'
            INSERT INTO upcoming (task_id) VALUE (?) ON DUPLICATE KEY UPDATE task_id=?;
            SQL;
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$taskId,$taskId]);
            $this->disconnect();
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
    function insUpM($id){
        $taskId=intval($id);
        try{
            $query = <<<'SQL'
            INSERT INTO upcommonth (task_id) VALUE (?) ON DUPLICATE KEY UPDATE task_id=?;
            SQL;
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$taskId,$taskId]);
            $this->disconnect();
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
    function delAllM(){
        $query = <<<'SQL'
            DELETE FROM upcommonth;
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $this->disconnect();
        return true;
    }
    
    function setTask($id,$lD,$nD){
        $taskId=intval($id);
        try{
            $query = <<<'SQL'
            UPDATE tasks
            SET last_date =?, next_date = ?
            WHERE id = ?;
            SQL;
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$lD,$nD,$id]);
            $this->disconnect();
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }

    function getMideWComCode($comCode){
        $query = <<<'SQL'
            SELECT  *
            FROM mide
            join components c on c.id = mide.component_id
            where component_code=?;          
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$comCode]);
        $this->disconnect();
        return $stmt->fetchAll();
    
    }
    function addUser($data) { //registration
        if(!isset($data['Phone']))$data['Phone']=null;
        if(!isset($data['Admin']))$data['Admin']=0;
        else $data['Admin']=1;
        $newID=0;
       try{
            $query = <<<'SQL'
                INSERT INTO users (first_name,last_name,password,phone,email,admin) VALUES (?,?,?,?,?,?);
            SQL;

            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$data['FirstName'],$data['LastName'],password_hash($data['Password'], PASSWORD_DEFAULT),$data['Phone'],$data['Email'],$data['Admin']]);
            $newID = $this->pdo->lastInsertId();
            $this->disconnect();
            if($newID!=0)return true;
        }
        catch(Exception $e){
            return false;
        }
    }
    
    function findEmail($email) { //look for email address
        $email=$this->sqlInjection($email);
        $id=0;
       
        $query = <<<'SQL'
            SELECT id FROM users WHERE email=?;  
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$email]);                
        $this->disconnect();
        if($stmt->fetchAll())return $stmt->fetchAll();
        else return $id; 
    }

    function getUser($user) { //look for email address
        $user=$this->sqlInjection($user);
        //$pass=$this->sqlInjection($pass);
        $query = <<<'SQL'
            SELECT  * FROM users
            where email=?;          
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$user]);
        $this->disconnect();
        return $stmt->fetchAll();
    }



    function userLog($id,$data) { //change log_in column at log in or log out
        $newId=intval($id);
        $newData=intval($data);
        //if($data='1')$newData=1;else $newData=0;
        $newDb = new DB;
        try{
            
            if(!isset($newId,$newData)) {
                throw new Exception("no data");
              }
            $query = <<<'SQL'
                update users 
                set log_in=? 
                    WHERE id=?;
            SQL;
            $stmt = $newDb->pdo->prepare($query);
            $stmt->execute([$newData,$newId]);
            $newDb->disconnect();

            return true;
        }catch(Exception $e)
        {
            return false;
        }
    }
    
    function insLog($id,$in_time,$out_time){
        $id=intval($id);
        $newID=0;
        try{
            $query = <<<'SQL'
                INSERT INTO log (user_id, log_in, log_out) values (?,?,?);
            SQL;
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id,$in_time,$out_time]);
            $newID = $this->pdo->lastInsertId();
            $this->disconnect();
            if($newID!=0)return true;
        }
        catch(Exception $e){
            return false;
        }
    }
    function getLog() { //look for email address
        //$user=$this->sqlInjection($user);
        //$pass=$this->sqlInjection($pass);
        $query = <<<'SQL'
            SELECT  u.email as "User E-mail",l.log_in as "Signed In at", l.log_out as "Signed Out at"
            FROM log l
            join users u on l.user_id = u.id
            order by -l.id;          
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([]);
        $this->disconnect();
        return $stmt->fetchAll();
    }
    function getAllUsers(){
        $query = <<<'SQL'
            SELECT  id as "User Id", email as "E-mail Address", first_name as "First Name", last_name as "Last Name", admin as "Status", phone as "Phone", log_in as "Currently"
        FROM users;         
        SQL;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([]);
        $this->disconnect();
        return $stmt->fetchAll();
    }

    function delUser($id){
        $taskId=intval($id);
        try{
            $query = <<<'SQL'
            delete from users where id=?;
            SQL;
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$taskId]);
            $this->disconnect();
            return $stmt->rowCount();
        }
        catch(Exception $e){
            return false;
        }
    }
    function insTaskHistory($id,$report,$imgName,$email){
        $newDb = new DB;
        $taskId=intval($id);
        $report=$this->sqlInjection($report);
        $email=$this->sqlInjection($email);
        $imgName=$this->sqlInjection($imgName);        
        try{
            if($taskId!=null&&$report!=null&&$imgName==null&&$email!=null){
                $query = <<<'SQL'
                        INSERT INTO task_history (th_task_id,report,user_email) VALUES (?,?,?);
                SQL;
                $stmt = $newDb->pdo->prepare($query);
                $stmt->execute([$taskId,$report,$email]);
                $newID = $newDb->pdo->lastInsertId();
                $newDb->disconnect();
                return true;
            }
            else if($taskId!=null&&$report!=null&&$imgName!=null&&$email!=null){
                $query = <<<'SQL'
                        INSERT INTO task_history (th_task_id,report,image_name,user_email) VALUES (?,?,?,?);
                SQL;
                $stmt = $newDb->pdo->prepare($query);
                $stmt->execute([$taskId,$report,$imgName,$email]);
                $newID = $newDb->pdo->lastInsertId();
                $newDb->disconnect();
                return true;
            }
            else return false;

        }
        catch(Exception $e){
            echo $e;
            return false;
        }
    }
    function getMainHWM($id){
        $mideId=intval($id);
        $newDb = new DB;
        $query = <<<'SQL'
            SELECT *
            FROM all_main_history
            where mide_id=?;
            SQL;
        $stmt = $newDb->pdo->prepare($query);
        $stmt->execute([$mideId]);
        $data=$stmt->fetchAll();
        if(count($data)>0)
        {   $newDb->disconnect();
            return $data;
        }
        else{
            $stmt='';
            $query = <<<'SQL'
            SELECT c.name as 'Component Name',concat_ws('',c.component_code,m.code) as 'Component Code'  from mide m
            join components c on c.id = m.component_id
            where m.id=?;
            SQL;
            $stmt = $newDb->pdo->prepare($query);
            $stmt->execute([$mideId]);
            $data=$stmt->fetchAll();
            $newDb->disconnect();
            return $data;            
        }
    }

    function sqlInjection($data){
        
        $data=htmlspecialchars(strip_tags($data));
        $data = preg_replace('/&quot;/', '', $data);
        $data = preg_replace('/&#039;/', "", $data);
        $data = preg_replace('/\s+/', ' ', $data);
        if ((empty($data))||($data==' ')) $data=null;
        return $data;
        
    }
    
}
    
   