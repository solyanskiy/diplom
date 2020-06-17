
    <div class="portfolio_area eco--pd--100" id="portfolio_preview">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row"><!-- Вывод карточек -->



                                <div class="col-sm-6 single_portfolio">
                                <div class="inner">
                                <?php
                                echo '<img src="' . $GeneralSettings['pathDirServices'] . $Service['name'] . '/' . $Service['preview'] . '" alt="">';

                                echo '<div class="portfolio_content">';
                                echo '<a href="#" class="h3">' . $service['name'] . '</a>';


                                ?>

                                </div>
                                </div>
                                </div>

                    <div class="col-sm-6 single_portfolio">
                        <div class="inner">
                            <?php echo '<form class="form-signin" role="form" method="post" action="/cms/download/' . $Service['id'] . '">' ?>

                                <div class="inputItemLoginForm">
                                    <h3 class="form-signin-heading">Редактирование</h3>
                                    <p>Укажите цвет <input type="color" name="color" list="colorList"></p>
                                    <datalist id="colorList">
                                        <option value="#ff0000" label="Красный">
                                        <option value="#008000" label="Зелёный">
                                        <option value="#0000ff" label="Синий">
                                    </datalist>
                                    <input type="text" name="title" class="form-control" placeholder="Название сайта" required autofocus>
                                    <input type="file" name="name" class="form-control" placeholder="Логотип" required autofocus>
                                    <input type="text" name="number" class="form-control" placeholder="Номер телефона" required autofocus>
                                    <input type="text" name="email" class="form-control" placeholder="Email" required autofocus>
                                    <?php
                                    echo '<input type="text" hidden name="path" value="' . $GeneralSettings['pathDirServices'] . $Service['name'] . '/' . $Service['name'] . '">';
                                    ?>
                                    <!--<button class="eco--btn submitLoginForm" type="submit">Скачать</button>-->
                                    <?php
                                    echo '<a href="' . $GeneralSettings['pathDirServices'] . $Service['name'] . '/' . $Service['name'] . '.7z" class="eco--btn eco--bordered smoothScroll">Скачать</a>';
                                    ?>
                                    </div>
                            </form>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.portfolio_area -->
