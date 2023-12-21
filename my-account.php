<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './layouts/headerpage.php'; ?>
</head>

<body>
    <?php include './layouts/menupage.php'; ?>
    <?php include './layouts/menubottompage.php'; ?>

    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Tài khoản của tôi</li>
            </ul>
        </div>
    </div>

    <div class="my-account">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Bảng điều khiển</a>
                        <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Đặt hàng</a>
                        <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i class="fa fa-credit-card"></i>Phương thức thanh toán</a>
                        <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>Địa chỉ</a>
                        <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Chi tiết tài khoản</a>
                        <a class="nav-link" href="index.php"><i class="fa fa-sign-out-alt"></i>Đăng xuất</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                            <h4>Bảng điều khiển</h4>
                            <p>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>STT</th>
                                            <th>Sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Tình trạng</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Tên SP</td>
                                            <td>$99</td>
                                            <td>Còn hàng</td>
                                            <td><button class="btn">Xem</button></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Tên SP</td>
                                            <td>$99</td>
                                            <td>Còn hàng</td>
                                            <td><button class="btn">Xem</button></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Tên SP</td>
                                            <td>$99</td>
                                            <td>Còn hàng</td>
                                            <td><button class="btn">Xem</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                            <h4>Phương thức thanh toán</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi
                                viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor
                                hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non.
                                Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien
                                eget arcu rhoncus scelerisque.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                            <h4>Địa chỉ</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Địa chỉ thanh toán</h5>
                                    <p>180 Cao Lỗ</p>
                                    <p>SĐT: 012-345-6789</p>
                                    <button class="btn">Sửa địa chỉ</button>
                                </div>
                                <div class="col-md-6">
                                    <h5>Địa chỉ vận chuyển</h5>
                                    <p>180 Cao Lỗ</p>
                                    <p>SĐT: 012-345-6789</p>
                                    <button class="btn">Sửa địa chỉ</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                            <h4>Chi tiết tài khoản</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control" type="text" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" placeholder="Last Name">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" placeholder="Mobile">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" placeholder="Email">
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" placeholder="Address">
                                </div>
                                <div class="col-md-12">
                                    <button class="btn">Update Account</button>
                                    <br><br>
                                </div>
                            </div>
                            <h4>Đổi mật khẩu</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control" type="password" placeholder="Current Password">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" placeholder="New Password">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" placeholder="Confirm Password">
                                </div>
                                <div class="col-md-12">
                                    <button class="btn">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include './layouts/footerpage.php'; ?>
    <?php include './layouts/footerbottompage.php'; ?>
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <?php include './layouts/scriptpage.php'; ?>
</body>

</html>