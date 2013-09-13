<?php

namespace RestlessCo\MonstersFeedingCalculator\Tests\Command;

use Symfony\Component\Console\Tester\CommandTester;

use RestlessCo\MonstersFeedingCalculator\Command\Calculator;

/**
 * Command\Command test cases.
 *
 * @author Mike van Riel <mike.vanriel@naenius.com>
 */
class CommandTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Cilex\Command\Command */
    protected $fixture = null;

    /**
     * Sets up the test fixture.
     */
    public function setUp()
    {
        $this->app = new \Cilex\Application('Test');
        $this->app->command(new Calculator());
        $this->command = $this->app['console']->get('calculate');
        $this->commandTester = new CommandTester($this->command);
    }

    public function testCalculateThrowsErrorOnInvalidLevelRange()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->executeCommand(['--from-level' => 3, '--to-level' => 1]);
    }

    public function testCalculateHandlesDefaultArguments()
    {
        $this->executeCommand();
        $expectedOutput = <<<SHELL
+-------+--------------------+------------+
| Level | Cost to next level | Total cost |
+-------+--------------------+------------+
| 1     | 20                 | 20         |
| 2     | 40                 | 60         |
| 3     | 80                 | 140        |
| 4     | 160                | 300        |
| 5     | 320                | 620        |
| 6     | 640                | 1260       |
| 7     | 1280               | 2540       |
| 8     | 2560               | 5100       |
| 9     | 5120               | 10220      |
| 10    | 10240              | 20460      |
| 11    | 20480              | 40940      |
| 12    | 40960              | 81900      |
| 13    | 81920              | 163820     |
| 14    | 163840             | 327660     |
| 15    | 327680             | 655340     |
+-------+--------------------+------------+

SHELL;
        $this->assertEquals($expectedOutput, $this->commandTester->getDisplay());
    }

    private function executeCommand(array $options = [])
    {
        $this->commandTester->execute(
            array_merge(['command' => $this->command->getName()], $options));
    }
}
