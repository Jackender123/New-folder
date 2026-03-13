<div class="detail-container" style="background-color: #ffc000; padding: 20px; min-height: 500px;">
    <?php
    // 1. Lấy ID sản phẩm từ thanh URL (ví dụ: index.php?page=detail_products&id=1)
    $id = isset($_GET['id']) ? $_GET['id'] : 0;

    // 2. Gọi hàm lấy dữ liệu từ database
    $chiTiet = getProductDetail($conn, $id);

    // 3. Kiểm tra xem có sản phẩm nào khớp ID không
    if ($chiTiet && is_array($chiTiet)) {
        $sp = $chiTiet;
        ?>
        
        <div style="background: #fff; padding: 20px; border: 1px solid #333; display: flex; gap: 20px;">
            <div style="flex: 1; text-align: center;">
                <img src="images/<?php echo $sp['hinh']; ?>" alt="<?php echo $sp['ten']; ?>" style="max-width: 100%; border: 1px solid #ccc; padding: 5px;">
            </div>

            <div style="flex: 2;">
                <h2 style="margin-top: 0; color: #333; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
                    <?php echo $sp['ten']; ?>
                </h2>
                
                <p style="font-size: 22px; color: red; font-weight: bold;">
                    Giá: <?php echo number_format($sp['gia'], 0, ',', '.'); ?> đ
                </p>
                
                <div style="margin-top: 20px;">
                    <h4 style="margin-bottom: 5px;">Mô tả sản phẩm:</h4>
                    <p style="line-height: 1.6; color: #555;">
                        <?php echo nl2br($sp['moTa']); ?>
                    </p>
                </div>

                <button style="margin-top: 20px; padding: 10px 20px; background: #28a745; color: white; border: none; font-size: 16px; cursor: pointer;">
                    🛒 Thêm vào giỏ hàng
                </button>
            </div>
        </div>

        <?php
    } else {
        // Nếu nhập sai ID hoặc sản phẩm bị xóa
        echo "<h3 style='text-align: center; background: #fff; padding: 20px;'>Sản phẩm không tồn tại!</h3>";
    }
    ?>
</div>