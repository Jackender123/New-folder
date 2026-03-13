<?php
// 1. Khởi tạo kết nối CSDL (Đổi tên CSDL cho đúng với máy của bạn nhé)
$conn = mysqli_connect("localhost", "root", "", "db_banhang");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
// Set charset utf8 để không bị lỗi font tiếng Việt
mysqli_set_charset($conn, "utf8");

// 2. Nhúng file chứa các hàm xử lý dữ liệu
include_once 'index_funs.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Bán Hàng</title>
    <style>
        /* CSS Cơ bản để dựng khung giống hình mô tả */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            border: 1px solid #333;
            background-color: #fff;
        }
        .main-content {
            display: flex; /* Sử dụng flexbox để chia 2 cột dễ dàng */
            min-height: 500px;
        }
        .left-column {
            width: 75%; /* Cột trái chiếm 75% */
            border-right: 1px solid #333;
        }
        .right-column {
            width: 25%; /* Cột phải chiếm 25% */
        }
    </style>
</head>
<body>

<div class="container">

    <?php include 'top.php'; ?>

    <?php include 'newsproducts.php'; ?>

    <div class="main-content">
        
        <div class="left-column">
            <?php
            // Kỹ thuật điều hướng trang (Routing)
            // Lấy tham số 'page' từ URL. Nếu không có thì mặc định là 'home' (Trang chủ)
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';

            // Tùy thuộc vào giá trị của 'page' mà ta sẽ nhúng (include) file tương ứng
            switch ($page) {
                case 'detail_products':
                    // Yêu cầu 6: Trang chi tiết sản phẩm
                    include 'detail_products.php';
                    break;
                case 'detail_news':
                    // Yêu cầu 3: Trang chi tiết tin tức
                    include 'detail_news.php';
                    break;
                // Nếu sau này bạn làm thêm các trang khác thì cứ thêm case ở đây
                // case 'giohang': include 'giohang.php'; break;
                // case 'dangky': include 'dangky.php'; break;
                
                default:
                    // Mặc định ở trang chủ thì hiển thị danh sách sản phẩm nổi bật
                    include 'hotproducts.php';
                    break;
            }
            ?>
        </div>

        <div class="right-column">
            <?php include 'right.php'; ?>
        </div>

    </div>

</div>

</body>
</html>