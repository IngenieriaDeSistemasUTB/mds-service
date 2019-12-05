const axios = require('axios')
const { MoodleCategoriesDataFunctions } = require('../../../constants')
const Auth = require('../../helpers/Auth')
const WebServiceUri = require('../../helpers/webserviceuri')
const { ConvertQuerySearch } = require('../../helpers/utils')
const Logs = require('../../repositories/Logs')


const GetLogs = async (req, res) => {
    try {
        let auth = new Auth
        await auth.revalidateTokens()
        let URI = new WebServiceUri(MoodleCategoriesDataFunctions.LOCAL_MOODLE_CATEGORIES_GET_LOGS, auth.getMoodleCategoriesToken(), `useridnumber=${String(req.params.idnumber)}`).getURI()
        let response = await axios.get(URI)
        if (response.data) {
            const logs = new Logs(response.data)

            if (ConvertQuerySearch(req.query.GroupLogs)) {
                await logs.groupLogs()
            }

            if (ConvertQuerySearch(req.query.Graphs)) {
                await logs.createGraphs()
            }

            return res.status(200).json(logs)
        } else {
            res.status(404).json({ error: ErrorResponses.RESOURCE_NOT_FOUND })
        }
    } catch (error) {
        console.error(error);
        return res.status(500).json(error);
    }

};

module.exports = GetLogs;
