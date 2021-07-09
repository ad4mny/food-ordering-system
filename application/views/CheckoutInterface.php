<div class="container my-5">
    <div class="row m-4 border-md-bottom pb-2 text-center text-md-start">
        <div class="col-12 col-md-9">
            <h2 class="display-4"><i class="fas fa-shopping-basket fa-fw"></i> Checkout</h2>
        </div>
    </div>
    <div class="row pb-2 mb-2 border-bottom ">
        <div class="col-8 col-md-6"><small>Order Information</small></div>
        <div class="col-2 text-center d-none d-md-block"><small>Price</small></div>
        <div class="col-2 text-center d-none d-md-block"><small>Quantity</small></div>
        <div class="col-2 text-end d-none d-md-block"><small>Subtotal</small></div>
    </div>
    <?php if (isset($baskets) && is_array($baskets) && $baskets !== false) {
        $total_price = 0;
        foreach ($baskets as $row) { ?>
            <div class="row pb-2 mb-2 border-bottom">
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
                <div class="col text-center d-none d-md-block">
                    <p>RM <?php echo number_format((float)$row['cd_price'], 2, '.', ''); ?></p>
                </div>
                <div class="col col-md-2 text-end text-md-center">
                    <ul class="pagination pagination-sm justify-content-center">
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
                <div class="col col-md-2 text-end ">
                    <p class="fs-6 fs-5">RM
                        <?php
                        $subtotal = number_format((float)($row['cd_price'] * $_SESSION['order'][$row['cd_id']]), 2, '.', '');
                        $total_price += $subtotal;
                        echo $subtotal;
                        ?>
                    </p>
                </div>
            </div>
        <?php } ?>
    <?php
    } else {
    ?>
        <div class="row">
            <div class="col">
                <p class="mb-0">Nothing yet in your cart :(</p>
                <small> Order some meal now!</small>
            </div>
        </div>
    <?php } ?>
    <?php if (isset($baskets) && is_array($baskets) && $baskets !== false) { ?>
        <div class="row">
            <div class="col-8 col-md-2 offset-md-8">
                <p class="mb-0">Subtotal</p>
                <p class="mb-0">Service Charge (10%)</p>
            </div>
            <div class="col text-end ">
                <p class="mb-0">RM
                    <?php echo number_format((float)($total_price), 2, '.', ''); ?>
                </p>
                <p class="mb-0">RM
                    <?php echo number_format((float)(10 / 100 * $total_price), 2, '.', ''); ?>
                </p>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col offset-md-8">
                <p class="mb-0">Total</p>
            </div>
            <div class="col text-end">
                <h4 class="text-success">RM
                    <?php echo number_format((float)(round($total_price + ((float)(10 / 100 * $total_price)), 1)), 2, '.', ''); ?>
                </h4>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col offset-md-8 text-center text-md-end">
                <a href="<?php echo base_url(); ?>" class="btn btn-success">
                    <i class="fas fa-shopping-basket fa-fw fa-sm"></i>
                    Checkout
                </a>
            </div>
        </div>
    <?php } ?>
</div>