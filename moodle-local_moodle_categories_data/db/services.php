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
 * External Web Service Template
 * @package   moodle_categories_data
 * @copyright 2018 AncaSystems (https://ancasystems.com)
 * @author    Andrés Morelos
 * @license   https://github.com/AndresMorelos/moodle_categories_data/blob/master/LICENSE Apache 2.0
 */


$functions = array(
    'local_moodle_categories_data_get' => array(
      'classname' => 'local_moodle_categories_data',
      'methodname' => 'get_data',
      'classpath' => 'local/moodle_categories_data/externallib.php',
      'description' => 'Return the categories names',
      'type' => 'read',
     ),
    'local_moodle_categories_courses' => array(
      'classname' => 'local_moodle_categories_data',
      'methodname' => 'get_courses',
      'classpath' => 'local/moodle_categories_data/externallib.php',
      'description' => 'Return the courses of a category',
      'type' => 'read',

    ),
    'local_moodle_categories_childs' => array(
      'classname'=> 'local_moodle_categories_data',
      'methodname' => 'get_childs',
      'classpath' => 'local/moodle_categories_data/externallib.php',
      'description' => 'Return the categories childs',
      'type' => 'read',
    ),
    'local_moodle_categories_get_category' => array(
      'classname' => 'local_moodle_categories_data',
      'methodname' => 'get_category_data',
      'classpath' => 'local/moodle_categories_data/externallib.php',
      'description' => 'Return the category data',
      'type' => 'read',
    ),
    'local_moodle_categories_get_roles' => array(
      'classname' => 'local_moodle_categories_data',
      'methodname' => 'get_roles',
      'classpath' => 'local/moodle_categories_data/externallib.php',
      'description' => 'Return the roles data',
      'type' => 'read',
    ),
    'local_moodle_categories_get_course_users' => array(
      'classname' => 'local_moodle_categories_data',
      'methodname' => 'get_course_users',
      'classpath' => 'local/moodle_categories_data/externallib.php',
      'description' => 'Return the users of a course by parameters',
      'type' => 'read',
    ),
    'local_moodle_categories_get_logs' => array(
      'classname' => 'local_moodle_categories_data',
      'methodname' => 'get_logs',
      'classpath' => 'local/moodle_categories_data/externallib.php',
      'description' => 'Return logs of a users by ID Number',
      'type' => 'read',
    )
);

$services = array(
  'Moodle Categories Data' => array(
    'functions'=> array (
      'local_moodle_categories_data_get',
      'local_moodle_categories_courses',
      'local_moodle_categories_childs',
      'local_moodle_categories_get_category',
      'local_moodle_categories_get_roles',
      'local_moodle_categories_get_course_users',
      'local_moodle_categories_get_logs'
    ),
    'restrictedusers' => 0,
    'shortname' => 'moodle_categories_data',
    'downloadfiles' => 1,
    'enabled' => 1,
  )
);
