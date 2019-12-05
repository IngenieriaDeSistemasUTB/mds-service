const _ = require('lodash')

class Logs {
    constructor({ id, username, firstname, lastname, email, lastlogin, lastaccess, logs }) {
        this.id = id
        this.username = username
        this.firstname = firstname
        this.lastname = lastname
        this.email = email
        this.lastlogin = lastlogin
        this.lastaccess = lastaccess
        this.logs = logs
        this.organizedLogs = null
        this.graphs = {}
    }

    groupLogs(){
        this.organizedLogs = _.groupBy(this.logs,'action')
    }

    createGraphs(){
        if(this.organizedLogs === null){
            this.groupLogs()
        }

        //TODO: Create graphs
    }

}

module.exports = Logs