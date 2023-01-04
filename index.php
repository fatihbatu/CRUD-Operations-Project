<?php
include 'header.php'; 
$askUser=$pdo->prepare("SELECT * FROM users");
$askUser->execute();
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Users</h1>

        <?php if($_SESSION['state']=='ok') { ?>
        <div class="alert alert-success" role="alert">
            The user record has been successfully updated.
        </div>
        <?php unset($_SESSION['state']); } elseif($_SESSION['state']=='no') { ?>
        <div class="alert alert-danger" role="alert">
            The user record has not been successfully updated.
        </div>
        <?php unset($_SESSION['state']); } ?>

        <?php if($_SESSION['useradd']=='ok') { ?>
        <div class="alert alert-success" role="alert">
            New user has been successfully added.
        </div>
        <?php unset($_SESSION['useradd']); } elseif($_SESSION['state']=='no') { ?>
        <div class="alert alert-danger" role="alert">
            New user has not been successfully added.
        </div>
        <?php unset($_SESSION['state']); } ?>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Table with hoverable rows</h5>
                        <a href="add-user.php"> <button style="float: right;" class="btn btn-success btn-xs">Add
                                User</button></a>
                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Surname</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Registration Date</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                while($pullUser=$askUser->fetch(PDO::FETCH_ASSOC)) { ?>

                                <tr>
                                    <th scope="row"><?php echo $pullUser['users_id']; ?></th>
                                    <td><?php echo $pullUser['users_fname']; ?></td>
                                    <td><?php echo $pullUser['users_lname']; ?></td>
                                    <td><?php echo $pullUser['users_email']; ?></td>
                                    <td><?php echo $pullUser['users_time']; ?></td>
                                    <td>
                                        <center>
                                            <a href="details-user.php?users_id=<?php echo $pullUser['users_id']; ?>">
                                                <button class="btn btn-primary btn-xs">Details</button>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="edit-user.php?users_id=<?php echo $pullUser['users_id']; ?>">
                                                <button class="btn btn-primary btn-xs">Edit</button>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <form action="action.php" method="POST">
                                                <input type="hidden" name="users_id"
                                                    value="<?php echo $pullUser['users_id'] ?>">
                                                <button class="btn btn-danger btn-xs" name="userdelete">Delete</button>
                                            </form>
                                        </center>
                                    </td>
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php include 'footer.php'; ?>