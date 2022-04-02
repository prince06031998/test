<!-- thêm -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Add category</h2>
        </div>
        <div class="card-body">
            <form action="index.php?action=ad_control&act=xuly_addcategory" method="POST" >
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" name="danhmuc" class="form-control">
                    <!--sử dụng require để nếu chương trình bị lỗi thì lập tức trình biên dịch sẽ dừng và xuất ra thông báo lỗi -->
                </div>
                <button name="sbm" type="submit" class="btn btn-danger">Thêm mới</button>
            </form>
        </div>

    </div>
</div>