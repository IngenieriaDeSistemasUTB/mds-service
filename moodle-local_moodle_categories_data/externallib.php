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
  require_once($CFG->libdir . "/externallib.php");

  class local_moodle_categories_data extends external_api
  {



    /******************************************
     * 
     * 
     *  get_data()
     * 
     *******************************************/

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_data_parameters()
    {
      return new external_function_parameters(array());
    }

    /**
     * Returns categories data
     * @return array categories data
     */
    public static function get_data()
    {
      global $DB;

      $categories =  $DB->get_records('course_categories');

      return $categories;
    }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_data_returns()
    {
      return new external_multiple_structure(
        new external_single_structure(
          array(
            'id' => new external_value(PARAM_INT, 'Category ID'),
            'name' => new external_value(PARAM_TEXT, 'Categorie Name'),
            'idnumber' => new external_value(PARAM_RAW, 'Categorie idnumber', VALUE_DEFAULT, null),
            'description' => new external_value(PARAM_RAW, 'Category Description', VALUE_DEFAULT, null),
            'descriptionformat' => new external_value(PARAM_RAW, 'Category Description Format', VALUE_DEFAULT, null),
            'parent' => new external_value(PARAM_INT, 'Category parent'),
            'sortorder' => new external_value(PARAM_INT, 'Category Sort Order'),
            'coursecount' => new external_value(PARAM_INT, 'Category Course Count'),
            'visible' => new external_value(PARAM_INT, 'is Category visible?'),
          )
        )
      );
    }

    /******************************************
     * 
     * 
     *  get_category_data()
     * 
     *******************************************/

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_category_data_parameters()
    {
      return new external_function_parameters(
        array(
          'categoryid' => new external_value(PARAM_INT, 'id of category', VALUE_REQUIRED)
        )
      );
    }

    /**
     * Returns categories data
     * @return array categories data
     */
    public static function get_category_data($categoryid)
    {
      global $DB;
      $params = self::validate_parameters(self::get_category_data_parameters(), array('categoryid' => $categoryid));
      $categories =  $DB->get_record('course_categories', array('id' => $params['categoryid']));

      return $categories;
    }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_category_data_returns()
    {
      return new external_single_structure(
        array(
          'id' => new external_value(PARAM_INT, 'Category ID'),
          'name' => new external_value(PARAM_TEXT, 'Categorie Name'),
          'idnumber' => new external_value(PARAM_RAW, 'Categorie idnumber', VALUE_DEFAULT, null),
          'description' => new external_value(PARAM_RAW, 'Category Description', VALUE_DEFAULT, null),
          'descriptionformat' => new external_value(PARAM_RAW, 'Category Description Format', VALUE_DEFAULT, null),
          'parent' => new external_value(PARAM_INT, 'Category parent'),
          'sortorder' => new external_value(PARAM_INT, 'Category Sort Order'),
          'coursecount' => new external_value(PARAM_INT, 'Category Course Count'),
          'visible' => new external_value(PARAM_INT, 'is Category visible?'),
        )
      );
    }

    /******************************************
     * 
     * 
     *  get_courses()
     * 
     *******************************************/

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_courses_parameters()
    {
      return new external_function_parameters(
        array(
          'categoryid' => new external_value(PARAM_INT, 'id of category', VALUE_REQUIRED)
        )
      );
    }

    /**
     * Returns courses data of a Category
     * @return array courses data of a Category
     */
    public static function get_courses($categoryid)
    {
      global $DB;

      $params = self::validate_parameters(self::get_courses_parameters(), array('categoryid' => $categoryid));
      $courses = $DB->get_records('course', array('category' => $params['categoryid']));

      return $courses;
    }


    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_courses_returns()
    {
      return new external_multiple_structure(
        new external_single_structure(
          array(
            'id' => new external_value(PARAM_INT, 'Course ID'),
            'category' => new external_value(PARAM_INT, 'Category ID'),
            'sortorder' => new external_value(PARAM_INT, 'course sortorder'),
            'fullname' => new external_value(PARAM_TEXT, 'Course Fullname'),
            'shortname' => new external_value(PARAM_TEXT, 'Course shortname'),
            'idnumber' => new external_value(PARAM_RAW, 'Course idnumber'),
            'summary' => new external_value(PARAM_RAW, 'Course summary'),
            'summaryformat' => new external_value(PARAM_INT, 'Course summaryformat'),
            'showgrades' => new external_value(PARAM_INT, 'Course showgrades'),
            'newsitems' => new external_value(PARAM_INT, 'Course newsitems'),
            'startdate' => new external_value(PARAM_INT, 'Course startdate'),
            'enddate' => new external_value(PARAM_INT, 'Course enddate'),
            'marker' => new external_value(PARAM_INT, 'Course marker'),
            'maxbytes' => new external_value(PARAM_INT, 'Course maxbytes'),
            'legacyfiles' => new external_value(PARAM_INT, 'Course legacyfiles'),
            'showreports' => new external_value(PARAM_INT, 'Course showreports'),
            'visible' => new external_value(PARAM_INT, 'Course visible'),
            'visibleold' => new external_value(PARAM_INT, 'Course visibleold'),
            'groupmode' => new external_value(PARAM_INT, 'Course groupmode'),
            'defaultgroupingid' => new external_value(PARAM_INT, 'Course defaultgroupingid'),
            'lang' => new external_value(PARAM_LANG, 'Course lang'),
            'calendartype' => new external_value(PARAM_TEXT, 'Course calendartype'),
            'theme' => new external_value(PARAM_THEME, 'Course theme'),
            'timecreated' => new external_value(PARAM_INT, 'Course timecreated'),
            'timemodified' => new external_value(PARAM_INT, 'Course timemodified'),
            'requested' => new external_value(PARAM_INT, 'Course requested'),
            'enablecompletion' => new external_value(PARAM_INT, 'Course enablecompletion'),
            'completionnotify' => new external_value(PARAM_INT, 'Course completionnotify'),
            'cacherev' => new external_value(PARAM_INT, 'Course cacherev'),
          )
        )
      );
    }


    /******************************************
     * 
     * 
     *  get_childs()
     * 
     *******************************************/

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_childs_parameters()
    {
      return new external_function_parameters(
        array(
          'categoryid' => new external_value(PARAM_INT, 'id of category', VALUE_REQUIRED)
        )
      );
    }


    /**
     * Returns childs category data of a Category
     * @return array childs category data  of a Category
     */
    public static function get_childs($categoryid)
    {
      global $DB;

      $params = self::validate_parameters(self::get_childs_parameters(), array('categoryid' => $categoryid));
      $categories =  $DB->get_records('course_categories', array('parent' => $params["categoryid"]));

      return $categories;
    }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_childs_returns()
    {
      return new external_multiple_structure(
        new external_single_structure(
          array(
            'id' => new external_value(PARAM_INT, 'Category ID'),
            'name' => new external_value(PARAM_TEXT, 'Categorie Name'),
            'idnumber' => new external_value(PARAM_RAW, 'Categorie idnumber', VALUE_DEFAULT, null),
            'description' => new external_value(PARAM_RAW, 'Category Description', VALUE_DEFAULT, null),
            'descriptionformat' => new external_value(PARAM_INT, 'Category Description Format', VALUE_DEFAULT, null),
            'parent' => new external_value(PARAM_INT, 'Category parent'),
            'sortorder' => new external_value(PARAM_INT, 'Category Sort Order'),
            'coursecount' => new external_value(PARAM_INT, 'Category Course Count'),
            'visible' => new external_value(PARAM_INT, 'is Category visible?'),
          )
        )
      );
    }

    /******************************************
     * 
     * 
     *  get_roles()
     * 
     *******************************************/

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_roles_parameters()
    {
      return new external_function_parameters(array());
    }

    /**
     * 
     * @return array Roles created in moodle
     */
    public static function get_roles()
    {
      global $DB;

      $roles =  $DB->get_records('role');

      return $roles;
    }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_roles_returns()
    {
      return new external_multiple_structure(
        new external_single_structure(
          array(
            'id' => new external_value(PARAM_INT, 'Role ID'),
            'name' => new external_value(PARAM_TEXT, 'Role Name'),
            'shortname' => new external_value(PARAM_TEXT, 'Role shortname', VALUE_DEFAULT, null),
            'description' => new external_value(PARAM_RAW, 'Role Description', VALUE_DEFAULT, null),
          )
        )
      );
    }

    /******************************************
     * 
     * 
     *  get_course_users()
     * 
     *******************************************/

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_course_users_parameters()
    {
      return new external_function_parameters(array(
        'courseId' => new external_value(PARAM_INT, 'id of course', VALUE_REQUIRED),
        'roleShortname' => new external_value(PARAM_TEXT, 'Role shortname', VALUE_REQUIRED),
      ));
    }

    /**
     * 
     * @return array Roles created in moodle
     */
    public static function get_course_users($courseId, $roleShortname)
    {
      global $DB;

      $params = self::validate_parameters(self::get_course_users_parameters(), array('courseId' => $courseId, 'roleShortname' => $roleShortname));
      $rol = $DB->get_record('role', array('shortname' => $params['roleShortname']));
      $courseEnrol =  $DB->get_records('enrol', array('courseid' => $params['courseId'], 'roleid' => $rol->id));


      //Setting Up enrol data
      foreach ($courseEnrol as $enrol) {
        $enrol->type = $rol->name;
        $enrol->users = array();
        //Getting information about enrolment
        $userEnrolments = $DB->get_records('user_enrolments', array('enrolid' => $enrol->id));

        foreach ($userEnrolments as $userEnrolment) {
          $userData = $DB->get_record('user', array('id' => $userEnrolment->userid));
          array_push($enrol->users, $userData);
        }
      }
      return $courseEnrol;
    }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_course_users_returns()
    {
      return new external_multiple_structure(
        new external_single_structure(
          array(
            'id' => new external_value(PARAM_INT, 'Role ID', VALUE_DEFAULT, 1),
            'users' => new external_multiple_structure(
              new external_single_structure(
                array(
                  'firstname' => new external_value(PARAM_TEXT, 'User firstname', VALUE_DEFAULT, null),
                  'lastname' => new external_value(PARAM_TEXT, 'User lastname', VALUE_DEFAULT, null),
                  'email' => new external_value(PARAM_TEXT, 'User email', VALUE_DEFAULT, null)
                )
              )
            ),
            'type' => new external_value(PARAM_TEXT, 'User type', VALUE_DEFAULT, null),
            'enrol' => new external_value(PARAM_TEXT, 'Enrol Type', VALUE_DEFAULT, null),
          )
        )
      );
    }

    /******************************************
     * 
     * 
     *  get_logs()
     * 
     *******************************************/

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_logs_parameters()
    {
      return new external_function_parameters(array(
        'useridnumber' => new external_value(PARAM_TEXT, 'User Number Identifier', VALUE_REQUIRED),
      ));
    }

    /**
     * 
     * @return array Roles created in moodle
     */
    public static function get_logs($useridnumber)
    {
      global $DB;

      $params = self::validate_parameters(self::get_logs_parameters(), array('useridnumber' => $useridnumber));

      $user = $DB->get_record_sql(
        'select 
            mu.id, mu.username, mu.idnumber, mu.firstname, mu.lastname, mu.email, mu.lastlogin,
            mu.lastaccess
        from mdl_user mu
        where mu.idnumber = :useridnumber ',
        ['useridnumber' => $params['useridnumber']]

      );

      $logs = $DB->get_records_sql(
        'select 
          mlsl.id as log_id, mlsl.eventname, mlsl.action,  mlsl.courseid, mlsl.target, mlsl.timecreated, mlsl.origin,
            mu.id, mu.username, mu.idnumber, mu.firstname, mu.lastname, mu.email, mu.lastlogin,
            mu.lastaccess
        from mdl_logstore_standard_log mlsl
        inner join mdl_user mu on mu.id = mlsl.userid
        where mu.idnumber = :useridnumber ',
        ['useridnumber' => $params['useridnumber']]
      );

      $user->logs = array();
      
      foreach($logs as $log){
        array_push($user->logs,$log);
      }

      return $user;
    }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_logs_returns()
    {
      return new external_single_structure(
        array(
          'id' => new external_value(PARAM_INT, 'User ID', VALUE_DEFAULT, null),
          'username' => new external_value(PARAM_TEXT, 'User Username', VALUE_DEFAULT, null),
          'firstname' => new external_value(PARAM_TEXT, 'User firstname', VALUE_DEFAULT, null),
          'lastname' => new external_value(PARAM_TEXT, 'User lastname', VALUE_DEFAULT, null),
          'email' => new external_value(PARAM_TEXT, 'User email', VALUE_DEFAULT, null),
          'lastlogin' => new external_value(PARAM_INTEGER, 'User last login', VALUE_DEFAULT, null),
          'lastaccess' => new external_value(PARAM_INTEGER, 'User last access', VALUE_DEFAULT, null),
          'logs' => new external_multiple_structure(
            new external_single_structure(
              array(
                'log_id' => new external_value(PARAM_INT, 'Log ID', VALUE_DEFAULT, null),
                'courseid' => new external_value(PARAM_INT, 'Course ID', VALUE_DEFAULT, null),
                'eventname' => new external_value(PARAM_TEXT, 'Event Name', VALUE_DEFAULT, null),
                'action' => new external_value(PARAM_TEXT, 'Event Action', VALUE_DEFAULT, null),
                'target' => new external_value(PARAM_TEXT, 'Event Target', VALUE_DEFAULT, null),
                'timecreated' => new external_value(PARAM_INTEGER, 'Log time created', VALUE_DEFAULT, null),
                'origin' => new external_value(PARAM_TEXT, 'Event origin', VALUE_DEFAULT, null)
              )
            )
          )
        )
      );
    }
  }
