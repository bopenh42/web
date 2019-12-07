<?php 
    include('func/func_category.php');
    $categoryname='';
    $cate_msg='';
    $cate_error=[];
    if(isset($_POST['btn_save'])){
      $categoryname=$_POST['category_name'];
      if(empty($categoryname)){
        $user_error['category_name']="has-error";
      }
    }
    if(count($cate_error)==0){
        if(check_category($categoryname)){
          $cate_msg='</br><span class="label label-danger">your username have already exist!</span>';
      }else{
          if(!empty($categoryname)){
            add_category($categoryname);
            header('location:index.php?view=list_category');
          }
            
          
        }
      }
      
?>
<div class="row">
    <div class="col-md-6">
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Category</h3>
              <?= $cate_msg; ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="" method="POST" role="form">
              <div class="box-body">
                <div class="form-group <?= show_error($cate_error,'category_name');?>">
                  <label >User Name</label>
                  <input type="text" class="form-control" value="<?= $categoryname ?>" name="category_name" placeholder="Enter category">
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