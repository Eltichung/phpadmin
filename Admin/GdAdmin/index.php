<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../ThongKe/thongke.css">
</head>
<style>
.active
{
    color: rgb(0, 0, 0);
    background-color: rgba(175, 173, 173, 0.2);
    border-right: 5px solid #F15412;
    box-shadow: 0px 0px 10px 7px rgba(255, 255, 255, 0.2);
}
<?php 
    session_start();
    if( $_SESSION['discount']==null )$_SESSION['discount']=0;
?>
    </style>
<body>
    <header>
    </header>   
    <div class="body">
        
        <div class="main">
            <nav>
                <p>Admin Website</p>
                <ul class="menu">
                    <li><a class="active" href="#"><i class="fas fa-columns"></i>Thống kê</a></li>
                    <li><a  href="#"><i class="fas fa-database"></i>Quản lí sản phẩm</a></li>
                    <li><a href="#"><i class="fas fa-list"></i>Quản lí loại sản phẩm</a></li>
                    <li><a href="#"><i class="fas fa-user-edit"></i>Quản lí tài khoản</a></li>
                    <li><a  href="#"><i class="fas fa-cart-plus"></i>Quản lí đơn hàng</a></li>
                </ul>
            </nav>
            <div class="content">
                <?php
                // include '../QlSanPham/Form_ShowSP.php';
                include "../ThongKe/thongke.php";
                include("../ThongKe/Chart.php");
                //include "../QlDonHang/Form_ShowDonHang.php";
                ?>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);
    const li = $$(".menu >li>a");
    li.forEach((item) => {
        item.addEventListener("click", () => {
            $('.active').classList.remove("active");
            item.classList.add("active");
            let tmp = item.textContent;
            switch (tmp) {
                case 'Quản lí sản phẩm':
                    $('.content').innerHTML = `<?php
                                                include '../QlSanPham/Form_ShowSP.php'
                                                ?>`
                    break;
                case 'Quản lí loại sản phẩm':
                    $('.content').innerHTML = `<?php
                                                include '../QlLoaiSP/php/Form_ShowLoaiSP.php'
                                                ?>`
                    break;
                case 'Quản lí tài khoản':
                    $('.content').innerHTML = `<?php
                                                include '../QlTaiKhoan/QLTaiKhoan.php'
                                                ?>`
                    break;
                case 'Quản lí đơn hàng':
                

                   
                    $('.content').innerHTML = `<?php
                                                include '../QlDonHang/Form_ShowDonHang.php'
                                                ?>`;
                                            var btnConfirm = $$('.confirm')
                                            var btncancel = $$('.cancel')
                                            var btnSuccess = $$('.success')
                                            console.log( $$('.status'))
                                            $$('.status').forEach((item,index)=>{
                                                if(item.textContent!=="Chờ xác nhận")
                                                {
                                                    item.style.color = 'black';
                                                    btnConfirm[index].setAttribute('disabled',true);
                                                    btncancel[index].setAttribute('disabled',true);           
                                                }
                                                if(item.textContent=="Đơn đã bị hủy")
                                                {
                                                    btncancel[index].setAttribute('disabled',true);         
                                                    btnSuccess[index].setAttribute('disabled',true);         
                                                    item.style.color = 'red';
                                                }
                                                if(item.textContent=="Đơn đã được xác nhận")
                                                item.style.color = '#53BF9D';
                                                if(item.textContent=="Đơn đã giao thành công")
                                                {
                                                    item.style.color = 'blue';
                                                    btnConfirm[index].setAttribute('disabled',true);
                                                    btncancel[index].setAttribute('disabled',true);  
                                                    btnSuccess[index].setAttribute('disabled',true);           
                                                }
                                            })
                                    break;
                case 'Thống kê':
                    $('.content').innerHTML = `<?php
                                                include '../ThongKe/thongke.php'
                                                ?>`
                    break;
            }
        })
    })

    function confirmDelete(delUrl) {
        if (confirm("Bạn chắc chắn muốn xóa sản phẩm này?")) {
            document.location = delUrl;
        }
    }

    function confirmCancel(delUrl) {
        if (confirm("Bạn chắc chắn muốn hủy đơn hàng này?")) {
            document.location = delUrl;
        }
    }
    // let btnConfirm = $$('.confirm')
    // let btncancel = $$('.cancel')
    // console.log( $$('.status'))
    // $$('.status').forEach((item,index)=>{
    //     if(item.textContent!=="Chờ xác nhận")
    //     {
    //         btnConfirm[index].setAttribute('disabled',true);
    //         btncancel[index].setAttribute('disabled',true);           
    //     }
    //     if(item.textContent=="Đơn đã bị hủy")
    //     item.style.color = 'red';
    //     if(item.textContent=="Đơn đã được xác nhận")
    //     item.style.color = 'blue';
    // })
