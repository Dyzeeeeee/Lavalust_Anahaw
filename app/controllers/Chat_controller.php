<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Chat_controller extends Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->call->model('Chat_model');
        $this->call->model('Accounts_model');
    }

    public function chats($userId)
    {
        // Fetch the user you are chatting with
        $userData = $this->session->userdata();

        $chatUser = $this->Accounts_model->getUserById($userId);

        // Fetch the chat messages for the specified user
        $chats = $this->Chat_model->getChatsForUser($userId);
        $users = $this->Accounts_model->getUsers();

        $data = [
            'chatUser' => $chatUser,
            'users' => $users,
            'chats' => $chats,
            'currentUser' => $userData
        ];

        $this->call->view('chats', $data);
        // echo '<pre>';
        // var_dump($data['chats']);
        // echo '</pre>';
    }

    public function sendmessage()
    {
        // Assuming you are using post data for the message
        $message = $this->io->post('message');
        $receiverId = $this->io->post('receiver');
        // Assuming you have the senderId in the session
        $senderId = $this->session->userdata('id');

        // Validate or sanitize input as needed
        $data = [
            'message' => $message,
            'sender' => $senderId,
            'receiver' => $receiverId,
            // 'message' => $message;
        ];
        $this->db->table('chats')->insert($data);
        redirect('/chats/' . $receiverId); // Redirect to the chat page
    }
}
