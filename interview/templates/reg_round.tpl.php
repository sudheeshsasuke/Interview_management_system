<?php ob_start()?>
<?php

//use captcha file
require_once 'templates/captcha.tpl.php';

?>
    <div>
        <h2>Register Participant</h2>
        <form action="http://blog/interview/index.php/add_round_action" method="post" onclick="return Validate()">
            Round Name<br>
            <input type="text" placeholder="Round Name" name="round" \>
            <br><br>
            Max Score<br><br>
            <input type="number" placeholder="Max Score" name="max" \>
            <br><br>
            Active<br><br>
            <input type="number" value="1" name="active" \>
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