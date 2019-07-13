<?php

return yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/main.php',
    require __DIR__ . '/main-local.php',
    require __DIR__ . '/test.php',
    require __DIR__ . '/test-local.php',
    [
        'components' => [
            'request' => [
                // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
<<<<<<< HEAD
                'cookieValidationKey' => 'hsO7dFIj9Jr3vGobD-vX-y1gYzcxkckB',
=======
                'cookieValidationKey' => 'WN53u48jWoO3QAML_qZNLJi0bJTC5MaK',
>>>>>>> a63ad4ee867000a9739ec239a406faeaa896a148
            ],
        ],
    ]
);
