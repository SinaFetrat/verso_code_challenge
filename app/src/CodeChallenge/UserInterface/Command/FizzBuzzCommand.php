<?php

namespace App\CodeChallenge\UserInterface\Command;

use App\CodeChallenge\Application\FizzBuzzService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class FizzBuzzCommand extends Command
{
    protected static $defaultName = 'app:fizzbuzz';

    private $fizzBuzzService;

    public function __construct(FizzBuzzService $fizzBuzzService)
    {
        $this->fizzBuzzService = $fizzBuzzService;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Generates FizzBuzz output.')
            ->addArgument('start', InputArgument::OPTIONAL, 'Start number', 1)
            ->addArgument('end', InputArgument::OPTIONAL, 'End number', 100);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $start = (int) $input->getArgument('start');
        $end = (int) $input->getArgument('end');

        $result = $this->fizzBuzzService->getFizzBuzzOutput($start, $end);

        foreach ($result as $line) {
            $output->writeln($line);
        }

        return Command::SUCCESS;
    }
}
