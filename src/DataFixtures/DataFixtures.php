<?php
/**
 * Created by PhpStorm.
 * User: willkoua
 * Date: 18-05-28
 * Time: 22:45
 */

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Show;

class ShowFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $date = new \DateTime(date('Y-m-d H:i:s'), new \DateTimeZone( 'America/New_York'));
        // create 20 Shows! Bam!
        for ($i = 0; $i < 20; $i++) {
            $show = new Show();
            $show->setTitle('Spectacle_'. $i);
            $show->setArtist('Willy kouagnia '. $i);
            $show->setSalle($i);
            $show->setDate($date->add(new \DateInterval('P1D')));
            $show->setDescription('Equitis Romani autem esse filium criminis loco poni 
            ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod 
            de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; 
            quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque 
            maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.');

            $manager->persist($show);
        }

        $manager->flush();
    }
}