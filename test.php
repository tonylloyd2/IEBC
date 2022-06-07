<table id="tableID" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Profile  </th>  
                        <th>Id No </th>
                        <th>Email </th>
                        <th>County </th>
                        <th>Constituency </th>
                        <th>Ward </th>
                        <th>Polling station </th>
                        <th>Action </th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      if(mysqli_num_rows($query_voters) > 0){
                      ?>
                    <?php
                        while($data = mysqli_fetch_assoc($query_voters)){    
                    ?>
                      <tr>
                        <form action="../../admin_action/update_delete_user.php" method="post">
                        <td><img class="avatar border-gray" src="<?php echo("".$data['image']); ?>" alt="..."></td>
                        <td><?php  echo($data['national_id']); ?></td>
                        <td><?php  echo($data['email']); ?></td>
                        <td><?php  echo($data['county']); ?></td>
                         <td width="30px"><?php  echo($data['constituency']); ?></td>
                        <td><?php  echo($data['ward']); ?></td>
                        <td><?php  echo($data['polling_station']); ?></td>
                        <td>
                          <input type="text" name="national_id" hidden value="<?php echo($data['national_id']); ?>">
                          <button type="submit" style="background-color:green; color:#fff" name="update" >Update</button>
                          <button type="submit" style="background-color:red; color:#fff" name="delete">Delete</button>
                          </form>
                        </td>
                      </tr>
                       <?php
                        }

                      }
                      else  if(mysqli_num_rows($query_voters) <= 0){
                        ?>
                        <tr > <i>
                          <td> 'empty'</td>
                          <td> 'empty'</td>
                          <td> 'empty'</td>
                          <td> 'empty'</td>
                          <td> 'empty'</td>
                          <td> 'empty'</td>
                          <td> 'empty'</td>
                          <td> 'empty'</td>
                          </i>

                        </tr>
                      <?php

                      }
                      ?>
                    </tbody>
                  </table>