<?php ob_start()?>
<?php 
$data1 = $datas['participants'];
$data2 = $datas['rounds'];
//$round_length =  
           
?>
    <div>
        <h2>Display Participants</h2>
        <table>
            <thead>
                <th>Name</th>
                <?php foreach($data2 as $round):?>
                    <th>
                        <?php echo $round['round']; ?>
                    </th>
                <?php endforeach;?>
            <thead>
            <?php 
            
            //foreach participant
            foreach($data1 as $participant):?>
            <tbody>
                <tr>
                    <td>
                        <a href="add_marks_to?id=<?= $participant['id']?>&roundid=1"><?= $participant['name']?></a>
                    </td>
                    <?php 
                    
                    //foreach round
                    foreach($data2 as $round): ?>
                    <td>
                        <?php
                            //display marks
                            echo $score[$participant['id']][$round['id']];//['score'];
                        ?>
                    </td>
                    <?php endforeach;?>
                </tr>
            </tbody>
            <?php endforeach;?>
        </table>
    </div>
<?php $content = ob_get_clean();

include 'templates/layout.tpl.php';

?>