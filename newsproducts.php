<div class="new-products-section" style="background-color: #f2f2f2; padding: 15px; border-bottom: 2px solid #ccc; margin-bottom: 20px;">
    <h3 style="text-align: center; margin-top: 0;">Sản phẩm mới nhất</h3>
    
    <div style="display: flex; justify-content: space-around; flex-wrap: wrap;">
        
        <?php
        // Gọi hàm lấy 5 sản phẩm mới nhất (hàm này nằm trong index_funs.php)
        // Lưu ý: biến $conn phải được khởi tạo ở file index.php rồi
        $sanPhamMoi = getLatestProducts($conn, 5);

        // Kiểm tra xem có dữ liệu không
        if ($sanPhamMoi && mysqli_num_rows($sanPhamMoi) > 0) {
            
            // Lặp qua từng sản phẩm lấy được
            while ($sp = mysqli_fetch_assoc($sanPhamMoi)) {
                ?>
                
                <div class="product-item" style="width: 18%; background: #fff; padding: 10px; border: 1px solid #ddd; text-align: center; box-sizing: border-box;">
                    
                    <a href="index.php?page=detail_products&id=<?php echo $sp['id']; ?>">
                        <img src="images/<?php echo $sp['hinh']; ?>" alt="<?php echo $sp['ten']; ?>" style="width: 100%; height: 150px; object-fit: cover; margin-bottom: 10px;">
                    </a>
                    
                    <h4 style="font-size: 14px; margin: 0 0 10px 0;">
                        <a href="index.php?page=detail_products&id=<?php echo $sp['id']; ?>" style="text-decoration: none; color: #333;">
                            <?php echo $sp['ten']; ?>
                        </a>
                    </h4>
                    
                    <p style="color: red; font-weight: bold; margin: 0;">
                        <?php echo number_format($sp['gia'], 0, ',', '.'); ?> VNĐ
                    </p>
                    
                </div>
                
                <?php
            }
        } else {
            echo "<p style='text-align: center; width: 100%;'>Hiện chưa có sản phẩm mới nào.</p>";
        }
        ?>
        
    </div>
</div>