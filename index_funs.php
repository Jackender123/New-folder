<?php
// Kết nối CSDL (Bạn nhớ thay đổi thông tin cho phù hợp với máy của bạn)
// $conn = mysqli_connect("localhost", "root", "", "ten_co_so_du_lieu");

// Yêu cầu 1: Hàm lấy dữ liệu từ bảng loại để hiển thị Menu

function getCategories($conn) {
    $sql = "SELECT * FROM loai ORDER BY thuTu ASC";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Yêu cầu 2: Hàm lấy n tin mới nhất từ bảng tinTuc
function getLatestNews($conn, $n) {
    $sql = "SELECT * FROM tinTuc ORDER BY id DESC LIMIT $n";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Yêu cầu 3: Hàm lấy chi tiết tin theo idTinTuc
function getNewsDetail($conn, $idTinTuc,$id) {
    $sql = "SELECT * FROM tinTuc WHERE id = $idTinTuc";
    $result = mysqli_query($conn, $sql);
    // Trả về 1 mảng (1 dòng dữ liệu) vì id là khoá chính
    // Hàm 3: Lấy chi tiết tin tức theo ID

    $id = (int)$id; // Ép kiểu để bảo mật
    $sql = "SELECT * FROM tinTuc WHERE id = $id";
    return mysqli_query($conn, $sql);
}

// Yêu cầu 4: Hàm lấy n sản phẩm mới nhất từ bảng sanPham (chỉ lấy tên, hình, giá theo yêu cầu)
function getLatestProducts($conn, $n) {
    $sql = "SELECT id, ten, hinh, gia FROM sanPham ORDER BY id DESC LIMIT $n";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Yêu cầu 5.1: Hàm lấy các nhóm (loại) nổi bật
function getFeaturedCategories($conn) {
    // Giả sử noiBat = 1 là loại nổi bật
    $sql = "SELECT * FROM loai WHERE noiBat = 1 ORDER BY thuTu ASC"; 
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Yêu cầu 5.2: Hàm lấy n sản phẩm mới nhất theo nhóm (loại)
function getProductsByCategory($conn, $idLoai, $n) {
    $sql = "SELECT * FROM sanPham WHERE loai = $idLoai ORDER BY id DESC LIMIT $n";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Yêu cầu 6: Hàm lấy chi tiết sản phẩm theo id
function getProductDetail($conn, $idSanPham) {
    $sql = "SELECT * FROM sanPham WHERE id = $idSanPham";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}
?>