<div class="footer_section layout_padding">
    <div class="container">
        <div class="footer_logo"><a href=""><img src=""></a></div>
        <div class="input_bt">
            
            </div>
            <div class="footer_menu">
                <ul>
                    <li><a href="#"></a></a></li>
                    <li><a href="#"></a></a></li>
                    <li><a href="#"></a></a></li>
                    <li><a href="#"></a></a></li>
                    <li><a href="#"></a></a></li>
                </ul>
            </div>
           <div class="location_main">Contact Person : <a href="#">+62-821-4456-8723</a><br>
        E-mail : <a href="mailto:candiartha@gmail.com">candiartha@gmail.com</a></div>
    </div> 

<!-- footer section end -->
<!-- copyright section start -->
<div class="copyright_section">
    <div class="container">
        <p class="copyright_text">Copyright © <?php echo date('Y')?> All Rights Reserved.</p>
    </div>
    </div>
</div>
<!-- copyright section end -->
<!-- Javascript files-->
<script src="<?= base_url();?>js/jquery.min.js"></script>
<script src="<?= base_url();?>js/popper.min.js"></script>
<script src="<?= base_url();?>js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url();?>js/jquery-3.0.0.min.js"></script>
<script src="<?= base_url();?>js/plugin.js"></script>
<script src="<?= base_url();?>js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?= base_url();?>js/custom.js"></script>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
<!-- sidebar -->
<script>
    function toggleMenu() {
        var menuList = document.getElementById('menuList');

        if (menuList.style.display === 'block') {
            menuList.style.display = 'none';
        } else {
            menuList.style.display = 'block';
        }
    }

    // Adjust menu initially based on screen size
    function adjustMenu() {
        var toggleIcon = document.getElementById('toggleIcon');
        var menuList = document.getElementById('menuList');

        if (window.innerWidth <= 768) {
            toggleIcon.style.display = 'inline-block';
            menuList.style.display = 'none';
        } else {
            toggleIcon.style.display = 'none';
            menuList.style.display = 'block';
        }
    }

    // Call the adjustMenu function on page load and resize
    window.addEventListener('load', adjustMenu);
    window.addEventListener('resize', adjustMenu);
</script>


<script src="<?= base_url();?>assets2/teemplate/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?= base_url();?>assets2/teemplate/js/off-canvas.js"></script>
<script src="<?= base_url();?>assets2/teemplate/js/hoverable-collapse.js"></script>
<script src="<?= base_url();?>assets2/teemplate/js/template.js"></script>
<script src="<?= base_url();?>assets2/teemplate/js/settings.js"></script>
<script src="<?= base_url();?>assets2/teemplate/js/todolist.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="<?= base_url();?>assets2/teemplate/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="<?= base_url();?>assets2/teemplate/vendors/select2/select2.min.js"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="<?= base_url();?>assets2/teemplate/js/file-upload.js"></script>
<script src="<?= base_url();?>assets2/teemplate/js/typeahead.js"></script>
<script src="<?= base_url();?>assets2/teemplate/js/select2.js"></script>