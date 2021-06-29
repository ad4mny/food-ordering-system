<div class="hero-bg">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col rounded-3 bg-white">
                <div class="row m-3 border-bottom">
                    <div class="col">
                        <h2 class="display-4"><i class="uil uil-utensils"></i> Browse Menu</h2>
                    </div>
                    <div class="col-4 m-auto">
                        <div class="input-group">
                            <input type="text" id="search_box" class="form-control" placeholder="Search..">
                        </div>
                    </div>
                </div>
                <div class="row m-3 border-bottom">
                    <div class="col">
                        <?php if(isset($menus) && is_array($menus)) ?>
                        <div class="card-columns m-auto text-center pt-5" id="display_area">
                            <div class="card text-left" style="width: 18rem;">
                                <?php
                                if ($itm_img != null) {

                                    echo '<img class="card-img-top" src="img/menu/' . $itm_img . '" alt="Card image cap">';
                                } else {

                                    echo '<img class="card-img-top" src="https://dummyimage.com/640x360/f0f0f0/aaa" alt="Card image cap">';
                                }
                                ?>
                                <div class="card-body">
                                    <h5 class="card-title text-capitalize"><?php echo $itm_name; ?></h5>
                                    <p class="card-text text-muted"><?php echo $itm_desc; ?></p>
                                    <p class="card-text text-capitalize"><?php echo $itm_shp . "'s Shop"; ?></p>
                                </div>
                                <div class="card-footer text-right" id="<?php echo encryptIt($itm_id); ?>">
                                    <h5 class="card-text float-left text-success">RM <?php echo number_format($itm_prc, 2); ?></h5>
                                    <a href="browse?act=add&id=<?php echo encryptIt($itm_id); ?>" class="btn btn-success ">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <?php ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>