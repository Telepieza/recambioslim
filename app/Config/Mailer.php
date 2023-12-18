<?php
/**
  * Mailer.php
  * Description: Container Mailer
  * @Author : M.V.M.
  * @Version 1.0.16
**/
declare(strict_types=1);

use Psr\Container\ContainerInterface;
use App\Application\Settings\SettingsInterface;
use PHPMailer\PHPMailer\PHPMailer;

$container->set('mailer',function(ContainerInterface $ci){
  $settings = $ci->get(SettingsInterface::class);
  $mail = $settings->get("mailerConfig");
  $mailer = new PHPMailer(true);
  $mailer->SMTPDebug  = isset($mail['debug'])     ? $mail['debug']     : 0 ;
  $mailer->Host       = isset($mail['host'])      ? $mail['host']      : '' ;
  $mailer->Username   = isset($mail['user'])      ? $mail['user']      : '' ;
  $mailer->Password   = isset($mail['pass'])      ? $mail['pass']      : '' ;
  $mailer->SMTPSecure = isset($mail['secure'])    ? $mail['secure']    : '' ;
  $mailer->CharSet    = isset($mail['char'])      ? $mail['char']      : 'UTF-8' ;
  $mailer->Port       = isset($mail['port'])      ? $mail['port']      : 25 ;
  $mailer->From       = isset($mail['from'])      ? $mail['from']      : '' ;
  $mailer->FromName   = isset($mail['from_name']) ? $mail['from_name'] : '' ;
  if (isset($mail['from'])) { $mailer->addReplyTo($mail['from']); }
  if (isset($mail['to']))   { $mailer->addAddress($mail['to'])  ; }
  if (isset($mail['smtp']) && $mail['smtp']) { $mailer->isSMTP();        }
  if (isset($mail['auth']) && $mail['auth']) { $mailer->SMTPAuth = true; }
  if (isset($mail['html']) && $mail['html']) { $mailer->isHTML(true);    }
  return $mailer;
});
