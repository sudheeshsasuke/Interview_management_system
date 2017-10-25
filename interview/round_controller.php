<?php


//show particpant form
function AddRound() {
    require 'templates/reg_round.tpl.php';
}


//add participant to databse
//add interview to databse
function AddRoundToDatabase() {
    AddRoundRecord();
    RedirectHome();
}
?>