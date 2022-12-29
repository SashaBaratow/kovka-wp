<?php
//if (!session_id()) {
//  session_start();
//}

/* AJAX FORM */
function send_mail_ajax() {
  global $wpdb;

//   var_dump($_REQUEST);die();

  $res = ['success' => false, 'error' => true, 'err_msg' => [], 'message' => ''];
  $form_id = intval($_REQUEST['form_id']);

  // ОБОЗНАЧЕНИЕ полей ФОРМ + ОШИБКИ

  if($_FILES) {
    $result = ajax_upload_attachment($_FILES, 'pic', '2097152');
    $res = array_merge($res, $result);
    // die(json_encode($res));
  }

  switch($form_id) {
    case 1:
      $subject = 'Заявка с сайта ['.home_url().']';
      $fields_config = array(
        "name" => "E-Mail",
        "phone" => "Номер телефона",
        // "email" => "E-Mail",
        // "message" => "Сообщение",
        //"mark" => "Метка",
      );

      if(trim($_REQUEST['name']) == '') {
        $res['error'] = true;
        $res['err_msg'][] = 'Заполните поле: Имя.';
      } else {
        $res['error'] = false;
      }

      if(trim($_REQUEST['phone']) == '') {
        $res['error'] = true;
        $res['err_msg'][] = 'Заполните поле: Телефон.';
      } else {
        $res['error'] = false;
      }

    break;
    case 2:
      $subject = 'Бесплатная консультация ['.$_SERVER['HTTP_HOST'].']';
      $fields_config = array(
        "email" => "E-Mail",
        "phone" => "Телефон",
        "message" => "Вопрос",
      );
      if(trim($_REQUEST['name']) == '') {
        $res['error'] = true;
        $res['err_msg'][] = 'Заполните поле: Имя.';
      }
      if(trim($_REQUEST['phone']) == '') {
        $res['error'] = true;
        $res['err_msg'][] = 'Заполните поле: Телефон.';
      } else {
        $res['error'] = false;
      }

    break;
    case 3:
      $subject = 'Запись на мастер-класс: ['.$_SERVER['HTTP_HOST'].']';
      $fields_config = array(
        "name" => "Имя",
        "phone" => "Телефон",
        "message" => "Комментарий",
        "mastername" => "Название мастер-класса",
        "day" => "День недели",
        "time" => "Время",
      );
      if(trim($_REQUEST['name']) == '') {
        $res['error'] = true;
        $res['err_msg'][] = 'Заполните поле: Имя.';
      }
      if(trim($_REQUEST['phone']) == '') {
        $res['error'] = true;
        $res['err_msg'][] = 'Заполните поле: Телефон.';
      } else {
        $res['error'] = false;
      }

    break;
    case 4:
      $subject = 'Заявка на картину: ['.$_SERVER['HTTP_HOST'].']';
      $fields_config = array(
        "name" => "Имя",
        "phone" => "Телефон",
        "message" => "Комментарий",
        "painting_name" => "Название картины",
      );
      if(trim($_REQUEST['name']) == '') {
        $res['error'] = true;
        $res['err_msg'][] = 'Заполните поле: Имя.';
      }
      if(trim($_REQUEST['phone']) == '') {
        $res['error'] = true;
        $res['err_msg'][] = 'Заполните поле: Телефон.';
      } else {
        $res['error'] = false;
      }

    break;
    case 5:
      $subject = 'Заявка с сайта ['.home_url().']';
      $fields_config = array(
        "name" => "Имя",
        "phone" => "Номер телефона",
      );

      if(trim($_REQUEST['name']) == '') {
        $res['error'] = true;
        $res['err_msg'][] = 'Заполните поле: Имя.';
      } else {
        $res['error'] = false;
      }

      if(trim($_REQUEST['phone']) == '') {
        $res['error'] = true;
        $res['err_msg'][] = 'Заполните поле: Телефон.';
      } else {
        $res['error'] = false;
      }

    break;
    case 6:
      $subject = 'Обратная связь ['.$_SERVER['HTTP_HOST'].']';
      $fields_config = array(
        "name" => "Имя",
        "phone" => "Телефон",
        "message" => "Комментарий",
      );
      if(trim($_REQUEST['name']) == '') {
        $res['error'] = true;
        $res['err_msg'][] = 'Заполните поле: Имя.';
      }
      if(trim($_REQUEST['phone']) == '') {
        $res['error'] = true;
        $res['err_msg'][] = 'Заполните поле: Телефон.';
      } else {
        $res['error'] = false;
      }

    break;
    case 7:
      $subject = 'Заявка с сайта ['.$_SERVER['HTTP_HOST'].']';
      $fields_config = array(
        "name" => "Имя",
        "phone" => "Телефон",
        "form_price" => "Цена",
        "title" => "Название",
      );
      if(trim($_REQUEST['name']) == '') {
        $res['error'] = true;
        $res['err_msg'][] = 'Заполните поле: Имя.';
      }
      if(trim($_REQUEST['phone']) == '') {
        $res['error'] = true;
        $res['err_msg'][] = 'Заполните поле: Телефон.';
      } else {
        $res['error'] = false;
      }

    break;
    default:
      $res['error'] = true;
      $res['err_msg'][] = 'Ошибка при отправке сообщения';
    break;
  }

  $to = trim(get_field('email_notification_address', 'option'));

  if($to=="") $to = get_option('admin_email');

  $from = get_option('blogname');

  $message = '<h2>Сообщение с сайта "'.$from.'"<br />Данные сообщения:</h2>';

  foreach($fields_config as $key => $name) {
    if(isset($_REQUEST[$key]) && is_array($_REQUEST[$key])) {

      $message .= '<br /><strong>'.$fields_config[$key].'</strong>: ';
      foreach($_REQUEST[$key] as $tmp_name => $tmp_value) {
        $message .= '<br /><i>'.$tmp_name.'</i>: <strong>'.$tmp_value.'</strong>';
      }
      $message .= '<br />';

      continue;
    }

    if(trim($_REQUEST[$key]) !="") $message .= '<br /><strong>'.$fields_config[$key].'</strong>: '.trim($_REQUEST[$key]);
  }

  $message .= '<br />';

  $utm_config = array(
    "current_page_url" => "СТРАНИЦА ОТПРАВКИ ЗАЯВКИ",
    "current_page_part" => "ОБЛАСТЬ СТРАНИЦЫ ОТПРАВКИ ЗАЯВКИ",
    "utm_source" => "Поисковая сеть",
    "utm_campaign" => "Кампания",
    "utm_medium" => "Тип рекламы",
    "utm_content" => "Номер обявления",
    "utm_term" => "Ключевое слово",
    "utm_placement" => "Площадка Google",
    "source" => "Площадка Яндекс",
    "http_referer" => "HTTP REFERER",
  );
  $utm_campaign_config = array(
    "g" => "поиск Google",
    "s" => "поисковые партнёры",
    "d" => "КМС",
  );

  $message .= '<br /><h2>Источник заявки:</h2>';
  foreach($utm_config as $utm_key => $name) {
    if(!isset($_REQUEST[$utm_key])) continue;
    $utm_key_value = trim($_REQUEST[$utm_key]);
    if($utm_key_value=="") continue;
    if($utm_key=="utm_campaign") $utm_key_value = ((isset($utm_campaign_config[$utm_key_value])) ? $utm_campaign_config[$utm_key_value]." (".$utm_key_value.")" : $utm_key_value);
    $message .= '<br /><strong>'.$utm_config[$utm_key].'</strong>: '.$utm_key_value;
  }

  if($res['error']) {
    die(json_encode($res));
  }

  add_filter( 'wp_mail_content_type', 'set_html_content_type' );

  if(isset($res['img_path']) && !$res['error']) {
    $is_send = wp_mail($to, $subject, $message, $headers, $res['img_path']);
	  send_to_tg_bot($fields_config,$utm_config);
  } elseif(!isset($res['img_path']) && !$res['error']) {
    $is_send = wp_mail($to, $subject, $message, $headers);
	  send_to_tg_bot($fields_config,$utm_config);
  }
  remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

  if ($is_send && !$res['error']) {
    $res['success'] = true;
    $res['error'] = false;
    $res['message'] = 'Спасибо! Заявка отравлена';
  } else {
    $res['success'] = false;
    $res['error'] = true;
    $res['err_msg'][] = 'Ошибка при отправке сообщения';
  }

  die(json_encode($res));

}
function send_to_tg_bot($fields_config = [], $utm_config = []){
  if(empty($fields_config)){
    return true;
  }

  $from = get_option('blogname');

  $message = 'Сообщение с сайта <strong>"'.$from.'"</strong>:'. PHP_EOL;

  foreach($fields_config as $key => $name) {
    if(isset($_REQUEST[$key]) && (trim($_REQUEST[$key])!="")) $message .= PHP_EOL . '<strong>'.$fields_config[$key].'</strong>: '.strip_tags(trim($_REQUEST[$key]));
  }
  $message .= PHP_EOL . PHP_EOL .'<i>Отправлено: '.date('d.m.Y H:i',current_time( 'timestamp' )).'</i>'. PHP_EOL;

	$message .= '<strong>Источник заявки:</strong>'. PHP_EOL;
foreach($utm_config as $utm_key => $name) {
		if(!isset($_REQUEST[$utm_key])) continue;
		$utm_key_value = trim($_REQUEST[$utm_key]);
		if($utm_key_value=="") continue;
		if($utm_key=="utm_campaign") $utm_key_value = ((isset($utm_campaign_config[$utm_key_value])) ? $utm_campaign_config[$utm_key_value]." (".$utm_key_value.")" : $utm_key_value);
		$message .= '<strong>'.$utm_config[$utm_key].'</strong>: '.$utm_key_value. PHP_EOL;
	}

  $url = 'https://t.kuleshov.studio/api/getmessages';

  //companycode - Индивидуальный код организации (получить у администратора)
  $data = ["companycode" => "11111111111111", "data" => [["message" => $message]]];

  $data_string = json_encode($data);

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $result = curl_exec($ch);

  curl_close($ch);

  return true;
}
function set_html_content_type() {
  return 'text/html';
}

