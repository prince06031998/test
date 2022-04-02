
<?php
$action = 'ad_control';
if (isset($_GET['act']))
  $action = $_GET['act']; //khuyến mãi
switch ($action) {
  case 'admin_qlysach':
    include 'View/v_admin_sach.php';
    break;
  case 'adtimkiemsach':
    include 'View/v_admin_tim_sach.php';
    break;
  case 'admin_qlydanhmuc':
    include 'View/v_admin_danhmuc.php';
    break;
  case 'addbook':
    include 'View/admin_addbook.php';
    break;
  case 'xuly_addbook':
    $u = new sach();
    $u->XuLyThemBook();
    include 'View/v_admin_sach.php';
    break;
  case 'deletebook':
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $xoa = new sach();
      $xoa->delBook($id);
      echo ("<script>alert('Xóa sách thành công !!');</script>");
      include 'View/v_admin_sach.php';
    }
    break;
  case 'fixbook':
    include "View/fixbook.php";
    break;
    // sửa gv    
  case "fixbook1":
    $ten = $_POST['fixtxttensp'];
    $hinh = $_POST['fixtxtimg'];
   
    $madm = $_POST['fixtxttendanhmuc'];
    


    if ($ten == "" || $hinh == "" || $madm == "") {
      echo ("<script>alert('Không được để trống thông tin!');</script>");
      include "View/fixbook.php";
    } else {
      $id = $_GET['id'];
      $fixgv = new sach();
      $fixgv->fixBook($id, $ten, $hinh,  $madm);
      echo ("<script>alert('Sửa thành công!');</script>");
      include "View/v_admin_sach.php";
    }
    break;

  case 'addcategory':
    include 'View/admin_addcategory.php';
    break;
  case 'xuly_addcategory':
    $u = new sach();
    $u->XuLyThemDanhMuc();
    include 'View/v_admin_danhmuc.php';
    break;
  case 'deletecategory':
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $xoa = new sach();
      $xoa->delCategory($id);
      echo ("<script>alert('Xóa sách thành công !!');</script>");
      include 'View/v_admin_danhmuc.php';
    }
    break;

  case 'fixcategory':
    include "View/fixcategory.php";
    break;
    // sửa gv    
  case "fixcategory1":
    $ten = $_POST['fixdm'];
    
    if ($ten == "") {
      echo ("<script>alert('Không được để trống thông tin!');</script>");
      include "View/fixcategory.php";
    } else {
      $id = $_GET['id'];
      $fixgv = new sach();
      $fixgv->fixCategory($id, $ten);
      echo ("<script>alert('Sửa thành công!');</script>");
      include "View/v_admin_danhmuc.php";
    }
    break;
}
?>