<?php
namespace CGB\Simulatefe\Domain\Repository;
use CGB\Simulatefe\Service;

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

/**
 * The repository for Users
 */
class UserRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    
	/**
     * 
     * @param mixed $settings
     * @return mixed
     */
    function findBySettings($settings) {
        $pidListSingle = \CGB\Simulatefe\Service\UtilityService::getPidList($settings['storagePid'], $settings['recursive']);
        $pidList = explode(',', $pidListSingle[0]);
        
		$query = $this->createQuery();
		$query->getQuerySettings()
            ->setStoragePageIds($pidList);
		$query->setOrderings(
			array(
				'username' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
			)
		);
		return $query->execute();
	}
    
}
