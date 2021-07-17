<div class="container my-5">
    <?php
    $total_price = 0;
    if (isset($baskets) && is_array($baskets) && $baskets !== false) {
    ?>
        <div class="row border-md-bottom pb-2 text-center text-md-start">
            <div class="col-12 col-md-9">
                <h1 class="fw-light"><i class="fas fa-shopping-basket fa-fw"></i> Checkout Order</h1>
            </div>
        </div>
        <div class="row mx-2 pb-2 mb-2 border-bottom ">
            <div class="col-8 col-md-6"><small>Order Information</small></div>
            <div class="col-2 text-center d-none d-md-block"><small>Price</small></div>
            <div class="col-2 text-center d-none d-md-block"><small>Quantity</small></div>
            <div class="col-2 text-center d-none d-md-block"><small>Subtotal</small></div>
        </div>
        <?php foreach ($baskets as $row) { ?>
            <div class="row mx-2 py-2 mb-2 border-bottom bg-white rounded-3 shadow-sm">
                <div class="col-8 col-md-6 d-flex align-items-center">
                    <div class="mx-md-2">
                        <?php
                        if ($row['cd_img'] !== null) {
                            echo '<img src="' . base_url() . 'assets/' . $row['cd_img'] . '" alt="No Image" class="img-fluid d-none d-md-block"/>';
                        } else {
                            echo '<img src="http://placehold.it/100x100" alt="No Image" class="img-fluid d-none d-md-block"/>';
                        }
                        ?>
                    </div>
                    <div class="mx-md-2">
                        <h4 class="text-capitalize mb-0 fs-sm-6"><?php echo $row['cd_name']; ?></h4>
                        <p class="mb-0"><?php echo $row['cd_desc']; ?></p>
                    </div>
                </div>
                <div class="col text-center d-none d-md-flex align-items-center justify-content-center">
                    <p class="mb-0">RM <?php echo number_format((float)$row['cd_price'], 2, '.', ''); ?></p>
                </div>
                <div class="col col-md-2 text-end text-md-center d-flex align-items-center justify-content-center">
                    <ul class="pagination pagination-sm ">
                        <li class="page-item">
                            <a class="page-link" href="<?php echo base_url(); ?>checkout/remove/<?php echo $row['cd_id']; ?>">
                                <i class="fas fa-minus fa-xs"></i>
                            </a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#"><?php echo $_SESSION['order'][$row['cd_id']]; ?></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo base_url(); ?>checkout/add/<?php echo $row['cd_id']; ?>">
                                <i class="fas fa-plus fa-xs"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col col-md-2 text-end d-md-flex align-items-center justify-content-center">
                    <p class="mb-0">RM
                        <?php
                        $subtotal = number_format((float)($row['cd_price'] * $_SESSION['order'][$row['cd_id']]), 2, '.', '');
                        $total_price += $subtotal;
                        echo $subtotal;
                        ?>
                    </p>
                </div>
            </div>
        <?php } ?>
        <div class="row mx-2 ">
            <div class="col-8 col-md-3 offset-md-7">
                <p class="mb-0">Subtotal</p>
                <p class="mb-0">Service Charge (10%)</p>
            </div>
            <div class="col text-end text-md-center">
                <p class="mb-0">RM
                    <?php echo number_format((float)($total_price), 2, '.', ''); ?>
                </p>
                <p class="mb-0">RM
                    <?php echo number_format((float)(10 / 100 * $total_price), 2, '.', ''); ?>
                </p>
            </div>
        </div>
        <div class="row pb-3 mx-2">
            <div class="col-8 col-md-3 offset-md-7">
                <p class="mb-0">Total</p>
            </div>
            <div class="col text-end text-md-center">
                <h4 class="text-success">RM
                    <?php echo number_format((float)(round($total_price + ((float)(10 / 100 * $total_price)), 1)), 2, '.', ''); ?>
                </h4>
            </div>
        </div>
        <div class="row pb-5 mx-2">
            <div class="col offset-md-10 text-center ">
                <a href="<?php echo base_url(); ?>checkout/order" class="btn btn-success">
                    <i class="fas fa-shopping-basket fa-fw fa-sm"></i>
                    Checkout
                </a>
            </div>
        </div>
    <?php } else if (isset($orders) && is_array($orders) && $orders !== false) {  ?>
        <div class="row border-md-bottom pb-2 text-center text-md-start">
            <div class="col-12 col-md-9">
                <h1 class="fw-light"><i class="fas fa-tasks fa-fw"></i> Order Status</h1>
            </div>
        </div>
        <div class="row mx-2 pb-2 mb-2 border-bottom ">
            <div class="col-8 col-md-6"><small>Order Information</small></div>
            <div class="col-2 text-center d-none d-md-block"><small>Price</small></div>
            <div class="col-2 text-center d-none d-md-block"><small>Quantity</small></div>
            <div class="col-2 text-center d-none d-md-block"><small>Status</small></div>
        </div>
        <?php foreach ($orders as $row) { ?>
            <div class="row mx-2 py-2 mb-2 border-bottom bg-white rounded-3 shadow-sm">
                <div class="col-8 col-md-6 d-flex align-items-center">
                    <div class="mx-md-2">
                        <?php
                        if ($row['cd_img'] !== null) {
                            echo '<img src="' . base_url() . 'assets/' . $row['cd_img'] . '" alt="No Image" class="img-fluid d-none d-md-block"/>';
                        } else {
                            echo '<img src="http://placehold.it/100x100" alt="No Image" class="img-fluid d-none d-md-block"/>';
                        }
                        ?>
                    </div>
                    <div class="mx-md-2">
                        <h4 class="text-capitalize mb-0 fs-sm-6"><?php echo $row['cd_name']; ?></h4>
                        <p class="mb-0"><?php echo $row['cd_desc']; ?></p>
                    </div>
                </div>
                <div class="col text-center d-none d-md-flex align-items-center justify-content-center">
                    <p class="mb-0">RM <?php echo number_format((float)$row['cd_price'], 2, '.', ''); ?></p>
                </div>
                <div class="col col-md-2 text-end text-md-center d-flex align-items-center justify-content-center">
                    <?php echo $row['od_quantity']; ?>x
                </div>
                <div class="col col-md-2 text-end d-md-flex align-items-center justify-content-center">
                    <?php echo $row['od_status']; ?>
                </div>
            </div>
        <?php

            $total_price += number_format((float)($row['cd_price'] * $row['od_quantity']), 2, '.', '');;
        } ?>
        <div class="row mx-2 ">
            <div class="col-8 col-md-3 offset-md-7">
                <p class="mb-0">Subtotal</p>
                <p class="mb-0">Service Charge (10%)</p>
            </div>
            <div class="col text-end text-md-center">
                <p class="mb-0">RM
                    <?php echo number_format((float)($total_price), 2, '.', ''); ?>
                </p>
                <p class="mb-0">RM
                    <?php echo number_format((float)(10 / 100 * $total_price), 2, '.', ''); ?>
                </p>
            </div>
        </div>
        <div class="row pb-3 mx-2">
            <div class="col-8 col-md-3 offset-md-7">
                <p class="mb-0">Total</p>
            </div>
            <div class="col text-end text-md-center">
                <h4 class="text-success">RM
                    <?php echo number_format((float)(round($total_price + ((float)(10 / 100 * $total_price)), 1)), 2, '.', ''); ?>
                </h4>
            </div>
        </div>
        <div class="row pb-3 mx-2 text-center">
            <div class="">
                <p class="mb-0">Please collect your order on the corresponding cafe upon completion.</p>
            </div>
        </div>
    <?php } else {  ?>
        <div class="row border-md-bottom pb-2 text-center text-md-start">
            <div class="col-12 col-md-9">
                <h1 class="fw-light"><i class="fas fa-shopping-basket fa-fw"></i> Checkout Order</h1>
            </div>
        </div>
        <div class="row mx-2 py-2 mb-2 border-bottom bg-white rounded-3 shadow-sm">
            <div class="col">
                <p class="mb-0">Your have nothing yet in your order basket :(</p>
                <small> Order some meal now.</small>
            </div>
        </div>
    <?php } ?>
</div>