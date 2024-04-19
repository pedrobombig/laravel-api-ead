<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    protected $entity;

    public function __construct(Course $course)
    {
        $this->entity = $course;
    }

    public function getAllCourses()
    {
        return $this->entity->with('modules.lessons.views')->get();
    }

    public function getCourse(String $identify)
    {
        return $this->entity->with('modules.lessons.views')->findOrFail($identify);
    }
}
