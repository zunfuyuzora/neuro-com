<?php

namespace App\Http\Controllers;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use App\Member;
use App\Message;

class WebSocketController extends Controller implements MessageComponentInterface
{
    protected $clients;
    protected $subscriptions;
    protected $users;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        $this->subscriptions = [];
        $this->users = [];
    }
    
     /**
     * When a new connection is opened it will be passed to this method
     * @param  ConnectionInterface $conn The socket/connection that just connected to your application
     * @throws \Exception
     */
    function onOpen(ConnectionInterface $conn){
        $this->clients->attach($conn);
        $this->users[$conn->resourceId] = $conn;
        echo sprintf('New Connection! "'.$conn->resourceId.'"'."\n",);
    }
    
     /**
     * This is called before or after a socket is closed (depends on how it's closed).  SendMessage to $conn will not result in an error if it has already been closed.
     * @param  ConnectionInterface $conn The socket/connection that is closing/closed
     * @throws \Exception
     */
    function onClose(ConnectionInterface $conn){
        $this->clients->detach($conn);
        unset($this->users[$conn->resourceId]);
        unset($this->subscriptions[$conn->resourceId]);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }
    
     /**
     * If there is an error with one of the sockets, or somewhere in the application where an Exception is thrown,
     * the Exception is sent back down the stack, handled by the Server and bubbled back up the application through this method
     * @param  ConnectionInterface $conn
     * @param  \Exception $e
     * @throws \Exception
     */
    function onError(ConnectionInterface $conn, \Exception $e){
        // $userId = $this->connections[$conn->resourceId]['user_id'];
        $this->clients->detach($conn);
        echo "An error has occurred with user $conn->resourceId: {$e->getMessage()}\n";
    }
    
     /**
     * Triggered when a client sends data through the socket
     * @param  \Ratchet\ConnectionInterface $conn The socket/connection that sent the message to your application
     * @param  string $msg The message received
     * @throws \Exception
     */
    function onMessage(ConnectionInterface $from, $data){
        $numRecv = count($this->clients) - 1;
        $data = json_decode($data);
        switch($data->command){
            case "subscribe":
                $this->subscriptions[$from->resourceId] = $data->channel;
                echo "Connection ".$from->resourceId." subscribe to ".$data->channel;
            break;
            case "message":
                if(isset($this->subscriptions[$from->resourceId])){
                    $target = $this->subscriptions[$from->resourceId];
                    foreach($this->subscriptions as $id => $channel){
                        if($target == $channel && $id !== $from->resourceId){
                            echo sprintf('Connection %d sending message "%s" to other connection%s'."\n", $from->resourceId, $data->message, $numRecv == 1 ? '' : 's');
                            
                            $member = Member::where('id', $data->member)->first();
                            $name = $member->user->full_name;
                            
                            //Broadcast the message
                            $this->users[$id]->send(json_encode([            
                                'message' => $data->message,
                                'name' => $name,
                                'time' => $data->time,
                            ]));
                        }
                    }
                    //Saving to database
                    Message::create([
                        "member_id"=> $data->member,
                        "group_id"=> $target,
                        "message"=>$data->message,
                        "created_at"=>$data->time
                    ]);
                }
        }
    }
}
