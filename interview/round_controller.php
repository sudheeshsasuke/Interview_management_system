<?php


//show particpant form
function AddRound() {
    require 'templates/reg_round.tpl.php';
}


//add participant to databse
//add interview to databse
function AddRoundToDatabase() {
     
    //check captcha first
     if($_SESSION['captcha'] == $_POST['captcha']) {
        
         //only then add the details to db
         AddRoundRecord();
     }
     else {
 
         //redirect to interview registration form
         header('Location: http://blog/interview/index.php/add_round');
     }

    //redirect home
    RedirectHome();
}
?>