<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            [
                'title' => 'Giáo trình', 
                'description' => 'Giáo trình dành cho sinh viên theo học hệ chính quy tại trường',
                'parent_id' => '0',
                'is_collection' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Bài giảng', 
                'description' => 'Hệ thống bài giảng do các giảng viên biên soạn',
                'parent_id' => '0',
                'is_collection' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Đề tài nghiên cứu khoa học', 
                'description' => 'Các đề tài nghiên cứu khoa học sinh viên',
                'parent_id' => '0',
                'is_collection' => 0,
                'created_at' => now(),
                'updated_at' => now()
               
            ],
            [
                'title' => 'Chương trình đào tạo', 
                'description' => 'Thông tin về các chương trình đào tạo',
                'parent_id' => '0',
                'is_collection' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Bài trích báo - tạp chí', 
                'description' => 'Các bài báo - tạp chí liên quan',
                'parent_id' => '0',
                'is_collection' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Ebook - Chuyên ngành', 
                'description' => 'Ebook',
                'parent_id' => '0',
                'is_collection' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Khoá luận tốt nghiệp', 
                'description' => 'Đồ án tốt nghiệp sinh viên',
                'parent_id' => '0',
                'is_collection' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Luận án tiến sỹ', 
                'description' => 'Luận án tiến sỹ',
                'parent_id' => '0',
                'is_collection' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Sách danh nhân', 
                'description' => 'Sách danh nhân',
                'parent_id' => '0',
                'is_collection' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Sách tâm lý - kỹ năng', 
                'description' => 'Sách tâm lý - kỹ năng',
                'parent_id' => '0',
                'is_collection' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Thông tin - Thư viện', 
                'description' => 'Thông tin về Thư viện',
                'parent_id' => '0',
                'is_collection' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Tủ sách giải trí - giáo dục', 
                'description' => 'Tủ sách giải trí - giáo dục',
                'parent_id' => '0',
                'is_collection' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Chưa xác định',
                'description' => 'Danh mục tài liệu chưa được xếp loại',
                'parent_id' => '0',
                'is_collection' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
