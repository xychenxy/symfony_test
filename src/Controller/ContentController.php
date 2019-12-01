<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @IsGranted("ROLE_ADMIN_CONTENT")
 */
class ContentController extends AbstractController
{
    /**
     * @Route("/content", name="app_content")
     *
     */
    public function index()
    {

//        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('content/index.html.twig', [
            'controller_name' => 'ContentController',
        ]);
    }


    /**
     * @Route("/content", name="app_sendEmail")
     *
     */
    public function sendEmail()
    {



        return $this->render('content/index.html.twig', [
            'controller_name' => 'ContentController',
        ]);
    }


}
