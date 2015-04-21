<?php

namespace ROT\Bundle\AdminBundle\Translation\Loader;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Translation\Exception\InvalidResourceException;
use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Component\Translation\MessageCatalogue;

class ConfiguratieLoader implements LoaderInterface {

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function load($resource, $locale, $domain = 'messages') {
        $repository = $this->em->getRepository('ROTAdminBundle:Configuratie');

        switch ($locale) {
            case 'nl':
                $configuraties = $repository->getConfiguratieByNederlands(true);
                break;
            case 'en':
                $configuraties = $repository->getConfiguratieByNederlands(false);
                break;
            default:
                throw new InvalidResourceException("ROTLoader only supports 'nl' and 'en' languages");
                break;
        }
        $catalog = new MessageCatalogue($locale);
        $catalog->add($this->configuratiesToMessages($configuraties));
        return $catalog;
    }

    private function configuratiesToMessages($configuraties) {
        $messages = array();
        foreach ($configuraties as $configuratie) {
            $messages[$configuratie->getContenttarget()] = $configuratie->getContent();
        }
        return $messages;
    }
}