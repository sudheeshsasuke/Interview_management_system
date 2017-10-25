<?php ob_start()?>
    <div>
        <h2>ADD MARKS</h2>
        <form action="http://blog/interview/index.php/add_mark_action?id=<?php echo $id;?>&roundid=1" 
            method="post" onclick="return Validate()"  >
            
            <br><br>
            <select name="round_score" onchange="self.location='http://blog/interview/index.php/add_marks_to?id=<?php echo $_GET['id'];?>&roundid='+ this.value">

                <!--set default value-->
                

                <!--change option to seleted round-->
                <?php foreach($rounds as $round):?>

                    
                    <!--check if one option is selected-->
                    <?php if($_GET['roundid'] === $round['id']):?>
                        <option value="<?php echo $round['id'];?>" selected><?php echo $round['round'];?></option> 
                    <?php else:?>
                        <option value="<?php echo $round['id'];?>" ><?php echo $round['round'];?></option>                   
                    <?php endif;?>
                    
                <?php endforeach;
                
                //dont select select the round option
                //if()
                
                ?>
                
            </select>
            
            <br><br>
            <input type="number" placeholder="marks" name="curr_score" value="<?php echo $marks['score'];?>" \>
            <br><br>
            <input type="text" placeholder="comment" name="comment" value="<?php echo $marks['comment'];?>" \>
            <br><br>
            <input type="submit" value="submit" \>
        </form>
    </div>
<?php $content = ob_get_clean();

include 'templates/layout.tpl.php';

?>