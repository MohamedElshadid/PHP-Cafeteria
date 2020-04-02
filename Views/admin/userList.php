<?php
    require_once '..' . DIRECTORY_SEPARATOR . '../Config.php';
    
    if(!isset($_SESSION['admin'])){
    header("Location:login.php");
    }
    $user = new User();
    $users =$user->getAllUsers();
    $errordata=[];
    if(isset($_GET["error"]))
        $errordata=explode(',',$_GET["error"]);
?>
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
    <div class="alert-danger"> <?php if(in_array("Notvalid",$errordata))echo " Enter Another Mail";?></div>

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
                                <input class="form-control" placeholder="User Name" name="name" type="text" autofocus="">
                                <span class="text-danger text-center">
                                    <?php
                                    if (isset($_GET["name"])) {
                                        echo "**** Please Enter Your User Name ****";
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="User Password" name="password" type="password" autofocus="">
                                <span class="text-danger text-center">
                                    <?php
                                    if (isset($_GET["password"])) {
                                        echo "**** Please Enter Your User password ****";
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="User Email" name="email" type="email" autofocus="">
                                <span class="text-danger text-center">
                                    <?php
                                    if (isset($_GET["email"])) {
                                        echo "**** Please Enter Your User Email ****";
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Your Room" name="room" type="numper">
                                <span class="text-danger text-center">
                                    <?php
                                    if (isset($_GET["room"])) {
                                        echo "**** Please Enter User Room  ****";
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Your Ext" name="ext" type="number">
                                <span class="text-danger text-center">
                                    <?php
                                    if (isset($_GET["ext"])) {
                                        echo "**** Please Enter User ext  ****";
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="pic" type="file">
                                <span class="text-danger text-center">
                                    <?php
                                    if (isset($_GET["pic"])) {
                                        echo "**** Please Choose Your Image ****";
                                    }
                                    ?>
                                </span>
                            </div>
                            <input type="submit" name="addUser" class="btn btn-primary form-control" value="Add User">
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
                <th scope="col">User_Name</th>
                <th scope="col">Email</th>
                <th scope="col">Profile_Image</th>
                <th scope="col">Room Number</th>
                <th scope="col">Ext Number</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            while($row=mysqli_fetch_assoc($users))
            {?>
           
            <tr>
                <td><?php echo $row["User_Name"]; ?></td>
                <td><?php echo $row["Email"]; ?></td>
                <td><img style="width:100px;height:100px;border-radius:50%" src="../../public/images/<?php echo $row["Profile_Picture"]; ?>"</td>
                <td><?php echo $row["Room_No"]; ?></td>
                <td><?php echo $row["Ext"]; ?></td>
                

                <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editUser<?php echo $row['Uid'];?>">
                        Edit
                    </button>
                    <div class="modal fade" id="editUser<?php echo $row['Uid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <?php
                                    $edit=mysqli_query($db,"select * from user where Uid='".$row['Uid']."'");
                                    $erow=mysqli_fetch_array($edit);
                                ?>
                                    <form role="form" action="../../Controller/UserController.php" method="POST" enctype="multipart/form-data">
                                        <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" value="<?php echo $erow["Uid"]; ?>" name="id" type="text" hidden>
                                            <input class="form-control" placeholder="User Name" value="<?php echo $erow["User_Name"]; ?>" name="name" type="text" autofocus="">
                                            <span class="text-danger text-center">
                                                <?php
                                                if (isset($_GET["name"])) {
                                                    echo "**** Please Enter Your User Name ****";
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="User Password" value="<?php echo $erow["Password"]; ?>" name="password" type="password" autofocus="">
                                            <span class="text-danger text-center">
                                                <?php
                                                if (isset($_GET["password"])) {
                                                    echo "**** Please Enter Your User password ****";
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="User Email" value="<?php echo $erow["Email"]; ?>" name="email" readonly type="email" autofocus="">
                                            <span class="text-danger text-center">
                                                <?php
                                                if (isset($_GET["email"])) {
                                                    echo "**** Please Enter Your User Email ****";
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Your Room" value="<?php echo $erow["Room_No"]; ?>" name="room" type="numper">
                                            <span class="text-danger text-center">
                                                <?php
                                                if (isset($_GET["room"])) {
                                                    echo "**** Please Enter User Room  ****";
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Your Ext" value="<?php echo $erow["Ext"]; ?>" name="ext" type="numper">
                                            <span class="text-danger text-center">
                                                <?php
                                                if (isset($_GET["ext"])) {
                                                    echo "**** Please Enter User ext  ****";
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" name="pic" value="<?php echo $erow["Profile_Image"]; ?>"  type="file">
                                            <span class="text-danger text-center">
                                                <?php
                                                if (isset($_GET["pic"])) {
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
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUser<?php echo $row["Uid"]; ?>">
                        Delete
                    </button>
                    <div class="modal fade" id="deleteUser<?php echo $row["Uid"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                                    <button type="button" class="close"  aria-label="Close" data-dismiss="modal" aria-hidden="true">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are You Sure To Delete This User ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="../../Controller/userController.php?id=<?php echo $row['Uid']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>                                </div>                          
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>




</div>
<!--/.main-->

<?php include("../includes/footer.php") ?>