<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <title>Insert Patient</title>
</head>
<body>
    <div class="container">
    <h2 class="text-center text-uppercase text-success mb-3 mt-3">Edit Patient</h2>
    <form action="?controller=patient&action=update" method="post">
            <input type="hidden" name="id" value="<?php echo $patient->getId(); ?>">
            <label for="">Name </label>
            <input type="text" name="name" id="" required size="30" value="<?php echo $patient->getname(); ?>"><br>
            <label for="">Gender </label> 
            <select name="gender" id="">
                <?php if($patient->getgender() == 'Nam'){?>
                    <option value="Nam" selected>Nam</option>
                    <option value="Nữ">Nữ</option>
                <?php }else{ ?>
                    <option value="Nữ" selected>Nữ</option>
                    <option value="Nam">Nam</option>
                <?php } ?>
            </select><br>
            <button type="submit" class="btn btn-success" >Sửa</button>
    </form>
    </div>
</body>
</html>