<?php

namespace App\Repositories;

use App\Models\Lesson;
use App\Models\View;
use App\Repositories\Traits\RepositoryTrait;

class LessonRepository
{
    use RepositoryTrait;

    protected $entity;

    public function __construct(Lesson $lesson)
    {
        $this->entity = $lesson;
    }

    public function getLessonsByModuleId(String $moduleId)
    {
        return $this->entity
            ->where('module_id', $moduleId)
            ->with('supports.replies')
            ->get();
    }

    public function getLessonById(String $identify)
    {
        return $this->entity
            ->findOrFail($identify);
    }

    public function markLessonViewed(string $lessonId)
    {
        $user = $this->getUserAuth();
        $view = $user->views()->where('lesson_id', $lessonId)->first();

        if ($view) {
            return $view->update(['qty' => $view->qty + 1]);
        }

        return $user->views()->create([
            'lesson_id' => $lessonId
        ]);
    }
}
