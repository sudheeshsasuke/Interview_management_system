<?php ob_start()?>
    <div>
        <h2>Register Participant</h2>
        <form action="http://blog/interview/index.php/add_participant_action" method="post" onclick="return Validate()">
            Name<br>
            <input type="text" placeholder="Name" name="name" />
            <br><br>
            Registration ID<br><br>
            <input type="number" placeholder="Registartion ID" name="reg_id" />
            <br><br>
            Email<br><br>
            <input type="email" placeholder="email" name="email" />
            <br><br>
            Phone<br><br>
            <input type="text" placeholder="Phone" name="phone" />
            <br><br>
            Qualification<br><br>
            <input type="text" placeholder="qualification" name="qualification" />
            <br><br>
            Date of Birth<br><br>
            <input type="date"  name="dob" />
            <br><br>
            Address<br><br>
            <input type="text" placeholder="address" name="address" />
            <br><br>
            Course<br><br>
            <input type="text" placeholder="course" name="course" />
            <br><br>
            Maths Score<br><br>
            <input type="number" placeholder="Maths Score" name="maths" />
            <br><br>
            Year of Passout<br><br>
            <input type="date" placeholder="Year of Passout" name="yop" />
            <br><br>
            School<br><br>
            <input type="text" placeholder="School" name="school" />
            <br><br>
            CGPA<br><br>
            <input type="number" placeholder="gpa" name="gpa" />
            <br><br>
            Company<br><br>
            <input type="text" placeholder="Company" name="company" />
            <br><br>
            Start Date<br><br>
            <input type="date" placeholder="Start Date" name="sd" />
            <br><br>
            End Date<br><br>
            <input type="date" placeholder="end Date" name="ed" />
            <br><br>
            Reason to Leave<br><br>
            <input type="text" placeholder="reason" name="reason" />
            <br><br>
            <input type="submit" value="submit" />
        </form>
    </div>
<?php $content = ob_get_clean();

include 'templates/layout.tpl.php';

?>
