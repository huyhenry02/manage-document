<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\Factory;

class UserController extends Controller
{
    public function show_index(): View|Factory|Application
    {
        $agents = User::where('role_type', User::ROLE_AGENT)->get();
        return view('user.index',
            [
                'agents' => $agents,
            ]);
    }

    public function show_create(): View|Factory|Application
    {
        return view('user.create');

    }

    public function show_detail(): View|Factory|Application
    {
        return view('user.detail');

    }
    public function show_index_comment(): View|Factory|Application
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('user.index-comment', [
            'comments' => $comments
        ]);
    }


    public function show_update(User $model): View|Factory|Application
    {
        return view('user.update',
            [
                'model' => $model,
            ]);

    }

    public function createAgent(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['role_type'] = User::ROLE_AGENT;
            $input['password'] = bcrypt('123');
            $agent = new User();
            $agent->fill($input);
            $agent->save();
            DB::commit();
            return redirect()->route('user.index')->with('success', 'Agent created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateAgent(Request $request, User $model): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $model->fill($input);
            $model->save();
            DB::commit();
            return redirect()->route('user.index')->with('success', 'Agent updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function deleteAgent(User $model): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $model->delete();
            DB::commit();
            return redirect()->route('user.index')->with('success', 'Agent deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function comment(Request $request): JsonResponse
    {
        try {
            $input = $request->all();
            $comment = new Comment();
            $input['user_id'] = auth()->id();
            $comment->fill($input);
            $comment->save();
            $comments = Comment::where('document_id', $input['document_id'])
                ->with('user')
                ->orderBy('created_at', 'desc')
                ->get();
            return response()->json([
                'comments' => $comments
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