function ajax_upload_attachment($files, $key, $limit_size) {
  define('DS', DIRECTORY_SEPARATOR);
  define('ROOT', WP_CONTENT_DIR . DS . 'uploads' . DS . 'mail_upload');
  $result = ['success' => false, 'error' => true, 'err_msg' => [], 'message' => ''];
  if(!array_key_exists($key, $files)) return $result;

  if($files[$key]['name']){
    $filename = $_FILES[$key]["name"];
    $source = $_FILES[$key]["tmp_name"];
    $type = $_FILES[$key]["type"];
    $error = $_FILES[$key]["error"];
    $size = $_FILES[$key]["size"];
    $accepted_types = array(' image/gif', ' image/jpeg', 'image/png');
    $err_msg = [];
    $is_img = false;


    if($error != UPLOAD_ERR_OK){
      switch ($error) {
        case UPLOAD_ERR_INI_SIZE:
          $err_msg[] = 'Превышен максимально допустимый размер';
          break;
        case UPLOAD_ERR_FORM_SIZE:
          $err_msg[] = 'Превышен допустимый размер файла';
          break;
        case UPLOAD_ERR_PARTIAL:
          $err_msg[] = 'Файл загружен частично';
          break;
        case UPLOAD_ERR_NO_FILE:
          $err_msg[] = 'Файл не загружен';
          break;
        case UPLOAD_ERR_NO_TMP_DIR:
          $err_msg[] = 'Отсутствует временная папка';
          break;
        case UPLOAD_ERR_CANT_WRITE:
          $err_msg[] = 'Нет прав на запись файла';
          break;
      }
    }

    if($size > $limit_size) {
      $err_msg[] = 'Превышен допустимый размер файла';
    }

    if(in_array($type, $accepted_types)) {
      $is_img = true;
    }

    if($is_img) {
      $err_msg[] = "Файл, который вы пытаетесь загрузить, не изображение. Пожалуйста, попробуйте расширени .jpg .png .gif.";
    }

    if(!empty($err_msg)){
      $result['err_msg'] = $err_msg;
      return $result;
    }

    $path_file = pathinfo($filename);
    $name = $path_file['filename'];
    $ext = $path_file['extension'];
    if(!file_exists(ROOT) && !is_dir(ROOT)){
      mkdir(ROOT, 0777);
    }

    $target_path = ROOT . DS . time() . '.' . $ext;
    if(move_uploaded_file($source, $target_path)) {
      $result['success'] = true;
      $result['error'] = false;
      $result['message'] = 'ok';
      $result['img_path'] = $target_path;
    } else {
      $result['success'] = false;
      $result['error'] = true;
       $err_msg[] = "Загрузка файла не удалась.";
    }
    return $result;

  }
  return $result;
}

