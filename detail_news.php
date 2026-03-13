<div class="news-detail-container" style="background-color: #ffc000; padding: 20px; min-height: 500px;">
    <?php
    // 1. Lấy ID bản tin từ thanh URL (ví dụ: index.php?page=detail_news&id=1)
    $id = isset($_GET['id']) ? $_GET['id'] : 0;

    // 2. Gọi hàm lấy dữ liệu từ database
    $chiTiet = getNewsDetail($conn, $id);
    
    // Định nghĩa hàm getNewsDetail nếu chưa có
    if (!function_exists('getNewsDetail')) {
        function getNewsDetail($conn, $id) {
            $id = intval($id);
            $sql = "SELECT * FROM news WHERE id = $id";
            return mysqli_query($conn, $sql);
        }
    }

    // 3. Kiểm tra xem có bản tin nào khớp ID không
    if ($chiTiet && mysqli_num_rows($chiTiet) > 0) {
        // Lấy dữ liệu ra
        $tin = mysqli_fetch_assoc($chiTiet);
        ?>
        
        <div style="background: #fff; padding: 30px; border: 1px solid #333;">
            <h2 style="color: #2c3e50; margin-top: 0; border-bottom: 2px solid #eee; padding-bottom: 15px;">
                <?php echo $tin['tieuDe']; ?>
            </h2>
            
            <div style="line-height: 1.8; font-size: 16px; color: #333; margin-top: 20px; text-align: justify;">
                <?php 
                // Hàm nl2br giúp giữ nguyên các khoảng xuống dòng khi nhập trong database
                echo nl2br($tin['NoiDung']); 
                ?>
            </div>
            
            <div style="margin-top: 30px; text-align: right;">
                <a href="index.php" style="text-decoration: none; color: #fff; background: #666; padding: 8px 15px; border-radius: 4px;">
                    ⬅ Quay lại trang chủ
                </a>
            </div>
        </div>

        <?php
    } else {
        echo "<h3 style='text-align: center; background: #fff; padding: 20px;'>Bản tin không tồn tại hoặc đã bị xóa!</h3>";
    }
    ?>
</div>