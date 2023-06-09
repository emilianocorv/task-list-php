<?php include('db.php') ?>
<?php include('includes/header.php') ?>
    
<div class="container p-2">
    <div class="row">
        <div class="col-md-4 my-3">

            <?php if(isset($_SESSION['message'])){?>
                
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            session_unset();
            }
            ?>

            <div class="card card-body">
                    <form action="save_task.php" method="POST">
                        <div class="form-group m-2">
                            <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>
                        </div>
                        <div class="form-group m-2">
                            <textarea name="description" rows="2" class="form-control" placeholder="Task description"></textarea>
                        </div>
                        <input type="submit" value="Save task" class="btn btn-success btn-block m-2" name="save_task">
                    </form>
            </div>
        </div>
        <div class="col-md-8 my-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_tasks)){ ?>
                        <tr>
                           <td><?php echo $row['title']?></td>
                           <td><?php echo $row['description']?></td>
                           <td><?php echo $row['created_at']?></td>
                           <td>
                                <div class="d-flex justify-center ">
                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-primary mx-2"><i class="bi bi-pencil"></i></a>
                                <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger mx-2"><i class="bi bi-trash"></i></a>
                                </div>
                           </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>
</html>