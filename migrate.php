<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package    block_migrate_users
 * @copyright  2019 onwards Louisiana State University
 * @copyright  2019 onwards Robert Russo
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->dirroot . '/blocks/migrate_users/locallib.php');

$page_params = [
    'userfrom' => required_param('userfrom', PARAM_TEXT),
    'userto' => required_param('userto', PARAM_TEXT),
    'courseid' => required_param('courseid', PARAM_INT)
];

require_login();

if ($page_params['courseid']) {
    $courseid = $page_params['courseid'];
    $course_context = context_course::instance($courseid);
    $PAGE->set_context($course_context);
    $PAGE->set_url(new moodle_url('/blocks/migrate_users/migrate.php', $page_params));

    $PAGE->navbar->add(get_string('pluginname', 'block_migrate_users'), new moodle_url($CFG->wwwroot . '/course/view.php', array('id' => $courseid)));
}



echo $OUTPUT->header();

migrate::handle_user_enrollments($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_user_enrollments', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_role_enrollments($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_role_enrollments', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_logs($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_logs', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_standard_logs($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_standard_logs', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_events($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_events', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_posts($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_posts', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_course_modules_completions($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_course_modules_completions', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_course_completions($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_course_completions', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_course_completion_criteria($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_course_completion_criteria', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_grades($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_grades', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_grades_history($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_grades_history', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_assign_grades($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_assign_grades', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_assign_submissions($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_assign_submissions', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_assign_user_flags($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_assign_user_flags', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_assign_user_mapping($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_assign_user_mapping', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_lesson_attempts($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_lesson_attempts', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_lesson_grades($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_lesson_grades', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_quiz_attempts($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_quiz_attempts', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_quiz_grades($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_quiz_grades', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_scorm_scoes($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
echo("<div class=\"alert alert-success alert-block fade in \" role=\"alert\">" . get_string('prefix', 'block_migrate_users') . get_string('handle_scorm_scoes', 'block_migrate_users') . get_string('found', 'block_migrate_users') . "</div>");
migrate::handle_choice_answers($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);

/*
migrate::handle_role_enrollments($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_logs($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_standard_logs($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_events($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_posts($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_course_modules_completions($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_course_completions($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_course_completion_criteria($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_grades($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_grades_history($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_assign_grades($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_assign_submissions($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_assign_user_flags($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_assign_user_mapping($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_lesson_attempts($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_lesson_grades($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_quiz_attempts($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_quiz_grades($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_scorm_scoes($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
migrate::handle_choice_answers($page_params['userfrom'], $page_params['userto'], $page_params['courseid']);
*/

echo $OUTPUT->footer();
