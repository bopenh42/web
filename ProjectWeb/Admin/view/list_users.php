<?php
    include('func/func_getUser.php');
        $user_list = getUser();
        if(isset($_POST['id'])){
            if(delete_user($_POST['id'])){
                header('location: index.php?view=list_users');
            }
        }
 ?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Table With Full Features</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="app-users" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $user_id=0; 
                    foreach($user_list as $row){ 
                        $user_id++;
                ?>
                <tr>
                    <td><?= $user_id ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['role'] ?></td>
                    <td><a href="#" data-toggle="modal" data-target="#user-modal-<?= $user_id?>">
                            <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="user-modal-<?= $user_id?>" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Confirm Dialog</h4>
                            </div>
                            <div class="modal-body">
                                Ara you sure do you want to delete user: <b><?= $row['username'] ?></b>?
                            </div>
                            <div class="modal-footer">
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?= $row['id']?>">
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
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>