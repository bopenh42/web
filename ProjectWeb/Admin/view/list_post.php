<?php
    include('func/func_post.php');
        $post_list = getPost();
        if(isset($_POST['id'])){
            if(delete_post($_POST['id'])){
                header('location: index.php?view=list_post');
            }
        }
 ?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Post</h3>
    </div>
    <div class="box-body">
        <table id="app-users" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>UserName</th>
                    <th>CategoryName</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $post_id=0; 
                    foreach($post_list as $row){ 
                        $post_id++;
                ?>
                <tr>
                    <td><?= $post_id ?></td>
                    <td><?= $row['Description'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['Category'] ?></td>
                    <td><a href="#" data-toggle="modal" data-target="#user-modal-<?= $post_id?>">
                            <i class="fa fa-trash"></i></a>
                    </td>
                </tr>





                <!-- Modal -->
                <div class="modal fade" id="user-modal-<?= $post_id?>" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Confirm Dialog</h4>
                            </div>
                            <div class="modal-body">
                                Ara you sure do you want to delete user: <b><?= $row['name'] ?></b>?
                            </div>
                            <div class="modal-footer">
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?= $row['Post_id']?>">
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
                    <<th>#</th>
                    <th>Category</th>
                    <th>UserName</th>
                    <th>CategoryName</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>