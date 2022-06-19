<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="./common/crud.css">
    <?php require "../common/link.html";?>
    <style>
        .table-responsive {
            overflow: hidden;
        }
        .clearfix {
            transform: translateX(-10%);
            position: relative;
            left: 50%;
        }
      
        .search-box {
            display: flex;
            align-items: center;
            border: 1px solid;
            border-radius: 3px;
            padding: 2px 5px;
        }
        .search-box input {
            border: none;
            outline: none;
        }
        .search-box i {
            color: #495057;
        }
        .action_icon .view {
            color: #495057;
        }
        .action_icon .delete {
            color:red;
        }
        .action_icon .edit {
            color: blue;
        }
    </style>
</head>
<body>
<?php require "../common/csdl.php"; ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <?php require "../common/menu.html";
     ?>
    <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>User</h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                        <i class="fas fa-search"></i>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>UserName</th>                       
                        <th>Email</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Action</th>
                      
                    </tr>
                </thead>
            
                <tbody>
                    <?php
                       
                        $sql = "SELECT * FROM tbl_users";
                        $query = mysqli_query($conn, $sql);
                        while($line = mysqli_fetch_array($query)){?>
                            <tr>
                                <td><?php echo $line["id"] ?></td>
                                <td><?php echo $line["username"] ?></td>
                               
                                <td><?php echo $line["email"] ?></td>
                                <td><?php echo $line["status"] ?></td>
                                <td><?php echo $line["created_date"] ?></td>
                                <td class="action_icon">
                                  
                                    <a href="../user/form_update_user.php?id=<?php echo $line['id']?>" class="edit" data-toggle="tooltip"><i class="fas fa-pen"></i></a>
                                </td>
                              
                            </tr> 
                        <?php } ?>                      
                </tbody>
            </table>
        </div>
    </div>   
    <?php require "../common/footer.html";?>
    <?php require "../common/jsAdmin.html";?>
</div>
</div>
</body>
</html>