<?php

namespace Iirt\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Iirt\UserBundle\Entity\Role;

class Roles implements FixtureInterface{
    
    public function load(ObjectManager $manager)
    {
        // Liste des noms de roles à ajouter
        $roles = array('etudiant', 'delegue', 'editeur', 'presidente');
        foreach($roles as $i => $role)
        {
            // On crée le role
            $liste_roles[$i] = new Role();
            $liste_roles[$i]->setName($role);
            // On le persiste
            $manager->persist($liste_roles[$i]);
        }
            // On déclenche l'enregistrement
            $manager->flush();
    }
    
}
