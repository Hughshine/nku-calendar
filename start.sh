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
<?php
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
) > ./common/config/main-local.php

if ! [ -x "$(command -v composer)" ]; then
  echo 'Error: mysql is not installed.' >&2
  exit 1
else
    curl -sS https://getcomposer.org/installer | php
    mv composer.phar /usr/local/bin/composer
fi
# composer 全局安装

echo COMPOSER UPDATE
# 更改镜像源为aliyun
composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
# composer install
composer install
# composer update
composer update