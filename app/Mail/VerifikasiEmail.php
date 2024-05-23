<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Auth;

class VerifikasiEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $pengguna;

    public function __construct($pengguna)
    {
        $this->pengguna = $pengguna;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(Auth::user()->email)
        ->view('pages.verifikasi.email')
        ->with(
         [
             'nama' => $this->pengguna["nama"],
             'nama_admin' => Auth::user()->nama,
         ]);
    }
}
