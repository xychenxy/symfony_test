<?php

namespace App\Controller;

use App\Service\Mailer;
use Knp\Snappy\Pdf;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\NamedAddress;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //    $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig',
            [
                'last_username' => $lastUsername,
                'error' => $error
            ]);
    }



    /**
     * @Route("/register", name="app_register")
     */
    public function register(AuthenticationUtils $authenticationUtils, Mailer $mailer, Environment $twig, Pdf $pdf): Response
//    public function register(AuthenticationUtils $authenticationUtils, MailerInterface $mailer): Response
    {


//        $html = $twig->render('email/_report-table.html.twig', []);
//
//        $pdf = $pdf->getOutputFromHtml($html);

//        $email = (new TemplatedEmail())
//            ->from(new NamedAddress('mavischen916@gmail.com', 'The XY Studio'))
//            ->to(new NamedAddress('mavischen916@gmail.com', 'Mavis'))
//            ->subject('welcome to the xystudui')
//            ->htmlTemplate('email/email.html.twig')
//            ->attach($pdf, sprintf('weekly-report-%s.pdf',date('Y-m-d')));
//
//        $mailer->send($email);
        $mailer->sendWelcomeMessage();

        // if ($this->getUser()) {
        //    $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/register.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }


    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
}
