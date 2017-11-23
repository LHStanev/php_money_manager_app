<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 11/22/2017
 * Time: 5:51 PM
 */

namespace Core;


class DataBinder implements DataBinderInterface
{
    public function bind(string $className, array $formData) {

        $fields = [];
        $i = 1;
        foreach ($formData as $key => $field) {
            $fieldArray                 = explode('_', $key);
            $fieldFormatted             = $fieldArray[0];
            if(isset($fieldArray[$i])) {
                $fieldFormatted .= ucfirst($fieldArray[$i]);
            }
            $fields[$fieldFormatted]    = $formData[$key];
        }
        $object      = new $className();
        $classInfo   = new \ReflectionClass($className);
        foreach($classInfo->getProperties() as $property) {
            $fieldName = $property->getName();

            if(array_key_exists($fieldName, $fields)){
               $setter = 'set' . ucfirst($fieldName);
               $object->$setter($fields[$fieldName]);
            }


        }

        return $object;
    }
}