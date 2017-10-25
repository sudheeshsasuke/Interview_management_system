<?php ob_start()?>
    <div>
        <h2>HOME</h2>
        <p>
            <a href="/interview/index.php/add_interview">
                <button value="ADD INTERVIEW">ADD INTERVIEW</button>
            </a>
        </p>
        <p>
            <a href="/interview/index.php/add_round">
                <button value="ADD ROUNDS">ADD ROUNDS</button>
            </a>
        </p>
        <p>
            <a href="/interview/index.php/add_participant">
                <button value="ADD PARTICIPANTS">ADD PARTICIPANTS</button>
            </a>
        </p>
        <p>
            <a href="/interview/index.php/add_marks">
                <button value="ADD MARKS">ADD MARKS</button>
            </a>
        </p>
    </div>
<?php $content = ob_get_clean();

include 'templates/layout.tpl.php';

?>
