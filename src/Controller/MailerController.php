<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    /**
     * @Route("/email")
     */
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('hello@collab-u.com')
            ->to('ayetoloucynthia@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Nouvelle inscription !')
            ->text('Bienvenue!')
            ->html('<p>Vos identifiants pour vous vous connecter à la plateforme sont les suivants ! <br> username: tata , password: tata</p>');

        $mailer->send($email);

        return  new Response(null,200);
    }
}