<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;


class ChatController extends Controller
{
    public function index($IdPerson)
    {

        $chats = Chat::where('IdSender', Auth::User()->IdUser)
                     ->orWhere('IdReceiver', Auth::User()->IdUser)
                     ->orderBy('time', 'asc')
                     ->get();

        $userIds = User::select('users.IdUser', 'users.Nama')
        ->join('chat', function ($join) {
            $join->on('users.IdUser', '=', 'chat.IdSender')
                 ->where('chat.IdReceiver', '=', Auth::User()->IdUser)
                 ->orWhere(function ($query) {
                     $query->on('users.IdUser', '=', 'chat.IdReceiver')
                           ->where('chat.IdSender', '=', Auth::User()->IdUser);
                 });
        })
        ->distinct()
        ->get();


        $myId = Auth::User()->IdUser;

        $allID = DB::select("SELECT DISTINCT users.IdUser
        FROM users
        JOIN chat ON (users.IdUser = chat.IdSender AND chat.IdReceiver = '$myId')
                  OR (users.IdUser = chat.IdReceiver AND chat.IdSender = '$myId')");


        $allID = array_map(function($item) {
            return (int) $item->IdUser;
        }, $allID);

        $allID = implode(",",$allID);

        if($allID == ""){
            $lastChatRaw = "";
            $unread = "";
        }else{
            $lastChatRaw = DB::select("
            SELECT c.*, u.IdUser, u.Nama, u.FotoProfil
            FROM chat c
            JOIN users u ON (u.IdUser = c.IdSender OR u.IdUser = c.IdReceiver)
            WHERE (c.IdSender = ? OR c.IdReceiver = ?)
                AND (c.IdSender IN ($allID) OR c.IdReceiver IN ($allID))
                AND c.time IN (
                SELECT MAX(time)
                FROM chat
                WHERE (IdSender = ? OR IdReceiver = ?)
                    AND (IdSender IN ($allID) OR IdReceiver IN ($allID))
                GROUP BY CASE
                    WHEN IdSender = ? THEN IdReceiver
                    ELSE IdSender
                END
                )
                AND u.IdUser IN ($allID)
            ORDER BY c.time DESC;", [$myId,$myId,$myId,$myId,$myId]);

            $unread = DB::select("
            SELECT u.IdUser, COALESCE(COUNT(c.readStatus), 0) AS Count
            FROM users u
            LEFT JOIN chat c ON (u.IdUser = c.IdSender AND c.IdReceiver = ? AND c.readStatus = 0)
            WHERE u.IdUser IN ($allID)
            GROUP BY u.IdUser;
            ",[$myId]);
        }

        $receiver = DB::selectOne("
        SELECT u.FotoProfil, u.Nama
        FROM users u
        WHERE u.IdUser = $IdPerson");

        Chat::where('IdSender', $IdPerson)
        ->where('IdReceiver', $myId)
        ->update(['readStatus' => 1]);

        // dd($lastChatRaw);

        return view("konsumen.chat", compact(['chats','IdPerson','userIds','lastChatRaw','myId','receiver','unread']));
    }

    public function index2($IdPerson)
    {
        $chats = Chat::where('IdSender', Auth::User()->IdUser)
                     ->orWhere('IdReceiver', Auth::User()->IdUser)
                     ->orderBy('time', 'asc')
                     ->get();

        $userIds = User::select('users.IdUser', 'users.Nama')
        ->join('chat', function ($join) {
            $join->on('users.IdUser', '=', 'chat.IdSender')
                 ->where('chat.IdReceiver', '=', Auth::User()->IdUser)
                 ->orWhere(function ($query) {
                     $query->on('users.IdUser', '=', 'chat.IdReceiver')
                           ->where('chat.IdSender', '=', Auth::User()->IdUser);
                 });
        })
        ->distinct()
        ->get();

        $myId = Auth::User()->IdUser;

        $allID = DB::select("SELECT DISTINCT users.IdUser
        FROM users
        JOIN chat ON (users.IdUser = chat.IdSender AND chat.IdReceiver = '$myId')
                  OR (users.IdUser = chat.IdReceiver AND chat.IdSender = '$myId')");


        $allID = array_map(function($item) {
            return (int) $item->IdUser;
        }, $allID);

        $allID = implode(",",$allID);

        $lastChatRaw = DB::select("
        SELECT c.*, u.IdUser, u.Nama, u.FotoProfil
        FROM chat c
        JOIN users u ON (u.IdUser = c.IdSender OR u.IdUser = c.IdReceiver)
        WHERE (c.IdSender = ? OR c.IdReceiver = ?)
          AND (c.IdSender IN ($allID) OR c.IdReceiver IN ($allID))
          AND c.time IN (
            SELECT MAX(time)
            FROM chat
            WHERE (IdSender = ? OR IdReceiver = ?)
              AND (IdSender IN ($allID) OR IdReceiver IN ($allID))
            GROUP BY CASE
              WHEN IdSender = ? THEN IdReceiver
              ELSE IdSender
            END
          )
          AND u.IdUser IN ($allID)
        ORDER BY c.time DESC;", [$myId,$myId,$myId,$myId,$myId]);

        $receiver = DB::selectOne("
        SELECT u.FotoProfil, u.Nama
        FROM users u
        WHERE u.IdUser = $IdPerson");

        $unread = DB::select("
        SELECT u.IdUser, COALESCE(COUNT(c.readStatus), 0) AS Count
        FROM users u
        LEFT JOIN chat c ON (u.IdUser = c.IdSender AND c.IdReceiver = ? AND c.readStatus = 0)
        WHERE u.IdUser IN ($allID)
        GROUP BY u.IdUser;
        ",[$myId]);

        Chat::where('IdSender', $IdPerson)
        ->where('IdReceiver', $myId)
        ->update(['readStatus' => 1]);

        // dd($receiver);

        return view("umkm.chat", compact(['chats','IdPerson','userIds','lastChatRaw','myId','receiver','unread']));
    }

    public function sendChat(Request $request, $IdPerson){
        $myId = Auth::User()->IdUser; // assuming you're using Laravel's built-in authentication system
        $message = $request->input('message');

        $data = [
            'IdSender' => $myId,
            'IdReceiver' => $IdPerson,
            'text' => $message,
            'time' => now(),
            'readStatus' => 0,
        ];

        DB::table('chat')->insert($data);

        return response()->json(['success' => true]);
    }
}

