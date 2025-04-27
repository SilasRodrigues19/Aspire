<?php

  function notify($title, $msg, $type) 
  {
    $_SESSION['title'] = $title;
    $_SESSION['msg'] = $msg;
    $_SESSION['type'] = $type;
  }

  function showMessage() 
  {
    if(isset($_SESSION['title'])) {
      echo alertBox($_SESSION['title'], $_SESSION['msg'], $_SESSION['type']);
      unset($_SESSION['title']);
      unset($_SESSION['msg']);
      unset($_SESSION['type']);
      unset($_SESSION['width']);
    }
  }

  function alertBox($title, $msg, $type)
  {
    switch( $type ) {
      case 'erro':
      case 'error':
      case 'danger':
        $type = 'is-danger is-light';
        $icon  = 'icon-park-solid:close-one';
        $title = 'Error!';
      break;
      case 'ok':
      case 'success':
        $type = 'is-primary is-light';
        $icon  = 'akar-icons:circle-check-fill';
        $title = 'Success!';
      break;
      case 'aviso':
      case 'warning':
        $type = 'is-warning';
        $icon  = 'ph:warning-circle-fill';
        $title = 'Warning!';
      break;
      case 'info':
        $type = 'is-link is-light';
        $icon  = 'akar-icons:info-fill';
        $title = 'Info';
      break;
      default:
        $type = 'is-link is-light';
        $icon  = 'mdi mdi-alert-circle mr-2';
        $title = 'Warning!';
    }

    $title = '';

    $box = "<div class=\"notification has-text-centered showMessage $type\" role=\"alert\">
              <span class=\"iconify mb-1\" data-icon=\"$icon\"></span> <strong> $title </strong> $msg
           </div>";

    return $box;
  }
