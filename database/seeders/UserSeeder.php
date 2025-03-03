<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        // --- Insert 3 autoridades ---
        DB::table('users')->insert([
            'codigo_usuario' => 'AUTH' . strtoupper(Str::random(5)),
            'nombre'         => 'John Doe',
            'email'          => 'john.doe@example.com',
            'password'       => bcrypt('secret'),
            'rol'            => 'Autoridad',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
        DB::table('autoridades')->insert([
            'codigo_usuario' => DB::table('users')->where('email', 'john.doe@example.com')->value('codigo_usuario'),
            'departamento'   => 'Dept A',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        DB::table('users')->insert([
            'codigo_usuario' => 'AUTH' . strtoupper(Str::random(5)),
            'nombre'         => 'Jane Smith',
            'email'          => 'jane.smith@example.com',
            'password'       => bcrypt('secret'),
            'rol'            => 'Autoridad',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
        DB::table('autoridades')->insert([
            'codigo_usuario' => DB::table('users')->where('email', 'jane.smith@example.com')->value('codigo_usuario'),
            'departamento'   => 'Dept B',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        DB::table('users')->insert([
            'codigo_usuario' => 'AUTH' . strtoupper(Str::random(5)),
            'nombre'         => 'Mark Johnson',
            'email'          => 'mark.johnson@example.com',
            'password'       => bcrypt('secret'),
            'rol'            => 'Autoridad',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
        DB::table('autoridades')->insert([
            'codigo_usuario' => DB::table('users')->where('email', 'mark.johnson@example.com')->value('codigo_usuario'),
            'departamento'   => 'Dept C',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        // --- Insert 3 familiares ---
        DB::table('users')->insert([
            'codigo_usuario' => 'FAM' . strtoupper(Str::random(5)),
            'nombre'         => 'Alice Brown',
            'email'          => 'alice.brown@example.com',
            'password'       => bcrypt('secret'),
            'rol'            => 'Familiar',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
        DB::table('familiares')->insert([
            'codigo_usuario' => DB::table('users')->where('email', 'alice.brown@example.com')->value('codigo_usuario'),
            'direccion'      => '123 Main St',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        DB::table('users')->insert([
            'codigo_usuario' => 'FAM' . strtoupper(Str::random(5)),
            'nombre'         => 'Bob Green',
            'email'          => 'bob.green@example.com',
            'password'       => bcrypt('secret'),
            'rol'            => 'Familiar',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
        DB::table('familiares')->insert([
            'codigo_usuario' => DB::table('users')->where('email', 'bob.green@example.com')->value('codigo_usuario'),
            'direccion'      => '456 Oak Ave',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        DB::table('users')->insert([
            'codigo_usuario' => 'FAM' . strtoupper(Str::random(5)),
            'nombre'         => 'Carol White',
            'email'          => 'carol.white@example.com',
            'password'       => bcrypt('secret'),
            'rol'            => 'Familiar',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
        DB::table('familiares')->insert([
            'codigo_usuario' => DB::table('users')->where('email', 'carol.white@example.com')->value('codigo_usuario'),
            'direccion'      => '789 Pine Rd',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        // --- Insert 3 comunidades ---
        DB::table('users')->insert([
            'codigo_usuario' => 'COM' . strtoupper(Str::random(5)),
            'nombre'         => 'Community Alpha',
            'email'          => 'alpha.community@example.com',
            'password'       => bcrypt('secret'),
            'rol'            => 'Comunidad',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
        DB::table('comunidades')->insert([
            'codigo_usuario' => DB::table('users')->where('email', 'alpha.community@example.com')->value('codigo_usuario'),
            'descripcion_comunidad' => 'Community Alpha Description',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        DB::table('users')->insert([
            'codigo_usuario' => 'COM' . strtoupper(Str::random(5)),
            'nombre'         => 'Community Beta',
            'email'          => 'beta.community@example.com',
            'password'       => bcrypt('secret'),
            'rol'            => 'Comunidad',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
        DB::table('comunidades')->insert([
            'codigo_usuario' => DB::table('users')->where('email', 'beta.community@example.com')->value('codigo_usuario'),
            'descripcion_comunidad' => 'Community Beta Description',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        DB::table('users')->insert([
            'codigo_usuario' => 'COM' . strtoupper(Str::random(5)),
            'nombre'         => 'Community Gamma',
            'email'          => 'gamma.community@example.com',
            'password'       => bcrypt('secret'),
            'rol'            => 'Comunidad',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
        DB::table('comunidades')->insert([
            'codigo_usuario' => DB::table('users')->where('email', 'gamma.community@example.com')->value('codigo_usuario'),
            'descripcion_comunidad' => 'Community Gamma Description',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
    }
}
