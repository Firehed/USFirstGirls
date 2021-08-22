<?php
class permissions {

	// ===================================
	// = Core permission-checking method =
	// ===================================

	public static function can(Auth_User_Model $bearer, $action, RoleEnforcer $enforcer) {
		$roles = $enforcer->getRolesOfBearer($bearer);
		$okActions = $enforcer->getAllowedActions();
		$badActions = $enforcer->getDisallowedActions();

		// Intentionally iterating twice here - return false on explicity blocked actions before checking if something is OK
		foreach ($roles as $role) {
			if (isset($badActions[$role])) {
				if (in_array($action, $badActions[$role])) {
					return false;
				}
			}
		}
		
		foreach ($roles as $role) {
			if (isset($okActions[$role])) {
				if (in_array($action, $okActions[$role])) {
					return true;
				}
			}
		}
		
		return false;
	} // function can

} // class permissions