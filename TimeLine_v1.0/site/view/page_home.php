
<main>
    <div class="banner-home">
        <section class="featured-product">
            <img src="../content/img/banner.png" alt="Featured Product">
        </section>

    </div>
    <div class="sale-section">
        <h1 class="sale-title">SIÊU SALE XỊN 6G *GỒNG GÁNH_GIẢM GIÁ_GIÁ SỐC</h1>
        <div class="product-container">
            <!-- Product 1 -->
            <div class="product-card-home">
                <div class="discount-badge">-23%</div>
                <img src="../content/img/sieusale.png" alt="Miếng Lót Chuột Gaming" class="product-image">
                <h3 class="product-name">Miếng Lót Chuột Gaming</h3>
                <div class="product-price">
                    <span class="old-price">180,000đ</span>
                    <span class="new-price">150,000đ</span>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="product-card-home">
                <div class="discount-badge">-23%</div>
                <img src="../content/img/sieusale1.png" alt="Bộ Phím Keycap" class="product-image">
                <h3 class="product-name">Bộ Phím Keycap Blue&Red Sublimation</h3>
                <div class="product-price">
                    <span class="old-price">650,000đ</span>
                    <span class="new-price">500,000đ</span>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="product-card-home">
                <div class="discount-badge">-23%</div>
                <img src="../content/img/sieusale2.png" alt="Chuột Gaming MZ" class="product-image">
                <h3 class="product-name">Chuột Gaming MZ 8M</h3>
                <div class="product-price">
                    <span class="old-price">650,000đ</span>
                    <span class="new-price">500,000đ</span>
                </div>
            </div>
            <!-- Product 4 -->
            <div class="product-card-home">
                <div class="discount-badge">-23%</div>
                <img src="../content/img/sieusale3.png" alt="Ghế Công Thái Học" class="product-image">
                <h3 class="product-name">Ghế Công Thái Học Ergonomic Warrior</h3>
                <div class="product-price">
                    <span class="old-price">1,800,000đ</span>
                    <span class="new-price">1,390,000đ</span>
                </div>
            </div>
        </div>
        <button class="view-more">Xem Thêm</button>
    </div>
    <div class="shopping-trends-section">
        <h2 class="section-title">XU HƯỚNG MUA SẮM</h2>
        <div class="trend-container">
            <!-- Product 1 -->
            <div class="trend-card">
                <img src="../content/img/xuhuong1.png" alt="Bàn phím RGB" class="trend-image">
            </div>
            <!-- Product 2 -->
            <div class="trend-card">
                <img src="../content/img/xuhuong2.png" alt="Chuột Gaming" class="trend-image">
            </div>
            <!-- Product 3 -->
            <div class="trend-card">
                <img src="../content/img/xuhuong3.png" alt="Tai nghe RGB" class="trend-image">
            </div>
        </div>
    </div>
    <div class="sp-new">
        <h3>Sản Phẩm Mới</h3>
    </div>
    <div class="container main-section">
        <?php $dem = 0; ?>
        <section class="products">
        <?php foreach ($dssp as $sp): ?>
            <div class="menu1-home">
                    <div class="img">
                       <a href="?mod=product&act=detail&id=<?=$sp['MaSanPham']?>"> <img src="../content/img/<?= $sp['HinhAnh'] ?>" alt=""></a>
                    </div>
                    <div class="ten">
                        <p><?= $sp['TenSanPham'] ?></p>
                    </div>
                    <div class="gia">
                        <span><?= $sp['Gia'] ?></SPan>
                    </div>

                    <div class="giohang">
                        <a href="?mod=cart&act=add&id=<?= $sp['MaSanPham'] ?>">
                            <img src="../content/img/giohang.png" alt="Logo">
                        </a>
                    </div>
                </div>
                <?php $dem++; ?>
                <?php if ($dem == 8)
                    break; ?>
            <?php endforeach; ?>
        </section>

    </div>

    <section class="news">
        <h3>Tin Tức & Sự Kiện</h3>
        <div class="news-item">CHẤT! SIÊU CHẤT! LED RGB CHẤT NHẤT BẠN TỪNG THẤY
            <img src="../content/img/contac1.png" alt="">
        </div>
        <div class="news-item">HƯỚNG DẪN KẾT NỐI TAY CẦM PS4 PC VÀ ĐIỆN THOẠI
            <img src="../content/img/contac2.png" alt="">
        </div>
        <div class="news-item">ESPORT TL-GAME CHỈ CÓ 1 LẦN DUY NHẤT HÃY ĐÉN MỌI NGƯỜI ƠI!
            <img src="../content/img/contac3.png" alt="">
        </div>
    </section>

    <section class="newsletter">
        <h3>Subscribe to Newsletter</h3>
        <input type="email" placeholder="Enter your email">
        <button>Subscribe</button>
    </section>
</main>