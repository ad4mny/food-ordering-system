<div class="col">
    <div class="row pb-1 border-bottom">
        <div class="col">
            <h1 class="fw-light d-flex align-items-center"><i class="fas fa-bars fa-fw fa-xs me-2"></i> Cafe's Table</h1>
        </div>
    </div>
    <div class="row py-3">
        <div class="col">
            <form class="row" method="post" action="<?php echo base_url(); ?>admin/table/add/submit">
                <div class="col"><input type="number" class="form-control" name="name" placeholder="Enter table number"></div>
                <div class="col"><button type="submit" class="btn btn-primary">Add</button></div>
            </form>
        </div>
    </div>
    <div class="row row-cols-4 g-3">
        <?php if (isset($tables) && is_array($tables) && $tables !== false) {
            foreach ($tables as $row) { ?>
                <div class="col">
                    <div class="bg-white rounded-3 shadow py-2 px-4 position-relative">
                        <h5 class=" text-capitalize fw-bold mb-0 m-auto">Table <?php echo $row['td_name']; ?></h5>
                        <a href="<?php echo base_url() . 'admin/table/delete/' . $row['td_id']; ?>" class="btn btn-danger btn-sm position-absolute end-0 top-0 m-1">
                            <i class="fas fa-times fa-fw fa-sm"></i>
                        </a>
                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="col d-inline-flex bg-white rounded-3 shadow py-2 px-4 position-relativ">
                <p class="mb-0">No registered vendor.</p>
            </div>
        <?php } ?>
    </div>
</div>