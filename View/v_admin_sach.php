<div class="container-fluid">
    <?php
    $p = new page();
    $limit = 10;
    //tim start
    $start = $p->findStart($limit);
    // tim so records trong hh
    $hh = new sach();
    //if ($ac == 1) {
    $results = $hh->getListHangHoa();
    $count = $results->rowCount();
    //tim so page cua 1 trang
    $page = $p->findPage($count, $limit);
    // lay ra trang hien trait
    $currentPage =  isset($_GET['page']) ? $_GET['page'] : 1;
    /*} elseif ($ac == 2) {
        $results = $hh->getListSale();
        $count = $results->rowCount();
        //tim so page cua 1 trang
        $page = $p->findPage($count, $limit);
        // lay ra trang hien trait
        $currentPage =  isset($_GET['page']) ? $_GET['page'] : 1;
    } */

    ?>
    <div class="card">
        <div class="card-header d-flex">
            <div class="p-2">

                <h3>Product List</h3>

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

            $result = $hh->getListHangHoaPage($start, $limit);




            while ($set = $result->fetch()) : ?>
                <tr>

                    <td><?php echo $set['masach'] ?></td>
                    <td><?php echo $set['tensach'] ?></td>
                    <td><?php echo $set['tendm'] ?></td>
                    <td><img width="50px" height="50px" src="img/<?php echo $set['hinh']; ?>" /></td>
                    
                    
                   
                    <td width="12%">
                        <!-- liên kết tới trang sửa -->
                        <a class="btn btn-secondary" href="index.php?action=ad_control&act=fixbook&id=<?php echo $set[0]; ?>">
                            Edit</a>

                        <!-- liên kết tới trang xoá -->
                        <a class="btn btn-secondary" href="index.php?action=ad_control&act=deletebook&id=<?php echo $set['masach']; ?>">
                            Delete</a>
                    </td>

                </tr>
            <?php endwhile ?>
            
        </table>
        <div class="col-md-6 div col-md-offset-3">
                <ul class="pagination" style="background:blue;font-weight: bold">
                    <?php
                   
                        echo '<li><a href="index.php?action=ad_control&act=admin_qlysach&page=' . ($currentPage - 1) . '">Previous</a></li>';
                    /*else if ($ac == 2 && $currentPage > 1 && $page > 1) {
                //echo '<li ><a href="index.php?action=home&act=khuyenmai&page=' . ($currentPage - 1) . '">Previous</a></li>';
          //  } */
                    for ($i = 1; $i <= $page; $i++) {
                    ?>
                        <?php
                        
                            echo '<li><a href="index.php?action=ad_control&act=admin_qlysach&page=' . $i . '">' . $i . '</a></li>';
                        } /*elseif ($ac == 2) {
                    //echo '<li><a href="index.php?action=home&act=khuyenmai&page=' . $i . '">' . $i . '</a></li>';
                    // } */

                        ?>
                    <?php
                    
                    
                        echo '<li ><a href="index.php?action=ad_control&act=admin_qlysach&page=' . ($currentPage + 1) . '">Next</a></li>';
                    /*elseif ($ac == 2 && $currentPage < $page && $page > 1) {
                echo '<li ><a href="index.php?action=home&act=khuyenmai&page=' . ($currentPage + 1) . '">Next</a></li>';
            } */
                    ?>
                </ul>
            </div>
        <!-- Liên kết đến trang thêm sản phẩm khi click Thêm sản phẩm -->
        <a href="index.php?action=ad_control&act=addbook"><button width="15px" class="btn btn-danger m-2">
                Add</button>
        </a>

    </div>

</div>