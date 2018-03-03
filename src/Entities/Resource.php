<?php 

declare(strict_types=1);

namespace YaniPHP\Acl\Entities;

class Resource
{
    protected $name;
    protected $ownerField;

    public function __construct(string $name = null, string $ownerField = null) 
    {
        $this->name         = $name;
        $this->ownerField   = $ownerField;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Undocumented function
     *
     * @param [type] $name
     * @return Resource
     */
    public function setName($name) : Resource
    {
        $this->name = $name;
        return $this;
    }

    public function setOwnerField(string $ownerField) : Resource
    {
        $this->ownerField = $ownerField;
        return $this;
    }

    public function getOwnerField() : string
    {
        return $this->ownerField;
    }
}