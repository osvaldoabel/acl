<?php 

declare(strict_types=1);

namespace YaniPHP\Acl\Entities;

class Permission
{
    private $name;

    public function __construct(string $name = null) 
    {
        $this->name = $name;
    }

    /**
     * Get permission name
     *
     * @return void
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Set permission name
     *
     * @param [string] $name
     * @return Permission
     */
    public function setName($name) : Permission
    {
        $this->name = $name;
        return $this;
    }
}
