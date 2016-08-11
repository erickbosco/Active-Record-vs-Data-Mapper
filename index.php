<?php
require 'autoloader.php';

new GeneralController();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Study on the two design patterns and the frameworks that implement</title>
    </head>
    <body>
        <ul>
            <li>Active Record</li>
            <ul>
                <li>
                    <a href="/?action=activeRecordFree">
                        Free
                    </a>
                </li>
                <li>
                    <a href="/?action=activeRecordPHPActiveRecord">
                        php-activerecord
                    </a>
                </li>
            </ul>
            <li>Data Mapper</li>
            <ul>
                <li>
                    <a href="/?action=dataMapperFree">
                        Free
                    </a>
                </li>
                <li>
                    <a href="/?action=dataMapperDoctrine">
                        Doctrine 2
                    </a>
                </li>
            </ul>
        </ul>
    </body>
</html>