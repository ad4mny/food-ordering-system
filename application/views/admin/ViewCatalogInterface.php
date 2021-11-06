<div class="col">
    <div class="row pb-1 border-bottom">
        <div class="col">
            <h1 class="fw-light d-flex align-items-center"><i class="fas fa-columns fa-fw fa-xs me-2"></i> All Vendor Catalog</h1>
        </div>
    </div>
    <div class="row py-1 d-flex align-items-center justify-content-center text-center">
        <div class="col-1"><small>NO</small></div>
        <div class="col-9 text-start"><small>CATALOG INFORMATION</small></div>
        <div class="col"><small>PRICE</small></div>
    </div>
    <?php if (isset($catalogs) && is_array($catalogs) && $catalogs !== false) {
        $i = 0;
        foreach ($catalogs as $row) { ?>
            <div class="row bg-white rounded-3 shadow mb-2 py-2 d-flex align-items-center justify-content-center text-center">
                <div class="col-1">
                    <p class="mb-0 text-capitalize"><?php echo ++$i; ?></p>
                </div>
                <div class="col-2">
                    <?php
                    if ($row['cd_img'] !== null) {
                        echo '<img src="' . base_url() . 'assets/catalog/' . $row['cd_img'] . '" alt="No Image" class="img-fluid" />';
                    } else {
                        echo '<img src="https://dummyimage.com/640x360/f0f0f0/aaa" alt="No Image" class="img-fluid" />';
                    }
                    ?>
                </div>
                <div class="col-7 text-start">
                    <p class="mb-0 text-capitalize fw-bold"><?php echo $row['cd_name']; ?></p>
                    <p class="mb-0"><?php echo $row['cd_desc']; ?></p>
                    <p class="mb-0 text-capitalize text-muted"><?php echo $row['ud_full_name']; ?>'s Shop</p>
                </div>
                <div class="col">
                    RM <?php echo number_format((float)$row['cd_price'], 2, '.', ''); ?>
                </div>
            </div>
        <?php }
    } else { ?>
        <div class="row bg-white rounded-3 shadow-sm mb-2 py-2 d-flex align-items-center justify-content-center text-center">
            <div class="col">
                <p class="mb-0">No available menus.</p>
            </div>
        </div>
    <?php } ?>
</div>