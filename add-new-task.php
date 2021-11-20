<?php
include('includes/header.php');
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            New Task
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Task Name</label>
                            <input type="text" name="task_name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Task Descripton</label>
                            <input type="textarea" name="task_dscr" class="form-control">
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
                            <input type="number" name="task_prio" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="add_task" class="btn btn-primary">Add Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include('includes/footer.php');
?>