<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Quản lý người dùng</h1>
            </div>
        </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="card card-cus">
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mã Tài Khoản</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Tel</th>
                            <th>Vai Trò</th>
                        </tr>
                    </thead>

                    <?php
                 foreach($listuser as $user) {
                    extract($user);
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $user_id ?></td>
                            <td><?php echo $user_name ?></td>
                            <td><?php echo $user_password ?></td>
                            <td><?php echo $user_email ?></td>
                            <td><?php echo $user_address ?></td>
                            <td><?php echo $user_phone ?></td>
                            <td>Khách Hàng</td>
                        </tr>
                    </tbody>

                    <?php 
                }
                ?>
                </table>
            </div>
        </div>
    </div>
</section>