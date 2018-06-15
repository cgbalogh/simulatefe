<?php
namespace CGB\Simulatefe\Controller;

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
 * UserController
 */
class UserController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * userRepository
     *
     * @var \CGB\Simulatefe\Domain\Repository\UserRepository
     * @inject
     */
    protected $userRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $users = $this->userRepository->findBySettings($this->settings);
        $this->view->assign('users', $users);
        $this->view->assign('currentUser', $GLOBALS['TSFE']->fe_user->user);
        $this->view->assign('allUsersMaySwitchUser', $this->checkPermissions());
    }

    /**
     * action switch
     *
     * @param \CGB\Simulatefe\Domain\Model\User $user
     * @return void
     */
    public function switchAction(\CGB\Simulatefe\Domain\Model\User $user)
    {
        if ($this->checkPermissions()) {
            // $fe_user = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('fe_users', $user->getUid());
            // $GLOBALS['TSFE']->fe_user->createUserSession($fe_user);
            
    		// $user = $this->userRepository->findByUid($ncfeuserid);
    		$GLOBALS['TSFE']->fe_user->createUserSession($user->_getProperties());
    		$GLOBALS["TSFE"]->fe_user->user = $GLOBALS["TSFE"]->fe_user->fetchUserSession();            
        } else {
            $this->addFlashMessage('You´re not allowed to switch to a different user.', 'Access denied', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        }
        // $this->redirect('list');
        $this->view->assign('user', $user);
    }

    /**
     * action logout
     *
     * @return void
     */
    public function logoutAction()
    {
        $GLOBALS['TSFE']->fe_user->logoff();
    }

    /**
     * @return boolean
     */
    protected function checkPermissions()
    {
        switch ($this->settings['securityConcept']) {
            case 'group':    foreach ($GLOBALS['TSFE']->fe_user->groupData['uid'] as $groupUid) {
                    if (\TYPO3\CMS\Core\Utility\GeneralUtility::inList($groupUid, $this->settings['securityGroupList'])) {
                        return true;
                    }
                }
                break;
            case 'admin':    
            default:    return $GLOBALS['BE_USER'] && $GLOBALS['BE_USER']->isAdmin();
                break;
        }
    }
}
