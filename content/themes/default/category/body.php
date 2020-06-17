
    <div class="portfolio_area eco--pd--100" id="portfolio_preview">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <!-- Вывод карточек -->
                        <?php
                        $currentCountPosts = 1;

                        foreach ($ServicesList as $service) {


                                echo '<div class="col-sm-6 single_portfolio">';
                                echo '<div class="inner">';
                                echo '<a href="/service/' . $service['id'] . '" class="portfolio_img">';
                                echo '<img src="' . $GeneralSettings['pathDirServices'] . $service['name'] . '/' . $service['preview'] . '" alt="">';
                                echo '</a>';
                                echo '<div class="portfolio_content">';
                                echo '<a href="#" class="h3">' . $service['name'] . '</a>';
                                echo '</div></div></div>';

                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.portfolio_area -->
