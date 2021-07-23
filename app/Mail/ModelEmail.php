<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ModelEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $file = $this->data['file'];
        if ($file == null) {
            return $this->from('mugihnf@gmail.com', 'Mugiarto')
                ->view('example.isiemail')
                ->subject($this->data['judul'])
                ->with('data', $this->data);
        } else {
            return $this->from('mugihnf@gmail.com', 'Mugiarto')
                ->view('example.isiemail')
                ->subject($this->data['judul'])
                ->with('data', $this->data)
                ->attach($file, [
                    'as' => $file->getClientOriginalName(),
                    'mime' => 'image/jpeg',
                ]);
        }
    }
}
