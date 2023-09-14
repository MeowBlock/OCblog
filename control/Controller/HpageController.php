<?php 

namespace App\Controller;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class HpageController extends Controller
{
    public function getHpage() {
        echo $this->twig->render('showcase.html.twig');
    }
    public function sendContact() {
        if($_POST['nom_form'] == 'contact') {
            // Create a Transport object
            $transport = Transport::fromDsn('smtp://bc15b916566818:5ad246492f91b6@sandbox.smtp.mailtrap.io:2525');
            // Create a Mailer object 
            $mailer = new Mailer($transport); 
            // Create an Email object 
            $email = (new Email());
            // Set the "From address" 
            $email->from('site@meowblock.net');
            // Set the "From address" 
            $email->to('baralliniloris@gmail.com');
            // Set a "subject" 
            $email->subject('Demande de contact depuis le site OCBlog');
            // Set HTML "Body" 
            $html = '<strong>Nom : </strong>'.$_POST['name'].'<br>';
            $html .= '<strong>Email : </strong>'.$_POST['email'].'<br>';
            $html .= '<strong>Message : </strong>'.$_POST['message'];
            $email->html($html);
            // Send the message 
            $mailer->send($email);






            $email->to($_POST['email']);
            $html = 'Bonjour '.$_POST['name'].', votre demande de contact a bien été reçue, je vous recontacterai au plus vite<br><br>Cordialement,<br>Loris Barallini';
            $email->html($html);
            $mailer->send($email);
        }
    }
}


?>