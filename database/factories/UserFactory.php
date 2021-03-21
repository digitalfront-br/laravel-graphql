<?php

namespace Database\Factories;

use App\Mail\ConfirmUserMail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = array(
            ['phone' => '31987324565', 'name' => 'Thiago Augusto', 'email' => 'thiago.digitalfront@gmail.com'],
            ['phone' => '31986435111', 'name' => 'Daniel Nunes', 'email' => 'danielpnunes@gmail.com'],
            ['phone' => '31998420055', 'name' => 'José Ricardo', 'email' => 'jrer@uol.com.br']
        );
        foreach ($users as $user) {
            $user = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'roles' => 1,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            Mail::send(new ConfirmUserMail($user));
            // $u =  User::find($user);
            // $u->token = $u->createToken('user-token')->plainTextToken;
            // $u->update();
        }
        return [];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
