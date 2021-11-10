<table id="admin-list-part" style="display:none;">
                <thead>
                    
                    <th>username</th>
                    <th>is_active</th>
                    <th style="width:22%;">options</th>
                </thead>
                <?php  foreach($adminList as $admin): ?>
                    <tr id=<?php  echo $admin['id']; ?>>
                        <?php   
                        echo "<td>".$admin['username']."</td>";
                        echo "<td>".$admin['is_active']."</td>";
                        echo "<td>
                                <button id='delete-admin' title='delete'><ion-icon name=\"trash-outline\"></ion-icon></button>
                                <button id='disable-admin' title='disable'><ion-icon name=\"power-outline\"></ion-icon></button>
                                <button id='update-admin' title='update' onclick='showUpdate(this)'><ion-icon name=\"create-outline\"></ion-icon></button>
                              </td>";
                        ?>
                    </tr>
                    <tr class="hide" >
                    <td><input type="text" name="username" value=<?php echo $admin['username'] ?>></td>
                    <td><select name="is_active">
                        <option value="1">on</option>
                        <option value="0">off</option>
                    </select></td>
                    <input type="hidden" name="id" value=<?php echo $admin['id'] ?>>
                    <td><button  type="submit" class="updatebtn">update</button></td>
                    </tr>
                    <?php  endforeach; ?>
            </table>

            <div  id="clinic-add-part" style="display:none;">
                <h3>&#8659; add a new Clinic &#8659;</h3>
                <hr>
                <span>name: </span><input type="text" name="name" >
                <span>address: </span><input type="text" name="address">
                <span>phone: </span><input type="number" name="phone" >
                <span>is_active: </span><select name="is_active" >
                    <option value="1">on</option>
                    <option value="0">off</option>
                </select>
                <span>is_full_time: </span><select name="is_full_time">
                    <option value="1">on</option>
                    <option value="0">off</option>
                </select>
                <button class="Insertbtn">Insert</button>
            </div>

            <div  id="section-add-part" style="display:none;">
                <h3>&#8659; add a new Section &#8659;</h3>
                <hr>
                <span>title: </span><input type="text" name="title" >
                <span>is_active: </span><select name="is_active" >
                    <option value="1">on</option>
                    <option value="0">off</option>
                </select>
                <button class="Insertbtn">Insert</button>
            </div>

            <div  id="admin-add-part" style="display:none;">
                <h3>&#8659; add a new admin &#8659;</h3>
                <hr>
                <span>username: </span><input type="text" name="username" >
                <span>password: </span><input type="text" name="password" >
                <span>email: </span><input type="email" name="email" >
                <span>is_active: </span><select name="is_active" >
                    <option value="1">on</option>
                    <option value="0">off</option>
                </select>
                <button class="Insertbtn">Insert</button>
            </div>

            <div id="admin-profile-part" style="display:none;">
                <img src=<?php echo "files/".$profileInfo['imgpath'] ?>>
                <p><span>bio : </span><?php echo str_replace("\\n","<br>",$profileInfo['bio']) ?></p><hr>
                <p><span>age : </span><?php echo $profileInfo['age'] ?></p><hr>
                <p><span>career : </span><?php echo $profileInfo['career'] ?></p><hr>
                <p><span>education : </span><?php echo $profileInfo['education'] ?></p>
                <form action="/Hospital/admin" method="post" enctype="multipart/form-data"><hr>
                    <p>change profile photo</p><br><br>
                    <input type="file" name="profile" >
                    <input type="hidden" name='id' value=<?php echo $profileInfo['adminId']; ?>>
                    <input type="hidden" name="action" value="update-image">
                    <input type="submit" value="upload">
                </form>
            </div>


    </div>

            