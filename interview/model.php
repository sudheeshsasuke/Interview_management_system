<?php
//model.php

//redirect to home
function RedirectHome() {
    header('Location: http://blog/interview/');
}

//databse connection
function OpenDatabaseConnection() {

    $server = 'blog';
    $dbname = 'interview_management';
    $user = 'root';
    $pass = 'root';

    $link = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);

    return $link;
}

//close db connection
function CloseDatabaseconnection($link) {
    $link = null;
}

// adding interview details to table 
function AddInterviewrecord() {
    //open database connection
    $link =  OpenDatabaseConnection();

    $stmt = $link->prepare("INSERT INTO `interview`(`title`, `location`, `startdate`, `enddate`) 
    VALUES (:title, :location, :startdate, :enddate)");

    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':location', $_POST['location']);
    $stmt->bindParam(':startdate', $_POST['start_date']);
    $stmt->bindParam(':enddate', $_POST['end_date']);

    $stmt->execute();

    //close database connection
    CloseDatabaseconnection($link);
}

//Adding participant details to table
function AddParticipantrecord() {
    //open database connection
    $link =  OpenDatabaseConnection();
    
    //adding to partcipant tablr
    $stmt = $link->prepare("INSERT INTO `participants`(`reg_id`, `name`) 
        VALUES (:regid, :name)");
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':regid', $_POST['reg_id']);
    
    $stmt->execute();
        
        
        $id = $link->lastInsertId();
        

    //adding to part_details table
    $stmt2 = $link->prepare("INSERT INTO `part_details`
    (`part_id`, `email`, `phone`, `qualification`, `dob`, `address`) 
    VALUES (:partid, :email, :phone, :qual, :dob, :address)");

    $stmt2->bindParam(':partid', $id);
    $stmt2->bindParam(':email', $_POST['email']);
    $stmt2->bindParam(':phone', $_POST['phone']);
    $stmt2->bindParam(':qual', $_POST['qualification']);
    $stmt2->bindParam(':dob', $_POST['dob']);
    $stmt2->bindParam(':address', $_POST['address']);

    $stmt2->execute();
    
    //adding to academics table
    $stmt3 = $link->prepare("INSERT INTO `academic`
    (`part_id`, `course`, `maths_score`, `year`, `school`, `cgpa`) 
    VALUES (:partid, :course, :maths, :year, :school, :gpa)");

    $stmt3->bindParam(':partid', $id);
    $stmt3->bindParam(':course', $_POST['course']);
    $stmt3->bindParam(':maths', $_POST['maths']);
    $stmt3->bindParam(':year', $_POST['yop']);
    $stmt3->bindParam(':school', $_POST['school']);
    $stmt3->bindParam(':gpa', $_POST['gpa']);

    $stmt3->execute();

    //adding to experience table
    $stmt4 = $link->prepare("INSERT INTO `experience`
    (`part_id`, `company`, `startdate`, `enddate`, `reason`) 
    VALUES (:partid, :company, :sd, :ed, :reason)");

    $stmt4->bindParam(':partid', $id);
    $stmt4->bindParam(':company', $_POST['company']);
    $stmt4->bindParam(':sd', $_POST['sd']);
    $stmt4->bindParam(':ed', $_POST['ed']);
    $stmt4->bindParam(':reason', $_POST['reason']);

    $stmt4->execute();
    
    //close database connection
    CloseDatabaseconnection($link);
}

//adding round details
function AddRoundRecord() {
    //open database connection
    $link =  OpenDatabaseConnection();
    
    $stmt = $link->prepare("INSERT INTO `rounds`
    (`round`, `maxscore`, `acitve`) 
    VALUES (:round, :max, :active)");
    
    $stmt->bindParam(':round', $_POST['round']);
    $stmt->bindParam(':max', $_POST['max']);
    $stmt->bindParam(':active', $_POST['active']);

    //debug
    $t = $stmt->execute();
    
    //close database connection
    CloseDatabaseconnection($link);
}

//GetData return participant names and rounds
function GetData() {

    //open database connection
    $link =  OpenDatabaseConnection();
    
    //get participants
    $stmt = $link->query("SELECT * FROM `participants`");
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $participants[] = $row;
    }

    //get rounds
    $stmt1 = $link->query("SELECT * FROM `rounds`");
    
    while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        $rounds[] = $row1;
    }
    
    $data['participants'] = $participants;
    $data['rounds'] = $rounds;

    //close database connection
    CloseDatabaseconnection($link);

    return $data;
}

//get rounds from database
function GetRounds() {
    
        //open database connection
        $link =  OpenDatabaseConnection();
    
        //get rounds
        $stmt1 = $link->query("SELECT * FROM `rounds`");
        
        while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
            $rounds[] = $row1;
        }

        //close database connection
        CloseDatabaseconnection($link);
    
        return $rounds;
    }
    

function FetchData($id) {
    //open database connection
    $link =  OpenDatabaseConnection();
    
    //get participants
   // $stmt = $link->prepare();

    //close database connection
    CloseDatabaseconnection($link);
}

//add marks to db
function AddMarksRecord($id, $rid) {
    //open database connection
    $link =  OpenDatabaseConnection();
    
    //check whether marks where added previo
    //$x = array();
    $x = $_SESSION["score_table_indices"][$id][$rid];

    if($x > 1) {

        $stmt = $link->prepare("UPDATE `int_score` SET 
        `score`= :score,`comment`= :comment WHERE id = :id
        ");

        $stmt->bindParam(':id', $x);
        $stmt->bindParam(':score', $_POST['curr_score']);
        $stmt->bindParam(':comment', $_POST['comment']);
        
        $stmt->execute();
    }
    else {

        //normal add where no marks where added previously
        //get participants
        $stmt = $link->prepare("INSERT INTO `int_score`
        (`round_id`, `part_id`, `score`, `comment`, `int_id`) 
        VALUES (:roundid, :part_id, :score, :comment, :intid)
        ");

        $stmt->bindParam(':roundid', $_POST['round_score']);
        $stmt->bindParam(':part_id', $id);
        $stmt->bindParam(':score', $_POST['curr_score']);
        $stmt->bindParam(':comment', $_POST['comment']);
        
        //currently we have only one interview
        $stmt->bindParam(':intid', $val);
        $val = 1;

        //debug
        $t = $stmt->execute();
        $v = $t;
    }
    
    
    //close database connection
    CloseDatabaseconnection($link);
}

//get marks returns rows from int_score table
function GetMarks($data) {

    //get participant associative array
    $participants = $data['participants'];

    //get rounds from data
    $rounds = $data['rounds'];

    //start db connection
    $link = OpenDatabaseConnection();

/* Nonoptimized db search part 

    foreach($participants as $participant) {
        
        $part_id = $participant['id'];
        foreach($rounds as $round) {
   
            //currently we have only one interview
            $int_id = '1';

            $round_id = $round['id'];

            $stmt = $link->prepare("SELECT i.score FROM participants AS p
            LEFT JOIN int_score AS i ON p.id = i.part_id 
            WHERE p.id = :participant_id AND i.round_id = :roundid");

            $stmt->bindParam(':participant_id', $part_id);
            $stmt->bindParam(':roundid', $round_id);

            $stmt->execute();

            $marks[$round_id] = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        $name[$part_id] = $marks;
    }
*/

    //optimized code part
    $stmt = $link->prepare("SELECT i.id AS markid, i.score, p.id, r.id AS rid FROM participants AS p
    LEFT JOIN int_score AS i ON p.id = i.part_id 
    LEFT JOIN rounds AS r ON r.id = i.round_id
    WHERE r.acitve = :val");

    $stmt->bindParam(':val', $val);
    $val = 1;

    //$t is used for debug
    $t = $stmt->execute();

    //fetch the rows
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows[] = $row;
    }

    //close database connection
    CloseDatabaseconnection($link);

    foreach($rows as $row) {
        $marks[$row['id']][$row['rid']] = $row['score'];
        $table_index[$row['id']][$row['rid']] = $row['markid'];
    }
    
    $data['marks_of_table'] = $marks;
    $data['index'] = $table_index; 
    return $data;
}

//get round marks for 4rid
function GetroundMarksRecords($id, $rid)
{
    $link = OpenDatabaseConnection();

    $stmt = $link->prepare("SELECT * FROM int_score
    WHERE round_id = :rid AND part_id = :pid");

    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':pid', $id);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    CloseDatabaseconnection($link);

    return $row;
}

?>