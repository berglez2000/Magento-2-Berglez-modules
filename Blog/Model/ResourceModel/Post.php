<?php

namespace Berglez\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Post extends AbstractDb
{
    private const string TABLE_NAME = 'berglez_blog_post';
    private const string PRIMARY_KEY = 'post_id';
    protected function _construct(): void
    {
        $this->_init(self::TABLE_NAME, self::PRIMARY_KEY);
    }
}
