<?php
/**
  * Mailer.php
  * Description: Container Mailer
  * @Author : M.V.M.
  * @Version 1.0.14
**/
declare(strict_types=1);

use Psr\Container\ContainerInterface;
use App\Application\Settings\SettingsInterface;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$container->set('mailer',function(ContainerInterface $ci){
    $settings = $ci->get(SettingsInterface::class);
    $mail = $settings->get("mailerConfig");
    $mailer = new PHPMailer(true);
    $mailer->isSMTP($mail['smtp']);
    $mailer->SMTPDebug  = $mail['debug'];
    $mailer->Host       = $mail['host'];
    $mailer->SMTPAuth   = $mail['auth'];
    $mailer->Username   = $mail['user'];
    $mailer->Password   = $mail['pass'];
    $mailer->SMTPSecure = $mail['secure'];
    $mailer->CharSet    = $mail['char'];
    $mailer->Port       = $mail['port'];
    $mailer->From       = $mail['from'];
    $mailer->FromName   = $mail['from_name'];
    $mailer->addReplyTo($mail['from']);
    $mailer->addAddress($mail['to']);
    $mailer->isHTML($mail['html']);
    return $mailer;
});

