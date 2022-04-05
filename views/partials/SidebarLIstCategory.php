<div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Danh Mục</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <?php foreach (listcategories() as $category) { ?>
                                    <li>
                                        <a href="index.php?mod=home&act=productbycategory&id=<?= $category['id'] ?>"><?= $category['category_name'] ?>  (<?= Sum($category['id']) ?>)</a>
                                    </li>
                                <?php } ?>
                                <!-- <li>
                                    <a href="#">Frozen Fish</a>
                                </li> -->

                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Sắp Xếp</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <li>
                                    <a href="index.php?mod=home&act=listproductByFilter&filter=1">Giá từ thấp đến cao</a>
                                </li>
                                <li>
                                    <a href="index.php?mod=home&act=listproductByFilter&filter=2">Giá từ cao đến thấp</a>
                                </li>
                                <li>
                                    <a href="index.php?mod=home&act=listproductByFilter&filter=3">Theo tên từ A -> Z</a>
                                </li>
                                <li>
                                <a href="index.php?mod=home&act=listproductByFilter&filter=4">Xem nhiều</a>
                                </li>
                            </ul>
                        </div>
                    </aside>

                </div>