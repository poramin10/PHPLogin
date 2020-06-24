<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

    <?php 
        if(isset($_POST['submit'])){
            include_once('connect.php');

            // echo $_POST['firstname'].'<br>';
            // echo $_POST['lastname'].'<br>';
            // echo $_POST['username'].'<br>';
            // echo $_POST['password'].'<br>';

            // // สำหรับส่วนของ Uploda รูปภาพ
            // echo $_FILES['fileUpload']['name'].'<br>';


            //รายละเอียด
            // echo 'ชื่อรูปภาพ'.$_FILES['fileUpload']['name'].'<br>';
            // echo 'เนื้อหาไฟล์'.$_FILES['fileUpload']['tmp_name'].'<br>';
            // echo 'ขนาดของไฟล์'.$_FILES['fileUpload']['size'] /1024 .'KB <br>';
            // echo 'ชนิดไฟล์'.$_FILES['fileUpload']['type'].'<br>';

            //แยกคำโดยใช้ . เป็นตัวแยก
            $temp = explode('.' , $_FILES['fileUpload']['name']);
            //ตัวเลขของเวลา // end หมายถึงการนำ Index สุดท้า่ยมาใช้งาน
            $newName = round(microtime(true)).'.'.end($temp);
            
            // echo $newName  ;

            if(move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'uploads/' .$newName)){

                $sql = "INSERT INTO `member` (`firstname`, `lastname`, `username`, `password`, `picture`) 
                        VALUES ('".$_POST['firstname']."', 
                                '".$_POST['lastname']."', 
                                '".$_POST['username']."', 
                                '".$_POST['password']."', 
                                '".$newName."')";

                $result = $conn->query($sql);
                if($result){
                    echo '<script> alert("Register Success!!")</script>';
                    header('Refresh:0 url=login.php');
                }else{
                    echo "Register Faild";
                }
            }
            
        }

    ?>
<body>
      <div class="container">
         <div class="row">
            <div class="col-md-8 mx-auto mt-5 ">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-header text-center text-white bg-dark">
                            <strong>Register</strong>
                        </div>
                        <div class="card-body">
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password" required  >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fileUpload" class="col-sm-3 col-form-label">Upload</label>
                                <div class="col-sm-9">
                                <!-- Event onchange เมื่อมีการเปลี่ยนแปลงให้ทำอะไร -->
                                    <input type="file" class="form-control " id="fileUpload" name="fileUpload" 
                                    onchange = "readURL(this)" required>
                                </div>
                            </div>
                            <div class = "form-group row">   
                                <figure class="figure mx-auto">
                                    <img id="imgUpload" class="figure-img img-fluid rounded " alt="">
                                    <figcaption class="figure-caption text-right">A caption for the above image.</figcaption>
                                </figure>
                            </div>
                            <div class="card-footer text-center">
                                <input type="submit" name="submit" class = "btn btn-warning" value="Register">
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
         </div> 
      </div>
    <br>
    
     <script src="node_modules/jquery/dist/jquery.min.js"></script>
     <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
     <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
     <script> 

     //Function ในการแสดงรูปภาพกตัวอย่าง
        function readURL(input){
            var reader = new FileReader();

            reader.onload = function(e){
            
                // เรียกใช้ id ชื่อ imgUpload และเพิ่ม Attribute ชื่อ src
                $('#imgUpload').attr('src' , e.target.result).width(450)
            }

            reader.readAsDataURL(input.files[0]);
        }

     </script>

<style>
    #fileUpload {
       height: initial !important;
   }    

</style>


</body>
</html>