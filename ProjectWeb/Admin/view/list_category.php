<?php
    include('func/func_category.php');
        $category_list = getCategory();
        if(isset($_POST['id'])){
            if(delete_Category($_POST['id'])){
                header('location: index.php?view=list_category');
            }
        }
 ?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Category</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="app-users" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $cate_id=0; 
                    foreach($category_list as $row){ 
                        $cate_id++;
                ?>
                <tr>
                    <td><?= $cate_id ?></td>
                    <td><?= $row['Category'] ?></td>
                    <td><a href="#" data-toggle="modal" data-target="#user-modal-<?= $cate_id?>">
                            <i class="fa fa-trash"></i></a>
                    </td>
                </tr>





                <!-- Modal -->
                <div class="modal fade" id="user-modal-<?= $cate_id?>" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Confirm Dialog</h4>
                            </div>
                            <div class="modal-body">
                                Ara you sure do you want to delete user: <b><?= $row['Category'] ?></b>?
                            </div>
                            <div class="modal-footer">
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?= $row['category_id']?>">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-primary">Yes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>






                <?php } ?>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>