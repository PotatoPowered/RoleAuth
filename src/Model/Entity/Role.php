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
namespace RoleAuth\Model\Entity;

use Cake\ORM\Entity;

/**
 * Role Entity
 *
 * @property int $id
 * @property string $name
 * @property int $permissions
 */
class Role extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}