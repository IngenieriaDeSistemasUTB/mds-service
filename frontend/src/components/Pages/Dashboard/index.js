import React, { Component, Fragment } from 'react';
import SearchForm from 'emerald-ui/lib/SearchForm';
import Dashboard from './Dashboard'
import Button from 'emerald-ui/lib/Button';
import Toolbar from 'emerald-ui/lib/Toolbar';
import request from '../../../utils/requets';

import './css/dashboard.css';
const { REACT_URL_API = 'http://localhost:3050/'  } = process.env


class Body extends Component {
  constructor(props) {
    super()
    this.state = {
      activeKey: 1,
      studentCode: "",
      studentData: {}

    }
    this.updateStudentCode = this.updateStudentCode.bind(this)
    this.handlerSearchStudents = this.handlerSearchStudents.bind(this);
  }

  async handlerSearchStudents() {
    const response = await request.get(`${REACT_URL_API}logs/${this.state.studentCode}`)

    await this.setState({
      studentData: {
        "nombre": "Rafael Rocha Barrios",
        code: this.state.studentCode,
        login_number: 62,
        graphs: {
          am_attendees_courses: {
            seriesName: "Cursos-visitados",
            title: "Visitas por curso",
            yAxis: [30, 40, 9, 0, 20, 40],
            xAxis: ["curso 1", "curso 2", "curso 3", "curso 4", "curso 5", "curso 6"]
          },
          am_resources_courses: {
            seriesName: "Recursos",
            title: "Recursos por curso",
            yAxis: [11, 17, 20, 0, 30, 15],
            xAxis: ["curso 1", "curso 2", "curso 3", "curso 4", "curso 5", "curso 6"]
          },
          am_interaction_resources_courses: {
            seriesName: "Recursos revisados",
            title: "Interacción de recurso por cursos",
            yAxis: [11, 3, 2, 0, 10, 6],
            xAxis: ["curso 1", "curso 2", "curso 3", "curso 4", "curso 5", "curso 6"]
          },
          am_activities_sent_courses: {
            seriesName: "Actividades",
            title: "Actividades enviadas por cursos",
            yAxis: [7, 10, 5, 0, 1, 15],
            xAxis: ["curso 1", "curso 2", "curso 3", "curso 4", "curso 5", "curso 6"]
          },
          am_activities_not_sent_courses: {
            seriesName: "Actividades",
            title: "Actividades no enviadas por cursos",
            yAxis: [0, 5, 2, 0, 6, 2],
            xAxis: ["curso 1", "curso 2", "curso 3", "curso 4", "curso 5", "curso 6"]
          },
          am_cumplition_courses: {
            seriesName: "Porcentaje de cumplimiento",
            title: "Porcentaje de cumplimiento por cursos",
            yAxis: [((7 / (7 + 0)) * 100).toFixed(2), ((10 / (10 + 5)) * 100).toFixed(2), ((5 / (5 + 2)) * 100).toFixed(2), ((0 / (0 + 0)) * 100).toFixed(2), ((1 / (1 + 6)) * 100).toFixed(2), ((15 / (15 + 2)) * 100).toFixed(2)],
            xAxis: ["curso 1", "curso 2", "curso 3", "curso 4", "curso 5", "curso 6"]
          },
          am_login_by_week: {
            seriesName: "Ingresos a savio",
            title: "Ingresos por semanas",
            yAxis: [2, 4, 5, 0, 7, 5, 1, 2, 3, 6, 7, 5, 4, 1, 4, 6],
            xAxis: ["Semana 1", "Semana 2", "Semana 3", "Semana 4", "Semana 5", "Semana 6",
              "Semana 7", "Semana 8", "Semana 9", "Semana 10", "Semana 11", "Semana 12", "Semana 13",
              "Semana 14", "Semana 15", "Semana 16"]
          }
        }
      }
    })
  }

  async updateStudentCode(event) {
    await this.setState({ studentCode: event.target.value })
  }

  render() {
    return (
      <div className="body-dashboard">
        <div className="row">
          <div className="col-lg-12 student-search">
            <Toolbar>
              <SearchForm className="" inputId="query" value={this.state.studentCode} clearable onChange={(event) => this.updateStudentCode(event)} />
              <Button color="info" className="submmit-search" onClick={this.handlerSearchStudents} >Buscar</Button>
            </Toolbar>
          </div>
        </div>
        <div className="row">
          < Dashboard Student={this.state.studentData} />
        </div>
      </div>
    )

  }
}

export default Body;
