<div class="col">
    <div class="row pb-1 border-bottom">
        <div class="col">
            <h1 class="fw-light d-flex align-items-center"><i class="fas fa-bars fa-fw fa-xs me-2"></i> Dashboard</h1>
        </div>
    </div>
    <?php if (isset($dashboards) && is_array($dashboards) && $dashboards !== false) { ?>
        <div class="row bg-white rounded-3 shadow mb-2 p-4">
            <div class="col">
                <p class="mb-0">Registered Vendor</p>
                <h3 class="fw-bold mb-0"><?php echo $dashboards['vendor']['value']; ?>(s) Vendor</h3>
            </div>
        </div>
        <div class="row bg-white rounded-3 shadow mb-2 p-4">
            <div class="col">
                <p class="mb-0">Total Order</p>
                <h3 class="fw-bold mb-0"><?php echo $dashboards['total']['value']; ?>(s) Orders</h3>
            </div>
        </div>
        <div class="row bg-white rounded-3 shadow mb-2 p-4">
            <div class="col">
                <p class="mb-0">Total Completed Order</p>
                <h3 class="fw-bold mb-0"><?php echo $dashboards['complete']['value']; ?>(s) Orders</h3>
            </div>
        </div>
        <div class="row bg-white rounded-3 shadow mb-2 p-4">
            <div class="col">
                <p class="mb-0">Total Paid Order</p>
                <h3 class="fw-bold mb-0"><?php echo $dashboards['paid']['value']; ?>(s) Orders</h3>
            </div>
        </div>
        <div class="row bg-white rounded-3 shadow mb-2 p-4">
            <div class="col">
                <p class="mb-0">Total Payment Made</p>
                <h3 class="fw-bold mb-0">RM <?php echo $dashboards['invoice']['value']; ?></h3>
            </div>
        </div>
        <div class="row bg-white rounded-3 shadow mb-2 p-4">
            <div class="col">
                <p class="mb-0">Total Menu Available</p>
                <h3 class="fw-bold mb-0"><?php echo $dashboards['menu']['value']; ?>(s) Menus</h3>
            </div>
        </div>
    <?php
    } ?>
</div>