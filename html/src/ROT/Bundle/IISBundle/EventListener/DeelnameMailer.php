<?php

namespace ROT\Bundle\IISBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use ROT\Bundle\IISBundle\Entity\Deelname;
use Symfony\Component\Translation\Translator;

class DeelnameMailer implements EventSubscriber
{
    private $mailer;
    private $translator;

    public function __construct(\Swift_Mailer $mailer, Translator $translator) {
        $this->mailer = $mailer;
        $this->translator = $translator;
    }

    public function getSubscribedEvents() {
        return array(
            'prePersist',
            'preUpdate'
        );
    }

    public function prePersist(LifecycleEventArgs $args) {
        $entity = $args->getEntity();
        

        if ($entity instanceof Deelname && $entity->getAanmeldingsmail() === null) {
            $stuurman_deelnemer = $entity->getStuurman()->getDeelnemer();
            $trans_pairs = array(
                '[aanmelder]' => $stuurman_deelnemer->getNaam(),
                '[reserveringscode]' => $entity->getReserveringscode(),
                '[fleetchoice]' => $entity->getFleet()
            );
            $message = \Swift_Message::newInstance();
            $message->setTo($stuurman_deelnemer->getEmail());
            $message->setFrom('entry@roundtexel.com');
            $message->setSubject($this->translator->trans('aanmeldingmailsubject', array(), 'messages', $entity->getNederlands() ? 'nl' : 'en'));
            $message->setBody($_SESSION["mail-body"]);//strtr($this->translator->trans('aanmeldingmailhtml', array(), 'messages', $entity->getNederlands() ? 'nl' : 'en'), $trans_pairs));
            $message->setContentType('text/html');
            $message->addPart(strtr($this->translator->trans('aanmeldingmailplain', array(), 'messages', $entity->getNederlands() ? 'nl' : 'en'), $trans_pairs), null, "text/plain");
            $_SESSION['mail'] = $message->getBody();
            if ($this->mailer->send($message)) {
                $entity->setAanmeldingsmail(new \DateTime());
            }
        }
        
    }

    public function preUpdate(LifecycleEventArgs $args) {
        //$entity = $args->getEntity();

//        if ($entity instanceof Deelname && $entity->getBevestigingsmail() === null && $entity->getBetaling() !== null) {
//            $stuurman_deelnemer = $entity->getStuurman()->getDeelnemer();
//            $trans_pairs = array(
//                '[aanmelder]' => $stuurman_deelnemer->getNaam(),
//                '[reserveringscode]' => $entity->getReserveringscode(),
//                '[fleetchoice]' => $entity->getFleet()
//            );
//            $message = \Swift_Message::newInstance();
//            $message->setTo($stuurman_deelnemer->getEmail());
//            $message->setFrom('info@roundtexel.com');
//            $message->setSubject($this->translator->trans('bevestigingmailsubject', array(), 'messages', $entity->getNederlands() ? 'nl' : 'en'));
//            $message->setBody(strtr($this->translator->trans('bevestigingmailhtml', array(), 'messages', $entity->getNederlands() ? 'nl' : 'en'), $trans_pairs));
//            $message->setContentType('text/html');
//            $message->addPart(strtr($this->translator->trans('bevestigingmailplain', array(), 'messages', $entity->getNederlands() ? 'nl' : 'en'), $trans_pairs), null, "text/html");            
//            if ($this->mailer->send($message)) {
//                $entity->setBevestigingsmail(new \DateTime());
//            }
//        }
    }
}