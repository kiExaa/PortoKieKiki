<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'app:create-admin-user';
    protected $description = 'Buat akun admin pertama untuk login CMS';

    public function handle(): void
    {
        $name = $this->ask('Nama');
        $email = $this->ask('Email');
        $password = $this->secret('Password'); // secret() = tidak tampil di layar saat diketik

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password), // wajib di-hash, jangan pernah simpan plain text
        ]);

        $this->info('Akun admin berhasil dibuat.');
    }
}
