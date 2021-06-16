<?php require "header.php"; ?>
<?php
    $id=$_GET['id'];
    require "pdo.php";
    $message = " ";
    $sql = 'SELECT * from student WHERE id= :id';
    $stmt = $connection->prepare($sql);
    $stmt->execute([':id'=> $id]);
    $person = $stmt->fetch(PDO::FETCH_OBJ);

    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['sem'])){
        $name = $_POST['name'];
        $email =  $_POST['email'];
        $sem = $_POST['sem'];

        $sql = 'UPDATE student SET email=:email, name=:name, sem=:sem WHERE id=:id';
        $stmt = $connection->prepare($sql);
        
        if($stmt->execute([':email'=> $email,':name'=> $name, ':sem'=> $sem, ':id' => $id]))
        {
            header("Location: /CRUD/index.php");
        }
    }

?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Edit</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input value="<?= $person->name;?>" type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input value="<?= $person->email;?>" type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sem">Sem</label>
                        <input value="<?= $person->sem;?>" type="number" name="sem" id="sem" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info mt-3">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require "footer.php"; ?>