<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class getPermissionPolicy{

    public function setGateAndPolicyAccess(){
        $this->defineGateUser();
        $this->defineGateStudent();
        $this->defineGateDocument();
        $this->defineGateRole();
        $this->defineGateClass();
        $this->defineGateCategory();
        Gate::define('admin',function(){
            if(Auth::user()->roles->first()->role_id === 1 || Auth::user()->roles->first()->role_id === 2){
                return true;
            }
            return false;
        });
    }

    public function defineGateUser(){
        Gate::define('user-list','App\Policies\UsersPolicy@viewAny');
        Gate::define('user-show','App\Policies\UsersPolicy@view');
        Gate::define('user-create','App\Policies\UsersPolicy@create');
        Gate::define('user-update','App\Policies\UsersPolicy@update');
        Gate::define('user-delete','App\Policies\UsersPolicy@delete');
        Gate::define('user-editrole','App\Policies\UsersPolicy@role');
    }

    public function defineGateStudent(){
        Gate::define('student-list','App\Policies\ClassPolicy@view');
        Gate::define('student-show','App\Policies\StudentPolicy@view');
        Gate::define('student-edit','App\Policies\StudentPolicy@update');
    }

    public function defineGateDocument(){
        Gate::define('documents-list','App\Policies\DocumentPolicy@viewAny');
        Gate::define('documents-create','App\Policies\DocumentPolicy@create');
        Gate::define('documents-edit','App\Policies\DocumentPolicy@update');
        Gate::define('documents-delete','App\Policies\DocumentPolicy@delete');
        Gate::define('documents-show','App\Policies\DocumentPolicy@view');
        Gate::define('documents-download','App\Policies\DocumentPolicy@download');
        Gate::define('documents-search','App\Policies\DocumentPolicy@search');
        Gate::define('documents-read','App\Policies\DocumentPolicy@read');
        Gate::define('documents-censor','App\Policies\DocumentPolicy@censor');
    }

    public function defineGateRole(){
        Gate::define('role-list','App\Policies\RolePolicy@viewAny');
        Gate::define('role-create','App\Policies\RolePolicy@create');
        Gate::define('role-edit','App\Policies\RolePolicy@update');
        Gate::define('role-delete','App\Policies\RolePolicy@delete');
    }

    public function defineGateClass(){
        Gate::define('class-list','App\Policies\ClassPolicy@viewAny');
        Gate::define('class-create','App\Policies\ClassPolicy@create');
        Gate::define('class-edit','App\Policies\ClassPolicy@update');
        Gate::define('class-delete','App\Policies\ClassPolicy@delete');
    }
    public function defineGateCategory(){
        Gate::define('category-list','App\Policies\CategoryPolicy@viewAny');
        Gate::define('category-create','App\Policies\CategoryPolicy@create');
        Gate::define('category-edit','App\Policies\CategoryPolicy@update');
        Gate::define('category-delete','App\Policies\CategoryPolicy@delete');
    }
}
