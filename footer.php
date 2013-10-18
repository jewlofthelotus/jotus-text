    </div>

    <footer>
        <div class="wrapper">
            <div class="left">
                <nav class="social">
                    <h3>Find me on the web...</h3>
                    <ul>
                        <li><a href="http://www.github.com/jewlofthelotus" target="_blank" title="GitHub"><i class="icon-github"></i></a></li>
                        <li><a href="http://www.linkedin.com/in/jewlofthelotus" target="_blank" title="LinkedIn"><i class="icon-linkedin"></i></a></li>
                        <li><a href="http://www.twitter.com/jewlofthelotus" target="_blank" title="Twitter"><i class="icon-twitter"></i></a></li>
                    </ul>
                </nav>

                <div class="rss">
                    <h3>Follow me for-ev-errr...</h3>
                    <a href="<?php bloginfo('rss2_url') ?>" rel="alternate" type="application/rss+xml"><i class="icon-rss"></i></a>
                </div>

                <p class="copy">&copy;<?php print(date('Y')); ?> <a href="http://juliecameron.com">JulieCameron.com</a></p>
            </div>

            <div class="right">
                <div class="tags" class="widget">
                    <h3>What's your fancy?</h3>
                    <div class="tag-cloud">
                        <?php wp_tag_cloud( array( 'number' => 50 ) ); ?>
                    </div>
                </div>

                <div class="search">
                    <h3><label for="s">Looking for something specific?</label></h3>
                    <form role="search" method="get" id="searchform" action="<?php bloginfo('url') ?>">
                        <div>
                            <input name="s" type="text" value="" />
                            <input name="searchsubmit" type="submit" value="Search" />
                        </div>
                    </form>
                </div>

                <div class="devtroit">
                    <a href="http://devtroit.com/" target="_blank"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/jotus-text/img/badge-medium.png" alt="devtroit" /></a>
                </div>
            </div>

            <div class="footer_widgets">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets') ) : else : endif; ?>
            </div>
        </div>
    </footer>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-42525782-1', 'juliecameron.com');
        ga('send', 'pageview');
    </script>

<?php wp_footer(); ?>
</body>
</html>
