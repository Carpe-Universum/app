<?php

namespace Wikia\Service\User\Permissions;

interface PermissionsService {
	public function getGlobalGroups();

	public function getImplicitGroups();

	public function getExplicitGroups();

	public function getPermissions();

	public function getExplicitUserGroups( $cityId, $userId );

	public function getExplicitGlobalUserGroups( $userId );

	public function getExplicitLocalUserGroups( $cityId, $userId );

	public function getEffectiveUserGroups( $cityId, \User $user, $reCacheAutomaticGroups = false );

	public function getAutomaticUserGroups( \User $user, $reCacheAutomaticGroups = false );

	public function getGroupPermissions( $groups );

	public function getGroupsWithPermission( $role );

	public function getUserPermissions( $cityId, \User $user );

	public function getGroupsChangeableByGroup( $group );

	public function getGroupsChangeableByUser( $cityId, \User $user );

	public function addUserToGroup( $cityId, \User $userPerformingChange, \User $userToChange, $group );

	public function removeUserFromGroup( $cityId, \User $userPerformingChange, \User $userToChange, $group );

	public function doesUserHavePermission( $cityId, \User $user, $permission );

	public function doesUserHaveAllPermissions( $cityId, \User $user, $permissions );
}
