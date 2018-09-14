<?php

namespace PHPComposter\PHPComposter_PHPCS_Drupal;

use PHP_CodeSniffer_CLI;
use PHPComposter\PHPComposter\BaseAction;

/**
 * Provides the pre commit hook to run the sniffs.
 */
class Sniffer extends BaseAction
{

    /**
     * Run PHP Code Sniffer over PHP files as pre-commit hook.
     */
    public function preCommit()
    {
        $files = $this->getStagedFiles(
            "'/*.\(php\|module\|inc\|install\|test\|profile\|theme\|css\|info\|txt\|md\)$'",
            false
        );
        if (empty($files)) {
            return;
        }

        echo 'Running PHP CodeSniffer in ' . $this->root . PHP_EOL;
        $sniffer = new PHP_CodeSniffer_CLI();

        @$config = $this->getExtraKey('php-composter-phpcs-drupal', [
          'standard' => 'Drupal'
        ]);

        ob_start();
        $numErrors = $sniffer->process([
          'standard' => $config['standard'],
          'ignore' => [
            'node_modules',
            'bower_components',
            'vendor',
          ],
          'files' => $files,
        ]);

        echo ob_get_clean() . PHP_EOL;

        if ($numErrors === 0) {
            exit(0);
        } else {
            echo 'PHP Code Sniffer found errors! Aborting Commit.' . PHP_EOL;
            exit(1);
        }
    }
}
