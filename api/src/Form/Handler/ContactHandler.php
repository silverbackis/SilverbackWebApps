<?php

namespace App\Form\Handler;

use Silverback\ApiComponentBundle\Entity\Component\Form\Form;
use Silverback\ApiComponentBundle\Form\Handler\FormHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Twig\Environment;

class ContactHandler implements FormHandlerInterface
{
    private $mailer;
    private $twig;
    private $emailAddress;

    public function __construct(\Swift_Mailer $mailer, Environment $twig, $emailAddress)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->emailAddress = $emailAddress;
    }

    public function success(Form $form, $submittedData, Request $request)
    {
        $email = $this->twig->loadTemplate('emails/contact.html.twig');
        $subject  = $email->renderBlock('subject',   $submittedData);
        $bodyHtml = $email->renderBlock('body_html', $submittedData);
        $bodyText = $email->renderBlock('body_text', $submittedData);

        $htmlTemplate = $this->twig->loadTemplate('@SilverbackApiComponent/emails/template.html.twig', [
            'subject' => $subject,
            'body_html' => $bodyHtml,
            'logo_src' => '#',
            'website_name' => 'Website Name'
        ]);

        $message = (new \Swift_Message($subject))
            ->setFrom($this->emailAddress)
            ->setTo($this->emailAddress)
            ->setReplyTo($submittedData['email'])
            ->setBody($htmlTemplate, 'text/html')
            ->addPart($bodyText, 'text/plain')
        ;
        if (!$this->mailer->send($message)) {
            throw new HttpException(500, 'Failed to add any messages to the email spool');
        }
    }
}
