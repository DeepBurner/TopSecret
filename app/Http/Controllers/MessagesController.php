<?php
namespace App\Http\Controllers;
use App\User;
use App\ExtThread;
use Carbon\Carbon;
use Clockwork\Request\Request;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
class MessagesController extends Controller
{
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index()
    {
        $currentUserId = Auth::user()->id;
        // All threads, ignore deleted/archived participants


        //$threads = Thread::getAllLatest()->get();
        //$threads = Auth::user()->threads->orderBy('created_at', 'desc');
        // All threads that user is participating in
        $threads2 = Thread::forUser($currentUserId)->latest('updated_at')->get();

        $threads = array();
        foreach($threads2 as $thread){
            array_push($threads, new ExtThread($thread));
        }
        // All threads that user is participating in, with new messages
        //$threads = Thread::forUserWithNewMessages($currentUserId)->latest('updated_at')->get();
        return view('messenger.index', compact('threads', 'currentUserId'));
    }
    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
		$currentUserId = Auth::user()->id;
		$threadsTemp = Thread::forUser($currentUserId)->latest('updated_at')->get();
		$threads = array();
        foreach($threadsTemp as $threadTemp){
            array_push($threads, new ExtThread($threadTemp));
        }
		
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('messages');
        }
        // show current user in list if not a current participant
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();
        // don't show the current user in list
        $userId = Auth::user()->id;
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $thread->markAsRead($userId);
		
        $thread = new ExtThread($thread);
        return view('messenger.show', compact('threads', 'currentUserId', 'thread', 'users'));
    }
    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('messenger.create', compact('users'));
    }
    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store()
    {
        $input = Input::all();
        $thread = Thread::create(
            [
                'subject' => $input['subject'],
            ]
        );
        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $input['message'],
            ]
        );
        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant($input['recipients']);
        }
        return redirect('messages');
    }
    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('messages');
        }
        $thread->activateAllParticipants();
        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::id(),
                'body'      => Input::get('message'),
            ]
        );
        // Add replier as a participant
        $participant = Participant::firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
            ]
        );
        $participant->last_read = new Carbon;
        $participant->save();
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant(Input::get('recipients'));
        }
        return redirect('messages/' . $id);
    }

    public function sendMessage(){
        $input = Input::all();
        $receiverid = $input['receiver'];
        $threads = Auth::user()->threads;
        foreach($threads as $thread){
            if($thread->hasParticipant($receiverid)){
                $thread->activateAllParticipants();
                // Message
                Message::create(
                    [
                        'thread_id' => $thread->id,
                        'user_id'   => Auth::id(),
                        'body'      => Input::get('message'),
                    ]
                );
                // Add replier as a participant
                $participant = Participant::firstOrCreate(
                    [
                        'thread_id' => $thread->id,
                        'user_id'   => Auth::user()->id,
                    ]
                );
                $participant->last_read = new Carbon;
                $participant->save();
                // Recipients
                if (Input::has('recipients')) {
                    $thread->addParticipant(Input::get('recipients'));
                }
                return redirect('messages/' . $thread->id);
            }
        }

        $input = Input::all();
        $thread = Thread::create(
            [
                'subject' => '',
            ]
        );
        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $input['message'],
            ]
        );
        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );
        // Recipient
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => $receiverid,
                'last_read' => new Carbon,
            ]
        );
        return redirect('messages'. $thread->id);
    }
}