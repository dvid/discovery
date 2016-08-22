<?php
namespace AppBundle\DataFixtures\ORM;

use Nelmio\Alice\Fixtures;
use AppBundle\Entity\Post;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $objects = Fixtures::load(
            __DIR__.'/fixtures.yml',
            $manager,
            [
                'providers' => [$this]
            ]
        );

        /*
        $post = new Post();
        $post->setTitle('Test'.rand(1, 100));
        $post->setBody('Testing...');
        $post->setPublished(1);
        $post->setDateCreated(new \DateTime('-'.rand(0, 100).' days'));
        $post->setDateUpdated(new \DateTime('-'.rand(0, 100).' days'));
        $manager->persist($post);
        $manager->flush();
        */
    }

    public function genus()
    {
        $genera = [
            'Octopus',
            'Balaena',
            'Orcinus',
            'Hippocampus',
            'Asterias',
            'Amphiprion',
            'Carcharodon',
            'Aurelia',
            'Cucumaria',
            'Balistoides',
            'Paralithodes',
            'Chelonia',
            'Trichechus',
            'Eumetopias'
        ];

        $key = array_rand($genera);

        return $genera[$key];
    }
}