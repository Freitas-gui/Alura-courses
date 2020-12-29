<?php


namespace Alura;


trait propertyAdvisor
{
    public function __get(string $attributeName)
    {
        $edit = "get".ucfirst($attributeName);
        return $this->$edit();
    }
}