</script>
<?php
    include("../QLSanPham/Connect.php");
    function thang($str){
        return substr($str, 5, 2);
    }

    $totalMoney1 = 0;
    $totalMoney2 = 0;
    $totalMoney3 = 0;
    $totalMoney4 = 0;
    $totalMoney5 = 0;
    $totalMoney6 = 0;
    $totalMoney7 = 0;
    $totalMoney8 = 0;
    $totalMoney9 = 0;
    $totalMoney10 = 0;
    $totalMoney11 = 0;
    $totalMoney12 = 0;

    $sql = "select * from hoadon where trangthai = 4";
    $result = mysqli_query($conn, $sql);
    while($r = mysqli_fetch_assoc($result)){
        if(thang($r['ngaydat']) == '01'){
            $totalMoney1 += $r['tongtien'];
        } else if(thang($r['ngaydat']) == '02'){
            $totalMoney2 += $r['tongtien'];
        } else if(thang($r['ngaydat']) == '03'){
            $totalMoney3 += $r['tongtien'];
        } else if(thang($r['ngaydat']) == '04'){
            $totalMoney4 += $r['tongtien'];
        } else if(thang($r['ngaydat']) == '05'){
            $totalMoney5 += $r['tongtien'];
        } else if(thang($r['ngaydat']) == '06'){
            $totalMoney6 += $r['tongtien'];
        } else if(thang($r['ngaydat']) == '07'){
            $totalMoney7 += $r['tongtien'];
        } else if(thang($r['ngaydat']) == '08'){
            $totalMoney8 += $r['tongtien'];
        } else if(thang($r['ngaydat']) == '09'){
            $totalMoney9 += $r['tongtien'];
        } else if(thang($r['ngaydat']) == '10'){
            $totalMoney10 += $r['tongtien'];
        } else if(thang($r['ngaydat']) == '11'){
            $totalMoney11 += $r['tongtien'];
        } else if(thang($r['ngaydat']) == '12'){
            $totalMoney12 += $r['tongtien'];
        } 
    }


?>
<script>
    <?php
       echo "var tt1 ='$totalMoney1';";
       echo "var tt2 ='$totalMoney2';";
       echo "var tt3 ='$totalMoney3';";
       echo "var tt4 ='$totalMoney4';";
       echo "var tt5 ='$totalMoney5';";
       echo "var tt6 ='$totalMoney6';";
       echo "var tt7 ='$totalMoney7';";
       echo "var tt8 ='$totalMoney8';";
       echo "var tt9 ='$totalMoney9';";
       echo "var tt10 ='$totalMoney10';";
       echo "var tt11 ='$totalMoney11';";
       echo "var tt12 ='$totalMoney12';";
    ?>
    let myChart = document.getElementById('canvas').getContext('2d');
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';
    Chart.defaults.global.responsive = true;

    let massPopChart = new Chart(myChart, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
        datasets:[{
          label:'Doanh thu',
          data:[
            tt1,
            tt2,
            tt3,
            tt4,
            tt5,
            tt6,
            tt7,
            tt8,
            tt9,
            tt10,
            tt11,
            tt12
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 99, 132, 0.6)'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Biểu đồ doanh số theo tháng',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
</script>

<script>
    getParameters = () => {
        address = window.location.search
        parameterList = new URLSearchParams(address)
        let map = new Map()
        parameterList.forEach((value, key) => {
            map.set(key, value)
        })
        return map
    }
    var month = getParameters().get('month');
    var selectMonth = $$(".select-month select option");
    selectMonth.forEach((item,index)=>{
        if(item.value == month)
        {
            item.selected = "selected";          
        }
    }
    )
        
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</html>