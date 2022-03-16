<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersLogin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //create Semester
        $this->addSemester();
        // create Class
        $this->addClass();
        // create users
        $this->addUser();
    }

    public function addSemester()
    {
        DB::table('semester')->insert([
            [
                'sem_name' => 'Kỳ 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sem_name' => 'Kỳ 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sem_name' => 'Kỳ 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sem_name' => 'Kỳ 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sem_name' => 'Kỳ 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sem_name' => 'Kỳ 6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sem_name' => 'Kỳ 7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sem_name' => 'Kỳ 8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sem_name' => 'Kỳ 9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function addClass()
    {
        DB::table('class')->insert(
            [
                [
                    'class_name' => '17CNTT',
                    'sem_id' => '9',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'class_name' => '18CNTT1',
                    'sem_id' => '7',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'class_name' => '18CNTT2',
                    'sem_id' => '7',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'class_name' => '18CNTT3',
                    'sem_id' => '7',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'class_name' => '19CNTT1',
                    'sem_id' => '5',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'class_name' => '19CNTT2',
                    'sem_id' => '5',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'class_name' => '19CNTT3',
                    'sem_id' => '5',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'class_name' => '19CNTT4',
                    'sem_id' => '5',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'class_name' => '19CNTT5',
                    'sem_id' => '5',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'class_name' => '19CNTT6',
                    'sem_id' => '5',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'class_name' => '20CNTT1',
                    'sem_id' => '3',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'class_name' => '20CNTT2',
                    'sem_id' => '3',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'class_name' => '20CNTT3',
                    'sem_id' => '3',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'class_name' => '20CNTT4',
                    'sem_id' => '3',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'class_name' => '20CNTT5',
                    'sem_id' => '3',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'class_name' => '20CNTT6',
                    'sem_id' => '3',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

            ]
        );
    }
    
    public function addUser()
    {
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'name' => 'Admin',
            'username' => 'admin',
            'phone_number' => '0966785693',
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '1',
            'role_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'vietle2110@gmail.com',
            'name' => 'Lê Việt Hoàng',
            'username' => 'vietle2110',
            'phone_number' => '0966785693',
            'password' => Hash::make('vietle2110'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '2',
            'role_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student1@gmail.com',
            'name' => 'Đỗ Việt Anh',
            'username' => '1755010006',
            'phone_number' => '0966785693',
            'password' => Hash::make('1755010006'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '3',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010006',
            'user_id' => '3',
            'class_id' => '1',
            'first_name' => 'Đỗ',
            'last_name' => 'Việt Anh',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student2@gmail.com',
            'name' => 'Bùi Huy Bình',
            'username' => '1755010049',
            'phone_number' => '0911879311',
            'password' => Hash::make('1755010049'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '4',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010049',
            'user_id' => '4',
            'class_id' => '1',
            'first_name' => 'Bùi',
            'last_name' => 'Huy Bình',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student3@gmail.com',
            'name' => 'Trần Đức Chí',
            'username' => '1755010029',
            'phone_number' => '0911879312',
            'password' => Hash::make('1755010029'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '5',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010029',
            'user_id' => '5',
            'class_id' => '1',
            'first_name' => 'Trần',
            'last_name' => 'Đức Chí',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('users')->insert([
            'email' => 'student4@gmail.com',
            'name' => 'Trần Thành Chung',
            'username' => '1755010007',
            'phone_number' => '0942359987',
            'password' => Hash::make('1755010007'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '6',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010007',
            'user_id' => '6',
            'class_id' => '1',
            'first_name' => 'Trần',
            'last_name' => 'Thành Chung',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student5@gmail.com',
            'name' => 'Đặng Thuỳ Dương',
            'username' => '1755010020',
            'phone_number' => '0359201069',
            'password' => Hash::make('1755010020'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '7',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010020',
            'user_id' => '7',
            'class_id' => '1',
            'first_name' => 'Đặng',
            'last_name' => 'Thuỳ Dương',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student6@gmail.com',
            'name' => 'Trần Thế Duy',
            'username' => '1755010012',
            'phone_number' => '0359201069',
            'password' => Hash::make('1755010012'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '8',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010012',
            'user_id' => '8',
            'class_id' => '1',
            'first_name' => 'Trần',
            'last_name' => 'Thế Duy',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student7@gmail.com',
            'name' => 'Lê Anh Đức',
            'username' => '1755010015',
            'phone_number' => '0383602257',
            'password' => Hash::make('1755010015'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '9',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010015',
            'user_id' => '9',
            'class_id' => '1',
            'first_name' => 'Lê',
            'last_name' => 'Anh Đức',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student8@gmail.com',
            'name' => 'Trần Đình Giang',
            'username' => '1755010031',
            'phone_number' => '0944859499',
            'password' => Hash::make('1755010031'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '10',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010031',
            'user_id' => '10',
            'class_id' => '1',
            'first_name' => 'Trần',
            'last_name' => 'Đình Giang',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('users')->insert([
            'email' => 'student9@gmail.com',
            'name' => 'Đào Xuân Hãnh',
            'username' => '1755010030',
            'phone_number' => '0966089111',
            'password' => Hash::make('1755010030'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '11',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010030',
            'user_id' => '11',
            'class_id' => '1',
            'first_name' => 'Đào',
            'last_name' => 'Xuân Hãnh',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student10@gmail.com',
            'name' => 'Giáp Thị Thu Hiền',
            'username' => '1755010017',
            'phone_number' => '0912898072',
            'password' => Hash::make('1755010017'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '12',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010017',
            'user_id' => '12',
            'class_id' => '1',
            'first_name' => 'Giáp Thị',
            'last_name' => 'Thu Hiền',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student11@gmail.com',
            'name' => 'Đào Minh Hiếu',
            'username' => '1755010011',
            'phone_number' => '0963562500',
            'password' => Hash::make('1755010011'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '13',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010011',
            'user_id' => '13',
            'class_id' => '1',
            'first_name' => 'Đào',
            'last_name' => 'Minh Hiếu',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student12@gmail.com',
            'name' => 'Bùi Thị Hoàng',
            'username' => '1755010016',
            'phone_number' => '0969910754',
            'password' => Hash::make('1755010016'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '14',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010016',
            'user_id' => '14',
            'class_id' => '1',
            'first_name' => 'Bùi',
            'last_name' => 'Thị Hoàng',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student13@gmail.com',
            'name' => 'Phạm Thị Kim Huệ',
            'username' => '1755010052',
            'phone_number' => '0378584767',
            'password' => Hash::make('1755010052'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '15',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010052',
            'user_id' => '15',
            'class_id' => '1',
            'first_name' => 'Phạm Thị',
            'last_name' => 'Kim Huệ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student14@gmail.com',
            'name' => 'Ninh Công Hùng',
            'username' => '1755010027',
            'phone_number' => '0988210545',
            'password' => Hash::make('1755010027'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '16',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010027',
            'user_id' => '16',
            'class_id' => '1',
            'first_name' => 'Ninh',
            'last_name' => 'Công Hùng',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student15@gmail.com',
            'name' => 'Đoàn Tiến Mạnh',
            'username' => '1755010045',
            'phone_number' => '0393375466',
            'password' => Hash::make('1755010045'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '17',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010045',
            'user_id' => '17',
            'class_id' => '1',
            'first_name' => 'Đoàn',
            'last_name' => 'Tiến Mạnh',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student16@gmail.com',
            'name' => 'Vũ Hải Nam',
            'username' => '1755010035',
            'phone_number' => '0947598326',
            'password' => Hash::make('1755010035'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '18',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010035',
            'user_id' => '18',
            'class_id' => '1',
            'first_name' => 'Vũ',
            'last_name' => 'Hải Nam',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student17@gmail.com',
            'name' => 'Nguyễn Văn Nhất',
            'username' => '1755010053',
            'phone_number' => '0392128799',
            'password' => Hash::make('1755010053'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '19',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010053',
            'user_id' => '19',
            'class_id' => '1',
            'first_name' => 'Nguyễn',
            'last_name' => 'Văn Nhất',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student18@gmail.com',
            'name' => 'Trần Hồng Nhung',
            'username' => '1755010022',
            'phone_number' => '036797690',
            'password' => Hash::make('1755010022'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '20',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010022',
            'user_id' => '20',
            'class_id' => '1',
            'first_name' => 'Trần',
            'last_name' => 'Hồng Nhung',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student19@gmail.com',
            'name' => 'Trần Hồng Quân',
            'username' => '1755010021',
            'phone_number' => '0988484531',
            'password' => Hash::make('1755010021'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '21',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010021',
            'user_id' => '21',
            'class_id' => '1',
            'first_name' => 'Trần',
            'last_name' => 'Hồng Quân',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'student20@gmail.com',
            'name' => 'Lê Thị Quỳnh',
            'username' => '1755010008',
            'phone_number' => '0966581298',
            'password' => Hash::make('1755010008'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '22',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010008',
            'user_id' => '22',
            'class_id' => '1',
            'first_name' => 'Lê',
            'last_name' => 'Thị Quỳnh',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('users')->insert([
            'email' => 'student21@gmail.com',
            'name' => 'Nguyễn Minh Tuấn',
            'username' => '1755010033',
            'phone_number' => '0966785693',
            'password' => Hash::make('1755010033'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '23',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1755010033',
            'user_id' => '23',
            'class_id' => '1',
            'first_name' => 'Nguyễn',
            'last_name' => 'Minh Tuấn',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('users')->insert([
            'email' => 'student22@gmail.com',
            'name' => 'Nguyễn Thị Thuỳ Linh',
            'username' => '1855010094',
            'phone_number' => '0966785643',
            'password' => Hash::make('1855010094'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '24',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1855010094',
            'user_id' => '24',
            'class_id' => '2',
            'first_name' => 'Nguyễn Thị',
            'last_name' => 'Thuỳ Linh',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('users')->insert([
            'email' => 'student23@gmail.com',
            'name' => 'Trần Thế Long',
            'username' => '1855010109',
            'phone_number' => '0966785643',
            'password' => Hash::make('1855010109'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '25',
            'role_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'student_id' => '1855010109',
            'user_id' => '25',
            'class_id' => '2',
            'first_name' => 'Trần',
            'last_name' => 'Thế Long',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
