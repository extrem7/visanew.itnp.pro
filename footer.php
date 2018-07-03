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
</body>
</html>