<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 11/22/2017
 * Time: 6:34 PM
 */

namespace Core;


interface DataBinderInterface
{
    public function bind(string $className, array $formData);
}