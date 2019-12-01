<?php
/**
 * Created by PhpStorm.
 * User: huiliang
 * Date: 2019-11-30
 * Time: 20:43
 */

namespace App\Service;


use Knp\Snappy\Pdf;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\NamedAddress;
use Twig\Environment;

class Mailer
{


    /**
     * @var MailerInterface
     */
    private $mailer;
    /**
     * @var Pdf
     */
    private $pdf;
    /**
     * @var Environment
     */
    private $twig;

    public function __construct(MailerInterface $mailer, Pdf $pdf, Environment $twig)
    {

        $this->mailer = $mailer;
        $this->pdf = $pdf;
        $this->twig = $twig;
    }


//    public function sendWelcomeMessage(User $user){
    public function sendWelcomeMessage(){

        $html = $this->twig->render('email/_report-table.html.twig', []);

        $pdf = $this->pdf->getOutputFromHtml($html);

        $email = (new TemplatedEmail())
            ->from(new NamedAddress('admin@openingthedoors.com', 'Openg The Doors Foundation'))
            ->to(new NamedAddress('mavischen916@gmail.com', 'Mavis'))
            ->subject('Welcome to the OTDF')
            ->htmlTemplate('email/email.html.twig')
            ->attach($pdf, sprintf('otdf-application-%s.pdf',date('Y-m-d')));

        $this->mailer->send($email);
    }


}