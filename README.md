# MDS-API

Create _.env_ file on _api_ folder:

    PORT=3050
    SERVICE_MOODLE_CATEGORIES_TOKEN=
    SERVICE_MOODLE_MOBILE_TOKEN=
    LOGIN_USERNAME=
    LOGIN_PASSWORD=
    SYLLABUS_WORDS=
    FILENAMES_SUFFIX=
    FOLDERNAMES_SUFFIX=
    COURSE_PERCENTAJE=
    WhiteList=
    SERVICE_MOODLE_URL=


Create _.env_ file on _frontend_ folder:

    REACT_URL_API = 'http://api:3050/'
    PORT = 80

## Deploy

    docker-compose up --build