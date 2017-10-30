<?php


//show particpant form
function AddParticipant() {
    require 'templates/reg_participant.tpl.php';
}


//add participant to databse
//add interview to databse
function AddParticipantToDatabase() {
    AddParticipantrecord();
    RedirectHome();
}
?>