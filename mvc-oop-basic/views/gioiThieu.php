<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<style>
    .about-banner {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }
    .about-banner::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: url('https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=1600&q=80') center/cover no-repeat;
        opacity: 0.15;
    }
    .about-banner .container { position: relative; z-index: 1; }
    .about-banner h1 {
        font-size: 52px;
        font-weight: 900;
        color: #fff;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 16px;
    }
    .about-banner p {
        color: #ccc;
        font-size: 18px;
        max-width: 600px;
        margin: 0 auto;
    }
    .about-banner .banner-line {
        width: 60px;
        height: 3px;
        background: #c8a96e;
        margin: 20px auto;
    }

    .section-about { padding: 80px 0; background: #fff; }
    .section-about .about-text h2 {
        font-size: 36px;
        font-weight: 800;
        color: #1a1a1a;
        margin-bottom: 20px;
    }
    .section-about .about-text h2 span { color: #c8a96e; }
    .section-about .about-text p {
        color: #666;
        font-size: 16px;
        line-height: 1.9;
        margin-bottom: 16px;
    }
    .about-img-wrap { position: relative; }
    .about-img-wrap img {
        width: 100%;
        height: 420px;
        object-fit: cover;
        border-radius: 4px;
    }
    .about-img-wrap .badge-years {
        position: absolute;
        bottom: -20px;
        right: 20px;
        background: #c8a96e;
        color: #fff;
        padding: 20px 24px;
        text-align: center;
        font-weight: 800;
        font-size: 14px;
        line-height: 1.4;
        border-radius: 4px;
    }
    .about-img-wrap .badge-years span { display: block; font-size: 36px; font-weight: 900; }

    .section-why { padding: 80px 0; background: #f8f8f8; }
    .section-why .section-head { text-align: center; margin-bottom: 50px; }
    .section-why .section-head h2 { font-size: 36px; font-weight: 800; color: #1a1a1a; }
    .section-why .section-head h2 span { color: #c8a96e; }
    .section-why .section-head p { color: #888; font-size: 16px; margin-top: 10px; }
    .why-card {
        background: #fff;
        padding: 40px 30px;
        text-align: center;
        border-radius: 4px;
        transition: all 0.3s ease;
        height: 100%;
        border-bottom: 3px solid transparent;
    }
    .why-card:hover { transform: translateY(-8px); border-bottom-color: #c8a96e; box-shadow: 0 20px 40px rgba(0,0,0,0.08); }
    .why-card .icon {
        width: 70px; height: 70px;
        background: #1a1a1a;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 24px;
        font-size: 28px;
        color: #c8a96e;
        transition: background 0.3s;
    }
    .why-card:hover .icon { background: #c8a96e; color: #fff; }
    .why-card h5 { font-size: 18px; font-weight: 700; color: #1a1a1a; margin-bottom: 12px; }
    .why-card p { color: #888; font-size: 14px; line-height: 1.7; margin: 0; }

    .section-gallery { padding: 80px 0; background: #fff; }
    .section-gallery .section-head { text-align: center; margin-bottom: 50px; }
    .section-gallery .section-head h2 { font-size: 36px; font-weight: 800; color: #1a1a1a; }
    .section-gallery .section-head h2 span { color: #c8a96e; }
    .gallery-grid { display: grid; grid-template-columns: repeat(3, 1fr); grid-template-rows: auto auto; gap: 12px; }
    .gallery-item { overflow: hidden; border-radius: 4px; position: relative; }
    .gallery-item.large { grid-row: span 2; }
    .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; display: block; }
    .gallery-item:not(.large) img { height: 220px; }
    .gallery-item.large img { height: 452px; }
    .gallery-item:hover img { transform: scale(1.06); }
    .gallery-item .overlay {
        position: absolute; inset: 0;
        background: rgba(26,26,26,0.5);
        display: flex; align-items: center; justify-content: center;
        opacity: 0; transition: opacity 0.3s;
    }
    .gallery-item:hover .overlay { opacity: 1; }
    .gallery-item .overlay span { color: #fff; font-size: 14px; font-weight: 600; letter-spacing: 2px; text-transform: uppercase; }

    .section-mission { padding: 80px 0; background: #1a1a1a; }
    .section-mission .mission-card {
        padding: 50px 40px;
        border: 1px solid rgba(200,169,110,0.3);
        border-radius: 4px;
        height: 100%;
        transition: border-color 0.3s;
    }
    .section-mission .mission-card:hover { border-color: #c8a96e; }
    .section-mission .mission-card .icon-wrap {
        font-size: 40px;
        color: #c8a96e;
        margin-bottom: 24px;
    }
    .section-mission .mission-card h4 {
        font-size: 22px;
        font-weight: 700;
        color: #fff;
        margin-bottom: 16px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .section-mission .mission-card p { color: #aaa; font-size: 15px; line-height: 1.8; margin: 0; }

    .section-contact { padding: 80px 0; background: #f8f8f8; }
    .section-contact .section-head { text-align: center; margin-bottom: 50px; }
    .section-contact .section-head h2 { font-size: 36px; font-weight: 800; color: #1a1a1a; }
    .section-contact .section-head h2 span { color: #c8a96e; }
    .contact-info-card {
        background: #fff;
        padding: 36px 30px;
        border-radius: 4px;
        text-align: center;
        height: 100%;
        transition: box-shadow 0.3s;
    }
    .contact-info-card:hover { box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
    .contact-info-card .icon {
        width: 60px; height: 60px;
        background: #1a1a1a;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 20px;
        font-size: 22px;
        color: #c8a96e;
    }
    .contact-info-card h6 { font-size: 14px; font-weight: 700; color: #888; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; }
    .contact-info-card p { color: #1a1a1a; font-size: 16px; font-weight: 600; margin: 0; }
    .contact-info-card a { color: #1a1a1a; text-decoration: none; }
    .contact-info-card a:hover { color: #c8a96e; }

    .divider-gold { width: 50px; height: 3px; background: #c8a96e; margin: 0 auto 16px; }
</style>

<main>
    <!-- 1. Banner -->
    <section class="about-banner text-center">
        <div class="container">
            <div class="banner-line"></div>
            <h1>Giới Thiệu Về LEVANO</h1>
            <p>Thương hiệu giày dép thời trang hàng đầu — nơi phong cách gặp gỡ chất lượng</p>
        </div>
    </section>

    <!-- 2. Mô tả cửa hàng -->
    <section class="section-about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="about-img-wrap">
                        <img src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?w=800&q=80" alt="LEVANO Store">
                        <div class="badge-years"><span>5+</span>Năm<br>Kinh Nghiệm</div>
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <div class="about-text">
                        <div class="divider-gold" style="margin-left:0;"></div>
                        <h2>Câu Chuyện Của <span>LEVANO</span></h2>
                        <p>LEVANO ra đời từ niềm đam mê với thời trang và mong muốn mang đến cho người Việt những đôi giày chất lượng cao với mức giá hợp lý. Chúng tôi tin rằng mỗi bước chân đều xứng đáng được nâng đỡ bởi những sản phẩm tốt nhất.</p>
                        <p>Với hơn 5 năm hoạt động trong ngành thời trang giày dép, LEVANO đã phục vụ hàng chục nghìn khách hàng trên toàn quốc. Mỗi sản phẩm đều được tuyển chọn kỹ lưỡng từ các nhà sản xuất uy tín, đảm bảo độ bền, tính thẩm mỹ và sự thoải mái tối đa.</p>
                        <p>Từ sneaker năng động đến giày công sở thanh lịch, LEVANO luôn cập nhật những xu hướng mới nhất để bạn luôn tự tin và phong cách trong mọi hoàn cảnh.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Tại Sao Chọn Chúng Tôi -->
    <section class="section-why">
        <div class="container">
            <div class="section-head">
                <div class="divider-gold"></div>
                <h2>Tại Sao Chọn <span>LEVANO</span>?</h2>
                <p>Những lý do khiến hàng nghìn khách hàng tin tưởng và quay lại</p>
            </div>
            <div class="row g-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="why-card">
                        <div class="icon"><i class="pe-7s-diamond"></i></div>
                        <h5>Chất Lượng Cao</h5>
                        <p>Sản phẩm được kiểm định nghiêm ngặt, sử dụng chất liệu cao cấp, bền đẹp theo thời gian.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="why-card">
                        <div class="icon"><i class="pe-7s-shuffle"></i></div>
                        <h5>Mẫu Mã Đa Dạng</h5>
                        <p>Hàng trăm mẫu giày cập nhật liên tục theo xu hướng thời trang trong và ngoài nước.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="why-card">
                        <div class="icon"><i class="pe-7s-ticket"></i></div>
                        <h5>Giá Hợp Lý</h5>
                        <p>Cam kết giá tốt nhất thị trường, thường xuyên có chương trình khuyến mãi hấp dẫn.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="why-card">
                        <div class="icon"><i class="pe-7s-plane"></i></div>
                        <h5>Giao Hàng Nhanh</h5>
                        <p>Giao hàng toàn quốc trong 24–48 giờ, miễn phí vận chuyển cho đơn hàng từ 500.000đ.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Hình ảnh sản phẩm / cửa hàng -->
    <section class="section-gallery">
        <div class="container">
            <div class="section-head">
                <div class="divider-gold"></div>
                <h2>Bộ Sưu Tập <span>Nổi Bật</span></h2>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item large">
                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&q=80" alt="Sneaker">
                    <div class="overlay"><span>Sneaker</span></div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=600&q=80" alt="Giày thể thao">
                    <div class="overlay"><span>Thể Thao</span></div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=600&q=80" alt="Giày thời trang">
                    <div class="overlay"><span>Thời Trang</span></div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=600&q=80" alt="Giày cao gót">
                    <div class="overlay"><span>Cao Gót</span></div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1600185365926-3a2ce3cdb9eb?w=600&q=80" alt="Giày công sở">
                    <div class="overlay"><span>Công Sở</span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Tầm nhìn & Sứ mệnh -->
    <section class="section-mission">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="mission-card">
                        <div class="icon-wrap"><i class="pe-7s-target"></i></div>
                        <h4>Sứ Mệnh</h4>
                        <p>Mang đến những đôi giày chất lượng, thời trang và phù hợp với túi tiền của mọi người Việt Nam, giúp mỗi bước chân trở nên tự tin và phong cách hơn.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mission-card">
                        <div class="icon-wrap"><i class="pe-7s-look"></i></div>
                        <h4>Tầm Nhìn</h4>
                        <p>Trở thành thương hiệu giày dép thời trang được yêu thích nhất Việt Nam vào năm 2030, với hệ thống cửa hàng phủ khắp 63 tỉnh thành và nền tảng thương mại điện tử hàng đầu.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mission-card">
                        <div class="icon-wrap"><i class="pe-7s-star"></i></div>
                        <h4>Giá Trị Cốt Lõi</h4>
                        <p>Chất lượng — Tận tâm — Sáng tạo — Bền vững. Chúng tôi không chỉ bán giày, chúng tôi xây dựng phong cách sống và trải nghiệm mua sắm đáng nhớ cho từng khách hàng.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Thông tin liên hệ -->
    <section class="section-contact">
        <div class="container">
            <div class="section-head">
                <div class="divider-gold"></div>
                <h2>Liên Hệ Với <span>Chúng Tôi</span></h2>
                <p>Chúng tôi luôn sẵn sàng hỗ trợ bạn</p>
            </div>
            <div class="row g-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="contact-info-card">
                        <div class="icon"><i class="pe-7s-home"></i></div>
                        <h6>Địa Chỉ</h6>
                        <p>123 Nguyễn Huệ, Q.1<br>TP. Hồ Chí Minh</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="contact-info-card">
                        <div class="icon"><i class="pe-7s-call"></i></div>
                        <h6>Điện Thoại</h6>
                        <p><a href="tel:19001234">1900 1234</a><br><a href="tel:0901234567">0901 234 567</a></p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="contact-info-card">
                        <div class="icon"><i class="pe-7s-mail"></i></div>
                        <h6>Email</h6>
                        <p><a href="mailto:hello@levano.vn">hello@levano.vn</a><br><a href="mailto:support@levano.vn">support@levano.vn</a></p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="contact-info-card">
                        <div class="icon"><i class="pe-7s-clock"></i></div>
                        <h6>Giờ Làm Việc</h6>
                        <p>Thứ 2 – Thứ 7<br>8:00 – 21:00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once 'layout/footer.php'; ?>
