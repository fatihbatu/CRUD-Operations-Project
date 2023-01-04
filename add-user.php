<?php include 'header.php'; ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Add User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <a style="float: right; " href="index.php"><button class="btn btn-primary">Back</button></a>

                        <!-- Horizontal Form -->
                        <form action="action.php" method="POST">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputText" name="users_fname">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Surname</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputText" name="users_lname">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputMail" name="users_email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">State</label>
                                <div class="col-sm-8">
                                    <select id="heard" class="form-control" name="users_state" required>


                                        <?php echo $pullUser['users_state'] == '1' ? 'selected=""' : ''; ?>
                                        <option value="1"
                                            <?php echo $pullUser['users_state'] == '1' ? 'selected=""' : ''; ?>>
                                            Active</option>
                                        <option value="0"
                                            <?php if ($pullUser['users_state']==0) { echo 'selected=""'; } ?>>
                                            Passive</option>

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-8">
                                      <input type="radio" id="Male" name="users_gender" value="Male"
                                        <?php echo $pullUser['users_gender']=='Male'?'checked':'';?>>
                                      <label for="html">Male</label><br>
                                      <input type="radio" id="Female" name="users_gender" value="Female"
                                        <?php echo $pullUser['users_gender']=='Female'?'checked':'';?>>
                                      <label for="css">Female</label><br>
                                      <input type="radio" id="Other" name="users_gender" value="Other"
                                        <?php echo $pullUser['users_gender']=='Other'?'checked':'';?>>
                                      <label for="javascript">Other</label><br><br>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="useradd" class="btn btn-primary">Submit</button>
                            </div>

                        </form><!-- End Horizontal Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php include 'footer.php'; ?>