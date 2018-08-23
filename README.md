# php-acl
A Simple ACL PHP Package




### Examples

$permission = new \YaniPHP\Acl\Entities\Permission;

$permission->setName("view");

$role = new \YaniPHP\Acl\Entities\Role("supervisor");  
$role->addPermission($permission);

$roles[] = $role;

$resource = new \YaniPHP\Acl\Entities\Resource(Book::class, 'getUserId');  
$resources[] = $resource;  
$article = new Article();  
$article->setName(" First Article ")  
     ->setID(1)  
     // Setting the article's Owner  
     ->setUserId(1);

$user1  = new  User();  
$user1->setId(1);  

$user2  = User();  
$user2->setId(2);  

$acl = new \YaniPHP\Acl\Acl($roles, $resources);  
$acl->setUSer($user1);  

Verifying if user1 is the owner of a resource (Article)  
var_dump($acl->isOwner($article, $user1));

Verifying if user2 can (has permission to ) View the article  
var_dump($acl->can('view', $user2));

