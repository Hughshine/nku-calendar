#!/usr/bin/env bash
# Unsafe auto-deploy script.
if ! [ -x "$(command -v php)" ]; then
  echo 'Error: php is not installed.' >&2
  exit 1
fi

if ! [ -x "$(command -v mysql)" ]; then
  echo 'Error: mysql is not installed.' >&2
  exit 1
fi

user=root
password="default"
if [ -n "$1" ]; then
    user=$1
    echo Using mysql user: ${user}
else
    echo Using default mysql user: ${user}
fi

if [ -n "$2" ]; then
    password=$2
else
    echo Using empty password for user ${user}
fi

echo Initiating database: TestShell
cat ./db/sh_test.sql| mysql -u ${user} -p"${password}"

echo PHP INIT
php init

echo PROJECT CONFIGING

(
cat << EOF
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=TestShell',
            'username' => '${user}',
            'password' => '${password}',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
EOF
) > ./common/main-local.conf


echo COMPOSER UPDATE
composer install
composer update