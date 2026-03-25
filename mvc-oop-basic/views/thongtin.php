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


                    <div class="col-lg-6 ">
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
                    </div>


                    <div class="col-lg-6">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th colspan="2" style="background:#c89b5b; color:white;">
                                            Thông tin tài khoản
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Họ tên</td>
                                        <td><?= $user['ho_ten'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td><?= $user['email'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Số điện thoại</td>
                                        <td><?= $user['so_dien_thoai'] ?? 'Chưa có' ?></td>
                                    </tr>

                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td><?= $user['dia_chi'] ?? 'Chưa có' ?></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>

                        <!-- FORM UPDATE -->
                        <div class="cart-update-option">
                            <form action="<?= BASE_URL . '?act=update-profile' ?>" method="post">

                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <input type="text" name="ho_ten"
                                            class="form-control"
                                            placeholder="Họ tên"
                                            value="<?= $user['ho_ten'] ?>">
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <input type="text" name="so_dien_thoai"
                                            class="form-control"
                                            placeholder="SĐT"
                                            value="<?= $user['so_dien_thoai'] ?? '' ?>">
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <input type="text" name="dia_chi"
                                            class="form-control"
                                            placeholder="Địa chỉ"
                                            value="<?= $user['dia_chi'] ?? '' ?>">
                                    </div>
                                </div>

                                <?php if (isset($_SESSION['success'])): ?>
                                    <div class="alert alert-success">
                                        <?= $_SESSION['success'];
                                        unset($_SESSION['success']); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($_SESSION['error'])): ?>
                                    <div class="alert alert-danger">
                                        <?= $_SESSION['error'];
                                        unset($_SESSION['error']); ?>
                                    </div>
                                <?php endif; ?>

                                <button class="btn btn-sqr">
                                    Cập nhật thông tin
                                </button>



                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once 'layout/miniCart.php'; ?>
<?php require_once 'layout/footer.php'; ?>