function ajax_mail_form () {
global $_SESSION;

$ajax_url = (string)admin_url('admin-ajax.php');
$theme_url = get_template_directory_uri();

if(empty($_SESSION['utm_data'])) {
  $_SESSION['utm_data'] = array();
  $_SESSION['utm_data']['utm_source'] = "";
  $_SESSION['utm_data']['utm_medium'] = "";
  $_SESSION['utm_data']['utm_campaign'] = "";
  $_SESSION['utm_data']['utm_term'] = "";
  $_SESSION['utm_data']['utm_placement'] = "";
  $_SESSION['utm_data']['utm_content'] = "";
  $_SESSION['utm_data']['source'] = "";
}

if(isset($_GET['utm_source']) && ($_GET['utm_source']!="")) $_SESSION['utm_data']['utm_source'] = $_GET['utm_source'];
if(isset($_GET['utm_medium']) && ($_GET['utm_medium']!="")) $_SESSION['utm_data']['utm_medium'] = $_GET['utm_medium'];
if(isset($_GET['utm_campaign']) && ($_GET['utm_campaign']!="")) $_SESSION['utm_data']['utm_campaign'] = $_GET['utm_campaign'];
if(isset($_GET['utm_term']) && ($_GET['utm_term']!="")) $_SESSION['utm_data']['utm_term'] = $_GET['utm_term'];
if(isset($_GET['utm_content']) && ($_GET['utm_content']!="")) $_SESSION['utm_data']['utm_content'] = $_GET['utm_content'];
if(isset($_GET['utm_placement']) && ($_GET['utm_placement']!="")) {
  $_SESSION['utm_data']['utm_placement'] = $_GET['utm_placement'];
  $_SESSION['utm_data']['source'] = "";
}
if(isset($_GET['source']) && ($_GET['source']!="")) {
  $_SESSION['utm_data']['source'] = $_GET['source'];
  $_SESSION['utm_data']['utm_placement'] = "";
}
if(isset($_SERVER['HTTP_REFERER'])) $_SESSION['utm_data']['http_referer'] = $_SERVER['HTTP_REFERER'];

$utm_data = array(
  'utm_source' => (($_SESSION['utm_data']['utm_source']!="") ? $_SESSION['utm_data']['utm_source'] : $_GET['utm_source']),
  'utm_medium' => (($_SESSION['utm_data']['utm_medium']!="") ? $_SESSION['utm_data']['utm_medium'] : $_GET['utm_medium']),
  'utm_campaign' => (($_SESSION['utm_data']['utm_campaign']!="") ? $_SESSION['utm_data']['utm_campaign'] : $_GET['utm_campaign']),
  'utm_term' => (($_SESSION['utm_data']['utm_term']!="") ? $_SESSION['utm_data']['utm_term'] : $_GET['utm_term']),
  'utm_placement' => (($_SESSION['utm_data']['utm_placement']!="") ? $_SESSION['utm_data']['utm_placement'] : $_GET['utm_placement']),
  'utm_content' => (($_SESSION['utm_data']['utm_content']!="") ? $_SESSION['utm_data']['utm_content'] : $_GET['utm_content']),
  'source' => (($_SESSION['utm_data']['source']!="") ? $_SESSION['utm_data']['source'] : $_GET['source']),
  'http_referer' => (($_SESSION['utm_data']['http_referer']!="") ? $_SESSION['utm_data']['http_referer'] : $_SERVER['HTTP_REFERER']),
);

$current_page_url = "//" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$output = <<<HTML
<!-- UTM DATA -->
<form id="utm-data" style="display:none;">
  <input type="hidden" name="current_page_url" value="{$current_page_url}" />
  <input type="hidden" name="utm_source" value="{$utm_data['utm_source']}" />
  <input type="hidden" name="utm_medium" value="{$utm_data['utm_medium']}" />
  <input type="hidden" name="utm_campaign" value="{$utm_data['utm_campaign']}" />
  <input type="hidden" name="utm_term" value="{$utm_data['utm_term']}" />
  <input type="hidden" name="utm_placement" value="{$utm_data['utm_placement']}" />
  <input type="hidden" name="utm_content" value="{$utm_data['utm_content']}" />
  <input type="hidden" name="source" value="{$utm_data['source']}" />
  <input type="hidden" name="http_referer" value="{$utm_data['http_referer']}" />
</form>
<!-- ajax_mail_form -->
<script>
jQuery(function(){
    $('form.ajax-form').on('submit', function(e) {
    ajax_mail($(this), e);
    return false;
  });
  
  $('input[name=current_page_url]').val($(location).attr('href'));
  
});


function ajax_mail (form, e) {

    var formId = form.attr('id');
    var inputFile = form.find('#file input[type="file"]');
    var form_success_url = form.data('successurl');
    var all_data = '';
    if(inputFile.length > 0) {
      var formData = new FormData(form[0]);
      var formDataUtm = new FormData($('#utm-data')[0]);
      for(var entrie of formDataUtm.entries()){
        formData.append(entrie[0], entrie[1]);
      }
      formData.append('pic', inputFile.prop('files')[0]);
      formData.append('action', 'send_mail_ajax');
      all_data = formData;
    } else {
      var form_data = form.serialize();
      var utm_data = $('#utm-data').serialize();
      all_data = form_data+'&'+utm_data+'&action=send_mail_ajax';
    }
      
    var form_submit_button = form.find('button[type=submit]');

    form_submit_button.attr('disabled', true);
    form_submit_button.data('text', form_submit_button.text());
    form_submit_button.text('Подождите...');
		
        var target = form.find('.form-response');
        if (e.isDefaultPrevented()) {
          //target.html("<div class='alert alert-danger'><p>Пожалуйста, заполните все необходимые поля.</p></div>");
          form_submit_button.attr('disabled', false);
          form_submit_button.text(form_submit_button.data('text'));
        } else {
          $.ajax({
            url: '{$ajax_url}',
            type: "POST",
            data: all_data,
            dataType: 'json',
            /*cache: false,
            contentType: false,
            processData: false,*/
            beforeSend: function () {
              target.html("<div class='alert alert-info'><p>Идёт отправка</p></div>");
            },
            success: function (response) {
              // response = JSON.parse(response);

              if(response.success) {
                /*if(form_success_url!="") {
                  $(location).attr('href', form_success_url);
                } else {*/
                  window.location.href = 'https://cns-corp.ru/spasibo/';
                  target.html('<div class="alert alert-success"><p>'+response.message+'</p></div>');
                  form_submit_button.attr('disabled', false);
                  form_submit_button.text(form_submit_button.data('text'));
                  form.trigger("reset");
                // }
              } else if(response.error){
                  target.html('<div class="alert alert-danger"><p>'+ response.err_msg.join('<br/>') +'</p></div>');
                  form_submit_button.attr('disabled', false);
                  form_submit_button.text(form_submit_button.data('text'));
              } else {
                target.html("<div class='alert alert-danger'><p>Ошибка при отправке заявки.</p></div>");
                form_submit_button.attr('disabled', false);
                form_submit_button.text(form_submit_button.data('text'));
              }
            },
            error: function () {
              target.html("<div class='alert alert-danger'><p>Error !!!</p></div>");
            }
          });
        }
}
</script>
HTML;

echo $output;
}



add_action('wp_footer','ajax_mail_form'); //Добавляем в футер скрипт обработки форм
wp_localize_script( 'theme-jquery-js', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
add_action( 'wp_ajax_send_mail_ajax', 'send_mail_ajax' );
add_action( 'wp_ajax_nopriv_send_mail_ajax', 'send_mail_ajax' );
