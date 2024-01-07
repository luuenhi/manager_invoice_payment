<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Cashier;


class CashierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cashier::insert(
            [
                [
                    'email' => 'cashier1@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'cas_name' => 'Nguyễn Anh',
                    'phone' => '0945678213',
                    'dateofbirth' => Carbon::createFromFormat('Y-m-d', '1985-06-15'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
        
                [
                    'email' => 'cashier2@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'cas_name' => 'Trần Bảo',
                    'phone' => '0963124789',
                    'dateofbirth' => Carbon::createFromFormat('Y-m-d', '1982-02-28'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'email' => 'cashier3@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'cas_name' => 'Lê Công',
                    'phone' => '0987456321',
                    'dateofbirth' => Carbon::createFromFormat('Y-m-d', '1988-11-07'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
        
                [
                    'email' => 'cashier4@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'cas_name' => 'Phạm Duy',
                    'phone' => '0912345678',
                    'dateofbirth' => Carbon::createFromFormat('Y-m-d', '1976-08-20'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
        
                [
                    'email' => 'cashier5@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'cas_name' => 'Hoàng Gia',
                    'phone' => '0978901234',
                    'dateofbirth' => Carbon::createFromFormat('Y-m-d', '1987-04-01'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
        
                [
                    'email' => 'cashier6@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'cas_name' => 'Võ Hải',
                    'phone' => '0928765432',
                    'dateofbirth' => Carbon::createFromFormat('Y-m-d', '1979-09-12'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
        
                [
                    'email' => 'cashier7@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'cas_name' => 'Đặng Hồng',
                    'phone' => '0954312678',
                    'dateofbirth' => Carbon::createFromFormat('Y-m-d', '1983-03-25'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
        
                [
                    'email' => 'cashier8@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'cas_name' => 'Bùi Khánh',
                    'phone' => '0932109876',
                    'dateofbirth' => Carbon::createFromFormat('Y-m-d', '1978-07-09'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
        
                [
                    'email' => 'cashier9@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'cas_name' => 'Vương Linh',
                    'phone' => '0998765432',
                    'dateofbirth' => Carbon::createFromFormat('Y-m-d', '1985-10-30'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
        
                [
                    'email' => 'cashier10@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'cas_name' => 'Trịnh Minh',
                    'phone' => '0965432187',
                    'dateofbirth' => Carbon::createFromFormat('Y-m-d', '1972-12-18'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
