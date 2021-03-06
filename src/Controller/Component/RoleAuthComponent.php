<?php
/**
 * RoleAuth (https://github.com/PotatoPowered/RoleAuth)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE
 * Redistributions of files must retain the above copyright notice.
 *
 * @author      Blake Sutton <blake@potatopowered.net>
 * @copyright   Copyright (c) Potato Powered Software
 * @link        http://potatopowered.net
 * @license     http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace RoleAuth\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;

/**
 * RoleAuth component
 */
class RoleAuthComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'roles_table' => 'roles',
        'admin_role' => 'Admin',
        'default_role' => 'User'
    ];
    /**
     * Initialize the component
     *
     * @param array $config the configuration
     * @return void
     */
    public function initialize(array $config)
    {
        $this->Roles = TableRegistry::get($this->_config['roles_table']);
        $this->Controller = $this->_registry->getController();
    }
    /**
     * Called before the beforeFilter and after the controllers Initialize function.
     *
     * @param Event $event The startup event
     * @return void
     */
    public function startup(Event $event)
    {
        // do nothing currently
    }

    /**
     * Check to see if a user is an administrator
     *
     * @param int $role_id The role id of the user to check and see if they are an admin.
     * @return bool returns true if the user is an admin
     */
    public function isAdmin($role_id)
    {
        $adminRole = $this->Roles->findByName($this->_config['admin_role'])->first();

        if ($adminRole != null) {
            return $role_id === $adminRole->id;
        }

        return false;
    }
    /**
     * @param string $roleName The name to get permission level
     * @return \RoleAuth\Model\Entity\Role The role requested
     */
    public function minimumRole($roleName)
    {
        $role = $this->Roles->findByName($roleName)->first();

        return $role;
    }
    /**
     * Get the id of a role by name.
     *
     * @param string $roleName The name of the users role
     * @return bool returns true if the user is an admin
     */
    public function getId($roleName)
    {
        $role = $this->Roles->findByName($roleName)->first();
        if ($role != null) {
            return $role->id;
        }

        return 0;
    }

    /**
     * Set all of the role variables.
     *
     * @param array $user The Auth user
     * @return void
     */
    public function setRoles($user)
    {
        $is_user = ($user) ? true : false;
        $role_id = ($is_user) ? $user['role_id'] : null;
        $user_id = ($is_user) ? $user['id'] : null;

        $roles = $this->Roles->find()->toArray();

        foreach ($roles as $role) {
            $this->Controller->set('is_' . Inflector::variable($role->name), ($role->id === $role_id));
        }

        $this->Controller->set('is_admin', $this->isAdmin($role_id));
        $this->Controller->set('is_validUser', ($user_id != null));
    }

    /**
     * Check to see if a user has a role
     *
     * @param string $name The role name to validate against.
     * @param int $role_id The role id of the user to check and see if they are an admin.
     * @return bool returns true if the user has the role
     */
    public function hasRole($name, $role_id)
    {
        $role = $this->Roles->findByName($name)->first();

        if ($role != null) {
            return $role_id === $role->id;
        }

        return false;
    }
}
