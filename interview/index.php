<?php
//index.php
// Start the session
session_start();
//$_SESSION["score_table_indices"] = 0;
//session
//$session_start();

//include files
require_once 'model.php';
require_once 'interview_controller.php';
require_once 'participant_controller.php';
require_once 'round_controller.php';
require_once 'marks_controller.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if('/interview/' == $uri) {
    
    // show home template
    showHome();
   // AddInterview();
} elseif('/interview/index.php/add_interview' == $uri) {
    
    //add interview
    AddInterview();
}
elseif('/interview/index.php/add_interview_action' == $uri) {
    
    //add interview to db
    AddInterviewToDatabase();
} elseif('/interview/index.php/add_participant' == $uri) {
    
    //add participant
    AddParticipant();
}
elseif('/interview/index.php/add_participant_action' == $uri) {
    
    //add participant to db
    AddParticipantToDatabase();
} elseif('/interview/index.php/add_round' == $uri) {
    
    //add rounds
    AddRound();
}
elseif('/interview/index.php/add_round_action' == $uri) {
    
    //add rounds to db
    AddRoundToDatabase();
} 
elseif('/interview/index.php/add_marks' == $uri) {
    
    //displaying marks
    DisplayMarks();
}
elseif('/interview/index.php/add_marks_to' == $uri && isset($_GET['id']) && isset($_GET['roundid'])) {
    
    //Get round Marks
    GetRoundMarks($_GET['id'], $_GET['roundid']);
    //AddMarksToDatabase($id);
}

// normal marks form working with participant id passing via GET method
/*
elseif('/interview/index.php/add_marks_to' == $uri && isset($_GET['roundid'])) {
    //add marks to a participant
    $id = $_GET['roundid'];
    GetRoundMarks($id);
}
*/

//normal marks form action part
/*
elseif('/interview/index.php/add_mark_action' == $uri && isset($_GET['id'])) {
    //add marks to a participant
    $id = $_GET['id'];
    AddMark($id);
}
*/

//Debugging marks form action part
elseif('/interview/index.php/add_mark_action' == $uri && isset($_GET['id']) && isset($_GET['roundid'])) {
    
    //add marks to int_score table after submission
    AddMark($_GET['id'], $_GET['roundid']);
}
elseif('/interview/index.php/display_marks' == $uri) {
    
    //Display Marks()
    DisplayMarks();
}
else 
{
    include 'templates/pagenotfound.tpl.php';
}

?>