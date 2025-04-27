
			<?php

				$currentUrl = $_SERVER['REQUEST_URI'];

				$isAuthPage = strpos($currentUrl, "/signin") || strpos($currentUrl, "/signup") || strpos($currentUrl, "/forgot-password");

				if(!$isAuthPage):
			?>
				<footer class="footer">
						<div class="content has-text-centered">
							<p>
								O código fonte é licenciado sob a
								<a href="http://opensource.org/licenses/mit-license.php" target="_blank" rel="noopener" aria-label="Acessar página da licença MIT">MIT Licence</a>. O conteúdo do site é licenciado pela <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank" rel="noopener" aria-label="Acessar página da licença MIT">CC BY NC SA 4.0</a>.
							</p>
						</div>
						<hr>
						<div class="container">
							<div class="columns is-centered">
								<div class="column is-narrow">
									<a href="https://github.com/SilasRodrigues19" target="_blank" rel="noopener" aria-label="Acessar o perfil de Silas Rodrigues no GitHub"><span class="iconify is-size-3" data-icon="fe:github"></span></a>
								</div>
								<div class="column is-narrow">
									<a href="https://wa.me/551992576970" target="_blank" rel="noopener" aria-label="Entrar em contato com Silas Rodrigues pelo WhatsApp"><span class="iconify is-size-3" data-icon="ri:whatsapp-fill"></span></a>
								</div>
								<div class="column is-narrow">
									<a href="https://www.linkedin.com/in/silasrodrigues19/" target="_blank" rel="noopener" aria-label="Entrar em contato com Silas Rodrigues pelo LinkedIn"><span class="iconify is-size-3" data-icon="entypo-social:linkedin-with-circle"></span></a>
								</div>
							</div>
						</div>
						<hr>
						<div class="content has-text-centered">
							<p>
								&copy; <?= date('Y') ?> Todos os direitos reservados. Desenvolvido por <a href="https://silasrodrigues.vercel.app/" rel="noopener" aria-label="Acessar o Portfolio de Silas Rodrigues">Silas Rodrigues</a>.
							</p>
						</div>
						<div class="fixed-button is-relative has-text-right">
							<a id="smoothScroll" href="#top" class="is-fixed" rel="noopener" aria-label="Voltar ao topo da página">
								<span class="iconify is-size-2 is-rounded" data-icon="solar:round-alt-arrow-up-bold"></span>
							</a>
						</div>
					</footer>
				<?php endif; ?>
				<script src="<?= base_url('public/libraries/sweetalert2/sweetalert2.min.js'); ?>"></script>
				<script src="<?= base_url('public/libraries/jquery/jquery.min.js'); ?>"></script>
				<script src="<?= base_url('public/libraries/iconify/iconify.min.js'); ?>"></script>
				<script src="<?= base_url('public/libraries/select2/select2.min.js'); ?>"></script>
				<script src="<?= base_url('public/libraries/gsap/gsap.min.js') ?>"></script>
				<script src="<?= base_url('public/js/script.js'); ?>"></script>
	</body>
</html>