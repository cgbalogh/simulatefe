<?php
namespace CGB\Simulatefe\Service;

/***
 *
 * This file is part of the "Simulate FE User" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Kai Strobach <typo3@kay-strobach.de>
 *           Christoph Balogh <cb@lustige-informatik.at>
 *
 ***/

class UtilityService implements \TYPO3\CMS\Core\SingletonInterface {
	public static function getPidList($pid_list, $recursive) {
		$recursive = \TYPO3\CMS\Core\Utility\MathUtility::forceIntegerInRange($recursive, 0);

		$pid_list_arr = array_unique(\TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $pid_list, 1));
		$pid_list     = array();

		$cObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer::class);

		foreach($pid_list_arr as $val) {
			$val = \TYPO3\CMS\Core\Utility\MathUtility::forceIntegerInRange($val, 0);
			if ($val) {
				$_list = $cObj->getTreeList(-1 * $val, $recursive);
				if ($_list) {
					$pid_list[] = $_list;
				}
			}
		}
		return $pid_list;
	}
}