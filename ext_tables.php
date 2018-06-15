<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'CGB.Simulatefe',
            'Simulate',
            'FE-User Selector'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('simulatefe', 'Configuration/TypoScript', 'Simulate FE User');

    }
);
