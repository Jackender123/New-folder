<div class="hot-products-container" style="background-color: #ffc000; padding: 10px;">
    <?php
    // 1. Lấy danh sách các loại sản phẩm nổi bật (Vòng lặp ngoài)
    $loaiNoiBat = getFeaturedCategories($conn);

    if ($loaiNoiBat && mysqli_num_rows($loaiNoiBat) > 0) {
        
        // Duyệt qua từng loại (Ví dụ: Điện thoại, Laptop...)
        while ($loai = mysqli_fetch_assoc($loaiNoiBat)) {
            $idLoai = $loai['id'];
            $tenLoai = $loai['ten'];
            ?>
            
            <div class="category-block" style="border: 1px solid #333; margin-bottom: 20px;">
                
                <h3 style="border-bottom: 1px solid #333; margin: 0; padding: 10px;">
                    { <?php echo $tenLoai; ?> }
                </h3>
                
                <div class="product-list" style="padding: 15px; display: flex; justify-content: space-around; flex-wrap: wrap;">
                    <?php
                    // 2. Lấy 5 sản phẩm thuộc ID loại hiện tại (Vòng lặp trong)
                    $sanPhamTheoLoai = getProductsByCategory($conn, $idLoai, 5);
                    
                    if ($sanPhamTheoLoai && mysqli_num_rows($sanPhamTheoLoai) > 0) {
                        
                        // Duyệt qua từng sản phẩm để in ra màn hình
                        while ($sp = mysqli_fetch_assoc($sanPhamTheoLoai)) {
                            ?>
                            <div class="product-item" style="width: 18%; background: #fff; padding: 10px; border: 1px solid #ddd; text-align: center;">
                                
                                <a href="index.php?page=detail_products&id=<?php echo $sp['id']; ?>">
                                    <img src="images/<?php echo $sp['hinh']; ?>" alt="<?php echo $sp['ten']; ?>" style="width: 100%; height: 120px; object-fit: cover;">
                                </a>
                                
                                <h4 style="font-size: 14px; margin: 10px 0;">
                                    <a href="index.php?page=detail_products&id=<?php echo $sp['id']; ?>" style="text-decoration: none; color: #333;">
                                        <?php echo $sp['ten']; ?>
                                    </a>
                                </h4>
                                
                                <p style="color: red; font-weight: bold; margin: 0;">
                                    <?php echo number_format($sp['gia'], 0, ',', '.'); ?> đ
                                </p>
                                
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p style='width: 100%; text-align: center;'>Đang cập nhật sản phẩm cho nhóm này...</p>";
                    }
                    ?>
                </div> </div> <?php
        } // Kết thúc vòng lặp while của Loại nổi bật
    } else {
        echo "<p>Chưa có loại sản phẩm nổi bật nào.</p>";
    }
    ?>
</div>