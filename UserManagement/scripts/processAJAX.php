<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 14/12/2017
 * Time: 08:55 PM
 */

include "db.php";

//inserting
if (isset($_REQUEST['insert'])) {

    $user_name = mysqli_real_escape_string($connection, $_REQUEST['username']);
    $user_pass = mysqli_real_escape_string($connection, $_REQUEST['userpass']);
    $user_email = mysqli_real_escape_string($connection, $_REQUEST['useremail']);

    $SQL = "INSERT INTO users(user_name, user_pass, user_email) VALUES ('$user_name','$user_pass','$user_email')";

    $query = mysqli_query($connection, $SQL);

    if (!$query) {
        die("Failed!!!" . mysqli_error($connection));
    }

}


//updating

if (isset($_REQUEST['update'])) {

    $edtuser_id = $_REQUEST['edt_id'];
    $edtuser_name = mysqli_real_escape_string($connection, $_REQUEST['edtusername']);
    $edtuser_pass = mysqli_real_escape_string($connection, $_REQUEST['edtuserpass']);
    $edtuser_email = mysqli_real_escape_string($connection, $_REQUEST['edtuseremail']);

    $SQL = "UPDATE users SET user_name = '$edtuser_name',user_pass='$edtuser_pass',user_email='$edtuser_email' WHERE user_id= '$edtuser_id'";

    $query = mysqli_query($connection, $SQL);

    if (!$query) {
        die("Failed!!!" . mysqli_error($connection));
    }

}

//deleting

if (isset($_REQUEST['del_id'])) {

    $delete_id = $_REQUEST['del_id'];

    $sql = "DELETE FROM users WHERE user_id = '$delete_id'";
    $query = mysqli_query($connection, $sql);

    if (!$query) {
        die("Failed!!!" . mysqli_error($connection));
    }


}


$sql = "SELECT * FROM users";
$query = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($query)) {

    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_pass = $row['user_pass'];
    $user_email = $row['user_email'];

    echo " <tr>
                <td>$user_id</td>
                <td>$user_name</td>
                <td>$user_pass</td>
                <td>$user_email</td>
                <td>
                    <button class='btn btn-primary' data-toggle='modal' data-target='#editUser$user_id' data-backdrop='static'>Edit
                    
                    </button>
                    <button class='btn btn-danger' onclick=delete_func('$user_id');>Delete</button>
                    
                    
                        <div class='modal fade' id='editUser$user_id'>
                             <div class='modal-dialog'>
                                <div class='modal-content'>
                                     <div class='modal-header'>
                                         <button class='close' data-dismiss='modal'>&times;</button>
                                          <h4 class='text-center'>Update User</h4>
                                     </div>
                                 <div class='modal-body'>
    
                                          <form onsubmit='return update_Data($user_id)' id='edit_form$user_id'>  <!--blocking normal Php submission-->
                        
     
                                            <div>
                                                <div class=\"input-group input-group-lg\">
                                                    <span class=\"input-group-addon\" id=\"basic-addon7\">Name</span>
                                                    <input id='edtusername$user_id' type='text' class='form-control' aria-describedby='basic-addon1'
                                                           placeholder='$user_name' required>
                                            </div>

                                            <br>
                
                
                                            <div class=\"input-group input-group-lg\">
                                                <span class=\"input-group-addon\" id=\"basic-addon8\">Password</span>
                                                <input id='edtuserpass$user_id' type='password' class='form-control'
                                                       aria-describedby=\"basic-addon1\"
                                                       placeholder='$user_pass' required>
                                            </div>

                                            <br>
                
                
                                            <div class=\"input-group input-group-lg\">
                                                <span class=\"input-group-addon\" id=\"basic-addon9\">Email</span>
                                                <input id='edtuseremail$user_id' type='email' class='form-control' aria-describedby=\"basic-addon1\"
                                                       placeholder='$user_email' required>
                                            </div>
                
                                            <hr>

                                            <div>
                                                <button class='btn btn-success btn-block'>Update</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class=\"modal-footer\">
                                    <button class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>
                                </div>
                                 </div>
                                </div>
    
                             </div>
                  
                    
                </td>
            </tr>";


}

?>

