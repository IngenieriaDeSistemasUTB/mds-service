### Moodle Categories Data

Return data from categories

#### Installation
- In the top-level folder of your Moodle install:
  - git clone git@github.com:AncaSystems/moodle-local_moodle_categories_data.git local/moodle_categories_data
  - echo 'local/moodle_categories_data/- >> .git/info/exclude

#### How to use

##### Getting a Token
http://namesite.domain/login/token.php?username=USERNAME&password=USERPASSWORD&service=moodle_categories_data

##### Using the function
http://namesite.domain/webservice/rest/server.php?wsfunction=FUNCTIONAME&moodlewsrestformat=json&wstoken=USERTOKEN

#### Functions
| Name  | Description  | Capabilities  |  Params | Status |
|---|---|---|---| ---|
|  local_moodle_categories_get_category |  Return the categories data |   | categoryid: Number  | Active |
|  local_moodle_categories_data_get |  Return the categories data |   |   | Active |
|  local_moodle_categories_courses |  Return courses data of a category |   |  categoryid: Number |  Active |
|  local_moodle_categories_childs |  Return the childs categories of a category |   |  categoryid: Number |  Active |
|  local_moodle_categories_data_full |  Return categories and their childs categories; note: return max 20 levels of childs categories |   |   |  Deprecated |
|  local_moodle_categories_get_roles |  Return role creates in moodle |   |   |  Active |
|  local_moodle_categories_get_course_users |  Return users of a course by params |   |  courseId: Number , roleShortname: String |  Active |
|  local_moodle_categories_get_logs |  Return the logs of a user by Id Number |   |  useridnumber: String |  Active |


#### Developers
https://github.com/AndresMorelos/moodle_categories_data/graphs/contributors
