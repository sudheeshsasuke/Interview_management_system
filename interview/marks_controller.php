<?php


//show particpant form
function DisplayMarks() {

    //redirect
    //header('Location: http://blog/interview/');

    //GetData return participant names and rounds
    $datas = GetData();
    
    //get marks returns rows from int_score table
    $scr = GetMarks($datas);

    //get score
    $score = $scr['marks_of_table'];

    //get index
    $index = $scr['index'];

    // Set session variables
    $_SESSION["score_table_indices"] = $index;
    
    require 'templates/display.tpl.php';
}

// display participants and their score
function ShowMarksDisplay() {
    header('Location: ');
}

//add participant to databse
//add interview to databse
function AddMarksToDatabase($id, $marks1) {

    $rounds = GetRounds();
    $marks = $marks1;
    require 'templates/reg_marks.tpl.php';
    //AddMarksRecord($id);
    //AddMark($id);
    //show home should redirect
    //ShowHome();
}

function AddMark($id, $rid)
{
    AddMarksRecord($id, $rid);
    header('Location: http://blog/interview/index.php/display_marks');
    DisplayMarks();
}

//get round marks
function GetRoundMarks($id, $rid) {
   $marks = GetroundMarksRecords($id, $rid);
    AddMarksToDatabase($id, $marks);
}
?>