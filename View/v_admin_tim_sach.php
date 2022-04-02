<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex">
            <div class="p-2">
           <h3>SEARCH RESULTS</h3>
              
            </div>

        </div>
        <div class="card-body">

            <div class="col-lg-8 d-flex justify-content-end">

                <form method="POST" class="d-flex" action="index.php?action=ad_control&act=adtimkiemsach">
                    <!-- input search -->
                    <input name="txtsearchss" type="search" class="form-control m-1" placeholder="Product Name, Category Name">
                    <!-- tìm kiếm -->
                    <button name="sbm" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
        <table class="table">

            <tr style="background-color: violet; font-weight:bold">
            <th>#</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Image</th>
                <th width="12%">Operations</th>
            </tr>
            <?php
            $u = new sach();
           
                $name=$_POST['txtsearchss'];
                $result = $u->getAdminSearchName($name);
            
            
            while ($set = $result->fetch()) : ?>
                <tr>

                <td><?php echo $set['masach'] ?></td>
                    <td><?php echo $set['tensach'] ?></td>
                    <td><?php echo $set['tendm'] ?></td>
                    <td><img width="50px" height="50px" src="img/<?php echo $set['hinh']; ?>" /></td>
                    
                    <td width="12%">
                        <!-- liên kết tới trang sửa -->
                        <a class="btn btn-secondary" href="index.php?action=ad_control&act=fixbook&id=<?php echo $set[0]; ?>">
                            EDIT</a>

                        <!-- liên kết tới trang xoá -->
                        <a class="btn btn-secondary" href="index.php?action=ad_control&act=deletebook&id=<?php echo $set['masach']; ?>">
                            DELETE</a>
                    </td>

                </tr>
            <?php endwhile ?>

        </table>

        <!-- Liên kết đến trang thêm sản phẩm khi click Thêm sản phẩm -->
        <a href="index.php?action=ad_control&act=addbook"><button width="15px" class="btn btn-danger m-2">
                ADD</button>
        </a>

    </div>

</div>