<div class="container my-5">
    <div class="row border-md-bottom pb-2 text-center text-md-start">
        <div class="col-12 col-md-9">
            <h1 class="fw-light"><i class="fas fa-user fa-fw"></i> Choose A Table</h1>
        </div>
    </div>
    <div class="row pb-2">
        <?php
        if (isset($tables) && $tables !== false) {
        ?>
            <div class="col m-2 p-4 bg-white rounded-3 shadow-smm-2 p-4 bg-white rounded-3 shadow-sm">
                test
            </div>
        <?php
        } else {
            echo  '<div class="col">No table were available.</div>';
        } ?>
    </div>
</div>