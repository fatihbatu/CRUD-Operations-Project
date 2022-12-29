<?php include 'header.php'; 

$askUser=$pdo->prepare("SELECT * FROM users where users_id=:id");
$askUser->execute(array(
  'id' => $_GET['users_id']
  ));

$pullUser=$askUser->fetch(PDO::FETCH_ASSOC);


?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Layouts</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Layouts</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">


                <?php if($_SESSION['state']=='ok') { ?>
                <div class="alert alert-success" role="alert">
                    The user record has been successfully updated.
                </div>
                <?php unset($_SESSION['state']); } elseif($_SESSION['state']=='no') { ?>
                <div class="alert alert-danger" role="alert">
                    The user record has not been successfully updated.
                </div>
                <?php unset($_SESSION['state']); } ?>


                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Horizontal Form</h5>
                        <a style="float: right; " href="index.php"><button class="btn btn-primary">Back</button></a>

                        <!-- Horizontal Form -->
                        <form action="./action.php" method="POST">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputText" name="users_fname"
                                        value="<?php echo $pullUser['users_fname']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Surname</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputText" name="users_lname"
                                        value="<?php echo $pullUser['users_lname']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputMail" name="users_email"
                                        value="<?php echo $pullUser['users_email']; ?>">
                                </div>
                            </div>
                            <input type="hidden" name="users_id" value="<?php echo $pullUser['users_id'] ?>">

                            <div class="text-center">
                                <button type="submit" name="useredit" class="btn btn-primary">Submit</button>
                            </div>

                        </form><!-- End Horizontal Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php include 'footer.php'; ?>