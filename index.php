<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
<?php

	if(!isset($_SESSION['login_id'])){
        header('location:login.php');
    }
    
        
    include 'database/DBController.php';
  
  include 'header.php'  
  
?>
<?php if($_SESSION['login_view_folder'] == 'manager/'){?>
    <?php ob_start(); ?>
    <?php include $_SESSION['login_view_folder'].'sidebar.php' ?>
    <?php include 'topbar.php' ?>
<?php }else{ ?>
    <?php include 'topbar_pos.php' ?>
<?php } ?>


<?php 
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    if(!file_exists($_SESSION['login_view_folder'].$page.".php")){
        include '404.html';
    }else{
    include $_SESSION['login_view_folder'].$page.'.php';

    }
?>
<script type="text/javascript">
    $(document).ready(function(){
        var status = "<?= $_GET['status']; ?>";         
        if (status == 'updated'){
            success_update();
        }else if (status == 'fail_updated') {
            fail_update();
        }else if (status == 'added'){
            success_add()
        }else if (status == 'fail_added'){
            fail_add()
        }else if (status == 'deleted'){
            success_delete()
        }else{
            fail_delete()
        }    
    }); 
</script>
<script type="text/javascript">
    $(document).ready(function(){
      //jquery for toggle sub menus
      $('.sub-btn').click(function(){
        $(this).next('.sub-menu').slideToggle();
        $(this).find('.dropdown').toggleClass('rotate');
      });

      //jquery for expand and collapse the sidebar
      $('.menu-btn').click(function(){
      $('.sidebar').removeClass('inactive');
      $('.menu-btn').css("visibility", "hidden");
      });
      $('.close-btn').click(function(){
      $('.sidebar').addClass('inactive');
      $('.menu-btn').css("visibility", "visible");
      });
    }); 
  </script>
<?php include './footer.php' ?>
</body>
</html>



