<?php require_once 'layout/header.php'; ?>

<?php require_once 'layout/menu.php'; ?>

<main>
    <!-- hero slider area start -->
    <section class="slider-area">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/banner3.png">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/banner2.png">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/banner5.png">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
        </div>
    </section>
    <!-- hero slider area end -->

    <!-- service policy area start -->
    <div class="service-policy section-padding">
        <div class="container">
            <div class="row mtn-30">
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-plane"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Giao hàng</h6>
                            <p>Miễn phí giao hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-help2"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Hỗ trợ</h6>
                            <p>Hỗ trợ 27/07</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-back"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Hoàn tiền</h6>
                            <p>Hoàn tiền trong 30 ngày khi lỗi</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-credit"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Thanh toán</h6>
                            <p>Bảo mật thanh toán</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service policy area end -->


    <!-- banner statistics area end -->

    <!-- product area start -->
    <section class="product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm của chúng tôi</h2>
                        <p class="sub-title">Sản phẩm được cập nhật liên tục</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-container">


                        <!-- product tab content start -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    <?php foreach ($listSanPham as $key => $sanPham): ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php
                                                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                    $ngayHienTai = new DateTime();
                                                    $interval = $ngayHienTai->diff($ngayNhap);
                                                    if ($interval->days <= 7) {

                                                    ?>
                                                        <div class="product-label new">
                                                            <span>Mới</span>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                        <div class="product-label discount">
                                                            <span>Giảm giá</span>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="cart-hover">
                                                    <button class="btn btn-cart">Xem chi tiết</button>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">

                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php
                                                    if ($sanPham['gia_khuyen_mai']) { ?>
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ'; ?></span>
                                                        <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ'; ?></del></span>
                                                    <?php } else { ?>
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ'; ?></span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
                                    <?php endforeach ?>
                                </div>
                            </div>

                        </div>
                        <!-- product tab content end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product area end -->

    <!-- product banner statistics area start -->
    <div class="banner-statistics-area">
        <div class="container">
            <div class="row row-20 mtn-20">
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="#">
                            <img src="assets/banner4.jpg" alt="product banner">
                        </a>
                    </figure>
                </div>
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="#">
                            <img src="assets/banner5.png" alt="product banner">
                        </a>

                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!-- product banner statistics area end -->

    <!-- featured product area start -->
    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm nổi bật</h2>
                        <p class="sub-title">Sản phẩm được cập nhật liên tục.</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                        <?php foreach ($listSanPham as $sanPham): ?>
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                        <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="">
                                        <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="">
                                    </a>
                                    <div class="product-badge">
                                        <?php
                                        $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                        $ngayHienTai = new DateTime();
                                        $interval = $ngayHienTai->diff($ngayNhap);
                                        if ($interval->days <= 7) {
                                        ?>
                                            <div class="product-label new">
                                                <span>Mới</span>
                                            </div>
                                        <?php } ?>
                                        <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                            <div class="product-label discount">
                                                <span>Giảm giá</span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="cart-hover">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>" class="btn btn-cart">
                                            Xem chi tiết
                                        </a>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <h6 class="product-name">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                            <?= $sanPham['ten_san_pham'] ?>
                                        </a>
                                    </h6>
                                    <div class="price-box">
                                        <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) ?>đ</span>
                                            <span class="price-old">
                                                <del><?= formatPrice($sanPham['gia_san_pham']) ?>đ</del>
                                            </span>
                                        <?php } else { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) ?>đ</span>
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured product area end -->

    <!-- testimonial area start -->

    <!-- testimonial area end -->

    <!-- group product start -->
    <section class="group-product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="group-product-banner">
                        <figure class="banner-statistics">
                            <a href="#">
                                <img src="assets/slider5.jpg" alt="product banner">
                            </a>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories-group-wrapper">
                        <!-- section title start -->
                        <div class="section-title-append">
                            <h4>Sản phẩm bán chạy</h4>
                            <div class="slick-append"></div>
                        </div>
                        <!-- section title start -->

                        <!-- group list carousel start -->
                        <div class="group-list-item-wrapper">
                            <div class="group-list-carousel">

                                <?php foreach ($listSanPham as $sanPham): ?>

                                    <div class="group-slide-item">
                                        <div class="group-item">

                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                                    <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="">
                                                </a>
                                            </div>

                                            <div class="group-item-desc">
                                                <h5 class="group-product-name">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                                        <?= $sanPham['ten_san_pham'] ?>
                                                    </a>
                                                </h5>

                                                <div class="price-box">
                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) ?>đ</span>
                                                        <span class="price-old">
                                                            <del><?= formatPrice($sanPham['gia_san_pham']) ?>đ</del>
                                                        </span>
                                                    <?php } else { ?>
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) ?>đ</span>
                                                    <?php } ?>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                <?php endforeach ?>

                            </div>
                        </div>
                        <!-- group list carousel start -->
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories-group-wrapper">
                        <!-- section title start -->
                        <div class="section-title-append">
                            <h4>Sản phẩm giảm giá</h4>
                            <div class="slick-append"></div>
                        </div>
                        <!-- section title start -->

                        <!-- group list carousel start -->
                        <div class="group-list-item-wrapper">
                            <div class="group-list-carousel">

                                <?php foreach ($listSanPham as $sanPham): ?>

                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>

                                        <div class="group-slide-item">
                                            <div class="group-item">

                                                <div class="group-item-thumb">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                                        <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="">
                                                    </a>
                                                </div>

                                                <div class="group-item-desc">
                                                    <h5 class="group-product-name">
                                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                                            <?= $sanPham['ten_san_pham'] ?>
                                                        </a>
                                                    </h5>

                                                    <div class="price-box">
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) ?>đ</span>
                                                        <span class="price-old">
                                                            <del><?= formatPrice($sanPham['gia_san_pham']) ?>đ</del>
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    <?php } ?>

                                <?php endforeach ?>

                            </div>
                        </div>
                        <!-- group list carousel start -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- group product end -->

    <!-- latest blog area start -->
    <section class="latest-blog-area section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Tin tức</h2>
                        <p class="sub-title">Đây là những bài đăng tin tức mới nhất</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="blog-carousel-active slick-row-10 slick-arrow-style">
                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="blog-details.html">
                                    <img src="assets/tin1.png" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>26/03/2026 | <a href="#">Levano</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="blog-details.html">Giày Cole Haan có tốt không? Những lý do khiến phái mạnh mê mẩn</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="blog-details.html">
                                    <img src="assets/tin2.png" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>26/03/2026 | <a href="#">Levano</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="blog-details.html">Chơi Pickleball đi giày gì? Tiêu chí chọn giày nhất định phải biết</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="blog-details.html">
                                    <img src="assets/tin3.png" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>26/03/2026 | <a href="#">Levano</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="blog-details.html">Giày On Running của nước nào? Liệu có tốt như lời đồn</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="blog-details.html">
                                    <img src="assets/tin4.png" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>26/03/2026 | <a href="#">Levano</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="blog-details.html">Giày tennis Babolat có tốt không? Những điều cần biết trước khi mua</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="blog-details.html">
                                    <img src="assets/tin5.png" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>26/03/2026 | <a href="#">Levano</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="blog-details.html">Bảng size giày Babolat và bí quyết chọn size theo từng dòng giày
                                    </a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest blog area end -->

    <!-- brand logo area start -->

    <!-- brand logo area end -->
