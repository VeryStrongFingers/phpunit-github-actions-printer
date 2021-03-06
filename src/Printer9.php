<?php

namespace mheap\GithubActionsReporter;

use PHPUnit\Framework\TestFailure;
use PHPUnit\Framework\TestResult;
use PHPUnit\TextUI\DefaultResultPrinter;

use function mheap\GithubActionsReporter\Functions\printDefectTrace;

class Printer9 extends DefaultResultPrinter
{
    /**
     * @var null|string
     */
    private $currentType;

    protected function printHeader(TestResult $result): void
    {
    }

    protected function writeProgress(string $progress): void
    {
    }

    protected function printFooter(TestResult $result): void
    {
    }

    protected function printDefects(array $defects, string $type): void
    {
        $this->currentType = (in_array($type, ['error', 'failure']) === true) ? 'error' : 'warning';

        foreach ($defects as $i => $defect) {
            $this->printDefect($defect, $i);
        }
    }

    protected function printDefectHeader(TestFailure $defect, int $count): void
    {
    }

    protected function printDefectTrace(TestFailure $defect): void
    {
        $this->write(printDefectTrace($defect, $this->currentType));
    }
}
