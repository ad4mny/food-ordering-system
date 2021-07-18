<div class="col">
    <div class="row pb-1">
        <div class="col">
            <h1 class="fw-light d-flex align-items-center"><i class="fas fa-columns fa-fw fa-xs me-2"></i> Update Catalog Information</h1>
        </div>
    </div>
    <div class="row bg-white rounded-3 shadow p-4">
        <div class="col-8">
            <form action="<?php echo base_url(); ?>vendor/catalogs/update" method="post" enctype="multipart/form-data">
                <?php if (isset($updates) && is_array($updates) && $updates !== false && !empty($updates)) {
                    foreach ($updates as $row) { ?>
                        <div class="form-group mb-2">
                            <small>PICTURE</small>
                            <?php
                            if ($row['cd_img'] !== null) {
                                echo '<img src="' . base_url() . 'assets/catalog/' . $row['cd_img'] . '" alt="No Image" class="img-fluid" />';
                            } else {
                                echo '<img src="https://dummyimage.com/640x360/f0f0f0/aaa" alt="No Image" class="img-fluid" />';
                            }
                            ?>
                            <input type="file" class="form-control mt-1" name="img" id="img">
                        </div>
                        <div class="form-group mb-2">
                            <small>NAME</small>
                            <input type="text" class="form-control" name="name" value="<?php echo $row['cd_name']; ?>">
                        </div>
                        <div class="form-group mb-2">
                            <small>DESCRIPTION</small>
                            <input type="text" class="form-control" name="desc" value="<?php echo $row['cd_desc']; ?>">
                        </div>
                        <div class="form-group mb-2">
                            <small>PRICE</small>
                            <div class="input-group mb-3">
                                <span class="input-group-text">RM</span>
                                <input type="text" class="form-control" name="price" value="<?php echo $row['cd_price']; ?>">
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col">
                                <input type="hidden" name="id" value="<?php echo $row['cd_id']; ?>">
                                <a href="<?php echo base_url() . 'vendor/catalogs/delete/' . $row['cd_id']; ?>" class="btn btn-danger" href="">Delete</a>
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                <?php  }
                } else {
                    redirect(base_url() . 'vendor/catalogs');
                } ?>
            </form>
        </div>
    </div>
</div>