<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<style>
.contact-page {
    font-family: Arial;
}

/* BANNER */
.contact-banner {
    background: url("https://images.unsplash.com/photo-1542291026-7eec264c27ff") center/cover;
    height: 250px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 32px;
    font-weight: bold;
}

/* CONTAINER */
.contact-container {
    width: 1000px;
    margin: 30px auto;
    display: flex;
    gap: 20px;
}

/* INFO */
.contact-info {
    width: 35%;
    background: white;
    padding: 20px;
    border-radius: 10px;
}

.contact-info h3 {
    margin-bottom: 15px;
}

/* FORM */
.contact-form {
    flex: 1;
    background: white;
    padding: 20px;
    border-radius: 10px;
}

.contact-form h2 {
    margin-bottom: 10px;
}

.contact-form input,
.contact-form textarea,
.contact-form select {
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.contact-form textarea {
    height: 120px;
}

.contact-form button {
    margin-top: 15px;
    padding: 12px;
    width: 100%;
    background: black;
    color: white;
    border: none;
    border-radius: 5px;
}

.contact-form button:hover {
    background: #333;
}
</style>

<div class="contact-page">

    <!-- BANNER -->
    <div class="contact-banner">
        Liên hệ với chúng tôi
    </div>

    <!-- CONTENT -->
    <div class="contact-container">

        <!-- INFO -->
        <div class="contact-info">
            <h3>Thông tin cửa hàng</h3>
            <p>📍 Hà Nội</p>
            <p>📞 0123 456 789</p>
            <p>📧 shoestore@gmail.com</p>

            <hr>

            <h3>Giờ mở cửa</h3>
            <p>8:00 - 22:00 (Thứ 2 - CN)</p>
        </div>

        <!-- FORM -->
        <div class="contact-form">
            <h2>Gửi tin nhắn</h2>

            <form action="index.php?url=contact/store" method="POST" enctype="multipart/form-data">

                <input type="text" name="name" placeholder="Tên của bạn">

                <input type="email" name="email" placeholder="Email">

                <select name="subject">
                    <option value="">Chọn chủ đề</option>
                    <option value="product">Hỏi về sản phẩm</option>
                    <option value="order">Đơn hàng</option>
                    <option value="return">Đổi trả</option>
                </select>

                <textarea name="content" placeholder="Nhập nội dung..."></textarea>

                <input type="file" name="image">

                <button type="submit">Gửi liên hệ</button>

            </form>
        </div>

    </div>

</div>

<?php require_once 'layout/footer.php'; ?>