</main>




<!-- offcanvas mini cart start -->

<div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>

        <div class="minicart-inner-content">

            <div class="minicart-close">
                <i class="pe-7s-close"></i>
            </div>

            <div class="minicart-content-box">

                <?php
                $tongTien = 0;
                ?>

                <div class="minicart-item-wrapper">
                    <ul>

                        <?php if (!empty($chiTietGioHang)): ?>

                            <?php foreach ($chiTietGioHang as $item): ?>

                                <?php
                                $gia = $item['gia_khuyen_mai'] ? $item['gia_khuyen_mai'] : $item['gia_san_pham'];
                                $tongTien += $gia * $item['so_luong'];
                                ?>

                                <li class="minicart-item">

                                    <div class="minicart-thumb">
                                        <a href="<?= BASE_URL ?>?act=chi-tiet-san-pham&id_san_pham=<?= $item['san_pham_id'] ?>">
                                            <img src="<?= BASE_URL . $item['hinh_anh'] ?>" alt="<?= $item['ten_san_pham'] ?>">
                                        </a>
                                    </div>

                                    <div class="minicart-content">

                                        <h3 class="product-name">
                                            <a href="<?= BASE_URL ?>?act=chi-tiet-san-pham&id_san_pham=<?= $item['san_pham_id'] ?>">
                                                <?= $item['ten_san_pham'] ?>
                                            </a>
                                        </h3>

                                        <p>
                                            <span class="cart-quantity">
                                                <?= $item['so_luong'] ?> <strong>&times;</strong>
                                            </span>

                                            <span class="cart-price">
                                                <?= number_format($gia) ?> đ
                                            </span>
                                        </p>

                                    </div>

                                    <a href="<?= BASE_URL ?>?act=xoa-gio-hang&id_san_pham=<?= $item['san_pham_id'] ?>">
                                        <button class="minicart-remove">
                                            <a href="<?= BASE_URL . '?act=xoa-gio-hang&id_san_pham=' . $item['san_pham_id'] ?>">
                                                <i class="pe-7s-close"></i>
                                            </a>
                                        </button>
                                    </a>

                                </li>

                            <?php endforeach ?>

                        <?php else: ?>

                            <li style="padding:20px;text-align:center;">
                                Giỏ hàng trống
                            </li>

                        <?php endif ?>

                    </ul>
                </div>


                <div class="minicart-pricing-box">
                    <ul>

                        <li>
                            <span>Sub-total</span>
                            <span><strong><?= number_format($tongTien) ?> đ</strong></span>
                        </li>

                        <li class="total">
                            <span>Total</span>
                            <span><strong><?= number_format($tongTien) ?> đ</strong></span>
                        </li>

                    </ul>
                </div>


                <div class="minicart-button">
                    <a href="<?= BASE_URL . '?act=gio-hang' ?>">
                        <i class="fa fa-shopping-cart"></i> View Cart
                    </a>

                    <a href="<?= BASE_URL . '?act=thanh-toan' ?>">
                        <i class="fa fa-share"></i> Checkout
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- offcanvas mini cart end -->

<?php require_once 'layout/footer.php'; ?>