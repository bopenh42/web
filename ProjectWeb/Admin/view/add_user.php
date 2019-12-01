<?php 
    include('func/func_getUser.php');
    $username='';
    $password='';
    $cpassword='';
    $role='';
    $user_msg='';
    $user_error=[];
    if(isset($_POST['btn_save'])){
      $username=$_POST['user_name'];
      $password=$_POST['password'];
      $cpassword=$_POST['c_password'];
      $role=$_POST['role'];
      if(empty($username)){
        $user_error['user_name']="has-error";
      }
      if(empty($password)){
        $user_error['password']="has-error";
      }
      if(empty($cpassword)){
        $user_error['c_password']="has-error";
      }
    }
    if(count($user_error)==0){
        if(check_user($username)){
          $user_msg='</br><span class="label label-danger">your username have already exist!</span>';
      }else{
        if($password!=$cpassword){
          $user_msg='</br><span class="label label-danger">your Comfirm password incorrent!</span>';
        }else{
          if(!(empty($username)||empty($password)||empty($cpassword))){
            add_user($username,$password,$role);
           header('location:index.php?view=list_users');
          }
          
        }
      }
      
    }
?>
<div class="row">
    <div class="col-md-6">
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
              <?= $user_msg; ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="" method="POST" role="form">
              <div class="box-body">
                <div class="form-group <?= show_error($user_error,'user_name');?>">
                  <label >User Name</label>
                  <input type="text" class="form-control" value="<?= $username ?>" name="user_name" placeholder="Enter Username">
                </div>
                <div class="form-group <?= show_error($user_error,'password');?>">
                  <label >Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="form-group <?= show_error($user_error,'c_password');?>">
                  <label >Confrim Password</label>
                  <input type="password" class="form-control" name="c_password" placeholder="Confrim Password">
                </div>
                <div class="form-group">
                  <label >Role</label>
                  <select class="form-control" name="role">
                    <option value="">Select Role</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="btn_save" class="btn btn-primary">save</button>
              </div>
            </form>
          </div>
    </div>
</div>