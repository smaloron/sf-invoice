<?php

namespace App\DataFixtures;

use App\Entity\Invoice;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class InvoiceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $invoice = new Invoice();
        $invoice->setInvoiceDate(new \DateTime())
            ->setInvoiceNumber("00001")
            ->setClient($this->getReference("client_1"));
        $manager->persist($invoice);

        $invoice = new Invoice();
        $invoice->setInvoiceDate(new \DateTime())
            ->setInvoiceNumber("00002")
            ->setClient($this->getReference("client_1"));
        $manager->persist($invoice);

        $invoice = new Invoice();
        $invoice->setInvoiceDate(new \DateTime())
            ->setInvoiceNumber("00003")
            ->setClient($this->getReference("client_2"));
        $manager->persist($invoice);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ClientFixtures::class
        ];
    }
}
