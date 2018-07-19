<footer class="footer">
    <div class="copyright"><? the_field( 'копирайт', 'option' ) ?></div>
</footer>
<!-- Modal -->
<div class="modal fade" id="callback">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
				<?= do_shortcode( '[contact-form-7 id="176" title="Загранпаспорт" html_class="form-white"]' ) ?>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="thanks">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body form-white">
                <p class="title"><? the_field( 'модалка-спасибо', 'option' ) ?></p>
            </div>
        </div>
    </div>
</div>
<? wp_footer() ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter27131513 = new Ya.Metrika({
                    id:27131513,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/27131513" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->



</body>
</html>