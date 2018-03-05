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
$book = new Book();
$book->setName("livro legal")
     ->setID(1)
     // Setting the Book's Owner
     ->setUserId(1);

$user1  = new  User();
$user1->setId(1);

$user2  = User();
$user2->setId(2);

$acl = new \YaniPHP\Acl\Acl($roles, $resources);
$acl->setUSer($user1);

Verifying if user1 is the owner of a resource (Book)  
var_dump($acl->isOwner($book, $user1));

Verifying if user2 can (has permission to ) View the book  
var_dump($acl->can('view', $user2));

