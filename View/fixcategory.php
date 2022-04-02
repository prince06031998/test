<!-- thêm -->
<div class="container-fluid">
    <?php
    $id = $_GET['id'];
    $db = new sach();
    $book = $db->getFixCategory($id);
    ?>
    <div class="card">
        <div class="card-header">
            <h2>Sửa Sách</h2>
        </div>
        <div class="card-body">
            <form action="index.php?action=ad_control&act=fixcategory1&id=<?php echo $id; ?>" method="POST" >
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" value="<?php echo $book[1]; ?>" name="fixdm" class="form-control">
                </div>     
                  
                <button name="sbm" type="submit" class="btn btn-danger">Update</button>
            </form>
        </div>

    </div>
</div>
