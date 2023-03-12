<?php

declare(strict_types=1);

namespace Two\ForceInheritance;

/**
 * Class CAN be instantiated and inherited from.
 */
class Person
{
    public function __construct(protected string $name)
    {
    }
    /** Method CANNOT be overridden in child classes */
    final public function getName(): string
    {
        return $this->name;
    }
}


/**
 * Class CANNOT be instantiated, CAN be inherited from.
 */
abstract class AbstractUser extends Person
{
    public function __construct(protected int $id, protected string $name)
    {
        parent::__construct($name);
    }
    // Abstract function - must be defined in child classes
    abstract public function __toString();
}


/**
 * Class CAN be instantiated, CANNOT be inherited from.
 */
final class FrontEndUser extends AbstractUser
{
    /** @var string[] */
    private array $recentlyViewedPages;
    public function __construct(protected int $id, protected string $name, string ...$recentlyViewedPages)
    {
        parent::__construct($id, $name);
        $this->recentlyViewedPages = $recentlyViewedPages;
    }
    public function __toString(): string
    {
        $viewed = \print_r($this->recentlyViewedPages, true);
        return <<<STRING
front end user {$this->name} ({$this->id}) has
recently viewed:
{$viewed}
STRING;
    }
}


/**
 * Class CANNOT be instantiated, CAN be inherited from.
 */
abstract class AdminPermission
{
    public const CAN_EDIT = 'canEdit';
    public const CAN_VIEW = 'canView';
    public const PERMS = [
        self::CAN_EDIT,
        self::CAN_VIEW,
    ];
    abstract public function getPermName(): string;
    abstract public function isAllowed(): bool;
}


/**
 * Class CAN be instantiated, CANNOT be inherited from.
 */
final class AdminUser extends AbstractUser
{
    /** @var array<string,AdminPermission> */
    private array $permissions;

    public function __construct(
        protected int $id,
        protected string $name,
        AdminPermission ...$permissions
    ) {
        parent::__construct($id, $name);
        array_map(
            callback: function (AdminPermission $perm): void {
                $this->permissions[$perm->getPermName()] = $perm;
            },
            array: $permissions
        );
        // var_dump($permissions);
    }

    public function __toString(): string
    {
        $permissions = implode(
            separator: "\n",
            array: array_map(
                callback: static function (
                    AdminPermission $perm
                ): string {
                    $permName = $perm->getPermName();
                    $allowed  = ($perm->isAllowed() ? 'true' : 'false');

                    return "{$permName}: {$allowed}";
                },
                array: $this->permissions
            )
        );

        return <<<STRING
            
            admin user {$this->name} ({$this->id}) has these permissions:
            {$permissions}
            
            STRING;
    }
}
