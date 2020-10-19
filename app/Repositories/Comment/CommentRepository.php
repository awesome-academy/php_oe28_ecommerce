<?php
namespace App\Repositories\Comment;

use App\Repositories\BaseRepository;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Comment;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function getModel()
    {
        return Comment::class;
    }
}
