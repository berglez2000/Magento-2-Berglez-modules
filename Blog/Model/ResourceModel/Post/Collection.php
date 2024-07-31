<?php

namespace Berglez\Blog\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Berglez\Blog\Model\Post;
use Berglez\Blog\Model\ResourceModel\Post as PostResource;

class Collection extends AbstractCollection
{
    protected function _construct(): void
    {
        $this->_init(Post::class, PostResource::class);
    }
}
