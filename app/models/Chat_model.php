<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Chat_model extends Model
{
    public function getChats()
    {
        return $this->db->table('chats')->get_all();
    }

    public function getChatsForUser($userId)
    {
        return $this->db->table('chats')
            ->select('*')
            ->where('receiver', $userId)
            ->or_where('sender', $userId)
            ->get_all();
    }

    
}
