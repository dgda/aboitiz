

        </main>
		<?php if($last != 'admin'): ?>
        <footer class="page-footer neutral">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <p class="grey-text text-darken-1 light"><strong>Credits!</strong> This is to show appreciation, credits, and gratitude to those who own the resources used in this website.</p>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright carbon">
                    <div class="container">
                        © <?= date('Y') ?> Team 602
                        <!--<a class="grey-text text-lighten-4 right" href="#!">More Links</a>-->
                    </div>
                </div>
            </div>
        </footer>
		<?php endif; ?>
        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://unpkg.com/sweetalert2@7.22.2/dist/sweetalert2.all.js"></script>
        <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
        <script src="https://unpkg.com/promise-polyfill"></script>
    </body>
</html>