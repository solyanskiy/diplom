
    <div class="portfolio_area eco--pd--100" id="portfolio_preview">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <form class="form-addreview" role="form" method="post" action="/review/addreview">
                        <h3 class="form-addreview-heading">Новый отзыв</h3>
                        <div class="formAddTags">
                            <input type="text" name="itemfromWhom" class="form-control" placeholder="Ваш псевдоним" required
                                   autofocus>
                            <input type="text" name="itemdescription" class="form-control" placeholder="Отзыв" required>
                            <input type="text" name="itemfeedback" class="form-control" placeholder="Как с Вами связаться">
                            <button class="eco--btn" type="submit">Добавить отзыв</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php
                        foreach ($Reviews as $review) {

                            echo '<div class="col-sm-8 single_portfolio">';
                            echo '<div class="inner">';
                            echo '<p><b>От</b>: ' . $review['fromWhom'] . '</p>';
                            echo '<p>' . $review['description'] . '</p>';
                            echo '<p><b>Ответ компании: </b>' . $review['answerCompany'] . '</p>';
                            echo '</div></div>';

                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.portfolio_area -->