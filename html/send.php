<?php include("nav_bar.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div id="erorrs"></div>

            <div class="tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#" aria-controls="home" role="tab"
                                                              data-toggle="tab">Надіслати</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                        <form class="form-horizontal" id="send" action="php/send.php" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Логин отримувача</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="login_user_resiv">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">СМС</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                       name="mesage">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Відправити</button>
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
