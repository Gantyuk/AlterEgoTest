<?php include("nav_bar.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div id="erorrs"></div>
            <div class="tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <!--<li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab"
                                                              data-toggle="tab">sign in</a></li>-->
                    <li role="presentation"><a href="#" aria-controls="profile" role="tab" data-toggle="tab">Редагувати
                            профіль</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade in active" id="Section2">
                        <form class="form-horizontal" id="signup" action="php/signup.php" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Логин:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="login"
                                       value="<?= @$_SESSION['loget_user']['log'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ім'я:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                       value="<?= @$_SESSION['loget_user']['name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Прізвище:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="surname"
                                       value="<?= @$_SESSION['loget_user']['SurName'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email:</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                       value="<?= @$_SESSION['loget_user']['email'] ?>">
                            </div>
                            <div class="form-group">
                                <div class="main-checkbox">
                                    <input id="chech" name="check" type="checkbox" value="value1">
                                </div>
                                <span class="text">Змінити проль.</span>
                            </div>
                            <div style="display:none" id="pass">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Введіть старий пароль:</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                           name="password_chek">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Введіть новий пароль:</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                           name="password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Введіть новий пароль ще раз:</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                           name="password1">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Зберегти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div><!-- /.col-md-offset-3 col-md-6 -->
    </div><!-- /.row -->
</div><!-- /.container -->
<script type='text/javascript' src='/jquery.js'></script>
<script type='text/javascript' src='/script.js'></script>

</body>
</html>