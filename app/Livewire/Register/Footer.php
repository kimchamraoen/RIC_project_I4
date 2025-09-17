<?php

namespace App\Livewire\Register;

use Livewire\Component;

class Footer extends Component
{
    public $title, $name, $email, $phone, $subject, $message;

    protected $rules = [
        'title' => 'required|string|max:50',
        'name' => 'required|string|max:100',
        'email' => 'required|email',
        'phone' => 'nullable|string|max:20',
        'subject' => 'required|string|max:150',
        'message' => 'required|string|max:500',
    ];

    public function submit()
    {
        $this->validate();

        // Example: send an email (you can customize this)
        Mail::raw($this->message, function ($mail) {
            $mail->to('ric_itc@itc.edu.kh')
                ->subject($this->subject)
                ->replyTo($this->email);
        });

        session()->flash('success', 'Your message has been sent successfully!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.register.footer');
    }
}
