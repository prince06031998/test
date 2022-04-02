<!-- thêm -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Add Product</h2>
        </div>
        <div class="card-body">
            
            <form action="index.php?action=ad_control&act=xuly_addbook" method="POST">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="txttensp" class="form-control">
                    <!--sử dụng require để nếu chương trình bị lỗi thì lập tức trình biên dịch sẽ dừng và xuất ra thông báo lỗi -->
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control" name="txtimg">
                </div>

                
                <div class="form-group">
                    <label>Category</label></br>
                    <select name="txttendanhmuc" class="form-control">
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

                <button name="sbm" type="submit" class="btn btn-danger">Add</button>
            </form>
        </div>

    </div>
</div>