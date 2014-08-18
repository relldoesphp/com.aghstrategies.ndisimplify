<?php

require_once 'ndisimplify.civix.php';

function simplifier_disable_components(){
  $result = civicrm_api3('Setting', 'create', array(
  	'debug' => 1,
  	'sequential' => 1,
  	'enable_components' => ["CiviEvent","CiviMail","CiviReport"],
	));
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 0 WHERE id = 5');//Search -> Full-text Search
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 0 WHERE id = 6');//Search -> Search Builder
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 0 WHERE id = 9');//Search -> Find Mailings
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 0 WHERE id = 11');//Search -> Find Participants
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 0 WHERE id = 13');//Search -> Find Activites
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 0 WHERE id = 14');//Search -> custom searches
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 0 WHERE id = 17');//Contacts -> new Household
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 0 WHERE id = 60');//Event -> Personal Campaign Pages
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 0 WHERE id = 62');//Events -> new price set
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 0 WHERE id = 63');//Events -> manage price set
}

function simplifier_enable_components(){
   $result = civicrm_api3('Setting', 'create', array(
  	'debug' => 1,
  	'sequential' => 1,
  	'enable_components' => ["CiviEvent","CiviMail","CiviReport", "CiviContribute", "CiviMember", "CiviPledge"],
	));
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 1 WHERE id = 5');//Search -> Full-text Search
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 1 WHERE id = 6');//Search -> Search Builder
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 1 WHERE id = 9');//Search -> Find Mailings
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 1 WHERE id = 11');//Search -> Find Participants
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 1 WHERE id = 13');//Search -> Find Activites
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 1 WHERE id = 14');//Search -> custom searches
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 1 WHERE id = 17');//Contacts -> new Household
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 1 WHERE id = 60');//Event -> Personal Campaign Pages
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 1 WHERE id = 62');//Events -> new price set
	CRM_Core_DAO::executeQuery('UPDATE civicrm_navigation SET is_active = 1 WHERE id = 63');//Events -> manage price set
}


/**
 * Implementation of hook_civicrm_config
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function ndisimplify_civicrm_config(&$config) {
  _ndisimplify_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function ndisimplify_civicrm_xmlMenu(&$files) {
  _ndisimplify_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function ndisimplify_civicrm_install() {
  return _ndisimplify_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function ndisimplify_civicrm_uninstall() {
  return _ndisimplify_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function ndisimplify_civicrm_enable() {
simplifier_disable_components();
  return _ndisimplify_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function ndisimplify_civicrm_disable() {
simplifier_enable_components();
  return _ndisimplify_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function ndisimplify_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _ndisimplify_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function ndisimplify_civicrm_managed(&$entities) {
  return _ndisimplify_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function ndisimplify_civicrm_caseTypes(&$caseTypes) {
  _ndisimplify_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implementation of hook_civicrm_alterSettingsFolders
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function ndisimplify_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _ndisimplify_civix_civicrm_alterSettingsFolders($metaDataFolders);
}
