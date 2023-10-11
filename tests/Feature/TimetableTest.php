<?php

test('get the timetable api', function () {
    $jayParsedAry = [
        "id" => 2,
        "academic_year_id" => 2019,
        "department_id" => 1,
        "degree_id" => 1,
        "grade_id" => 4,
        "option_id" => 9,
        "semester_id" => 1,
        "week_id" => 2,
        "group_id" => 2,
        "completed" => false,
        "created_uid" => 265,
        "updated_uid" => 265,
        "created_at" => "2018-09-28T02:41:03.000000Z",
        "updated_at" => "2018-09-28T02:41:03.000000Z"
     ];
    $response = $this->post('/api/query_and_post_timetables',$jayParsedAry);
    $response->assertStatus(200);
});
