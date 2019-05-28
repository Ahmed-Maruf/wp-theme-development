<div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (is_active_sidebar($index = 'footer-left')) {
                        # code...
                        dynamic_sidebar($index = 'footer-left');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    wp_footer();
    ?>
</body>

</html>