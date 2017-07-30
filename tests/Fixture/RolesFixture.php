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
namespace RoleAuth\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class RolesFixture extends TestFixture
{
    public $connection = 'test';

    public $fields = [
        'id' => ['type' => 'integer'],
        'name' => ['type' => 'string', 'length' => 50, 'null' => false],
        'permissions' => ['type' => 'integer', 'length' => 3, 'null' => false],
        'created' => 'datetime',
        'modified' => 'datetime',
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']]
        ]
    ];
    public $records = [
        [
            'name' => 'Admin',
            'permissions' => 999,
            'created' => '2017-01-01 01:23:45',
            'modified' => '2017-01-01 01:23:45'
        ],
        [
            'name' => 'User',
            'permissions' => 100,
            'created' => '2017-01-01 01:23:45',
            'modified' => '2017-01-01 01:23:45'
        ],
        [
            'name' => 'Default',
            'permissions' => 001,
            'created' => '2017-01-01 01:23:45',
            'modified' => '2017-01-01 01:23:45'
        ]
    ];
}
