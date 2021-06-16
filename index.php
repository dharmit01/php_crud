<?php require "header.php"; ?>
<?php 
    require "pdo.php"; 
    $sql = "SELECT * from student";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $people = $stmt->FetchAll(PDO::FETCH_OBJ);

?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            All Peoples
        </div>
        
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Sem</th>
                    <th>Actions</th>
                </tr>
               
                    <?php foreach($people as $person):?>
                        <tr>
                            <td><?= $person->id;?></td>
                            <td><?= $person->name;?></td>
                            <td><?= $person->email;?></td>
                            <td><?= $person->sem;?></td>
                            <td>
                                <a href="edit.php?id=<?= $person->id;?>" class="btn btn-primary">Edit</a> 
                                <a href="delete.php?id=<?= $person->id;?>" class="btn btn-danger" >Delete</a> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
    <br>
    <a href="create.php" class="btn btn-success">Create</a>
</div>
<?php require "footer.php"; ?>