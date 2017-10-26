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
    
    //check captcha first
    if($_SESSION['captcha'] == $_POST['captcha']) {
       
        //only then add the details to db
        AddInterviewrecord();
    }
    else {

        //redirect to interview registration form
        header('Location: http://blog/interview/index.php/add_interview');
    }
    
    //ShowHome();
    RedirectHome();
}

?>