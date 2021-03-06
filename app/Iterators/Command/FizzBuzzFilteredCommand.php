<?PHP
namespace Iterators\Command;

use Iterators\Classes\FizzBuzzFilter;
 
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface as InputInterface;
use Symfony\Component\Console\Output\OutputInterface as OutputInterface;

class FizzBuzzFilteredCommand extends Command
{

    protected function configure()
    {
    	   $definition = [new InputOption('max', 'm', InputOption::VALUE_REQUIRED, 'Maximum number to count to.')
    	];

        $this->setName("fizzbuzzfiltered")
		     ->setDescription("Filters input before outputting FizzBuzz")
		     ->setDefinition($definition)
		     ->setHelp("Simple demonstration of how to modify the input and output of an Iterator.");
	}


    protected function execute(InputInterface $input, 
							   OutputInterface $output)
	{
		$max = max((int)$input->getOption('max'),1);
		$numbers = range(1, $max);

		$fizzBuzzFiltered = new \Iterators\Classes\FizzBuzzFilter();

		foreach($numbers as $thisNumber) {
			$fizzBuzzFiltered[]=$thisNumber;
		}

 		$fizzBuzz = new \Iterators\Classes\FizzBuzz($fizzBuzzFiltered);

		foreach($fizzBuzz as $thisNumber) {
			$output->writeln("  ".$thisNumber);
		} // foreach($iteratableClass as $committer)

		$output->writeln("Done");
		return;
	}

}