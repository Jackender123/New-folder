<style>
    .menu-top {
        background-color: #8faadc; /* Màu xanh giống trong hình mô tả của bạn */
        padding: 10px;
        text-align: center;
    }
    .menu-top ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: inline-block;
    }
    .menu-top ul li {
        display: inline;
        margin-right: 20px;
    }
    .menu-top ul li a {
        text-decoration: none;
        color: #000;
        font-weight: bold;
        font-size: 16px;
    }
    .menu-top ul li a:hover {
        color: #fff;
    }
</style>

<div class="menu-top">
    <ul>
        <li><a href="index.php">Trang chủ</a></li>

        <?php
        // Lưu ý: Biến $conn và các hàm trong index_funs.php phải được include 
        // ở file index.php (file gốc chứa top.php) trước khi gọi đoạn mã này.
        
        $danhSachLoai = getCategories($conn);
        
        // Kiểm tra xem có dữ liệu trả về hay không
        if ($danhSachLoai && mysqli_num_rows($danhSachLoai) > 0) {
            // Dùng vòng lặp while để duyệt qua từng dòng dữ liệu lấy từ bảng 'loai'
            while ($loai = mysqli_fetch_assoc($danhSachLoai)) {
                // Link sẽ truyền id của loại lên URL (ví dụ: index.php?idLoai=1) 
                // để sau này trang chủ biết cần hiển thị sản phẩm của loại nào
                echo "<li><a href='index.php?idLoai=" . $loai['id'] . "'>" . $loai['ten'] . "</a></li>";
            }
        }
        ?>

        <li><a href="index.php?page=dangky">Đăng ký</a></li>
        <li><a href="index.php?page=giohang">Giỏ hàng</a></li>
        <li><a href="index.php?page=tintuc">Tin tức</a></li>
    </ul>
</div>