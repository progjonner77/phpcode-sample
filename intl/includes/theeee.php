
<div class="floating-chat">

    <i class="fa fa-comments-o" aria-hidden="true"></i>

    <!-- register form -->
    <div class="log_reg" style="margin-top: 0px">

        <div class="row">
            <button class=" header_button" style="text-align: left;color: #ff0455;font-size: 24px;">
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>
            <div style="margin-top:0px">

                <form action="" id="log_reg">
                    <b class="col-md-10 col-md-offset-2">

                        <h3 class="Error">You need to Register First......</h3>
                    </b>
                    <div class="col-md-8 form-group col-md-offset-3">
                        <label calss="form-control">Email</label>
                        <input class="form-control email" type="email">
                    </div>
                    <div class="col-md-8 form-group col-md-offset-3">
                        <label calss="form-control">Username</label>
                        <input class="form-control username" type="text">
                    </div>
                    <div class="col-md-8 form-group col-md-offset-3">
                        <label calss="form-control">Password</label>
                        <input class="form-control password" type="password">
                    </div>
                    <div class="col-md-8 form-group col-md-offset-3">
                        <label calss="form-control">Re-Password</label>
                        <input class="form-control confirm_password" type="password">
                    </div>
                    <div class="col-md-12 col-lg-10 form-group col-md-offset-1">
                        <div class="col-md-5 form-group">
                            <input class="form-control btn btn-danger" value="Register" type="submit">
                        </div>
                        <div class="col-md-5 form-group">
                            <button class="btn btn-info form-control log_in_switch">Login</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- login form -->
    <div class="log" style="margin-top: -139px">

        <div class="row">

            <div style="margin-top:0px">
                <button class=" header_button" style="text-align: left;color: #ff0455;font-size: 24px;">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
                <form action="" id="log">
                    <b class="col-md-10 col-md-offset-2">
                        <h3 class="Error_in">You need to login First......</h3>
                    </b>
                    <div class="col-md-8 form-group col-md-offset-3">
                        <label calss="form-control">Email</label>
                        <input class="form-control email_in" type="email">
                    </div>
                    <div class="col-md-8 form-group col-md-offset-3">
                        <label calss="form-control">Password</label>
                        <input class="form-control password_in" type="password">
                    </div>
                    <div class="col-md-10 form-group col-md-offset-2">
                        <div class="col-md-5 form-group">
                            <input class="form-control btn btn-danger" value="Login" type="submit">
                        </div>
                        <div class="col-md-5 form-group">
                            <button class="btn btn-info form-control log_reg_switch">Register</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="chat">
        <div>
            <button class=" header_button" style="text-align: left;">
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>
            <span class="seen" style="padding-left: 33%;">

            </span>
        </div>

        <div class="header">


        </div>

        <ul class="messages">
            <!-- <li class="other">asdasdasasdasdasasdasdasasdasdasasdasdasasdasdasasdasdas</li>
<li class="other">Are we dogs??? 🐶
</li>
<li class="self">no... we're human</li>
<li class="other">are you sure???</li>
<li class="self">yes.... -___-</li>
<li class="other">if we're not dogs.... we might be monkeys 🐵</li>
<li class="self">i hate you</li>
<li class="other">don't be so negative! here's a banana 🍌 </li>
<li class="self">......... -___-</li> -->
        </ul>
        <div class="footer">
            <div class="text-box" hidden>
                <input type="text" class="check">
            </div>
            <textarea id="text-box" john="" contenteditable="true" cols="30" rows="10"></textarea>
<button id="sendMessage"><i id="plane" style="font-size:xx-large" class="fa fa-paper-plane-o"></i></button>

        </div>
    </div>
</div>