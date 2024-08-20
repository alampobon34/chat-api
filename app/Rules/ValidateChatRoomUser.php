<?php

namespace App\Rules;

use App\Models\ChatRoom;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateChatRoomUser implements ValidationRule
{

    protected $reqeust;

    public function __construct(array $reqeust)
    {
        $this->reqeust = $reqeust;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->reqeust['userId'] === null) {
            $fail('UserId is missing.');
        }
        if ($this->reqeust['chatRoomId'] === null) {
            $fail('Chat room id is missing.');
        }
        $chat_room = ChatRoom::where('id', $this->reqeust['chatRoomId'])->first();
        if (!$chat_room) {
            $fail('Invalid chatroom.');
        }
        $user_ids = explode(',', $chat_room->user_ids);
        if (in_array($this->reqeust['userId'], $user_ids) === false) {
            $fail('User is not a member of this chat room.');
        }
    }
}
