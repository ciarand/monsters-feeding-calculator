<?php

namespace RestlessCo\MonstersFeedingCalculator\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Calculator extends \Cilex\Command\Command
{
    protected function configure()
    {
        $this
            ->setName('calculate')
            ->setDescription('Calculate a monster\'s food requirements to get to a specified level.')
            ->addOption('from-level', 'f',
                InputOption::VALUE_OPTIONAL,
                'What level is the monster now?', 1)
            ->addOption('to-level', 't',
                InputOption::VALUE_OPTIONAL,
                'What level do you want it to be?', 15)
            ->addOption('current-food-cost', 'c',
                InputOption::VALUE_OPTIONAL,
                'How much food does it take to be 1/4th satisfied?', 5);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $table = $this->getHelperSet()->get('table');
        $table
            ->setHeaders(['Level', 'Cost to next level', 'Total cost'])
            ->setRows($this->calculateFoodCost(
                $input->getOption('from-level'),
                $input->getOption('to-level'),
                $input->getOption('current-food-cost')));
        $table->render($output);
    }

    protected function calculateFoodCost($from, $to, $current)
    {
        $this->testInputRange($from, $to);
        $arr = array();
        $total = $current;
        for ( ; $from <= $to; $from += 1) {
            $arr[] = [$from, $current * 4, $total += ($current *= 2)];
        }
        return $arr;
    }

    protected function testInputRange($from, $to)
    {
        if ($from > $to) {
            throw new \InvalidArgumentException("Invalid range specified", 1);
        }
    }
}
