<?php require "header.php"; ?>
<?php
    ob_start();
    $nameErr = $emailErr = $semErr = "";
    $name = $email = $sem = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST['name'])){
            $nameErr = "Name is Required";
        }else{
            $name = $_POST['name'];
        }
        if(empty($_POST['email'])){
            $emailErr = "Email is Required";
        }else{
            $email = $_POST['email'];
        }
        if(empty($_POST['sem'])){
            $semErr = "Semester is Required";
        }else{
            $sem = $_POST['sem'];
        }
      }
?>
<?php
    require "pdo.php";
    $message = "";
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['sem']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['sem'])){
        $name = $_POST['name'];
        $email =  $_POST['email'];
        $sem = $_POST['sem'];

        $sql = 'INSERT INTO student(email,name,sem) VALUES(:email,:name,:sem)';
        $stmt = $connection->prepare($sql);
        
        $stmt->execute([':email'=> $email,':name'=> $name, ':sem'=> $sem]);
        sleep(1);
        header("Location: /CRUD/index.php");

    }
    else{
        $message1 = "All Fields are compulsory";
    }
?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Create</h2>
            </div>
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            
            <div class="card-body">
                <h6 style="color:red";> * Required Fields </h6>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                        <?php if($nameErr): ?>
                            <span style="color:red;"><?php echo $nameErr ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail *</label>
                        <input type="email" name="email" id="email" class="form-control">
                        <?php if($emailErr): ?>
                            <span style="color:red;"><?php echo $emailErr ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="sem">Sem *</label>
                        <input type="number" name="sem" id="sem" class="form-control" min="1" max="8">
                        <?php if($semErr): ?>
                            <span style="color:red;"><?php echo $semErr ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info mt-3">Create</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php require "footer.php"; ?>