<?php

namespace Casaris\Bundle\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class KMeansCommand extends ContainerAwareCommand {

    protected function configure() {
        $this->setName('kmeans:run')
                ->setDescription('K-Means Execution')
                ->addArgument('clusters', InputArgument::OPTIONAL, 5);
        
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $k = $input->getArgument('clusters');
        $groups = $this->getContainer()->get('recomendation')->recomendationData($k);
        foreach ($groups as $cluster => $v) {
            $output->writeln("-----------------------------------------------------------------------");
            $output->writeln("Cluster: ".$cluster);
            $output->writeln("-----------------------------------------------------------------------");
            foreach ($v as $u) {
                $output->writeln("User Id: ".$u);
            }
        }
        
    }

}
