<?php

namespace DynamicContentForElementor\Extensions\DynamicTags;

use DynamicContentForElementor\Extensions\ExtensionPrototype;
if (!\defined('ABSPATH')) {
    exit;
    // Exit if accessed directly
}
class AuthorField extends ExtensionPrototype
{
    public function __construct()
    {
        parent::__construct();
        $this->add_dynamic_tag('AuthorField');
    }
}
