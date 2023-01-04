<?php include 'header.php'; 

$askUser=$pdo->prepare("SELECT * FROM users where users_id=:id");
$askUser->execute(array(
  'id' => $_GET['users_id']
  ));

$pullUser=$askUser->fetch(PDO::FETCH_ASSOC);


?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>User Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">User Details</li>
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
                        <h5 class="card-title"></h5>
                        <a style="float: right; " href="index.php"><button class="btn btn-primary">Back</button></a>

                        <!-- Horizontal Form -->
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputText" name="users_fname "
                                    value="<?php echo $pullUser['users_fname']; ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Surname</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputText" name="users_lname"
                                    value="<?php echo $pullUser['users_lname']; ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputMail" name="users_email"
                                    value="<?php echo $pullUser['users_email']; ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">State</label>
                            <div class="col-sm-8">
                                <select id="heard" class="form-control" name="users_state" required disabled>


                                    <?php echo $pullUser['users_state'] == '1' ? 'selected=""' : ''; ?>
                                    <option value="1"
                                        <?php echo $pullUser['users_state'] == '1' ? 'selected=""' : ''; ?>>
                                        Active</option>
                                    <option value="0" <?php if ($pullUser['users_state']==0) { echo 'selected=""'; } ?>>
                                        Passive</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-8">
                                  <input type="radio" id="Male" name="users_gender" value="Male"
                                    <?php echo $pullUser['users_gender']=='Male'?'checked':'';?> disabled>
                                  <label for="html">Male</label><br>
                                  <input type="radio" id="Female" name="users_gender" value="Female"
                                    <?php echo $pullUser['users_gender']=='Female'?'checked':'';?> disabled>
                                  <label for="css">Female</label><br>
                                  <input type="radio" id="Other" name="users_gender" value="Other"
                                    <?php echo $pullUser['users_gender']=='Other'?'checked':'';?> disabled>
                                  <label for="javascript">Other</label><br><br>
                            </div>
                        </div>

                        </form><!-- End Horizontal Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php include 'footer.php'; ?>