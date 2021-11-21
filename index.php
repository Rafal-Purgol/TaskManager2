<?php
session_start();
include('includes/header.php');
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_SESSION['status']))
                {
                    echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Current Tasks
                            <a href="add-new-task.php" class="btn btn-primary float-end">New Task</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Task Name</th>
                                    <th>Description</th>
                                    <th>Deadline</th>
                                    <th>Complete</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include('dbcon.php');

                                    $ref_table = 'tasks';
                                    $fetchdata = $database->getReference($ref_table)->getValue();
                                    $currdt = date('Y-m-d H:i:s');

                                    if($fetchdata > 0)
                                    {
                                        $i=1;
                                        foreach($fetchdata as $key => $value)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $i++;?></td>
                                                <td><?= $value['name__'];?></td>
                                                <td><?= $value['dscrpt'];?></td>
                                                <td><?php
                                                    if(@$value['is_com'] == true)
                                                    {
                                                        ?>
                                                        <p style="color:green !important"><?= $value['dl_dt'];?></p>
                                                        <?php
                                                    }
                                                    elseif($value['dl_dt'] < $currdt)
                                                    {
                                                        ?>
                                                        <p style="color:red"><?= $value['dl_dt'];?></p>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?><?= $value['dl_dt'];
                                                    }?>
                                                </td>
                                                <td>
                                                    <a href="edit-task.php?id=<?=$key?>" class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="code.php" method="post">
                                                        <button type="submit" name="complete_btn" value="<?=$key?>" class="btn btn-success btn-sm">Complete</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="code.php" method="post">
                                                        <button type="submit" name="delete_btn" value="<?=$key?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan = "6">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include('includes/footer.php');
?>