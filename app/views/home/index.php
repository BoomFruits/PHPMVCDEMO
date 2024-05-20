<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <h3 class="text-center text-uppercase text-success mt-3 mb-3">Quản lý bệnh nhân</h3>  
        <div id="msg" >
            <?php 
                session_start();
                if(isset($_SESSION['msg']) && $_SESSION['msg'] == "add"){ ?>
                <div class="alert alert-success">
                    <strong>Sucess!</strong> Succesfully added!
                </div> 
                <?php }elseif(isset($_SESSION['msg']) && $_SESSION['msg'] == "edit"){?>
                    <div class="alert alert-success">
                        <strong>Sucess!</strong> Succesfully edited!
                    </div>
            <?php } unset($_SESSION['msg'])?>
        </div>
        <h4><a href="<?php echo DOMAIN.'?controller=patient&action=add' ?>" class="btn btn-success">Thêm mới</a></h4>
        <table class="table">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xoá</tr>
            </thead>
            <tbody>
                <?php
                    foreach($patients as $patient){
                ?>
                    <tr>
                        <td><?=  $patient->getId(); ?></td>
                        <td><?= $patient->getName() ?></td>
                        <td><?= $patient->getGender() ?></td>
                        <td>
                            <a href="<?php echo DOMAIN.'?controller=patient&action=edit&id='.$patient->getId() ?>"><i class="bi bi-pencil"></i></a>             
                        </td>
                        <td>
                            <a onclick="alert('Are you sure want to delete')" href="<?php echo DOMAIN.'?controller=patient&action=delete&id='.$patient->getId() ?>"><i class="bi bi-trash3"></i></a>       
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <!-- Pagination -->
        <?php if($isPagination){?>
            <div class="pagination">
            <nav aria-label="Page navigation example">  
                <ul class="pagination justify-content-end">
                    <li class="page-item <?php if($page == 1) echo 'disabled'?>">
                    <a class="page-link" tabindex="-1" href="<?php echo DOMAIN?>?page=<?php echo ($page-1) ?>">Previous</a>
                    </li>          
                    <?php
                        for($i=1;$i<=3;$i++){
                            if($i > $total_page)
                                break;
                            if($i == $page){
                                echo "<li class='page-item active'><a class='page-link' href='http://localhost/PHPMVCDEMo/?page=$i'>$i</a></li>";
                            }else{
                                echo "<li class='page-item'><a class='page-link' href='http://localhost/PHPMVCDEMo/?page=$i'>$i</a></li>";
                            }                         
                        }
                        if($total_page > 6 && $page > 4){
                            echo "<li class='page-item'><a class='page-link'>...</a></li>";
                        }
                        for($i = 4;$i<$total_page-2;$i++){
                            if($i == $page){
                                echo "<li class='page-item active'><a class='page-link' href='http://localhost/PHPMVCDEMo/?page=$i'>$i</a></li>";
                            }
                        }
                        if($total_page > 6 && $total_page - $page > 3){
                            echo "<li class='page-item'><a class='page-link'>...</a></li>";
                        }
                        for($i=$total_page-2;$i<=$total_page;$i++){
                
                            if($i == $page){
                                echo "<li class='page-item active'><a class='page-link' href='http://localhost/PHPMVCDEMo/?page=$i'>$i</a></li>";
                            }else{
                                echo "<li class='page-item'><a class='page-link' href='http://localhost/PHPMVCDEMo/?page=$i'>$i</a></li>";
                            }                         
                        }
                    ?>
                   
                    <li class="page-item <?php if($page == $total_page) echo 'disabled' ?>">
                    <a class="page-link" href="<?php DOMAIN?>?page=<?php echo ($page+1) ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <?php } ?>
    </div>
    <script src="/public/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        setTimeout(function(){
          document.getElementById("msg").hidden = true;    
        },3000)
        document.getElementById("msg").hidden = false;    
    </script>
</body>
</html>