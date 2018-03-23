<?php 
declare(strict_types=1);

namespace YaniPHP\Acl;

use YaniPHP\Acl\Entities\Role;
use YaniPHP\Acl\Entities\Resource;
use YaniPHP\Acl\Contracts\UserAcl;

class Acl
{
    protected $roles;
    protected $user; 
    protected $resources; 

    public function __construct(array $roles, array $resources)
    {
        foreach ($roles as $role) {
            if(!$role instanceof Role) {
                throw new \InvalidArgumentException("Invalid Role");
            }
        }
        $this->roles = $roles;

        foreach ($resources as $resource) {
            if(!$resource instanceof Resource) {
                throw new \InvalidArgumentException("Invalid Resource");
            }
        }

        $this->resources = $resources;
    }

    /**
     * Undocumented function
     *
     * @param string $role
     * @return boolean
     */
    public function hasRole(string $role) : bool
    {
        foreach ($this->roles as $r) {
            if ($r->getName() == $role) {
                return true;
            }
        }

        return false;
    }

    public function setUser(UserAcl $user) : Acl
    {
        $this->user = $user;
        return $this;
    }

    public function hasPermission(string $role, string $permission): bool
    {
        foreach ($this->roles as $r) {
            if ($r->getName() == $role) {
                foreach ($r->getPermissions() as $p) {
                    if ($p->getName() == $permission) {
                        return true;
                    }
                }
            }
        }
        
        return false;
    }

    /**
     * Undocumented function
     *
     * @param string $permission
     * @param UserAcl $user
     * @return boolean
     */
    public function can(string $permission, UserAcl $user = null) : bool
    {
        if ($user) {
            return $this->hasPermission($user->getRole(), $permission);
        }

        if ($this->user) {
            return $this->hasPermission($this->user->getRole(), $permission);
        }

        return false;
    }

    /**
     * Undocumented function
     *
     * @param string $permission
     * @param UserAcl $user
     * @return boolean
     */
    public function cannot(string $permission, UserAcl $user = null) : bool
    {
        return !$this->can($permission, $user);
    }

    public function isOwner($resource, UserAcl $user = null) : bool
    {
        if ($user) {
            $this->setUser($user);
        }

        foreach ($this->resources as $r) {
            if (is_a($resource, $r->getName())) {
                if ($user) {
                    return $resource->{$r->getOwnerField()}() == $user->getId();
                }
                
                return $resource->{$r->getOwnerField()}() == $this->user->getId();
            }
        }

        return false;
    }
}
