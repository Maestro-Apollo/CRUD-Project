<?php



include "connection.php";
$con = new Database;

$query = "Select * from crud";
$readQuery = $con->read($query);


$delete = $_GET['id'];



$query3 = "Delete from crud where id = $delete";
$deleteQuery = $con->delete($query3);

if(isset($_POST['Added'])){
    $fname = $_POST['fruitName'];
    $price = $_POST['price'];
    $country = $_POST['country'];
    $color = $_POST['fruit'];

    if($fname == '' || $price == '' || $country == '' || $color == ''){
        echo "Fields can't be empty";
    }
    else{
        $uquery = "update crud set fruitName = '$fname', price = '$price', origin = '$country', color = '$color' WHERE id = $id";
        $update = $con->update($uquery);
    }
}





?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/fontawesme.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </section>


    <section class="mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="container">
                    <form action="" method="post" class="form-group">

                    <input type="text" name="fruitName" placeholder="Fruit Name" class="form-control" value="<?php echo $getQuery['fruitName']; ?>"><br>
                    <input type="num" name="price" placeholder="Price" class="form-control" value="<?php echo $getQuery['price']; ?>"><br>
                    <select name="country" id="" class="form-control"><br>
                        <option value="Bangladesh" selected >Bangladesh</option>
                        <option value="India">India</option>
                        <option value="China">China</option>
                        <option value="Japan">Japan</option>
                    </select><br>
                    <input type="radio" name="fruit" value="Red" checked>Red <br>
                    <input type="radio" name="fruit" value="Green">Green <br>
                    <input type="radio" name="fruit" value="Yellow">Yellow <br>

                    <button class="btn btn-success form-control mt-3" name="Added" value="Added">Update</button>

                </form>
                </div>
            </div>

            <div class="col-md-8">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fruit's Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Origin</th>
                            <th scope="col">Color</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php while($row = $readQuery->fetch_assoc() ){ ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['fruitName']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['origin']; ?></td>
                            <td><?php echo $row['color']; ?></td>
                            <td><a href="edit.php?id=<?php echo urldecode($row['id']); ?>" class="btn btn-primary m-2">Edit</a><a href="#" class="btn btn-danger m-2">Delete</a></td>
                        </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>

        </div>
    </section>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
