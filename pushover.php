<?php
# https://github.com/Dreller/pushover
class pushover{

    # Set your personal API Token here.
    private $token      = '';
    # Set the user or group to send messages, by default.
    # You can leave that blank and use 'setUser' later.
    private $user       = '';

    # Other values you can set by default or use the
    # corresponding function to change later.
    private $sound      = 'pushover';
    private $priority   = 'normal';

    #TODO: ISSUE 1
        
    private $message    = '';
    private $title      = '';
    private $url        = 'https://api.pushover.net/1/messages.json';

    public function send($message, $title = ''){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, 1);

        $curlPost = Array(
            "token"     => $this->token,
            "user"      => $this->user,
            "message"   => $message
        );
        if( $title != '' ){
            $curlPost['title']  = $title;
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $dummy = curl_exec($ch);
        curl_close($ch);
    }

    public function setUser($user = ''){
        if( $user != '' ){
            $this->user = $user;
        }
    }

    public function setSound($sound = 'pushover'){
        #to be done later
    }
}