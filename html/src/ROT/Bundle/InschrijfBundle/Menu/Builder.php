<?php
namespace ROT\Bundle\InschrijfBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $router = $this->container->get('router');

//        $menu->addChild('Home', array('route' => 'homepage'));
//        $menu->addChild('About Me', array(
//            'route' => 'page_show',
//            'routeParameters' => array('id' => 42)
//        ));
        // ... add more children
        $menu->addChild('Taal', array('uri' => $router->generate('rot_inschrijf_inschrijf_inschrijf')));
        $menu->addChild('Notice of Race', array('uri' => $router->generate('rot_inschrijf_inschrijf_stap2')));
        $menu->addChild('Stuurman', array('uri' => $router->generate('rot_inschrijf_inschrijf_stap4')));
        $menu->addChild('Fokkemaat', array('uri' => $router->generate('rot_inschrijf_inschrijf_stap5')));
        $menu->addChild('Boot', array('uri' => $router->generate('rot_inschrijf_inschrijf_stap6')));
        $menu->addChild('Controle', array('uri' => $router->generate('rot_inschrijf_inschrijf_stap7')));
        $menu->addChild('Succes', array('uri' => $router->generate('rot_inschrijf_inschrijf_stap8')));


        return $menu;
    }
}