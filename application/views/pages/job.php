<main id="jobContent" class="is-widescreen is-fullhd has-background-light	hero is-fullheight">

  <div id="loaderOverlay" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content has-text-centered">
      <span class="iconify is-large" data-icon="line-md:loading-loop" data-width="100"data-height="100"></span>
    </div>
  </div>

  <nav class="level p-4 has-position-fixed-on-top w-100 navbar" role="navigation" aria-label="main navigation">

    <a role="button" class="navbar-burger nav-toggle" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>  

    <div id="navbarBasicExample" class="nav-menu">

      <div class="navbar-start">
        <!-- Left side -->
        <div class="level-left navbar-item">
          <div class="level-item">
            <p class="subtitle is-5">
              <?= ($countJobs['countJobs'] == 0) ? 'Nenhuma' : "<strong>" . $countJobs['countJobs'] . "</strong>" ?> <?= ($countJobs['countJobs'] > 1 ? 'vagas publicadas' : 'vaga publicada') ?>
            </p>
          </div>
          <form action="" method="POST" id="form-filter">
            <input type="hidden" name="archivejob_id" id="archivejob_id">
            <input type="hidden" name="deleteId" id="deleteId">
            <div class="level-item">
              <div class="field has-addons">
                <p class="control">
                  <input autocomplete="off" class="input" type="text" name="search" id="search" placeholder="Busque uma vaga" value="<?= $search ?>">
                </p>
                <p class="control">
                  <button class="button" type="submit" name="submitBtn" id="submitBtn">
                    <span class="iconify mr-1" data-icon="line-md:search" data-rotate="270deg"></span>
                    Pesquisar
                  </button>
                </p>
              </div>
            </div>
          </form>
        </div>

        <!-- Right side -->
        <div class="level-right navbar-item navbar-home">
          <p class="level-item">
            <a href="<?= base_url('/job/archived') ?>">
              <span class="iconify has-text-grey mb-.1 mr-2" data-icon="bxs:archive-in"></span>
              <span>Arquivadas</span>
            </a>
          </p>
          <?php if ($this->session->userdata('usuario')) : ?>
            <p class="level-item">
              <a href="<?= base_url('/job/published') ?>">
                <span class="iconify has-text-grey mb-.1 mr-2" data-icon="mdi:list-box"></span>
                <span>Minhas vagas</span>
              </a>
            </p>
          <?php endif; ?>
          <p class="level-item">
            <a href="<?= base_url('/job/about') ?>">
              <span class="iconify has-text-grey mb-.1 mr-2" data-icon="akar-icons:info-fill"></span>
              <span>Sobre</span>
            </a>
          </p>
          <p class="level-item">
            <a href="<?= base_url('/job/new') ?>" class="button is-link is-outlined">
              <span class="iconify mr-2" data-icon="line-md:plus"></span>
              Publicar
            </a>
          </p>

          <?php if ($this->session->userdata('usuario')) : ?>
            <p class="level-item has-text-grey ml-3">
              <span title="<?= "Autenticado como " . $this->session->userdata('usuario')->user_name ?>" class="has-text-weight-bold"><?= $this->session->userdata('usuario')->user_name; ?></span>
              <a href="<?= base_url('logout') ?>" class="button is-light is-small ml-3">Sair</a>
            </p>
          <?php endif; ?>



        </div>
      </div>
    </div>

  </nav>

  <section class="section is-full-vh mt-10">

    <?php foreach ($showJobCount as $idx => $value) : ?>

      <?=
      (isset($search) && strlen($search) > 0 && $showJobCount[$idx]['count'] > 0) ?
        '<p class="my-6">Exibindo <strong>' . $showJobCount[$idx]['count'] . '</strong> ' . ($showJobCount[$idx]['count'] > 1 ? 'resultados' : 'resultado') . ' para: ' .
        '<strong>' . $search . '</strong>
            <span onclick="removeFilter()" class="removeFilter iconify mb--.2" data-icon="line-md:close-circle"></span>
          </p>
        '
        :
        ''
      ?>

    <?php endforeach ?>

    <?=
    (isset($search) && strlen($search) > 0 && $showJobCount[$idx]['count'] == 0) ?
      '<p class="my-6">Nenhum resultado encontrado para: ' .
      '<strong>' . $search . '</strong>
            <span onclick="removeFilter()" class="removeFilter iconify mb--.2" data-icon="line-md:close-circle"></span>
          </p>
        '
      :
      ''
    ?>

    
    <h1 class="title has-text-grey-dark">Vagas publicadas</h1>
    <?= showMessage(); ?>
    <h2 class="subtitle my-6">
      Abaixo você pode encontrar todas as <strong class="has-text-grey-dark">vagas publicadas</strong>, ou utilize o filtro do cabeçalho para buscar por algo.
    </h2>

    <?php $user = $this->session->userdata('usuario'); if ($user && ($user->user_level === 'Mod' || $user->user_level === 'Admin')) : ?>

    <div class="notification is-link is-light my-6" id="reportPost">
      <button onclick="closeWarning();" class="delete m-auto"></button>
      <p>Gerencie as publicações reportadas pelos usuários <a target="_blank" href="<?= base_url('/job/reported') ?>"><strong>nesta página.</strong></a></p>
    </div>

    <?php endif; ?>

     <div class="columns">
        <div class="column is-full">
          <select id="multipleFilter" class="multipleFilter" name="filters[]" multiple>
            <optgroup label="Senioridade">
              <option value="estagio">Estágio</option>
              <option value="trainee">Trainee</option>
              <option value="junior">Júnior</option>
              <option value="pleno">Pleno</option>
              <option value="senior">Sênior</option>
            </optgroup>
            <optgroup label="Modalidade">
              <option value="remoto">Remoto</option>
              <option value="presencial">Presencial</option>
              <option value="hibrido">Híbrido</option>
            </optgroup>
            <optgroup label="Contrato">
              <option value="clt">CLT</option>
              <option value="pj">PJ</option>
            </optgroup>
            <optgroup label="Moeda">
              <option value="real">Real R$</option>
              <option value="dollar">Dollar $</option>
              <option value="euro">Euro €</option>
            </optgroup>
          </select>
        </div>
    </div>

    <div class="notification is-transparent my-2" id="rollBackReportNotification">
      <span onclick="revertWarning();" class="iconify rollback" data-icon="grommet-icons:revert"></span>
    </div>

    <div id="jobList">
      <?php if ($showJob) : ?>
        <?php foreach ($showJob as $idx => $value) : ?>
          <?php if (!$showJob[$idx]['job_is_archived']) : ?>
            <div class="card my-4">
              <header class="card-header py-4">
                <p class="card-header-title">
                  <?= $showJob[$idx]['job_title']; ?>
                </p>
                <?php
                $user = $this->session->userdata('usuario');
                if ($user && ($user->user_level === 'Mod' || $user->user_level === 'Admin')) :
                ?>
                  <button class="card-header-icon" aria-label="Arquivar vaga">
                    <span class="icon tooltip" data-tooltip="Arquivar vaga" data-placement="top">
                      <span onclick="return handleArchiving( '<?= $showJob[$idx]['job_id'] ?>' , '<?= $showJob[$idx]['job_title'] ?>' )" class="iconify" data-icon="material-symbols:archive"></span>
                    </span>
                  </button>
                <?php endif; ?>
                <?php if ($user && $user->user_level === 'Admin') : ?>
                  <button class="card-header-icon" aria-label="Deletar vaga">
                    <span class="icon tooltip" data-tooltip="Deletar vaga" data-placement="top">
                      <span onclick="return handleDelete( '<?= $showJob[$idx]['job_id'] ?>' , '<?= $showJob[$idx]['job_title'] ?>' )" class="iconify" data-icon="solar:trash-bin-minimalistic-bold"></span>
                    </span>
                  </button>
                <?php endif; ?>
                <button class="card-header-icon" aria-label="Reportar vaga">
                  <span class="icon tooltip" data-tooltip="Reportar vaga" data-placement="top">
                    <span onclick="return handleReport( '<?= $showJob[$idx]['job_id'] ?>' , '<?= $showJob[$idx]['job_title'] ?>' )" class="iconify" data-icon="mingcute:report-fill"></span>
                  </span>
                </button>
              </header>
              <div class="card-content">
                <div class="content">
                  <p><strong>Requisitos da vaga</strong></p>
                  <p><?= ($showJob[$idx]['job_requirements'] ? $showJob[$idx]['job_requirements'] : 'Não informado'); ?></p>
                </div>
                <div class="content">
                  <p><strong>Link da vaga</strong></p>
                  <p><?= ($showJob[$idx]['job_link'] ? '<a class="job-link" href="' . $showJob[$idx]['job_link'] . '" target="_blank">' . $showJob[$idx]['job_link'] . '</a>' : 'Não informado'); ?></p>
                </div>
                <div class="content">
                  <p><strong>Senioridade</strong></p>
                  <p><?= ($showJob[$idx]['job_level'] ? $showJob[$idx]['job_level'] : 'Não informado'); ?></p>
                </div>
                <div class="content">
                  <p><strong>Salário</strong></p>
                  <p><?= ($showJob[$idx]['job_salary'] == '0,00' || $showJob[$idx]['job_salary'] == 'NaN' || $showJob[$idx]['job_salary'] == ''  ? 'Salário a combinar' : $showJob[$idx]['job_currency_symbol'] . ' ' . $showJob[$idx]['job_salary']); ?></p>
                </div>
                <div class="content">
                  <p><strong>Modalidade</strong></p>
                  <p><?= ($showJob[$idx]['job_mode'] ? $showJob[$idx]['job_mode'] : 'Não informado'); ?></p>
                </div>
                <div class="content">
                  <p><strong>Contrato</strong></p>
                  <p><?= ($showJob[$idx]['job_contract'] ? $showJob[$idx]['job_contract'] : 'Não informado'); ?></p>
                </div>
                <div class="content">
                  <p><strong>E-mail para contato</strong></p>
                  <p><?= ($showJob[$idx]['job_email'] ? '<a href="mailto:' . $showJob[$idx]['job_email'] . '">' . $showJob[$idx]['job_email'] . '</a>' : '<span>E-mail não informado, consulte o <a href="' . $showJob[$idx]['job_link'] . '" target="_blank">link da vaga</a></span>'); ?></p>
                </div>
                <div class="content">
                  <p><strong>Requer experiência?</strong></p>
                  <p><?= ($showJob[$idx]['job_experience'] ? 'Sim' : 'Não') ?></p>
                </div>
                <?php if ($showJob[$idx]['job_observation']) : ?>
                  <div class="content">
                    <p><strong>Observação</strong></p>
                    <p><?= ($showJob[$idx]['job_observation']) ?></p>
                  </div>
                <?php endif; ?>
              </div>
              <footer class="card-footer py-4">
                <div class="columns w-100 px-4">
                  <div class="column is-6">
                    <p>
                      Publicado no dia
                      <strong><?= $showJob[$idx]['dateString'] ?></strong> às
                      <strong><?= $showJob[$idx]['timeString'] ?></strong><br>
                      <?= $showJob[$idx]['job_post_user']; ?>
                    </p>
                  </div>
                  <div class="column is-6 has-text-right">
                    <p>
                      <strong>ID:</strong> <?= $showJob[$idx]['job_id']; ?><br>
                    </p>
                  </div>
                </div>
              </footer>

            </div>
          <?php endif; ?>
        <?php endforeach; ?>

      <?php elseif (isset($search)) : ?>
        <article class="message is-warning">
          <div class="message-header">
            <p>Não encontramos resultados com esse filtro.</p>
          </div>
        </article>
      <?php endif; ?>

      <?php if (($countJobs['countJobs'] == 0) && empty($search)) : ?>
        <article class="message is-info">
          <div class="message-header">
            <p>Ainda não há nada por aqui.</p>
          </div>
          <div class="message-body">
            Não encontramos nenhuma vaga publicada, que tal <a href="<?= base_url('/job/new') ?>">publicar uma?</a>
          </div>
        </article>
      <?php endif; ?>
    </div>

  </section>
</main>
