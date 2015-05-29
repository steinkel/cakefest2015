<?php
namespace App\Auth;

use App\Model\Table\UsersTable;
use Cake\Auth\BaseAuthorize;
use Cake\Network\Request;

/**
 * Superuser Authorize
 *
 * Detect and give full access to superusers
 *
 */
class SuperuserAuthorize extends BaseAuthorize
{

    /**
     * Check if the user is superuser
     *
     * @param type $user
     * @param Request $request
     * @return boolean
     */
    public function authorize($user, Request $request)
    {
        if ($user['role'] === UsersTable::ROLE_SUPERUSER) {
            return true;
        }

        return false;
    }
}
