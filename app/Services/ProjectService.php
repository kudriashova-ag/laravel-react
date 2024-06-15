<?php
namespace App\Services;

use App\Models\Project;

class ProjectService{
    function getAll() {
        return Project::all();
    }
}