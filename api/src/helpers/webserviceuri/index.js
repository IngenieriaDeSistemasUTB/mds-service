const {
    SERVICE_MOODLE_URL
} =  process.env

class WebServiceUri {
    constructor(wsfunction, token, params) {
        this.params = params
        this.wsfunction = wsfunction
        this.token = token
    }

    getURI() {
        if (this.params)
            return encodeURI(`${SERVICE_MOODLE_URL}/webservice/rest/server.php?wsfunction=${this.wsfunction}&${this.params}&moodlewsrestformat=json&wstoken=${this.token}`)
        else
            return encodeURI(`${SERVICE_MOODLE_URL}/webservice/rest/server.php?wsfunction=${this.wsfunction}&moodlewsrestformat=json&wstoken=${this.token}`)
    }
}

module.exports = WebServiceUri
