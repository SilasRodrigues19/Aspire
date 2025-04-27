<section class="hero is-link banner">
  <?= showMessage(); ?>
  <div class="hero-body">
    <p class="title">
      Sobre
    </p>
    <p class="subtitle mt-4">
      Como surgiu o projeto e qual é o seu propósito.
    </p>
    <div class="level-right item-menu">
      <p class="level-item">
        <a href="<?= base_url('/') ?>">
          <span class="iconify mr-2" data-icon="entypo:home"></span>
          <strong class="is-hidden-mobile">
            Início
          </strong>
        </a>
      </p>
      <p class="level-item">
        <a href="<?= base_url('/job/new') ?>">
          <span class="iconify mr-2" data-icon="majesticons:textbox-plus"></span>
          <span class="is-hidden-mobile">
            Publicar
          </span>
        </a>
      </p>
      <p class="level-item">
        <a href="<?= base_url('/job/archived') ?>">
          <span class="iconify mr-2" data-icon="bxs:archive-in"></span>
          <span class="is-hidden-mobile">
            Arquivadas
          </span>
        </a>
      </p>
      <?php if ($this->session->userdata('usuario')) : ?>
      <p class="level-item">
        <a href="<?= base_url('/job/published') ?>">
          <span class="iconify mr-2" data-icon="mdi:list-box"></span>
          <span class="is-hidden-mobile">
            Minhas vagas
          </span>
        </a>
      </p>
      <?php endif; ?>
      <?php $this->load->view('templates/logged_in_header.php') ?>
    </div>
  </div>
</section>

<section class="section my-6">
  
  <ol class="breadcrumb is-right" aria-label="breadcrumbs">
    <?php echo $breadcrumb_default_style; ?>
  </ol>

  <h1 class="title has-text-grey-dark">Sobre o projeto.</h1>
  <h2 class="subtitle mt-4 about-text">
    Este projeto foi feito com o objetivo de organizar em um único lugar diversas vagas que são encontradas em outros sites de vagas.
  </h2>

  <h2 class="subtitle mt-4 about-text">
    Aqui, qualquer pessoa pode publicar uma vaga que viu em algum lugar, basta preencher os campos necessários e publicar. Essas vagas publicadas
    são listadas na página inicial em formato de cartões e a pessoa que acessar para visualizar pode facilmente encontrar as informações que ela
    está a procura, inclusive existe um filtro no cabeçalho que pode auxilizar para encontrar mais facilmente alguma informação.
  </h2>

  <script type="text/javascript">
    atOptions = {
      'key': 'e5e496ae959b531de0a6b8961032e181',
      'format': 'iframe',
      'height': 60,
      'width': 468,
      'params': {}
    };
    document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.profitabledisplaynetwork.com/e5e496ae959b531de0a6b8961032e181/invoke.js"></scr' + 'ipt>');
  </script>

</section>

<hr>

<section class="section my-6">
  <h1 class="title has-text-grey-dark">Informações para desenvolvedores.</h1>
  <h2 class="subtitle mt-4 about-text">
    O projeto foi feito utilizando o framework CodeIgniter 3, que é um framework PHP que utiliza o padrão MVC (Model, View, Controller) e
    foi feito com o objetivo de ser um framework leve e simples de usar, porém com muitas funcionalidades que facilitam o desenvolvimento de
    aplicações web. Para a parte de estilização foi utilizado o framework Bulma e algumas coisas mais especificas feitas a mão com a ajuda do
    pré processador SASS e os dados são salvos em um banco de dados MySQL.
  </h2>

  <h2 class="subtitle mt-4 about-text">
    O projeto é <em>open-source</em> e está hospedado no GitHub que pode ser acessado através
    <a href="https://github.com/SilasRodrigues19/Aspire" target="_blank">deste link.</a>
  </h2>

  <script type="text/javascript">
    atOptions = {
      'key': 'b6488435be0b215edaf3c67b517cb011',
      'format': 'iframe',
      'height': 50,
      'width': 320,
      'params': {}
    };
    document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.profitabledisplaynetwork.com/b6488435be0b215edaf3c67b517cb011/invoke.js"></scr' + 'ipt>');
  </script>

  <script async="async" data-cfasync="false" src="//pl19729442.highrevenuegate.com/2220ae0c12cb7b5eb95ee59fc92d45c6/invoke.js"></script>
  <div id="container-2220ae0c12cb7b5eb95ee59fc92d45c6"></div>

</section>