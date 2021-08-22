<?php
interface RoleEnforcer {
	public function getRolesOfBearer(Auth_User_Model $bearer);
	public function getAllowedActions();
	public function getDisallowedActions();
}
