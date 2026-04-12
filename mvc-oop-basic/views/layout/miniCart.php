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

                        <?php if (!empty($chiTietGioHang)) : ?>

                            <?php foreach ($chiTietGioHang as $item) : ?>

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

                            <?php endforeach; ?>

                        <?php else : ?>

                            <li style="padding:20px;text-align:center;">
                                Giỏ hàng của bạn đang trống
                            </li>

                        <?php endif; ?>

                    </ul>
                </div>


                <div class="minicart-pricing-box">
                    <ul>

                        <li>
                            <span>Sub-total</span>
                            <span>
                                <strong><?= number_format($tongTien) ?> đ</strong>
                            </span>
                        </li>
                        <li class="total">
                            <span>Total</span>
                            <span>
                                <strong><?= number_format($tongTien) ?> đ</strong>
                            </span>
                        </li>

                    </ul>
                </div>


                <div class="minicart-button">

                    <a href="<?= BASE_URL ?>?act=gio-hang">
                        <i class="fa fa-shopping-cart"></i>
                        Xem giỏ hàng
                    </a>

                    <a href="<?= BASE_URL ?>?act=thanh-toan">
                        <i class="fa fa-share"></i>
                        Thanh toán
                    </a>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- offcanvas mini cart end -->