<?php

use api\models\docs\Doc;

return [
    new Doc([
        'url' => 'site/docs',
        'image' => 'https://static1.smartbear.co/swagger/media/assets/images/swagger_logo.svg',
        'name'  => 'Public documentation',
    ]),
    new Doc([
        'url' => 'v1/app/docs',
        'image' => 'https://static1.smartbear.co/swagger/media/assets/images/swagger_logo.svg',
        'name'  => 'Private user documentation',
    ]),
];
