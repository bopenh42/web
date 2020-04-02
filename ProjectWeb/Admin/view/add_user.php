<?php 
    include('func/func_getUser.php');
    $username='';
    $password='';
    $email='';
    $role='';
    $user_msg='';
    $user_error=[];
    if(isset($_POST['btn_save'])){
      $username=$_POST['username'];
      $password=$_POST['password'];
      $email=$_POST['email'];
      $role=$_POST['role'];
      if(empty($username)){
        $user_error['username']="has-error";
      }
      if(empty($password)){
        $user_error['password']="has-error";
      }
      if(empty($email)){
        $user_error['email']="has-error";
      }
      if(empty($role)){
        $user_error['role']="has-error";
      }
    }
    if(count($user_error)==0){
        if(check_user($username)){
          $user_msg='</br><span class="label label-danger">your username have already exist!</span>';
      }else{
        if($email!=$email){
          $user_msg='</br><span class="label label-danger">your Comfirm password incorrent!</span>';
        }else{
          if(!(empty($username)||empty($password)||empty($email)||empty($role))){
            add_user($username,$password,$email,$role);
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
                <div class="form-group <?= show_error($user_error,'username');?>">
                  <label >User Name</label>
                  <input type="text" class="form-control" value="<?= $username ?>" name="username" placeholder="Enter Username">
                </div>
                <div class="form-group <?= show_error($user_error,'password');?>">
                  <label >Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="form-group <?= show_error($user_error,'email');?>">
                  <label >Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Email">
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