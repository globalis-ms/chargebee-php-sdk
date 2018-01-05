<?php

namespace Tests\Unit\Api\Comments;

use NathanDunn\Chargebee\Api\Comments\Comment;
use Tests\Unit\Api\TestCase;

class CommentTest extends TestCase
{
    /** @test */
    public function should_list_comments()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/comment_list.json', __DIR__));

        $comment = $this->getApiMock();
        $comment->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/comments')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $comment->list([]));
    }

    /** @test */
    public function should_find_comment()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/comment.json', __DIR__));

        $comment = $this->getApiMock();
        $comment->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/comments/cmt_3Nl8LlrQWK2dUa1')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $comment->find('cmt_3Nl8LlrQWK2dUa1'));
    }

    /** @test */
    public function should_create_comment()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/comment_created.json', __DIR__));

        $comment = $this->getApiMock();
        $comment->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/comments')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $comment->create([]));
    }

    /** @test */
    public function should_delete_comment()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/comment_deleted.json', __DIR__));

        $comment = $this->getApiMock();
        $comment->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/comments/cmt_3Nl8LlrQWK2dUa1')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $comment->delete('cmt_3Nl8LlrQWK2dUa1'));
    }

    protected function getApiClass()
    {
        return Comment::class;
    }
}
