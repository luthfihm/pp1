<?php
/**
 * Created by PhpStorm.
 * User: luthfi
 * Date: 16/02/2015
 * Time: 6:58
 */

?>
<section class="panel">
    <header class="panel-heading wht-bg">
        <h4 class="gen-case">Manajemen Pengguna

        </h4>
    </header>
    <div class="panel-body minimal">
        <form class="form-horizontal" role="form" id="change_form">
            <div class="form-group">
                <label for="username" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-5">
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo GetUserLoggedIn(); ?>">
                </div>
            </div>
            <div class="form-group" id="group-old-pass">
                <label for="old_pass" class="col-sm-3 control-label">Old Password</label>
                <div class="col-sm-5">
                    <input type="password" name="old_pass" class="form-control" id="old_pass" placeholder="Old Password">
                    <span class="fa fa-warning-sign form-control-feedback" id="pass_wrong" style="display:none"></span>
                </div>
            </div>
            <div class="form-group" id="group-new-pass">
                <label for="password" class="col-sm-3 control-label">New Password</label>
                <div class="col-sm-5">
                    <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
                    <span class="fa fa-warning-sign form-control-feedback" id="new_wrong" style="display:none"></span>
                </div>
            </div>
            <div class="form-group" id="group-pass1">
                <label for="password1" class="col-sm-3 control-label">Re-type Password</label>
                <div class="col-sm-5">
                    <input type="password" name="password1" class="form-control" id="password1" placeholder="Re-type Password">
                    <span class="fa fa-warning-sign form-control-feedback" id="pass1_wrong" style="display:none"></span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-5">
                    <button type="submit" class="btn btn-default btn-sm" id="btn-submit">Change</button>
                    <img src="../assets/img/loading.gif" alt="" id="loading" style="display: none;"/>
                    <div id="CallBack"></div>
                </div>
            </div>

        </form>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function(){
        var class_error = "has-error has-feedback";
        $("#change_form").submit(function(){
            $("#btn-submit").hide();
            $("#loading").show();
            $("#new_wrong").css("display","none");
            $("#group-new-pass").removeClass(class_error);
            $("#pass1_wrong").css("display","none");
            $("#group-pass1").removeClass(class_error);
            $("#pass_wrong").css("display","none");
            $("#group-old-pass").removeClass(class_error);
            $.ajax({
                type	: "POST",
                url 	: "../modules/ajax/admin.php?cek_pass",
                data	: {
                    username : "<?php echo GetUserLoggedIn(); ?>",
                    password : $("#old_pass").val()
                },
                success	: function(html){
                    if (html == 'true'){
                        var pass = $("#password").val();
                        var pass1 = $("#password1").val();
                        if (pass == ""){
                            $("#loading").hide();
                            $("#btn-submit").show();
                            $("#new_wrong").css("display","block");
                            $("#group-new-pass").addClass(class_error);
                            $("#password").focus();
                        }else if (pass != pass1){
                            $("#loading").hide();
                            $("#btn-submit").show();
                            $("#pass1_wrong").css("display","block");
                            $("#group-pass1").addClass(class_error);
                            $("#password1").focus();
                        }else{
                            var user = $("#username").val();
                            $.ajax({
                                type	: "POST",
                                url 	: "../modules/ajax/admin.php?change_pass",
                                data	: {
                                    username : user,
                                    password : pass
                                },
                                success : function(html){
                                    if (html == "true"){
                                        $("#loading").hide();
                                        $("#CallBack").html("<div class='alert alert-success'>Berhasil! Silakan login kembali!</div>");
                                        window.location = "index.php?logout";
                                    }else{
                                        $("#loading").hide();
                                        $("#btn-submit").show();
                                        $("#CallBack").html("<div class='alert alert-danger'>Gagal!</div>");
                                    }
                                }
                            });
                        }
                    }else{
                        $("#loading").hide();
                        $("#btn-submit").show();
                        $("#pass_wrong").css("display","block");
                        $("#group-old-pass").addClass(class_error);
                        $("#old_pass").focus();
                    }
                }
            });
            return false;
        });
    });
</script>