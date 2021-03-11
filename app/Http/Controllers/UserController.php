<?php

namespace App\Http\Controllers;

use App\Models\{User};
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function meetings()
    // {
    //     $u = Meeting::where('user_id', Auth::user()->id)->get();
    //     $user = [
    //         'meetings' => MeetingResource::collection($u),
    //     ];
    //     return response()->json($user, 200);
    // }

    // public function meetingsList($id)
    // {
    //     $u = Meeting::where('id', $id)->where('user_id', Auth::user()->id)->first();
    //     if($u) {
    //         $user = [
    //             'id' => $u->id,
    //             'title' => $u->title,
    //             'count' => $u->questions->count(),
    //             'questions' => QuestionResource::collection($u->questions)
    //         ];
    //         return response()->json($user, 200);
    //     } else {
    //         return response()->json(['error' => ['Sessão não encontrada']], 400);
    //     }
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(User $user)
    // {
    //     $user->meetings;
    //     return response()->json($user, 200);
    // }
}
