<?php 

declare(strict_types=1);

namespace YaniPHP\Acl\Entities;

class Role
{
    protected $name;

    public function __construct(string $name = null) 
    {
        $this->name        = $name;
        $this->permissions = [];
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
     * @return Role
     */
    public function setName(string $name) : Role
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function getPermissions() : array
    {
        return $this->permissions;        
    }

    /**
     * Undocumented function
     *
     * @param Permission $permission
     * @return Role
     */
    public function addPermission(Permission $permission) : Role
    {
        $this->permissions[] = $permission;
        return $this;
    }

}