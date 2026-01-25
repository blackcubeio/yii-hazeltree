<?php

declare(strict_types=1);

/**
 * HazeltreeInterface.php
 *
 * PHP Version 8.3+
 *
 * @author Philippe Gaultier <pgaultier@blackcube.io>
 * @copyright 2010-2026 Blackcube
 * @license https://blackcube.io/license
 */

namespace Blackcube\Hazeltree;

/**
 * Interface for models that use the Hazeltree nested set algorithm.
 *
 * Required database columns: path, left, right, level
 *
 * @property-read float|null $left Left boundary value (readonly)
 * @property-read float|null $right Right boundary value (readonly)
 * @property-read string|null $path Path in dot notation (readonly)
 * @property-read int|null $level Level (depth) in tree (readonly)
 *
 * @author Philippe Gaultier <pgaultier@blackcube.io>
 * @copyright 2010-2026 Blackcube
 * @license https://blackcube.io/license
 */
interface HazeltreeInterface
{
    /**
     * Check if this is a root node.
     */
    public function isRoot(): bool;

    /**
     * Check if this node can be moved to a target path.
     */
    public function canMove(string $targetPath): bool;

    /**
     * Insert or save current item into target item at last position.
     * Accepts a Node or a path string (e.g., '1.2.3').
     */
    public function saveInto(HazeltreeInterface|string $target, ?array $attributeNames = null): bool;

    /**
     * Insert or save current item before target item.
     * Accepts a Node or a path string (e.g., '1.2.3').
     */
    public function saveBefore(HazeltreeInterface|string $target, ?array $attributeNames = null): bool;

    /**
     * Insert or save current item after target item.
     * Accepts a Node or a path string (e.g., '1.2.3').
     */
    public function saveAfter(HazeltreeInterface|string $target, ?array $attributeNames = null): bool;
}
