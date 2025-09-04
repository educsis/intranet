<?php
function mailtesthelper()
{
	$CI = &get_instance();
	$CI->load->library('email');
	$config['charset'] = 'utf-8';
	$config['wordwrap'] = TRUE;
	$config['protocol'] = 'ssmtp';
	$config['smtp_host'] = 'ssl://ssmtp.office365.com';
	$config['smtp_user'] = 'noreply@zonapradera.com';
	$config['smtp_pass'] = 'intranetzp2021$';
	$config['smtp_port'] = '587';
	$config['mailtype'] = 'html';
	$CI->email->initialize($config);

	$CI->email->from(FROM_EMAIL, 'Intranet ZonaPradera');
	// $CI->email->to(TO_EMAIL . ', ' . $oficinaEmail);
	$CI->email->to('educsis@gmail.com');
	$CI->email->subject("Test de SMTP");

	$dm['bodymsg'] = 'Est&aacute; recibiendo este correo porque se hizo una solicitud de uso de elevadores. <br>';
	$dm['bodymsg'] .=	'Haz click en este enlace para ver el detalle. <br>';
	$dm['link'] = 'http://google.com';
	$html = $CI->load->view('mail_solicitud_elevadores', $dm, TRUE);

	$CI->email->message($html);
	$sent = $CI->email->send();

	echo "Email sent " . $sent;
}

function mailsolicitudelevadores($oficinaEmail, $form, $link)
{
	$CI = &get_instance();
	$CI->load->library('email');
	$config['charset'] = 'utf-8';
	$config['wordwrap'] = TRUE;
	$config['protocol'] = 'ssmtp';
	$config['smtp_host'] = 'ssl://ssmtp.office365.com';
	$config['smtp_user'] = 'noreply@zonapradera.com';
	$config['smtp_pass'] = 'intranetzp2021$';
	$config['smtp_port'] = '587';
	$config['mailtype'] = 'html';
	$CI->email->initialize($config);

	$CI->email->from(FROM_EMAIL, 'Intranet ZonaPradera');
	// $CI->email->to(TO_EMAIL . ', ' . $oficinaEmail);
	$CI->email->to(TO_EMAIL);
	$CI->email->cc(TO_CC);
	$CI->email->bcc(TO_BCC);
	$CI->email->subject("Solicitud de elevadores - " . $form);

	$dm['bodymsg'] = 'Est&aacute; recibiendo este correo porque se hizo una solicitud de uso de elevadores. <br>';
	$dm['bodymsg'] .=	'Haz click en este enlace para ver el detalle. <br>';
	$dm['link'] = $link;
	$html = $CI->load->view('mail_solicitud_elevadores', $dm, TRUE);

	$CI->email->message($html);
	$sent = $CI->email->send();
}

function mailsolicitudmudanzas($oficinaEmail, $form, $link)
{
	$CI = &get_instance();
	$CI->load->library('email');
	$config['charset'] = 'utf-8';
	$config['wordwrap'] = TRUE;
	$config['protocol'] = 'ssmtp';
	$config['smtp_host'] = 'ssl://ssmtp.office365.com';
	$config['smtp_user'] = 'noreply@zonapradera.com';
	$config['smtp_pass'] = 'intranetzp2021$';
	$config['smtp_port'] = '587';
	$config['mailtype'] = 'html';
	$CI->email->initialize($config);

	$CI->email->from(FROM_EMAIL, 'Intranet ZonaPradera');
	// $CI->email->to(TO_EMAIL . ', ' . $oficinaEmail);
	$CI->email->to(TO_EMAIL);
	$CI->email->cc(TO_CC);
	$CI->email->bcc(TO_BCC);
	$CI->email->subject("Solicitud de ingreso / salida - " . $form);

	$dm['bodymsg'] = 'Est&aacute; recibiendo este correo porque se hizo una solicitud de ingreso / salida. <br>';
	$dm['bodymsg'] .=	'Haz click en este enlace para ver el detalle. <br>';
	$dm['link'] = $link;
	$html = $CI->load->view('mail_solicitud_mudanzas', $dm, TRUE);

	$CI->email->message($html);
	$sent = $CI->email->send();
}

function mailsolicitudremodelaciones($oficinaEmail, $form, $link)
{
	$CI = &get_instance();
	$CI->load->library('email');
	$config['charset'] = 'utf-8';
	$config['wordwrap'] = TRUE;
	$config['protocol'] = 'ssmtp';
	$config['smtp_host'] = 'ssl://ssmtp.office365.com';
	$config['smtp_user'] = 'noreply@zonapradera.com';
	$config['smtp_pass'] = 'intranetzp2021$';
	$config['smtp_port'] = '587';
	$config['mailtype'] = 'html';
	$CI->email->initialize($config);

	$CI->email->from(FROM_EMAIL, 'Intranet ZonaPradera');
	// $CI->email->to(TO_EMAIL . ', ' . $oficinaEmail);
	$CI->email->to(TO_EMAIL);
	$CI->email->cc(TO_CC);
	$CI->email->bcc(TO_BCC);
	$CI->email->subject("Solicitud de remodelaciones - " . $form);

	$dm['bodymsg'] = 'Est&aacute; recibiendo este correo porque se hizo una solicitud de remodelaciones. <br>';
	$dm['bodymsg'] .=	'Haz click en este enlace para ver el detalle. <br>';
	$dm['link'] = $link;
	$html = $CI->load->view('mail_solicitud_remodelaciones', $dm, TRUE);

	$CI->email->message($html);
	$sent = $CI->email->send();
}

function mailstatuschange($form, $link)
{
	$CI = &get_instance();
	$CI->load->library('email');
	$config['charset'] = 'utf-8';
	$config['wordwrap'] = TRUE;
	$config['protocol'] = 'ssmtp';
	$config['smtp_host'] = 'ssl://ssmtp.office365.com';
	$config['smtp_user'] = 'noreply@zonapradera.com';
	$config['smtp_pass'] = 'intranetzp2021$';
	$config['smtp_port'] = '587';
	$config['mailtype'] = 'html';
	$CI->email->initialize($config);

	$CI->email->from(FROM_EMAIL, 'Intranet ZonaPradera');
	// $CI->email->to(TO_EMAIL . ', ' . $oficinaEmail);
	$CI->email->to(TO_EMAIL_STATUS);
	$CI->email->subject($form);

	$dm['bodymsg'] = 'Est&aacute; recibiendo este correo porque se hizo una actualizaci&oacute;n. <br>';
	$dm['bodymsg'] .=	'Haz click en este enlace para ver el estatus. <br>';
	$dm['link'] = $link;
	$html = $CI->load->view('mail_status', $dm, TRUE);

	$CI->email->message($html);
	$sent = $CI->email->send();
}
