<!-- thêm -->
<div class="container-fluid">
    <?php
    $id = $_GET['id'];
    $db = new sach();
    $book = $db->getFixBook($id);
    ?>
    <div class="card">
        <div class="card-header">
            <h2>Sửa Sách</h2>
        </div>
        <div class="card-body">
            <form action="index.php?action=ad_control&act=fixbook1&id=<?php echo $id; ?>" method="POST" >
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" value="<?php echo $book[1]; ?>" name="fixtxttensp" class="form-control">
                    <!--sử dụng require để nếu chương trình bị lỗi thì lập tức trình biên dịch sẽ dừng và xuất ra thông báo lỗi -->
                </div>

                <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input type="file" value="<?php echo $book[3]; ?>" class="form-control" name="fixtxtimg">
                </div>

               

                <div class="form-group">
                    <label>Tên Danh Mục</label></br>
                    <select name="fixtxttendanhmuc" class="form-control">
                        <?php
                        $dt=new sach();
                        
                        $result = $dt->getDanhMuc();
                        while ($set = $result->fetch()) :
                        ?>
                            <!-- cái hiển thị cho ngườ dùng thấy là tên loại, nhưng lưu là lưu mã loại -->
                            <option value="<?php echo $set[0]; ?>" ><?php echo $set[1]; ?></option>
                        <?php
                        endwhile;
                        ?>
                    </select>
                </div>
                <button name="sbm" type="submit" class="btn btn-danger">Update</button>
            </form>
        </div>

    </div>
</div>