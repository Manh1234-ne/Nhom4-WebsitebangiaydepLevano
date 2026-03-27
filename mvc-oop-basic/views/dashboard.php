<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<main>

    <!-- breadcrumb -->
    <div class="breadcrumb-area">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a>
                </li>
                <li>Tài khoản</li>
            </ul>
        </div>
    </div>

    <!-- main -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">

                    <!-- LEFT -->
                    <!-- <div class="col-lg-6">
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">

                                <h6>Thông tin nhanh</h6>

                                <table class="table">
                                    <tr>
                                        <td>Avatar</td>
                                        <td>
                                            <img src="<?= BASE_URL . $user['anh_dai_dien'] ?>"
                                                width="60"
                                                class="rounded-circle"
                                                onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png'">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td><?= $user['email'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Trạng thái</td>
                                        <td>
                                            <span class="badge bg-success">Hoạt động</span>
                                        </td>
                                    </tr>
                                </table>

                            </div>

                            <a href="<?= BASE_URL . '?act=lich_su_mua_hang' ?>"
                                class="btn btn-sqr d-block">
                                Xem đơn hàng
                            </a>
                        </div>
                    </div> -->
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="<?= BASE_URL . '?act=dashboard' ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                                <a href="<?= BASE_URL . '?act=gio-hang' ?>" ><i class="fa fa-cart-arrow-down"></i>
                                    Orders</a>
                               <a href="<?= BASE_URL . '?act=thanh-toan' ?>" ><i class="fa fa-credit-card"></i>
                                    Payment
                                    Method</a>
                               
                                <a href="<?= BASE_URL . '?act=thong-tin-ca-nhan' ?>" ><i class="fa fa-user"></i> Account
                                    Details</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->
                        <!-- RIGHT -->

                        <div class="col-lg-9">
                           <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                <div class="myaccount-content">
                                    <h5>Dashboard</h5>
                                    <div class="welcome">
                                        <p>Hello, <strong>Erik Jhonson</strong> (If Not <strong>Jhonson
                                                !</strong><a href="login-register.html" class="logout"> Logout</a>)</p>
                                    </div>
                                    <p class="mb-0">From your account dashboard. you can easily check &
                                        view your recent orders, manage your shipping and billing addresses
                                        and edit your password and account details.</p>
                                </div>
                            </div>
                            
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</main>

<!-- Modernizer JS -->
<script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
<!-- jQuery JS -->
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
<!-- slick Slider JS -->
<script src="assets/js/plugins/slick.min.js"></script>
<!-- Countdown JS -->
<script src="assets/js/plugins/countdown.min.js"></script>
<!-- Nice Select JS -->
<script src="assets/js/plugins/nice-select.min.js"></script>
<!-- jquery UI JS -->
<script src="assets/js/plugins/jqueryui.min.js"></script>
<!-- Image zoom JS -->
<script src="assets/js/plugins/image-zoom.min.js"></script>
<!-- Images loaded JS -->
<script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
<!-- mail-chimp active js -->
<script src="assets/js/plugins/ajaxchimp.js"></script>
<!-- contact form dynamic js -->
<script src="assets/js/plugins/ajax-mail.js"></script>
<!-- google map api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
<!-- google map active js -->
<script src="assets/js/plugins/google-map.js"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>

<?php require_once 'layout/miniCart.php'; ?>
<?php require_once 'layout/footer.php'; ?>