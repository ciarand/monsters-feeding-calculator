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
| 1     | 20                 | 15         |
| 2     | 40                 | 35         |
| 3     | 80                 | 75         |
| 4     | 160                | 155        |
| 5     | 320                | 315        |
| 6     | 640                | 635        |
| 7     | 1280               | 1275       |
| 8     | 2560               | 2555       |
| 9     | 5120               | 5115       |
| 10    | 10240              | 10235      |
| 11    | 20480              | 20475      |
| 12    | 40960              | 40955      |
| 13    | 81920              | 81915      |
| 14    | 163840             | 163835     |
| 15    | 327680             | 327675     |
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
