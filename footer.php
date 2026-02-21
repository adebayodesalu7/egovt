<!-- Footer -->
<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="social-links">
                <span><?php _e('Follow us:', 'egovt'); ?></span>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <div class="footer-main">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <div class="logo">
                        <div class="logo-icon">
                            <i class="fas fa-city"></i>
                        </div>
                        <div class="logo-text"><?php bloginfo('name'); ?></div>
                    </div>
                    <p><?php echo get_theme_mod('egovt_address', '95 FF3, App Street Avenue, NSW 96209, Canada'); ?></p>
                    <p><i class="fas fa-phone"></i> <?php echo get_theme_mod('egovt_phone', '1800 123 4567'); ?></p>
                    <p><i class="fas fa-envelope"></i> <?php echo get_theme_mod('egovt_email', 'demo@example.com'); ?></p>
                    <p><i class="fas fa-clock"></i> <?php echo get_theme_mod('egovt_hours', 'Mon - Fri: 8:00 am - 6:00 pm'); ?></p>
                </div>

                <div class="footer-links">
                    <h4><?php _e('Quick Links', 'egovt'); ?></h4>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => '',
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ));
                    ?>
                </div>

                <div class="footer-links">
                    <h4><?php _e('Services', 'egovt'); ?></h4>
                    <ul>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Birth Certificate</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Marriage License</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Business Permits</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Property Tax</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Utility Bills</a></li>
                    </ul>
                </div>

                <div class="footer-newsletter">
                    <h4><?php _e('Newsletter', 'egovt'); ?></h4>
                    <p><?php _e('Subscribe to get the latest updates from the city.', 'egovt'); ?></p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="<?php esc_attr_e('Your Email', 'egovt'); ?>" required>
                        <button type="submit" class="btn btn-primary"><?php _e('Subscribe', 'egovt'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'egovt'); ?></p>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button class="back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>

<?php wp_footer(); ?>
</body>
</html>
