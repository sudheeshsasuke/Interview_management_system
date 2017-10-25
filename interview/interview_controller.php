<?php
//interview controller


//show home page
function showHome()
{
    require 'templates/home.tpl.php';
    //header('Location: http://blog/interview/templates/home.tpl.php');
    //header('Location: http://blog/interview/templates/home.tpl.php');
}

//add interview
function AddInterview() {
    require 'templates/reg_interview.tpl.php';
}

//show interviews
function ShowInterviews() {

}

//add interview to databse
function AddInterviewToDatabase() {
    AddInterviewrecord();
    //ShowHome();
    RedirectHome();
}

?>