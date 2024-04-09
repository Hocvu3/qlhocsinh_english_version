<?php

namespace App\Providers;

use App\Models\AccountStudentFee;
use App\Models\StudentClass;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\SchoolSubject;
use App\Models\ExamType;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $userCount = User::all()->count();
        $classCount = StudentClass::all()->count();
        $subjectCount = SchoolSubject::all()->count();
        $examCount = ExamType::all()->count();
        $amountCount = AccountStudentFee::all()->sum('amount');
        view::share([
            'user_count'=>$userCount,
            'class_count'=>$classCount,
            'subject_count'=>$subjectCount,
            'exam_count'=>$examCount,
            'amount_sum'=>$amountCount,
        ]);
    }
}
