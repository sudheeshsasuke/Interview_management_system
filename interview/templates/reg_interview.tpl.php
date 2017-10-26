<?php ob_start()?>
<?php

//use captcha file
require_once 'templates/captcha.tpl.php';

?>
    <div>
        <h2>Register Interview</h2>
        <form action="http://blog/interview/index.php/add_interview_action" method="post" onclick="return Validate()">
            Interview<br>
            <input type="text" placeholder="Interview Title" name="title" \>
            <br><br>
            Location<br>
            <input type="text" placeholder="Location" name="location" \>
            <br><br>
            Start Date<br>
            <input type="date"  name="start_date" \>
            <br><br>
            End Date<br>
            <input type="date"  name="end_date" \>
            <br><br>
            <?php echo "<b>captcha<b><br><br>";
            echo $num1 . $operator . $num2; ?><br><br>
            <input type="number" placeholder="captcha result"  name="captcha" \>
            <br><br>
            <input type="submit" value="submit" \>
        </form>
    </div>
<?php $content = ob_get_clean();

include 'templates/layout.tpl.php';

?>
