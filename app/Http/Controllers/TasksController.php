<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
     // getでtasks/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    // getでtasks/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $tasks = new Task;

        return view('tasks.create', [
            'tasks' => $tasks,
        ]);
    }

    // postでtasks/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        $message = new Task;
        $message->content = $request->content;
        $message->save();

        return redirect('/');
    }

    // getでtasks/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $tasks = Task::find($id);
        return view('tasks.show', [
        'tasks' => $tasks,
        ]);
    }

    // getでtasks/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        $tasks = Task::find($id);
        return view('tasks.edit', [
        'tasks' => $tasks,
        ]);
    }

    // putまたはpatchでtasks/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        $tasks = Task::find($id);
        $tasks->content = $request->content;
        $tasks->save();

        return redirect('/');
    }

    // deleteでtasks/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $tasks = Task::find($id);
        $tasks->delete();

        return redirect('/');
    }
}
