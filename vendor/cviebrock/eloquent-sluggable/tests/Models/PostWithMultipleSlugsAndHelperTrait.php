<?php namespace Cviebrock\EloquentSluggable\Tests\Models;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

/**
 * Class PostWithMultipleSlugsAndsecondary
 *
 * @package Cviebrock\EloquentSluggable\Tests\Models
 */
class PostWithMultipleSlugsAndHelperTrait extends PostWithMultipleSlugs
{

    use SluggableScopeHelpers;

}
