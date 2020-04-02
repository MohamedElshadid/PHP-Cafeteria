<?php include("../includes/header.php") ?>
<?php include("../includes/nav.php") ?>
<?php include("../includes/sidebar.php") ?>



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Users</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users List</h1>
        </div>
    </div>
    <!--/.row-->

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">
        Add User
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="../../Controller/UserController.php" method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="User Name" name="User_name" type="text" autofocus="">
                                <span class="text-danger text-center">
                                    <?php
                                    if (isset($_GET["User_name"])) {
                                        echo "**** Please Enter Your User Name ****";
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Price" name="price" type="text">
                                <span class="text-danger text-center">
                                    <?php
                                    if (isset($_GET["price"])) {
                                        echo "**** Please Enter User Price  ****";
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="category">
                                    <option>Choose Category</option>
                                    <?php
                                    include("../../Controller/connection.php");
                                    $sql = "SELECT * FROM category";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row["Cid"] ?>"><?php echo $row["Name"] ?></option>
                                    <?php } ?>
                                </select>
                                <span class="text-danger text-center">
                                    <?php
                                    if (isset($_GET["category"])) {
                                        echo "**** Please Enter User category ****";
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="img" type="file">
                                <span class="text-danger text-center">
                                    <?php
                                    if (isset($_GET["img"])) {
                                        echo "**** Please Choose Your Image ****";
                                    }
                                    ?>
                                </span>
                            </div>
                            <input type="submit" name="add" class="btn btn-primary form-control" value="Add User">
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped table-dark m-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editUser">
                        Edit
                    </button>
                    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="../../Controller/UserController.php" method="POST" enctype="multipart/form-data">
                                        <fieldset>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="User Name" name="User_name" type="text" autofocus="">
                                                <span class="text-danger text-center">
                                                    <?php
                                                    if (isset($_GET["User_name"])) {
                                                        echo "**** Please Enter Your User Name ****";
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Price" name="price" type="text">
                                                <span class="text-danger text-center">
                                                    <?php
                                                    if (isset($_GET["price"])) {
                                                        echo "**** Please Enter User Price  ****";
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="category">
                                                    <option>Choose Category</option>

                                                </select>
                                                <span class="text-danger text-center">
                                                    <?php
                                                    if (isset($_GET["category"])) {
                                                        echo "**** Please Enter User category ****";
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" name="img" type="file">
                                                <span class="text-danger text-center">
                                                    <?php
                                                    if (isset($_GET["img"])) {
                                                        echo "**** Please Choose Your Image ****";
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                            <input type="submit" name="edit" class="btn btn-primary form-control" value="Edit User">
                                        </fieldset>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUser">
                        Delete
                    </button>
                    <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are You Sure To Delete This User ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>




</div>
<!--/.main-->

<?php include("../includes/footer.php") ?>