#!/bin/bash

DB=$1
echo "Configuring for: $DB";

if [ ${DB} == 'mysql' ]; then
    echo "
    return [
        'Datasources' => [
            'test' => [
                'className' => 'Cake\Database\Connection',
                'driver' => 'Cake\Database\Driver\Mysql',
                'persistent' => false,
                'host' => 'localhost',
                'username' => 'root',
                'password' => '',
                'database' => 'cakephp_test',
                'encoding' => 'utf8',
                'timezone' => 'UTC',
                'cacheMetadata' => true,
                'quoteIdentifiers' => false
            ]
        ]
    ];" >> config/test_db.php;
    echo "Configured for: mysql";
elif [ ${DB} == 'pgsql' ]; then
    echo "
    return [
        'Datasources' => [
            'test' => [
                'className' => 'Cake\Database\Connection',
                'driver' => 'Cake\Database\Driver\Postgres',
                'persistent' => false,
                'host' => 'localhost',
                'username' => 'postgres',
                'password' => '',
                'database' => 'cakephp_test',
                'encoding' => '',
                'timezone' => 'UTC',
                'cacheMetadata' => true,
                'quoteIdentifiers' => false
            ]
        ]
    ];" >> config/test_db.php;
    echo "Configured for: pgsql";
else
    echo "
    return [
        'Datasources' => [
            'test' => [
                'className' => 'Cake\Database\Connection',
                'driver' => 'Cake\Database\Driver\Sqlite',
                'persistent' => false,
                'dns' => 'sqlite::memory:',
                'username' => '',
                'password' => '',
                'encoding' => 'utf8',
                'timezone' => 'UTC',
                'cacheMetadata' => true,
                'quoteIdentifiers' => false
            ]
        ]
    ];" >> config/test_db.php;
    echo "Configured for: sqlite (default)";
fi

cat config/test_db.php