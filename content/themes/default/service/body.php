
    <div class="portfolio_area eco--pd--100" id="portfolio_preview">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row"><!-- Вывод карточек -->
                        <?php


                                echo '<div class="col-sm-6 single_portfolio">';
                                echo '<div class="inner">';

                                echo '<img src="' . $GeneralSettings['pathDirServices'] . $Service['name'] . '/' . $Service['preview'] . '" alt="">';

                                echo '<div class="portfolio_content">';
                                echo '<a href="#" class="h3">' . $service['name'] . '</a>';


                                echo '<a href="' . $GeneralSettings['pathDirServices'] . $Service['name'] . '/' . $Service['name'] . '.7z" class="eco--btn eco--bordered smoothScroll">Скачать</a>';

                                if ($PageSettings['authUser']) {

                                    echo '<a href="/refactor/' . $Service['id'] . '" class="eco--btn eco--bordered smoothScroll" style="margin-left: 20px">Редактировать</a>';

                                }
                                echo '</div></div></div>';
                        ?>



                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.portfolio_area -->
