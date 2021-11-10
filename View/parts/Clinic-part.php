<?php
foreach($clinic_section as $part)
    $sectionFor[$part['clinic_id']][] = $part['title'];

?>

    <div class="container">
        <h4>ADMIN PANEL !! <br><br><br><br> HERE YOU CAN MANAGE HOSPITAL</h4>


        <table id="clinic-delete-part" style="display:none;">

<thead>
    <th>name</th>
    <th>address</th>
    <th>phone</th>
    <th>is_full_time</th>
    
</thead>
<?php foreach($clinicDeletedList as $clinicItem):  ?>
    <tr >
        <?php  
        echo "<td>".$clinicItem['name']."</td>";
        echo "<td>".$clinicItem['address']."</td>";
        echo "<td>".$clinicItem['phone']."</td>";
        echo "<td>".$clinicItem['is_full_time']."</td>";
        ?>
    </tr>
    <?php endforeach; ?>
</table>

        <table id="clinic-list-part" style="display:none;">

            <thead>
                <th>name</th>
                <th>address</th>
                <th>phone</th>
                <th>is_active</th>
                <th>is_full_time</th>
                <th style="width:22%;">options</th>
            </thead>
            <?php foreach($clinicList as $clinicItem):  ?>
                <tr id=<?php echo $clinicItem['id'] ?>>
                    <?php  
                    echo "<td>".$clinicItem['name']."</td>";
                    echo "<td>".$clinicItem['address']."</td>";
                    echo "<td>".$clinicItem['phone']."</td>";
                    echo "<td>".$clinicItem['is_active']."</td>";
                    echo "<td>".$clinicItem['is_full_time']."</td>";
                    echo "<td>
                                <button id='delete-clinic' title='delete'><ion-icon name=\"trash-outline\"></ion-icon></button>
                                <button id='disable-clinic' title='disable'><ion-icon name=\"power-outline\"></ion-icon></button>
                                <button id='update-clinic' title='update' onclick='showUpdate(this)'><ion-icon name=\"create-outline\"></ion-icon></button>
                                <button class='parts' onclick='showParts(this)' title='sections'><ion-icon name=\"albums-outline\"></ion-icon></button>
                         </td>";
                    ?>
                </tr>
                <tr class="hide" >
                    <td><input type="text" name="name" value=<?php echo $clinicItem['name'] ?>></td>
                    <td><input type="text" name="address" value=<?php echo $clinicItem['address'] ?>></td>
                    <td><input type="number" name="phone" value=<?php echo $clinicItem['phone'] ?>></td>
                    <td><select name="is_active" >
                        <option value="1">on</option>
                        <option value="0">off</option>
                    </select></td>
                    <td><select name="is_full_time">
                        <option value="1">on</option>
                        <option value="0">off</option>
                    </select></td>
                    <input type="hidden" name="id" value=<?php echo $clinicItem['id'] ?>>
                    <td><button class="updatebtn">update</button></td>
                </tr>
                <tr class="hide">
                    <td colspan="6">
                        <?php foreach($sectionFor[$clinicItem['id']] as $sec) :  ?>
                            <label ><?php echo $sec; ?><input type="checkbox" checked disabled></label>
                        <?php endforeach; ?>    
                    </td>
                </tr>

                <?php endforeach; ?>
            </table>