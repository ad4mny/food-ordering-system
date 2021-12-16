<div class="container my-5">
    <div class="row border-md-bottom pb-2 text-center text-md-start">
        <div class="col-12 col-md-9">
            <h1 class="fw-light"><i class="fas fa-user fa-fw"></i> Choose A Table</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row row-cols-6 g-2 text-dark">
                <?php
                if (isset($tables) && is_array($tables) && $tables !== false) {
                    foreach ($tables as $table) {
                        if ($table['td_ud_id'] === NULL) {
                ?>
                            <div class="col">
                                <a href="<?php echo base_url() . 'table/book/' . $table['td_id']; ?>" class="btn btn-outline-success card p-3 m-2">
                                    <h4> Table <?php echo $table['td_name']; ?> </h4>
                                    <h6> Available </h6>
                                </a>
                            </div>
                        <?php
                        } else if (isset($_SESSION['uid']) && $table['td_ud_id'] === $_SESSION['uid']) {
                        ?>
                            <div class="col d-grid">
                                <a href="<?php echo base_url() . 'table/remove/' . $table['td_id']; ?>" class="btn btn-success bg-warning card p-3 m-2 text-dark">
                                    <h4> Table <?php echo $table['td_name']; ?> </h4>
                                    <h6> Your table </h6>
                                </a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col d-grid">
                                <button href="<?php echo base_url() . 'table/book/' . $table['td_id']; ?>" class="btn btn-danger bg-danger card p-3 m-2" disabled>
                                    <h4> Table <?php echo $table['td_name']; ?> </h4>
                                    <h6> Unavailable </h6>
                                </button>
                            </div>
                <?php
                        }
                    }
                } ?>
            </div>
        </div>
    </div>
</div>