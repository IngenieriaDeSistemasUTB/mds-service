const _ = require('lodash')

class Logs {
    constructor({ id, username, firstname, lastname, email, lastlogin, lastaccess, logs }) {
        this.id = id
        this.username = username
        this.firstname = firstname
        this.lastname = lastname
        this.email = email
        this.lastlogin = new Date(lastlogin * 1000)
        this.lastaccess = new Date(lastaccess * 1000)
        this.loginnumber = null;
        this.logs = logs
        this.organizedLogs = null
        this.graphs = {}

        this.groupLogs()
    }

    groupLogs() {
        this.logs.map(log => {
            log.timecreated = new Date(log.timecreated * 1000)
        })
        this.organizedLogs = _.groupBy(this.logs, 'action')
        if (this.organizedLogs.loggedin) {
            this.loginnumber = this.organizedLogs.loggedin.length;
        }
    }

    createGraphs() {
        if (this.organizedLogs === null) {
            this.groupLogs()
        }

        this.graphs = {
            am_attendees_courses: {
                seriesName: "Cursos-visitados",
                title: "Visitas por curso",
                yAxis: [],
                xAxis: []
            },
            am_resources_courses: {
                seriesName: "Recursos",
                title: "Recursos por curso",
                yAxis: [],
                xAxis: []
            },
            am_interaction_resources_courses: {
                seriesName: "Recursos revisados",
                title: "Interacción de recurso por cursos",
                yAxis: [],
                xAxis: []
            },
            am_activities_sent_courses: {
                seriesName: "Actividades",
                title: "Actividades enviadas por cursos",
                yAxis: [],
                xAxis: []
            }
        }
    }

}

module.exports = Logs