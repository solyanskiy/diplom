
    <div class="preview_area bg-cover" style="background-image: url(../../../cms/Assets/img/preview-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="text-center">
                        <div class="eco--sec--title--white">
                            <a href="aboutus"><h1>Сервисы для каждого</h1></a>
                        </div>
                        <div class="preview_btn eco--mt50">
                            <a href="#portfolio_preview" class="eco--btn eco--bordered smoothScroll">Выбрать готовое</a>
                            &nbsp;
                            <?php
                                if ($PageSettings['authUser']) {
                                    echo '<a href="#" class="eco--btn">Заказать уникальное</a>';
                                    }

                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.preview_area -->

    <div class="portfolio_area eco--pd--100" id="portfolio_preview">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <!-- Вывод карточек -->
                        <?php
                        $currentCountPosts = 1;

                        foreach ($ServicesList as $service) {
                            if ($currentCountPosts <= $GeneralSettings['numberOfDisplayedPosts']) {
                                $currentCountPosts++;
                                echo '<div class="col-sm-6 single_portfolio">';
                                echo '<div class="inner">';
                                echo '<a href="#" class="portfolio_img">';
                                echo '<img src="' . $GeneralSettings['pathDirServices'] . $service['name'] . '/' . $service['preview'] . '" alt="">';
                                echo '</a>';
                                echo '<div class="portfolio_content">';
                                echo '<a href="#" class="h3">' . $service['name'] . '</a>';
                                echo '</div></div></div>';
                            } else {
                                break;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.portfolio_area -->
