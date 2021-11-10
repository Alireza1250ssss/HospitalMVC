
            <table id="section-list-part" style="display:none;">
            <thead>
                <th>title</th>
                <th>is_active</th>
                
                <th style="width:22%;">options</th>
            </thead>
            <?php foreach($sectionList as $section) :  ?>
                <tr id=<?php echo $section['id'] ?>>
                    <?php  
                    echo "<td>".$section['title']."</td>";
                    echo "<td>".$section['is_active']."</td>";
                    echo "<td>
                                <button id='delete-section' title='delete'><ion-icon name=\"trash-outline\"></ion-icon></button>
                                <button id='disable-section' title='disable'><ion-icon name=\"power-outline\"></ion-icon></button>
                                <button id='update-section' title='update' onclick='showUpdate(this)'><ion-icon name=\"create-outline\"></ion-icon></button>
                         </td>";
                    ?>
                </tr>
                <tr class="hide" >
                    <td><input type="text" name="title" value=<?php echo $section['title'] ?>></td>
                    <td><select name="is_active" >
                        <option value="1">on</option>
                        <option value="0">off</option>
                    </select></td>
                    <input type="hidden" name="id" value=<?php echo $section['id'] ?>>
                    <td><button class="updatebtn">update</button></td>
                </tr>
                <?php  endforeach; ?>
            </table>