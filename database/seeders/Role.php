<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create role 
        $this->AddRole();
        $this->addPermission();
        $this->role_permission();
    }

    public function AddRole()
    {
        DB::table('roles')->insert([
            [
                'role_name' => 'Quản trị viên',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => 'Quản lý',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => 'Giảng viên',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => 'Sinh viên',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    public function addPermission()
    {
        DB::table('permissions')->insert([
            [
                'per_name' => 'Danh mục tài liệu',
                'slug' => 'category',
                'parent_id' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Danh sách Bộ sưu tập',
                'slug' => 'category-list',
                'parent_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Thêm Bộ sưu tập',
                'slug' => 'category-create',
                'parent_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Cập nhật Bộ sưu tập',
                'slug' => 'category-edit',
                'parent_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Xoá Bộ sưu tập',
                'slug' => 'category-delete',
                'parent_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Xem danh mục',
                'slug' => 'category-show',
                'parent_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Quyền hệ thống',
                'slug' => 'role',
                'parent_id' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Danh sách quyền hệ thống',
                'slug' => 'role-list',
                'parent_id' => '7',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Thêm quyền hệ thống',
                'slug' => 'role-create',
                'parent_id' => '7',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Cập nhật quyền hệ thống',
                'slug' => 'role-edit',
                'parent_id' => '7',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Xoá quyền hệ thống',
                'slug' => 'role-delete',
                'parent_id' => '7',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Quản lý Tài liệu',
                'slug' => 'documents',
                'parent_id' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Danh sách tài liệu',
                'slug' => 'documents-list',
                'parent_id' => '12',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Xem tài liệu',
                'slug' => 'documents-show',
                'parent_id' => '12',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Thêm tài liệu',
                'slug' => 'documents-create',
                'parent_id' => '12',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Cập nhật tài liệu',
                'slug' => 'documents-edit',
                'parent_id' => '12',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Xoá tài liệu',
                'slug' => 'documents-delete',
                'parent_id' => '12',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Tải xuống tài liệu',
                'slug' => 'documents-dowload',
                'parent_id' => '12',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Tìm kiếm tài liệu',
                'slug' => 'documents-search',
                'parent_id' => '12',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Lớp quản lý',
                'slug' => 'class',
                'parent_id' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Danh sách lớp quản lý',
                'slug' => 'class-list',
                'parent_id' => '20',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Thêm lớp quản lý',
                'slug' => 'class-create',
                'parent_id' => '20',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Cập nhật lớp quản lý',
                'slug' => 'class-edit',
                'parent_id' => '20',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Xoá lớp quản lý',
                'slug' => 'class-delete',
                'parent_id' => '20',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Quản lý Học kỳ',
                'slug' => 'semester',
                'parent_id' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Danh sách học kỳ',
                'slug' => 'semester-list',
                'parent_id' => '25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Thêm học kỳ',
                'slug' => 'semester-create',
                'parent_id' => '25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Cập nhật học kỳ',
                'slug' => 'semester-edit',
                'parent_id' => '25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Xoá học kỳ',
                'slug' => 'semester-delete',
                'parent_id' => '25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Quản lý Thành viên',
                'slug' => 'user',
                'parent_id' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Danh sách Thành viên',
                'slug' => 'user-list',
                'parent_id' => '30',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Thêm thành viên',
                'slug' => 'user-create',
                'parent_id' => '30',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Cập nhật thành viên',
                'slug' => 'user-edit',
                'parent_id' => '30',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Xoá thành viên',
                'slug' => 'user-delete',
                'parent_id' => '30',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Phân quyền',
                'slug' => 'user-editrole',
                'parent_id' => '30',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Xem thành viên',
                'slug' => 'user-show',
                'parent_id' => '30',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Quản lý Sinh viên',
                'slug' => 'student',
                'parent_id' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Danh sách Sinh viên',
                'slug' => 'student-list',
                'parent_id' => '37',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Cập nhật sinh viên',
                'slug' => 'student-edit',
                'parent_id' => '37',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Thông tin Sinh viên',
                'slug' => 'student-show',
                'parent_id' => '37',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Quản lý Thông tin cá nhân',
                'slug' => 'profile',
                'parent_id' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Xem Thông tin cá nhân',
                'slug' => 'profile-show',
                'parent_id' => '41',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Cập nhật Thông tin cá nhân',
                'slug' => 'profile-show',
                'parent_id' => '41',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Đổi mật khẩu',
                'slug' => 'profile-show',
                'parent_id' => '41',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'per_name' => 'Duyệt tài liệu',
                'slug' => 'documents-censor',
                'parent_id' => '12',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }

    public function role_permission()
    {
        $permision = Permission::all();
        foreach ($permision as $per) {
            DB::table('role_permission')->insert([
                [
                    'role_id' => 1,
                    'per_id' => $per->per_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]);
        }
    }
}
