<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Accountment;
use App\Models\Attendance;
use App\Models\Exam;
use App\Models\ExamType;
use App\Models\Father;
use App\Models\Grade;
use App\Models\Mother;
use App\Models\Outcome;
use App\Models\Result;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $sections = Section::factory(5)->create();

        Grade::factory(6)->create();

        $students = Student::factory(200)->create();

        Teacher::factory(20)->create();

        $subjects = Subject::factory(20)->create();

        Exam::factory(15)->create();

        Accountment::factory(200)->create();

        Attendance::factory(1000)->create();

        Result::factory(1000)->create();

        Outcome::factory(200)->create();

        Mother::factory(200)->create();

        Father::factory(200)->create();

        $students->each(
            function (Student $student) {
                $mother = FactoryHelper::getRandomModelId(Mother::class);
                $father = FactoryHelper::getRandomModelId(Father::class);
                $student->mother()->sync($mother);
                $student->father()->sync($father);
            } 
        );

        $sections->each(
            function (Section $section) {
                $section->grade()->sync([FactoryHelper::getRandomModelId(Grade::class)]);
            }
        );

        $subjects->each(
            function (Subject $subjects) {
                $subjects->grade()->sync([FactoryHelper::getRandomModelId(Grade::class)]);
            }
        );

        $sections->each(
            function (Section $section) {
                $section->teachers()->sync([FactoryHelper::getRandomModelId(Teacher::class)]);
            }
        );

        $subjects->each(
            function (Subject $subjects) {
                $subjects->teachers()->sync([FactoryHelper::getRandomModelId(Teacher::class)]);
            }
        );

    }
}
