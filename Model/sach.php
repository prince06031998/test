<?php
class sach
{
    var $masach = null;
    var $tensach = null;
    var $hinh = null;
    var $madm = null;
    
    public function __construct()
    {
    }

    function getListHangHoa()
    {
        $db = new connect();
        $select = "select * from sach,danhmuc where sach.madm=danhmuc.madm ";
        $result = $db->getList($select);
        return $result;
    }

    function getDanhMuc()
    {
        $select ="select * from danhmuc";
        $dt=new connect();
        $result=$dt->getList($select);
        return $result;
    }

    function getAdminSearchDanhMuc($name)
    {
        $select = "select * from danhmuc where tendm like '%$name%'";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }


   

    function getAdminSearchName($name)
    {
        $select = "select b.masach,b.tensach,b.hinh,c.tendm from  sach b INNER JOIN danhmuc c on b.madm=c.madm WHERE b.tensach LIKE '%$name%' or c.tendm LIKE '%$name%'";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }


    public function InsertSach($tensach, $hinh, $madm)
    {
      
        $query = "insert into sach(masach,tensach,hinh,madm)
                values(Null,'$tensach','$hinh',$madm)";
        $db = new connect();
        $db->exec($query);
    }

    public function XuLyThemBook()
    {
        $tensach = $_POST['txttensp'];
       
        $hinh = $_POST['txtimg'];
       
        $madm = $_POST['txttendanhmuc'];
       

        $this->InsertSach($tensach,  $hinh, $madm );
        echo '<script>alert("Ban da them thanh cong")</script>';
    }

    public function delBook($id)
    {
        $db = new connect();
        $query = "delete from sach where masach= $id";
        $tmp = $db->getList($query);
        return $tmp;
    }

   

    public function delCategory($id)
    {
        $db = new connect();
        $query = "delete from danhmuc where madm= $id";
        $tmp = $db->getList($query);
        return $tmp;
    }

    public function getFixBook($id)
    {
        $db = new connect();
        $select = "select * from sach where masach = $id ";
        $tmp = $db->getInstance($select);
        return $tmp;
    }


    public function fixBook($id, $ten, $hinh, $madm)
    {
        $db = new connect();
        $query = " UPDATE sach
                        SET tensach = '$ten', hinh = '$hinh',madm=$madm
                        WHERE masach = $id";

        $tmp = $db->getList($query);
        return $tmp;
    }

    public function getFixCategory($id)
    {
        $db = new connect();
        $select = "select * from danhmuc where madm = $id ";
        $tmp = $db->getInstance($select);
        return $tmp;
    }


    public function fixCategory($id, $ten)
    {
        $db = new connect();
        $query = " UPDATE danhmuc
                        SET tendm = '$ten'
                        WHERE madm = $id";

        $tmp = $db->getList($query);
        return $tmp;
    }
    

    public function InsertDanhMuc($tendm)
    {
        
        $query = "insert into danhmuc(madm,tendm)
                values(Null,'$tendm')";
        $db = new connect();
        $db->exec($query);
    }

    public function XuLyThemDanhMuc()
    {
        $tendm = $_POST['danhmuc'];
        
        

        $this->InsertDanhMuc($tendm);
        echo '<script>alert("Ban da them thanh cong")</script>';
    }

    function getListHangHoaPage($start,$limit)
    {
        $db=new connect();
        $select="select * from sach,danhmuc where sach.madm=danhmuc.madm 
         limit ".$start.",".$limit;
        $result=$db->getList($select);
        return $result;
    }
}
