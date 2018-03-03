<?php 

declare(strict_types=1);

namespace YaniPHP\Acl\Entities;

class Permission
{
    protected $name;

    public function __construct(string $name = null) 
    {

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
     * @return Permission
     */
    public function setName($name) : Permission
    {
        $this->name = $name;
        return $this;
    }
}