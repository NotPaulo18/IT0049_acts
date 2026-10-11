<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data = [
            'title' => 'Complete Task List',
            'tasks' => $taskModel->getAllTasksOrdered(),
        ];

        return view('templates/header', $data)
            . view('tasks/index', $data)
            . view('templates/footer');
    }
}