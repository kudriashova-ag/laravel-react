<?php
namespace App\Services;

use App\Models\Task;

class TaskService{
    function list() {
        return Task::with('project')->orderBy('priority')->get();
    }

    function listByProject(int $projectId)
    {
        return Task::with('project')
            ->where('project_id', $projectId)
            ->orderBy('priority')
            ->get();
    }

    function getById(int $id) {
        return Task::with('project')->where('id', $id)->first();
    }

    function store(array $data) {
        Task::create($data);
    }

    function update(int $id, array $data){
            $task = $this->getById($id);
            if(!$task) return;
            $task->update($data);
    }

    function delete(int $id) {
        $task = $this->getById($id);
        if (!$task) return;
        $task->delete();
    }


}
