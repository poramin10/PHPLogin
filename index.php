<!-- ต้องประกาศไว้เพื่อนที่จะได้เรียกใช้ Session -->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel = "stylesheet" href = "node_modules/bootstrap/dist/css/bootstrap.min.css" />


</head>
<body>

<!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
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
            </ul>
            
            <ul class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['id'])) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    สวัสดีครับคุณ <?php echo $_SESSION['name'] ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="">Profile</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </li>
            <?php }else{ ?>
                <li class="nav-item ">
                    <a class="btn btn-outline-warning" href="register.php" tabindex="-1" aria-disabled="true">Register</a>
                    <a class="btn btn-outline-success" href="login.php" tabindex="-1" aria-disabled="true">Login</a>
                </li>
            <?php } ?>
            </ul>
        </div>
    </div>
       
    </nav>

<!-- CAROUSEL -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1507371341162-763b5e419408?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&h=400&q=80" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1512895691935-ddd98c716644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1280&h=400&q=80" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1476820865390-c52aeebb9891?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&h=400&q=80" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

<!-- Jumbotron -->
    <div class="jumbotron">
        <div class="container text-center">
            <h1 class="display-4">Welcome To TestPage</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Quasi aspernatur impedit et nihil, expedita fugit neque necessitatibus eos, quod voluptas aperiam laborum assumenda ab laboriosam sint. Iusto doloremque dignissimos aliquid.</p>      
        </div>  
    </div>


    <!-- Jquery ต้องอยู่บนสุดเสมอ -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- สาระ เรียกเพื่อใช้งาน Function Dropdown ได้ -->
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
</body>
</html>