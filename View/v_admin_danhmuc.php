

<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex">
            <div class="p-2">
               
               <h3>Category List</h3>
               
            </div>

        </div>
        
        <table class="table">

            <tr style="background-color: violet; font-weight:bold">
                <th>#</th>
                <th>Category Name</th>
                <th width="12%">Operations</th>
            </tr>
            <?php
            $u = new sach();
            
                $result = $u->getDanhMuc();
            
            while ($set = $result->fetch()) : ?>
                <tr>

                    <td><?php echo $set['madm'] ?></td>
                    <td><?php echo $set['tendm'] ?></td>
                    <td width="12%">
                        <!-- liên kết tới trang sửa -->
                        <a class="btn btn-secondary" href="index.php?action=ad_control&act=fixcategory&id=<?php echo $set[0]; ?>">
                            Edit</a>

                        <!-- liên kết tới trang xoá -->
                        <a class="btn btn-secondary" href="index.php?action=ad_control&act=deletecategory&id=<?php echo $set[0]; ?>">
                            Delete</a>
                    </td>

                </tr>
            <?php endwhile ?>

        </table>

        <!-- Liên kết đến trang thêm sản phẩm khi click Thêm sản phẩm -->
        <a href="index.php?action=ad_control&act=addcategory"><button width="15px" class="btn btn-danger m-2">
                Add</button>
        </a>

    </div>

</div>