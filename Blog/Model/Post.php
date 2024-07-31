<?php

namespace Berglez\Blog\Model;

use Magento\Framework\Model\AbstractModel;
use Berglez\Blog\Model\ResourceModel\Post as PostResource;

class Post extends AbstractModel
{
    protected function _construct(): void
    {
        $this->_init(PostResource::class);
    }
}
