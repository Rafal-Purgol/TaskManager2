<?php
include('includes/header.php');
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Edit Task
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                            include('dbcon.php');

                            if(isset($_GET['id']))
                            {
                                $key_child = $_GET['id'];
                                $ref_table = 'tasks';
                                $getdata = $database->getReference($ref_table)->getChild($key_child)->getValue();

                                if($getdata > 0)
                                {
                                    ?>
                                    
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="key" value="<?= $key_child ?>">
                                    <div class="form-group mb-3">
                                        <label for="">Task Name</label>
                                    <input type="text" name="task_name" value="<?=$getdata['name__'];?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Task Descripton</label>
                                    <input type="textarea" name="task_dscr" value="<?=$getdata['dscrpt'];?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="col-md-6 float-left" style="float:left">
                                            <label for="">Deadline Date</label>
                                            <input type="date" name="task_dead_date" class="form-control">
                                        </div>
                                        <div class="col-md-6" style="float:right">
                                            <label for="">Deadline Time</label>
                                            <input type="time" name="task_dead_time" class="form-control">
                                        </div>                           
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Priority</label>
                                    <input type="number" name="task_prio" value="<?=$getdata['prio__'];?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" name="edit_task" class="btn btn-primary">Edit Task</button>
                                    </div>
                                </form>
                            <?php
                                    }
                                    else
                                    {
                                        $_SESSION['status'] = "Invalid ID";
                                        header('Location: index.php');
                                        exit();
                                    }
                                }
                                else
                                    {
                                        $_SESSION['status'] = "No Found";
                                        header('Location: index.php');
                                        exit();
                                    }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include('includes/footer.php');
?>