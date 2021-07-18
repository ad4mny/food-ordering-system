<div class="col">
    <div class="row pb-1 border-bottom">
        <div class="col">
            <h1 class="fw-light d-flex align-items-center"><i class="fas fa-tasks fa-fw fa-xs me-2"></i> Active Orders</h1>
        </div>
    </div>
    <div class="row py-1 d-flex align-items-center justify-content-center text-center">
        <div class="col-1"><small>NO</small></div>
        <div class="col-4 text-start"><small>ORDER INFORMATION</small></div>
        <div class="col"><small>PRICE</small></div>
        <div class="col"><small>QUANTITY</small></div>
        <div class="col"><small>STATUS</small></div>
        <div class="col"><small>ACTION</small></div>
    </div>
    <?php if (isset($orders) && is_array($orders) && $orders !== false) {
        $i = 0;
        foreach ($orders as $row) { ?>
            <div class="row bg-white rounded-3 shadow mb-2 py-2 d-flex align-items-center justify-content-center text-center">
                <div class="col-1">
                    <p class="mb-0 text-capitalize"><?php echo ++$i; ?></p>
                </div>
                <div class="col-4 text-start">
                    <p class="mb-0 text-capitalize"><?php echo $row['cd_name']; ?></p>
                </div>
                <div class="col">
                    <p class="mb-0">RM <?php echo number_format((float)$row['cd_price'], 2, '.', ''); ?></p>
                </div>
                <div class="col">
                    <?php echo $row['od_quantity']; ?>x
                </div>
                <div class="col">
                    <?php echo $row['od_status']; ?>
                </div>
                <div class="col">
                    <a href="<?php echo base_url() . 'vendor/orders/ready/' . $row['od_id']; ?>" class="btn btn-success btn-sm">
                        <i class="fas fa-check fa-fw fa-sm"></i>
                    </a>
                    <a href="<?php echo base_url() . 'vendor/orders/delete/' . $row['od_id']; ?>" class="btn btn-danger btn-sm">
                        <i class="fas fa-times fa-fw fa-sm"></i>
                    </a>
                </div>
            </div>
        <?php }
    } else { ?>
        <div class="row bg-white rounded-3 shadow-sm mb-2 py-2 d-flex align-items-center justify-content-center text-center">
            <div class="col">
                <p class="mb-0">No available orders.</p>
            </div>
        </div>
    <?php } ?>
</div>