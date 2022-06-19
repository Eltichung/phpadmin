<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="thongke.css">
    <title>Document</title>
</head>
<body>
    <div class="chart">
        <canvas style="height: 100px; width:auto;" id="canvas"></canvas>
    </div>
    <div class="select-month">
      <form method="get" action="#">
        <select name="month">
          <option value='0'>Chọn tháng</option>
          <option value='1'>1</option>
          <option value='2'>2</option>
          <option value='3'>3</option>
          <option value='4'>4</option>
          <option value='5'>5</option>
          <option value='6'>6</option>
          <option value='7'>7</option>
          <option value='8'>8</option>
          <option value='9'>9</option>
          <option value='10'>10</option>
          <option value='11'>11</option>
          <option value='12'>12</option>
        </select>
        <button type="submit" class="btn btn-primary">Xem chi tiết</button>
      </form>
    </div>
<?php
  if(isset($_GET['month'])){
    $month = $_GET['month'];
  }
  else{
    $month = 0;
  }
    if($month != '0'){
      $arrMaHD = [];
      include("../QlSanPham/Connect.php");
      $sql = "select * from hoadon where trangthai = 4";
      $result = mysqli_query($conn, $sql);
      while($r = mysqli_fetch_assoc($result)){
        if(thang($r['ngaydat']) == $month){
          $arrMaHD[]= $r['idHD'];
        }
      }
      $arrSP = [];
      foreach($arrMaHD as $maHD){
        $sql1 = "select * from hoadon_chitiet where idHD = '$maHD'";
        $result1 = mysqli_query($conn, $sql1);
        while($h = mysqli_fetch_assoc($result1)){
          if(!isset($arrSP[$h['idSP']])){
            $arrSP += array($h['idSP'] => $h);
          }
          else{
            $arrSP[$h['idSP']]['soluong'] += $h['soluong'];
          }
        }
      }
?>
      <table class="table table-striped">
        <tr>
          <th scope="col">Ma sp</th>
          <th scope="col">Ten sp</th>
          <th scope="col">So luong</th>
          <th scope="col">Gia</th>
          <th scope="col">Tong tien</th>
        </tr>
<?php
      foreach($arrSP as $key => $value){
        $idSP = $value['idSP'];
        $sql4 = "select * from sanpham where id ='$idSP'";
        $result4 = mysqli_fetch_assoc(mysqli_query($conn, $sql4));
?>
        <tr>
          <td scope="row"><?=$value['idSP']?></td>
          <td><?=$result4['name']?></td>
          <td><?=$value['soluong']?></td>
          <td><?=$value['gia']?></td>
          <td><?=$value['soluong'] * $value['gia']?></td>
      </tr>
<?php
      }
      ?>
        </table>
      <?php
    }
?>
</body>
</html>