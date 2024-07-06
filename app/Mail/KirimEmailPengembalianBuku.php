<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class KirimEmailPengembalianBuku extends Mailable
{
    use Queueable, SerializesModels;

   
    public function __construct($email, $nama_buku, $tanggal_di_kembalikan, $nama_murid_atau_guru)
    {
        $this->email = $email;
        $this->nama_buku = $nama_buku;
        $this->tanggal_di_kembalikan = $tanggal_di_kembalikan;
        $this->nama_murid_atau_guru = $nama_murid_atau_guru;
    }
    
    public function build()
    {
        return $this->from('perpustakaan@gmail.com')    
                    ->view('admin.mail.kirim_email_pengembalian_buku')
                    ->with(
                        [
                            'email' => $this->email, 
                            'nama_buku' => $this->nama_buku, 
                            'tanggal_di_kembalikan' => $this->tanggal_di_kembalikan, 
                            'nama_murid_atau_guru' => $this->nama_murid_atau_guru, 
                        ]
                    );
    }
    

   
}
