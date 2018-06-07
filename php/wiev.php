<?php include ("html/nav_bar.php");

if (isset($_SESSION['loget_user'])): ?>
    <div class="container">
        <div class="row">
            <img src="/img.png" alt="">
        </div>
    </div>
<?php else: ?>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div id="erorrs"></div>

                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab"
                                                                  data-toggle="tab">Авторизуватися</a></li>
                        <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab"
                                                   data-toggle="tab">Зареєструватися</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                            <form class="form-horizontal" id="login" action="php/login.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Логін</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="login">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Пароль</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                           name="password">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Авторизуватися</button>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Section2">
                            <form class="form-horizontal" id="signup" action="php/signup.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Логин:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="login">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ім'я:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Прізвище:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="surname">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email:</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Введіть пароль:</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                           name="password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Введіть пароль ще раз:</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                           name="password1">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Зареєструватися</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div><!-- /.col-md-offset-3 col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
<?php endif; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type='text/javascript' src='/jquery.js'></script>
<script type='text/javascript' src='/script.js'></script>
</body>
</html>