<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('database/DBController.php');

if(isset($_SESSION['login_id']))
    header("location:index.php?page=home");

include 'header.php' ?>
<body style="min-height: 100vh; background: url(assets/img/banner.jpg)no-repeat; background-size: cover; background-position: center;">
    <div class="login-wrapper">
        <section class="left">
            <br>
            <br>
            <img class="vsu" src="./assets/img/vsulogo.png" alt="logo">
            <h1>Office of the Vice President for Research,
                Extension and Innovation
            </h1>
            <div class="outline" style="background-color:#fff; width:500px; height:1px; margin: 0 auto;"></div>
            <h2>Pasalubong Center Business Management System
            </h2>
        </section>
        <section class="right">
            <form action="" class="login_form">
                <h2>Log In</h2>
                <div class="form-element">
                    <label for="usename">Username</label>
                    <input type="text" name="username" id="email" placeholder="Enter Username" required>
                </div>
                <div class="form-element">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Password" required>
                </div>
                <div class="form-element">
                    <input type="checkbox" name="" id="remember">
                    <label for="remember">Remember Me</label>
                </div>
                <div class="form-element">
                    <button type="submit" id="login_button" class="btn btn-block">Log In</button>
                </div>
                <div class="form-element">
                    <a href="#">Forgot Password</a>
                </div>

            </form>
            <div class="mydiv"></div>
        </section>
    </div>
<script src="./assets/dist/js/toastr.min.js"> </script>
    <script>
        $(document).ready(function(){
            $('.login_form').submit(function(e){
            e.preventDefault()
            start_load()
            if($(this).find('.alert-danger').length > 0 )
                $(this).find('.alert-danger').remove();
            $.ajax({
            url:'ajax.php?action=login',
            method:'POST',
            data:$(this).serialize(),
            error:err=>{
                console.log(err)
                end_load();

            },
            success: function(resp){
                console.log(resp);
                //document.getElementById("mydiv").innerHTML += resp; 
                if(resp == 1){
                    //success_login();    
                    location.href ='index.php?page=home';
                }else{
                    invalid_login();
                    end_load();
                }
            }
            });
        });
        }); 
  </script>
  <script>
    window.start_load = function(){
    $('body').prepend('<div id="preloader2"></div>')
    }
    window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
        })
    }
</script>
<script>
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "3000",
    "extendedTimeOut": "5000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  function invalid_login(){
    toastr.error("Invalid Username or Password");
  }
</script>
</body>
</html>