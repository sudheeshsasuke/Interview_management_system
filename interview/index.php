<?php
//index.php


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
    // show interviews
    showHome();
   // AddInterview();
} elseif('/interview/index.php/add_interview' == $uri) {
    //add interview
    AddInterview();
}
elseif('/interview/index.php/add_interview_action' == $uri) {
    //add interview
    AddInterviewToDatabase();
} elseif('/interview/index.php/add_participant' == $uri) {
    //add interview
    AddParticipant();
}
elseif('/interview/index.php/add_participant_action' == $uri) {
    //add interview
    AddParticipantToDatabase();
} elseif('/interview/index.php/add_round' == $uri) {
    //add interview
    AddRound();
}
elseif('/interview/index.php/add_round_action' == $uri) {
    //add interview
    AddRoundToDatabase();
} 
elseif('/interview/index.php/add_marks' == $uri) {
    //add interview
    DisplayMarks();
}
elseif('/interview/index.php/add_marks_to' == $uri && isset($_GET['id']) && isset($_GET['roundid'])) {
    //add marks to a participant
    $id = $_GET['id'];
    $rid = $_GET['roundid'];
    GetRoundMarks($id, $rid);
    //AddMarksToDatabase($id);
}

//when select option is selected
//fetch the selected round marks from db
//paste it in the form
/*
elseif('/interview/index.php/add_marks_to' == $uri && isset($_GET['roundid'])) {
    //add marks to a participant
    $id = $_GET['roundid'];
    GetRoundMarks($id);
}
*/

elseif('/interview/index.php/add_mark_action' == $uri && isset($_GET['id'])) {
    //add marks to a participant
    $id = $_GET['id'];
    AddMark($id);
}
elseif('/interview/index.php/display_marks' == $uri) {
    //add marks to a participant
    DisplayMarks();
}
else 
{
    include 'templates/pagenotfound.tpl.php';
}

?>